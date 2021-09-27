<?php

namespace App\Http\Controllers\Q;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index(){
        $data = Quiz::all();
        return view('quiz.index', [
            'data' => $data
        ]);
    }

    public function create(Request $request){
        $data = Quiz::create([
            'id_user' => Auth::id(),
            'quiz_name' => $request->input('quiz_name'),
            'number_questions' => $request->input('number_questions')
        ]);
        return view();
    }

    public function delete(Quiz $id){
        $id->delete();
        return redirect('/quiz');
    }
}
