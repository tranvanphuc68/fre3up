<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    
    public function review(Quiz $id) {
        $data = DB::table('comments')
        ->join("users",'users.id','=','comments.id_user')
        ->join("quiz",'quiz.id','=','comments.id_quiz')
        ->join("reviews",'reviews.id_quiz','=','quiz.id')
        ->select("quiz.*","users.name as user_name",'users.provider','users.avatar', "comments.content", "reviews.point")
        ->where('quiz.id',"$id->id")->paginate(10)->withQueryString();
        return view('quiz.data_review_quiz', [
            'data' => $data
        ]);
    }

    public function review_quiz(Quiz $id){
        $quiz = Quiz::join("users",'quiz.id_user','=','users.id')->where('quiz.id',"$id->id")
        ->select("quiz.*","users.name as user_name",'users.provider','users.avatar')->get();
        return view('quiz.review', [
            'quiz' => $quiz[0]
        ]);
    
    }
    public function about_quiz(Quiz $id){
        $quiz = Quiz::join("users",'quiz.id_user','=','users.id')->where('quiz.id',"$id->id")
        ->select("quiz.*","users.name as user_name",'users.provider','users.avatar')->get();
        return view('quiz.data_about_quiz', [
            'quiz' => $quiz[0]
        ]);
    }

}
