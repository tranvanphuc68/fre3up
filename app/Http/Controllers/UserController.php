<?php

namespace App\Http\Controllers;

use App\Models\DetailProcess;
use App\Models\Process;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{   
    public function index(){
        if(isset($_GET['search'])){
            $data = User::where('name','LIKE','%'.$_GET['search'].'%')->orWhere('email','LIKE','%'.$_GET['search'].'%')->paginate(10)->withQueryString();
            return view('user.index', [
                'data' => $data
            ]);
        }
        else{
        $data = User::paginate(10);
        return view('user.index', [
            'data' => $data
        ]);
        }
    }

    public function profile(){
        $user = User::find(Auth::id());
        return view('user.profile', [
            'user' => $user
        ]);
    }

    public function update_profile(Request $request){
        $user = User::find(Auth::id())->update([
            "dob" => $request->input('dob'),
            "gender" => $request->input('gender'),
            "email" => $request->input('email'),
            "description" => $request->input('description')
        ]);
        return redirect('/auth/user/profile');
    }

    public function show(User $id){
        $user = User::find($id->id);
        //Pham Nhu Hoa => here
        $all_process = Process::where("id_user", $id->id)->get();
        $data = DetailProcess::orderBy('date')->get();
        return view('user.show', [
            'user' => $user,
            'data' => $data,
            'all_process' => $all_process
        ]);
    }
}
