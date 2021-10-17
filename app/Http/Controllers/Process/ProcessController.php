<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Process;
use Illuminate\Support\Facades\Auth;


class ProcessController extends Controller
{
    public function index(){
        $data = Process::where("id_user", Auth::id())->get();
        return view('process.index', [
            'data' => $data
        ]);
    }

    public function store(Request $request){
        $data = Process::create([
            'id_user' => Auth::id(),
            'name' => $request->input('name'),
        ]);
        return redirect("/detail_process/{$data->id}");
    }

    public function delete(process $id){
        $id->delete();
        return redirect('/process');
    }

    public function theme(Request $request, $id){
        $data = Process::where('id',$id)
            ->update([
            'theme' => $request->input('theme')
        ]);
        return redirect("/detail_process/{$id}");
    }
}
