<?php

namespace App\Http\Controllers\Q;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\SavedQuiz;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index() {

        $data = Quiz::where("id_user", Auth::id())
                    ->paginate(10)->withQueryString();
        $saved_quiz = Quiz::join("saved_quizzes",'quiz.id','=','saved_quizzes.id_quiz')->where("saved_quizzes.id_user", Auth::id())->get();
        //dd($saved_quiz);
        $views = Result::select('id_quiz', Result::raw('count(*) as total'))
                        ->groupBy('id_quiz')
                        ->get();
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strcasecmp($_SERVER['HTTP_X_REQUESTED_WITH'], 'xmlhttprequest') == 0) {
            return view('quiz.data_index', [
                'data' => $data,
                'saved_quiz' => $saved_quiz,
                'views' => $views
            ]);
        }
        return view('quiz.index', [
            'data' => $data,
            'saved_quiz' => $saved_quiz,
            'views' => $views

        ]);
    }

    public function store(Request $request) {
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

    public function delete(Quiz $id) {
        if (Auth::user()->id == $id->id_user) {
            $id->delete();
            return response()->json("Successful", 200);
        } else {
            abort(401);
        }
    }

    public function get_CheckedQuiz() {
        if(isset($_GET['search'])){
            $hint = $_GET['search'];
            $data = Quiz::join("users",'quiz.id_user','=','users.id')
            ->where('check','1')->where('quiz_name','LIKE',"%".$hint."%")
            ->select('quiz.*', 'users.name', "users.id as id_user")
            ->paginate(10)->withQueryString();
        } else {
            $data = Quiz::join("users",'quiz.id_user','=','users.id')
                    ->where('check', '1')
                    ->select('quiz.*', 'users.name', "users.id as id_user")
                    ->paginate(10);
        }

        $saved_quiz = Quiz::join("saved_quizzes",'quiz.id','=','saved_quizzes.id_quiz')
                            ->where("saved_quizzes.id_user", Auth::id())
                            ->get();
        //dd($saved_quiz);
        $views = Result::select('id_quiz', Result::raw('count(*) as total'))
                        ->groupBy('id_quiz')
                        ->get();
        return view('welcome', [
            'data' => $data,
            'saved_quiz' => $saved_quiz,
            'views' => $views
        ]);
    }

    public function censorship() {
        $data = Quiz::join('users','quiz.id_user','=','users.id')->where('check', '0')->select('quiz.*', 'users.name as user_name', 'users.id as id_user')->paginate(10)->withQueryString();
        return view('quiz.censorship', [
            'data' => $data
        ]);
    }

    public function censorship_ed(Quiz $id) {
        $data = Quiz::where('id',$id->id)->update([
            'check' => '1'
        ]);
        return redirect('/censorship');
    }

    public function eviction(Quiz $id) {
        $data = Quiz::where('id',$id->id)->update([
            'check' => '0'
        ]);
        return redirect('/censorship');
    }

    public function saved_quiz(Quiz $id) {

        $data = SavedQuiz::create([
            'id_user' => Auth::id(),
            'id_quiz' => $id->id
        ]);
        // return redirect('/quiz');
        return response()->json("Successful", 200);
    }

    public function unsaved_quiz(Quiz $id) {

        $data = SavedQuiz::where('id_quiz', $id->id)->where('id_user',Auth::id())->get();
        $data[0]->delete();

        //return redirect('/quiz');
        return response()->json("Successful", 200);
    }

    public function all_saved_quiz() {

        $saved_quiz = Quiz::join("saved_quizzes",'quiz.id','=','saved_quizzes.id_quiz')
                    ->join("users",'quiz.id_user','=','users.id')
                    ->where("saved_quizzes.id_user", Auth::id())
                    //->select()
                    ->get();
        $views = Result::select('id_quiz', Result::raw('count(*) as total'))
                    ->groupBy('id_quiz')
                    ->get();
        return view('quiz.data', [
            "saved_quiz" => $saved_quiz,
            "views" => $views
        ]);
    }

    public function history_quiz() {

        $history_quiz = Quiz::join("result",'quiz.id','=','result.id_quiz')
                    ->join("users",'quiz.id_user','=','users.id')
                    ->where("result.id_user", Auth::id())
                    ->select('quiz.id','quiz.id_user','quiz.quiz_name','quiz.number_questions', 'users.name')
                    ->groupByRaw('id, id_user, quiz_name, number_questions, name')
                    ->get();
        $views = Result::select('id_quiz', Result::raw('count(*) as total'))
                        ->groupBy('id_quiz')
                        ->get();
        $saved_quiz = Quiz::join("saved_quizzes",'quiz.id','=','saved_quizzes.id_quiz')->where("saved_quizzes.id_user", Auth::id())->get();
        return view('quiz.data_history', [
            "history_quiz" => $history_quiz,
            "views" => $views,
            "saved_quiz" => $saved_quiz,
        ]);

    }
}
