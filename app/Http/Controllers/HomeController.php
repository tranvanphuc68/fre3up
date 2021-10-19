<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Process;
use Illuminate\Support\Facades\Auth;
use App\Models\DetailProcess;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $all_process = Process::where("id_user", Auth::id())->get();
            $data = DetailProcess::orderBy('date')->get();
            return view('home', [
                'data' => $data,
                'all_process' => $all_process
            ]);
    }

}
