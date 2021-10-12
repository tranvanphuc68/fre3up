<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailProcess;
use App\Models\Process;
use Illuminate\Support\Facades\Auth;

class DetailProcessController extends Controller
{
    public function detail($id_process){
        $data = DetailProcess::where("id_process", $id_process)->get();
        return view('process.detail', [
            'data' => $data,
            
        ]);
    }
    public function create($id_process){
        $data = DetailProcess::where('id_process', $id_process)->get();
            return view('process.detail', [
                'data' => $data,
                'id_process' => $id_process
            ]);
    }

    public function store(Request $request, $id_process){
            $data = DetailProcess::create([
                'id_process' => $id_process,
                'content' => $request->input('content'),
                'date' =>$request->input('date')
            ]);
            return redirect("/detail_process/{$id_process}");
        }

    public function edit(Process $id){
        $data = DetailProcess::where('id', $id->id)->get();
        return view('process.detail', [
            'data' => $data,
            'id_process' => $id->id_process,
            'id' => $id->id
        ]);
    }

    public function update(Request $request, $id_process, $id){
        $data = DetailProcess::where('id', $id)->get();
        dd($data);
            $update = DetailProcess::where('id',$id)->update([
                'content' => $request->input("content$id"),
                'date' => $request->input("date$id")
            ]);
        return redirect("/detail_process/{$id_process}");
    } 
}
