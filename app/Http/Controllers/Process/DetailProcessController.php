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
            DetailProcess::where("id_process", $id_process)
            ->where('id',$detail->id)
            ->update([
                'content' => $request->input("content$detail->id"),
                'date' => $request->input("date$detail->id"),
            ]);
        }
        return redirect("/detail_process/{$id_process}");

    }

    public function updateStatus(Request $request, $id_detail){
        $data = DetailProcess::where("id", $id_detail)->get("id_process");
        //dd($data);
        $data = $data[0]->id_process;
        DetailProcess::where('id',$id_detail)->update([
            'status' => $request->input("$id_detail")
        ]);
        return redirect("/detail_process/{$data}");
    }

    public function delete(DetailProcess $id){
        $id->delete();
        return redirect("/detail_process/{$id->id_process}");
    }
}
