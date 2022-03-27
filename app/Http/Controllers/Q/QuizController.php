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
            'about' => $request->input('about'),
            'number_questions' => $request->input('number_questions'),
            'time' => $request->input('time'),
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

    public function review_quiz(Quiz $id){
        $quiz = Quiz::join("users",'quiz.id_user','=','users.id')->where('quiz.id',"$id->id")
        ->select("quiz.*","users.name as user_name",'users.provider','users.avatar')->get();
        return view('quiz.review', [
            'quiz' => $quiz[0]
        ]);
    }

    public function censorship(){
        $data = Quiz::join('users','quiz.id_user','=','users.id')->where('check', '0')->select('quiz.*', 'users.name as user_name', 'users.id as id_user')->paginate(10)->withQueryString();
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
