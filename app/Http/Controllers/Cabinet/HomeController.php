<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
//        dd('salom');
        return view('cabinet.home');
    }
}
