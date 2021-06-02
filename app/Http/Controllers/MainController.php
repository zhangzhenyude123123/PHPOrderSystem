<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['mainpage']]);
    }

    public function root()
    {
        return view('Pages.root');
    }

    public function mainpage()
    {
        //$reserves = DB::select('select * from reserves');
//        $reserves = Reserve::where('user_id',1)->get();
        $reserves = Reserve::all();
        return view('Pages.dashboard',['reserves' => $reserves]);
    }
}
