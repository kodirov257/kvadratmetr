<?php

namespace App\Http\Controllers\Cabinet;

use App\Entity\Project\Developer;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {

        $ownerId = \Auth::user();
        $name = Developer::where('owner_id', $ownerId->id)->get()->first();
        if (!$name){
            $name = $ownerId->name;
        }

        return view('cabinet.home', compact(['name']));
    }
}
