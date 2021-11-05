<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use App\Entity\Project\Developer;
use App\Entity\Region;
use App\Helpers\LanguageHelper;

class AboutController extends Controller
{
    public function index()
    {
//        $developer = Developer::where('id', $developerID)->first();


        return view('clients.about');
    }
}
