<?php

namespace App\Http\Controllers\Cabinet\Projects;

use App\Entity\Projects\Project\Project;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::forUser(Auth::user())->orderByDesc('id')->paginate(20);

        return view('cabinet.projects.index', compact('projects'));
    }
}
