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
        ->where('quiz.id',"$id->id")->get();
        // dd($comment);
        return view('quiz.data_review', [
            'data' => $data
        ]);
    }
}
