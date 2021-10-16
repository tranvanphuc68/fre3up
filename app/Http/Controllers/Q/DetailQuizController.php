<?php

namespace App\Http\Controllers\Q;

use App\Http\Controllers\Controller;
use App\Models\DetailQuiz;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailQuizController extends Controller
{   
    public function create(Quiz $id){
        $data = DetailQuiz::where('id_quiz', $id->id)->get();
        if(count($data) > 0) abort(403);
        if(Auth::id() == $id->id_user  ){
            $data = Quiz::find($id->id);
            return view('detail_quiz.create', [
                'data' => $data
            ]);
        } else abort(403);
    }

    public function store(Request $request, Quiz $id){
        for($i = 1; $i <= $id->number_questions; $i++){
            $data = DetailQuiz::create([
                'id_quiz' => $id->id,
                'question' => $request["ques_$i"],
                'ans_1' => $request->input("ques_$i"."ans_1"),
                'ans_2' => $request->input("ques_$i"."ans_2"),
                'ans_3' => $request->input("ques_$i"."ans_3"),
                'ans_4' => $request->input("ques_$i"."ans_4"),
                'true_ans' => $request->input("ques_$i"."true_ans")
            ]);
        }
        return redirect('/quiz');
    }

    public function edit(Quiz $id){
        $data = DetailQuiz::where('id_quiz', $id->id)->get();
        $count = $data->count();
        $id_user = Quiz::where('id',$id->id)->get();
        
        return view('detail_quiz.edit', [
            'data' => $data,
            'count' => $count,
            'id_user' => $id_user[0]->id_user
        ]);
    }

    public function update(Request $request, Quiz $id){
        for($i = 1; $i <= $id->number_questions; $i++){
            $data = DetailQuiz::where('id', $request->input('id_'.$i))->update([
                'question' => $request["ques_$i"],
                'ans_1' => $request->input("ques_$i"."ans_1"),
                'ans_2' => $request->input("ques_$i"."ans_2"),
                'ans_3' => $request->input("ques_$i"."ans_3"),
                'ans_4' => $request->input("ques_$i"."ans_4"),
                'true_ans' => $request->input("ques_$i"."true_ans")
            ]);
        } 
        return redirect('/quiz');
    }

    public function do_quiz(Request $request, Quiz $id){
        $data = DetailQuiz::where('id_quiz', $id->id)->get();
        $count = $data->count();
        return view('quiz.do', [
            'data' => $data,
            'count' => $count
        ]);
    }
}
