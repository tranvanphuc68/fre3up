<?php

namespace App\Http\Controllers;

use App\Models\DetailProcess;
use App\Models\Process;
use App\Models\User;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        if(isset($_GET['search'])){
            $data = User::where('name','LIKE','%'.$_GET['search'].'%')->orWhere('email','LIKE','%'.$_GET['search'].'%')
            ->orderByDesc("role")
            ->orderByDesc("created_at")
            ->paginate(10)->withQueryString();
            return view('user.index', [
                'data' => $data
            ]);
        }
        else{
            $data = User::orderBy("role")->orderByDesc("created_at")->paginate(10);
            return view('user.index', [
                'data' => $data
            ]);
        }
    }

    public function profile() {
        $user = User::find(Auth::id());
        $all_process = Process::where("id_user", Auth::id())->get();
        $data = Quiz::where("id_user", Auth::id())->where("check","1")->get();
        $details = DetailProcess::orderBy('date')->get();
        return view('user.profile', [
            'user' => $user,
            'data' => $data,
            'all_process' => $all_process,
            'details' => $details
        ]);
    }

    public function update_profile(Request $request) {
        if(Auth::user()->provider == null) {
            if($request->input('gender') == "Male") {
                $user = User::find(Auth::id())->update([
                    "avatar" => "defaultMale.jpg"
                ]);
            } else {
                $user = User::find(Auth::id())->update([
                    "avatar" => "defaultFemale.jpg"
                ]);
            }
            
        }
        $user = User::find(Auth::id())->update([
            "dob" => $request->input('dob'),
            "gender" => $request->input('gender'),
            "email" => $request->input('email'),
            "description" => $request->input('description')
        ]);
        return redirect('/auth/user/profile');
    }

    public function show(User $id) {
        $user = User::find($id->id);
        $all_process = Process::where("id_user", Auth::id())->get();
        $data = Quiz::where("id_user", $id->id)->where("check","1")->get();
        $details = DetailProcess::orderBy('date')->get();
        return view('user.show', [
            'user' => $user,
            'data' => $data,
            'all_process' => $all_process,
            'details' => $details
        ]);
    }

    public function duplicate($id_process) {
        $detail = DetailProcess::where('id_process', $id_process)->get();
        $data = Process::where('id',$id_process)->get();
        $process = Process::create([
            'id_user' => Auth::id(),
            'name' => $data[0]->name
        ]);
        foreach ($detail as $item) {
            $detailProcess= DetailProcess::create([
                'content' => $item->content,
                'date' => $item->date,
                'addition' => $item->addition,
                'id_process' => $process->id
            ]);
        }
        return redirect("/detail_process/{$process->id}");


    }
}
