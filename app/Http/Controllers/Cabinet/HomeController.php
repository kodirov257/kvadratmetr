<?php

namespace App\Http\Controllers\Cabinet;

use App\Entity\Project\Developer;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {

        $ownerId = \Auth::user();
//        dd($ownerId);
        $name = Developer::where('owner_id', $ownerId->id)->get()->first();
        if (!$name){
            $name = $ownerId;
        }

        return view('cabinet.home', compact(['name']));
    }
}
