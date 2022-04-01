<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class ReviewController extends Controller
{

    public function review(Quiz $id) {
        $data = DB::table('users')
        ->join("comments",'comments.id_user','=','users.id', 'left outer' )
        ->join("reviews",'reviews.id_user','=','users.id', 'left outer')
        ->select("users.name as user_name",'users.provider','users.avatar', "comments.content", "reviews.point", "comments.updated_at")
        ->where('comments.id_quiz',"$id->id")
        ->orWhere('reviews.id_quiz', "$id->id")
        ->orderByDesc("comments.updated_at")
        ->paginate(10)->withQueryString();
        // dd($data);   
        $vote = Review::where('id_quiz', $id->id)->get();
        // dd($vote);
        return view('quiz.data_review_quiz', [
            'data' => $data,
            'vote' => $vote,
            // 'vote_num' => $vote_num
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
    
    public function vote(Request $request, Quiz $id){
        $point = $request->point;
        $data = DB::table('reviews')
            ->where('id_user', Auth::user()->id )
            ->Where('reviews.id_quiz', "$id->id")
            ->get();
        if (count($data) == 0) {
            $vote = Review::Create([    
                'id_user' => Auth::user()->id,
                'id_quiz' => $id->id,
                'point' => $point
            ]);
        }
        else {
            $vote = DB::table('reviews')
            ->where('id_user', Auth::user()->id )
            ->Where('reviews.id_quiz', "$id->id")->Update([
                'point' => $point
            ]);
        }
        return redirect("/");
    }


}
