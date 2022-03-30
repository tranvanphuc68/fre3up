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

    public function self_edit(Comment $comment) {
        if ($comment->id_user == Auth::user()->id) {
            return view('comments.edit', [
                'comment' => $comment,
            ]);
        } else {
            abort(401);
        }
    }

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
