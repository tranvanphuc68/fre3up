<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function show_comments(Quiz $id){
        $cmt = DB::table('comments')
        ->join("users",'users.id','=','comments.id_user')
        ->join("quiz",'quiz.id','=','comments.id_quiz')
        ->where('quiz.id',"$id->id")
        ->select("quiz.*","users.name as user_name",'users.provider','users.avatar', "comments.*")
        ->get();
        return view('quiz.review', [
            'quiz' => $cmt
        ]);
    }
}
