<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FirstPageController extends Controller
{

    public function show()
    {
        return view('Pages.frontpage');
    }

}
