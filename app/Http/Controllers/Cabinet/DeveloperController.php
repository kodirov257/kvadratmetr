<?php

namespace App\Http\Controllers\Cabinet;

use App\Entity\Project\Developer;
use App\Entity\User\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinet\Developers\CreateRequest;
use App\UseCases\Projects\DeveloperService;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    private $service;

    public function __construct(DeveloperService $service)
    {
        $this->service = $service;
    }
    public function index(){
//        dd('test');
        $user = \Auth::user();
        $developer = Developer::where('owner_id', $user->id)->get()->first();
        return view('developer.index', compact('user', 'developer'));
    }

    public function create(Request $request){

    }

    public function store(CreateRequest $request, User $user)
    {
        dd('tets');
        try {
            $developer = $this->service->create($user->id, $request);
            return redirect()->route('developer.index', [$user, $developer]);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
