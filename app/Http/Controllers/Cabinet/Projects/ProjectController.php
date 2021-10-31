<?php

namespace App\Http\Controllers\Cabinet\Projects;

use App\Entity\Project\Characteristic;
use App\Entity\Project\Developer;
use App\Entity\Project\Facility;
use App\Entity\Project\Projects\Plan;
use App\Entity\Project\Projects\Project;
use App\Helpers\LanguageHelper;
use App\Http\Controllers\Controller;
use App\UseCases\Projects\DeveloperService;
use App\UseCases\Projects\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    private $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd('salom');


        $project = [];

        return view('cabinet.projects.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Developer $developer)
    {
//        dd($developer);
        $characteristics = Characteristic::orderBy('sort')->get();
        $facilities = Facility::orderBy('id')->get();
//        dd($characteristics);

        return view('cabinet.projects.index', compact('developer', 'characteristics', 'facilities'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->images);
//        dd($request);
        $user = Auth::user();
        $developer = Developer::where('owner_id', $user->id)->get()->first();
        try {
//            dd($request);
            $project = $this->service->create($developer->id, /*$request->category_id, */$request);

            return redirect()->route('cabinet.developer.edit', [$developer, $project]);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $developer = Developer::where('owner_id', $user->id)->first()->get();
        $characteristics = Characteristic::orderBy('sort')->get();
        $facilities = Facility::orderBy('id')->get();
        dd($developer);

        return view('cabinet.projects.index', compact('developer', 'characteristics', 'facilities'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $developer = Developer::where('owner_id', $user->id)->get()->first();
        $characteristics = Characteristic::orderBy('sort')->get();
        $facilities = Facility::orderBy('id')->get();
        $project = Project::where('id', $id)->get()->first();
//        dd($project);

        return view('cabinet.projects.edit', compact('developer', 'characteristics', 'facilities', 'project'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($id);
        $user = Auth::user();
        $developer = Developer::where('owner_id', $user->id)->get()->first();
        $project = Project::where('id', $id)->get()->first();
        try {
            $this->service->edit($id, $request);

            return redirect()->route('cabinet.developer.edit', [$developer, $project]);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function planPrice(Request $request){

        $project = Project::where('id', $request->id)->first();

        $plans = Plan::where('project_id', $request->id)->where('rooms', $request->roomNumber ?? 2)->get();
//dd($plan);

        return view('cabinet.projects.create.plan_price', compact('project', 'plans'));

    }
    public function planCreate(Request $request){

//        dd($request->room);
        $project_id = $request->id;
        $room = $request->room;
//        $project = Project::where('id', $request->id)->first();
//
//        $plan = Plan::where('project_id', $request->id)->where('rooms', $request->roomNumber ?? 2)->get();


        return view('cabinet.projects.create.plan_price_create', compact('project_id', 'room'));

    }

    public function planEdit(Request $request){

//        dd($request->room);
        $project_id = $request->id;
        $room = $request->room;
//        $ = $request->room;
//        $project = Project::where('id', $request->id)->first();
//
        $plan = Plan::where('id', $request->plan_id)->first();


        return view('cabinet.projects.create.plan_price_edit', compact('project_id', 'room', 'plan'));

    }

}
