<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;
use Auth;

class MainPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    public function mainpage()
    {
        $id = Auth::id();
        $reserves = Reserve::where('user_id',$id)
            ->get();
        return view('Pages.dashboard',['reserves' => $reserves]);
    }
}
