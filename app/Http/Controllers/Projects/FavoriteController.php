<?php

namespace App\Http\Controllers\Projects;

use App\Entity\Projects\Project\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\CharacteristicsRequest;
use App\Http\Requests\Projects\EditRequest;
use App\Http\Requests\Projects\PhotosRequest;
use App\UseCases\Projects\ProjectService;
use App\UseCases\Projects\FavoriteService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FavoriteController extends Controller
{
    private $service;

    public function __construct(FavoriteService $service)
    {
        $this->service = $service;
        $this->middleware('auth');
    }

    public function add(Project $project)
    {
        try {
            $this->service->add(Auth::id(), $project->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('projects.show', $project)->with('success', 'Project is added to your favorites.');
    }

    public function remove(Project $project)
    {
        try {
            $this->service->remove(Auth::id(), $project->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('projects.show', $project);
    }
}
