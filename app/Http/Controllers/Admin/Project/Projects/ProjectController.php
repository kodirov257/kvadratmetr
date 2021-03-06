<?php

namespace App\Http\Controllers\Admin\Project\Projects;

use App\Entity\Project\Developer;
use App\Entity\Project\Projects\Project;
use App\Entity\Region;
use App\Entity\User\User;
use App\Helpers\LanguageHelper;
use App\Helpers\ProjectHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\CreateRequest;
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

        return view('admin.project.projects.index', compact('projects', 'statuses', 'roles'));
    }

    public function create(Request $request, Developer $developer)
    {
        $categories = ProjectHelper::getCategoryList();
        $regions = ProjectHelper::getRegionsList();
        $statuses = Project::statusesList();

        return view('admin.project.projects.create', compact('categories', 'regions', 'developer', 'statuses'));
    }

    public function store(CreateRequest $request, Developer $developer)
    {
        try {
            $project = $this->service->create($developer->id, /*$request->category_id, */$request);

            return redirect()->route('admin.project.developers.projects.show', [$developer, $project]);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Developer $developer, Project $project)
    {
        return view('admin.project.projects.show', compact('developer', 'project'));
    }

    public function edit(Developer $developer, Project $project)
    {
        $categories = ProjectHelper::getCategoryList();
//        $regions = ProjectHelper::getRegionsList();
        $statuses = Project::statusesList();

        return view('admin.project.projects.edit', compact('project', 'categories', /*'regions', */'developer', 'statuses'));
    }

    public function update(EditRequest $request, Developer $developer, Project $project)
    {
        try {
            $this->service->edit($project->id, $request);

            return redirect()->route('admin.project.developers.projects.show', [$developer, $project]);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function sendToModeration(Project $project)
    {
        $this->service->sendToModeration($project->id);
        try {
            session()->flash('message', '???????????? ???????????????? ');
            return redirect()->route('admin.projects.show', $project);
        } catch (\Exception $e) {
            session()->flash('error', '?????????????????? ????????????');
            return back()->with('error', $e->getMessage());
        }
    }

    public function moderate(Project $project)
    {
        try {
            $this->service->moderate($project->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('admin.project.developers.projects.show', ['developer' => $project->developer, 'project' => $project]);
    }

    public function rejectForm(Project $project)
    {
        return view('admin.project.projects.reject', compact('project'));
    }

    public function reject(RejectRequest $request, Project $project)
    {
        try {
            $this->service->reject($project->id, $request);

            return redirect()->route('admin.project.developers.projects.show', [$project->developer, $project]);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function activate(Project $project)
    {
        try {
            $this->service->activate($project->id);

            return redirect()->route('admin.project.developers.projects.show', $project);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function close(Project $project)
    {
        try {
            $this->service->close($project->id);

            return redirect()->route('admin.project.developers.projects.show', $project);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
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
