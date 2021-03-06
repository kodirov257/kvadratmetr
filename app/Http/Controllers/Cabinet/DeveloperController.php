<?php

namespace App\Http\Controllers\Cabinet;

use App\Entity\Project\Developer;
use App\Entity\Project\Projects\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinet\Developers\CreateRequest;
use App\UseCases\Projects\DeveloperService;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Type;

class DeveloperController extends Controller
{

    private $service;

    public function __construct(DeveloperService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        $user = \Auth::user();
        $developer = Developer::where('owner_id', $user->id)->get()->first();
        return view('developer.index', compact('user', 'developer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::user();
        $developer = Developer::where('owner_id', $user->id)->get()->first();
        return view('developer.create', compact('user', 'developer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Auth::user();
        try {
            $developer = $this->service->create($user->id, $request);
            return redirect()->route('cabinet.developer.edit', [$user, $developer]);
        } catch (Exception $e) {
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
        dd('saolo');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = \Auth::user();

        $developer = Developer::where('owner_id', $user->id)->get()->first();

        return view('developer.edit', compact('developer', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

//        dd($request);
        $user = \Auth::user();

        $developer = Developer::where('owner_id', $user->id)->get()->first();
//        dd($developer->id);
        try {
            $this->service->edit($developer->id, $request);
            return redirect()->route('cabinet.developer.edit', [$user, $developer]);
        } catch (Exception $e) {
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
}
