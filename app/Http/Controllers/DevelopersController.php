<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use App\Entity\Project\Developer;
use App\Entity\Region;
use App\Helpers\LanguageHelper;

class DevelopersController extends Controller
{
    public function index()
    {
        $developers = Developer::paginate(10);
        $projects = Developer::limit(10)->get();
        return view('clients.developers', compact('developers', 'projects'));
    }

    public function show($id)
    {
        $developer = Developer::where('id', $id)->first();
        return view('clients.developer', compact('developer'));
    }
}
