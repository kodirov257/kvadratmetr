<?php

namespace App\Http\Controllers\Cabinet\Projects;

use App\Http\Controllers\Controller;
use App\UseCases\Projects\PlanService;
use Illuminate\Http\Request;

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
