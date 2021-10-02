<?php

namespace App\Http\Controllers\Cabinet\Projects;

use App\Entity\Project\Projects\Project;
use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\CharacteristicsRequest;
use App\Http\Requests\Projects\EditRequest;
use App\Http\Requests\Projects\PhotosRequest;
use App\UseCases\Projects\ProjectService;
use Illuminate\Support\Facades\Gate;

class ManageController extends Controller
{
    private $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }

    public function editForm(Project $project)
    {
        $this->checkAccess($project);
        return view('projects.edit.project', compact('project'));
    }

    public function edit(EditRequest $request, Project $project)
    {
        $this->checkAccess($project);
        try {
            $this->service->edit($project->id, $request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('projects.show', $project);
    }

    public function characteristicsForm(Project $project)
    {
        $this->checkAccess($project);
        return view('projects.edit.characteristics', compact('project'));
    }

    public function characteristics(CharacteristicsRequest $request, Project $project)
    {
        $this->checkAccess($project);
        try {
            $this->service->editCharacteristics($project->id, $request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('projects.show', $project);
    }

    public function photosForm(Project $project)
    {
        $this->checkAccess($project);
        return view('projects.edit.photos', compact('project'));
    }

    public function photos(PhotosRequest $request, Project $project)
    {
        $this->checkAccess($project);
        try {
            $this->service->addPhotos($project->id, $request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('projects.show', $project);
    }

    public function send(Project $project)
    {
        $this->checkAccess($project);
        try {
            $this->service->sendToModeration($project->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('projects.show', $project);
    }

    public function close(Project $project)
    {
        $this->checkAccess($project);
        try {
            $this->service->close($project->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('projects.show', $project);
    }

    public function destroy(Project $project)
    {
        $this->checkAccess($project);
        try {
            $this->service->remove($project->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('cabinet.projects.index');
    }

    private function checkAccess(Project $project): void
    {
        if (!Gate::allows('manage-own-project', $project)) {
            abort(403);
        }
    }
}
