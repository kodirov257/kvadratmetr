<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Entity\Projects\Developer;
use App\Entity\Projects\Project\Project;
use App\Entity\Region;
use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use App\Helpers\ProjectHelper;
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

    public function create(Request $request)
    {
        $categories = ProjectHelper::getCategoryList();
        $regions = ProjectHelper::getRegionsList();
        $developers = Developer::orderByDesc('updated_at')->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
        $statuses = Project::statusesList();

        return view('admin.projects.projects.create', compact('categories', 'regions', 'developers', 'statuses'));
    }

    public function show(Project $project)
    {
        return view('admin.projects.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.projects.edit', compact('project'));
    }

    public function update(EditRequest $request, Project $project)
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
        return view('admin.projects.characteristics.create', compact('project'));
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
        return view('admin.projects.photos.photos', compact('project'));
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
        return view('admin.projects.reject', compact('project'));
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

        return redirect()->route('admin.projects.index');
    }
}
