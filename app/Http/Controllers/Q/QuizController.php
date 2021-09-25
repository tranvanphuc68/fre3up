<?php

namespace App\Http\Controllers\Q;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(){
        $quiz = Quiz::all();
        return view('quiz.index', [
            'quiz' => $quiz
        ]);
    }
}
