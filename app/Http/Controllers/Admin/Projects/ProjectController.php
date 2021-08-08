<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Entity\Projects\Project\Project;
use App\Entity\User\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\CharacteristicsRequest;
use App\Http\Requests\Projects\EditRequest;
use App\Http\Requests\Projects\PhotosRequest;
use App\Http\Requests\Projects\RejectRequest;
use App\UseCases\Projects\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
        $this->middleware('can:manage-projects');
    }

    public function index(Request $request)
    {
        $query = Project::orderByDesc('updated_at');

        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('title'))) {
            $query->where('title', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('user'))) {
            $query->where('user_id', $value);
        }

        if (!empty($value = $request->get('region'))) {
            $query->where('region_id', $value);
        }

        if (!empty($value = $request->get('category'))) {
            $query->where('category_id', $value);
        }

        if (!empty($value = $request->get('status'))) {
            $query->where('status', $value);
        }

        $projects = $query->paginate(20);

        $statuses = Project::statusesList();

        $roles = User::rolesList();

        return view('admin.projects.projects.index', compact('projects', 'statuses', 'roles'));
    }

    public function editForm(Project $project)
    {
        return view('projects.edit.project', compact('project'));
    }

    public function edit(EditRequest $request, Project $project)
    {
        try {
            $this->service->edit($project->id, $request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('projects.show', $project);
    }

    public function characteristicsForm(Project $project)
    {
        return view('projects.edit.characteristics', compact('project'));
    }

    public function characteristics(CharacteristicsRequest $request, Project $project)
    {
        try {
            $this->service->editCharacteristics($project->id, $request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('projects.show', $project);
    }

    public function photosForm(Project $project)
    {
        return view('projects.edit.photos', compact('project'));
    }

    public function photos(PhotosRequest $request, Project $project)
    {
        try {
            $this->service->addPhotos($project->id, $request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('projects.show', $project);
    }

    public function moderate(Project $project)
    {
        try {
            $this->service->moderate($project->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('projects.show', $project);
    }

    public function rejectForm(Project $project)
    {
        return view('admin.projects.projects.reject', compact('project'));
    }

    public function reject(RejectRequest $request, Project $project)
    {
        try {
            $this->service->reject($project->id, $request);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('projects.show', $project);
    }

    public function destroy(Project $project)
    {
        try {
            $this->service->remove($project->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.projects.projects.index');
    }
}
