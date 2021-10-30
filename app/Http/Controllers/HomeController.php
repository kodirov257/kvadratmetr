<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use App\Entity\Project\Developer;
use App\Entity\Project\Projects\Project;
use App\Entity\Region;
use App\Helpers\LanguageHelper;

class HomeController extends Controller
{
    public function index()
    {
        $developers = Developer::limit(8)->get();
        $projects = Project::limit(8)->get();
        $lastAddedProjects = Project::orderBy('created_at')->limit(8)->get();

        return view('home', compact('developers', 'projects', 'lastAddedProjects'));
    }
}
