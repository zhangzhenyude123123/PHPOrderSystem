<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;
use Auth;

class MainPageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    public function mainpage()
    {
        //$reserves = DB::select('select * from reserves');
        //$reserves = Reserve::all();
        $id = Auth::id();
        $reserves = Reserve::where('user_id',$id)
            ->get();
        return view('Pages.dashboard',['reserves' => $reserves]);
    }
}
