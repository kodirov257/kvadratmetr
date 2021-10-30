<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use App\Entity\Project\Developer;
use App\Entity\Region;
use App\Helpers\LanguageHelper;
use phpDocumentor\Reflection\Project;

class CalculatorController extends Controller
{
    public function index($id)
    {
        $project = \App\Entity\Project\Projects\Project::where('id', $id)->first();
//        dd($project);

        return view('clients.calculator', compact('project'));
    }
}
