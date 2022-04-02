<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(Request $request, Quiz $id) {
        $data = Comment::create([
            'id_quiz' => $id->id,
            'id_user' => Auth::user()->id,
            'content' => $request->input('content')
        ]);
        return redirect("/");
    }

    public function delete(Comment $id) {
        if (Auth::user()->id == $id->id_user || Auth::user()->role == 'admin') {
            $id->delete();
            return response()->json("Successful", 200);
        } else {
            abort(401);
        }
    }
    // public function delete(Quiz $id) {

    //     $data = Comment::where('id_quiz', $id->id)->where('id_user',Auth::id())->get();
    //     $data[0]->delete();

    //     //return redirect('/quiz');
    //     return response()->json("Successful", 200);
    // }

    // public function update(Request $request, Comment $comment)
    // {
    //     $comment->update([
    //         'content' => $request->content
    //     ]);
    //     return redirect("/posts/{$comment->id_post}");
    // }

    // public function destroy(Comment $comment)
    // {
    //     $id_user = Auth::user()->id;
    //     if ($comment->id_user == $id_user) {
    //         $comment->delete();
    //         return redirect("/posts/{$comment->id_post}");
    //     } else {
    //         abort(401);
    //     }
    // }
}
