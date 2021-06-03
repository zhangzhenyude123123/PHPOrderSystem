<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    public function mainpage()
    {
        //$reserves = DB::select('select * from reserves');
        //$reserves = Reserve::where('user_id',1)->get();
        $reserves = Reserve::all();
        return view('Pages.dashboard',['reserves' => $reserves]);
    }
}
