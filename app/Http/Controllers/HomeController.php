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
        $regions = [
            'All',
            'Bektemir',
            "Chilanzar",
            "Mirobod",
            "Mirzo Ulugbek",
            "Olmazar",
            "Sergeli",
            "Shaykhontohur",
            "Uchtepa",
            "Yakkasaray",
            "Yashnobod",
            "Yunusabad"
        ];
        return view('home', compact('developers', 'projects', 'lastAddedProjects', 'regions'));
    }
}
