<?php

namespace App\Http\Controllers\Cabinet\Projects;

use App\Entity\Project\Developer;
use App\Http\Controllers\Controller;
use App\UseCases\Projects\PlanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanPriceController extends Controller
{
    private $service;

    public function __construct(PlanService $service)
    {
        $this->service = $service;
    }

    public function create(Request $request){
//        dd($request);
        try {
            $plan = $this->service->create($request->get('project_id'), $request);
            $user = Auth::user();
            $developer = Developer::where('owner_id', $user->id)->get()->first();
            return redirect()->route('cabinet.developer.edit', [$user, $developer]);

        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }


    }

    public function edit(Request $request){
//        dd($request);
        try {
            $plan = $this->service->update($request->get('project_id'), $request);

        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }


    }
}
