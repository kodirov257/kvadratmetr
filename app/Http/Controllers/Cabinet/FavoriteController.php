<?php

namespace App\Http\Controllers\Cabinet;

use App\Entity\Project\Projects\Project;
use App\Http\Controllers\Controller;
use App\UseCases\Projects\FavoriteService;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    private $service;

    public function __construct(FavoriteService $service)
    {
        $this->service = $service;
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::favoredByUser(Auth::user())->orderByDesc('id')->paginate(20);

        return view('cabinet.favorites.index', compact('projects'));
    }

    public function remove(Project $project)
    {
        try {
            $this->service->remove(Auth::id(), $project->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('cabinet.favorites.index');
    }
}
