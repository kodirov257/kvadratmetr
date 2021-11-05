<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use App\Entity\Project\Developer;
use App\Entity\Project\Projects\Plan;
use App\Entity\Region;
use App\Helpers\LanguageHelper;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Project;

class CalculatorController extends Controller
{
    public function index($id, Request $request)
    {
        $project = \App\Entity\Project\Projects\Project::where('id', $id)->first();

//        dd($request->room);
        if ($request->room){
            $plans = Plan::where('project_id', $project->id)->where('rooms', $request->room)->get();
        }else{
//            dd('saol');
            $plans = $project->plans;
        }
//        dd($plans);

        return view('clients.calculator', compact('project', 'plans'));
    }
}
