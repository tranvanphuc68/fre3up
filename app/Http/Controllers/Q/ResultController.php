<?php

namespace App\Http\Controllers\Q;

use App\Http\Controllers\Controller;
use App\Models\DetailQuiz;
use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ResultController extends Controller
{
    public function check(Request $request, Quiz $id){
        $count = 0;
        for($i=1; $i<=$id->number_questions; $i++){
            $data = DetailQuiz::find($request->input("id_$i"));
            if( $data->true_ans === $request->input("ques_$i"."ans")){
                $count++;
            }
        };
        $check = Result::where('id_quiz',$id->id)->where('id_user', Auth::id())->count();
        $result = Result::create([
            'id_user' => Auth::id(),
            'id_quiz' => $id->id,
            'result' => $count
         ]);
        $_answers = $request->input();
        return redirect("/result/{$id->id}")->with(["_answers" => $_answers]);
    }

    public function show_result(Quiz $id){
        $_answers = Session::get('_answers');
        // if($_answers == null){
        //     return redirect('/');
        // }
        $data = DetailQuiz::where('id_quiz', $id->id)->get();
        $result = Result::where('id_user', Auth::id())->where('id_quiz', $id->id)->orderBy('created_at', 'desc')->get();
        $count = $result[0]->result;

        $wrank = DB::table('result')->where('id_quiz',$id->id)
        ->selectRaw(' max(`result`.`result`) as `result`, `id_user`')
        ->groupBy('id_user');
        //select MAX(`result`.`result`) as `result`, `users`.`name`, `users`.`id` from `result` inner join `users` 
        //on `users`.`id` = `result`.`id_user` where `id_quiz` = 2 group by `id` ORDER by MAX(`result`.`result`) desc;
        $rank = DB::table($wrank, $as ='table')->join('users', 'users.id', '=','table.id_user')
        ->select("table.*", 'users.name')
        ->orderby('result', 'desc')
        ->get();
        return view('quiz.result', [
            'data' => $data,
            '_answers' => $_answers,
            'result' => $count,
            'quiz' => $id,
            'all_result' => $result,
            'rank' => $rank
        ]);
    }
}
