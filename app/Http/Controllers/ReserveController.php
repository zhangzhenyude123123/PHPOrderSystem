<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReserveController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
    }

    public function newreserve(){
        session()->flash('success', 'This is a success alert—check it out!');
        return view("Pages.newreserve");
    }
}
