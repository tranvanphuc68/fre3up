<?php

namespace App\Http\Controllers\Q;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index(){
        $data = Quiz::where("id_user", Auth::id())->paginate(10)->withQueryString();
        return view('quiz.index', [
            'data' => $data
        ]);
    }

    public function store(Request $request){
        $data = Quiz::create([
            'id_user' => Auth::id(),
            'quiz_name' => $request->input('quiz_name'),
            'number_questions' => $request->input('number_questions'),
            'check' => '0'
        ]);
        return redirect("/detail_quiz/{$data->id}");
    }

    public function delete(Quiz $id){
        $id->delete();
        return redirect('/quiz');
    }

    public function get_CheckedQuiz(){
        if(isset($_GET['search'])){
            $hint = $_GET['search'];
            $data = Quiz::where('check','1')
            ->where('quiz_name','LIKE',"%".$hint."%")->paginate(10)->withQueryString();
            return view('welcome', [
                'data' => $data
            ]);
        }
        $data = Quiz::where('check', '1')->paginate(10);
        return view('welcome', [
            'data' => $data
        ]);
    }

    public function censorship(){
        $data = Quiz::where('check', '0')->paginate(10)->withQueryString();
        return view('quiz.censorship', [
            'data' => $data
        ]);
    }

    public function censorship_ed(Quiz $id){
        $data = Quiz::where('id',$id->id)->update([
            'check' => '1'
        ]);
        return redirect('/censorship');
    }

    public function eviction(Quiz $id){
        $data = Quiz::where('id',$id->id)->update([
            'check' => '0'
        ]);
        return redirect('/censorship');
    }
}
