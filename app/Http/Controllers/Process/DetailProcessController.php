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
        $data = DetailProcess::where("id_process", $id_process)->orderBy('date')->get();
        $data1 = Process::where("id", $id_process)
        ->where("id_user", Auth::id())
        ->get();
        $process = $data1[0];
        return view('process.detail', [
            'data' => $data,
            'id_process' => $id_process,
            'process' => $process
            
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

    public function edit($id_process){
        $data = DetailProcess::where("id_process", $id_process)->get();
        return view('process.edit', [
            'data' => $data,
            'id_process' => $id_process
        ]);
    }

    public function update(Request $request, $id_process){
        $data = DetailProcess::where("id_process", $id_process)->get();
        //($request->input());
        foreach ($data as $detail) {
            $status = '0';
            if ( $request->input("status$detail->id") == '1'){
                $status = $request->input("status$detail->id");
            }
            DetailProcess::where("id_process", $id_process)
            ->where('id',$detail->id)
            ->update([
                'content' => $request->input("content$detail->id"),
                'date' => $request->input("date$detail->id"),
                'status' => $status
            ]);
        }
        return redirect("/detail_process/{$id_process}");
        
     
    } 
}
