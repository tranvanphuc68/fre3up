<?php

namespace App\Http\Controllers\Q;

use App\Http\Controllers\Controller;
use App\Models\DetailQuiz;
use App\Models\Quiz;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function check(Request $request, Quiz $id){
        $count = 0;
        for($i=1; $i<=$id->number_questions; $i++){
            $data = DetailQuiz::find($request->input("id_$i"));
            if( $data->true_ans === $request->input("ques_$i"."true_ans")){
                $count++;
            }
        };
        $check = Result::where('id_quiz',$id->id)->where('id_user', Auth::id())->count();
        $result = Result::create([
            'id_user' => Auth::id(),
            'id_quiz' => $id->id,
            'result' => $count
         ]);
        
        return redirect("/result/{$id->id}");
    }

    public function show_result(Quiz $id){
        $data = DetailQuiz::where('id_quiz', $id->id)->get();
        $result = Result::where('id_user', Auth::id())->where('id_quiz', $id->id)->get();
        $count = $result[0]->result;
        return view('quiz.result', [
            'data' => $data,
            'result' => $count,
            'quiz' => $id,
            'all_result' => $result
        ]);
    }
}
