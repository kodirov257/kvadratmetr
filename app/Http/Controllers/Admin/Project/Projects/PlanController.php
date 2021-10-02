<?php

namespace App\Http\Controllers\Admin\Project\Projects;

use App\Entity\Projects\Project\Plan;
use App\Entity\Projects\Project\Project;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Projects\Plans\CreateRequest;
use App\Http\Requests\Admin\Projects\Plans\UpdateRequest;
use App\UseCases\Projects\PlanService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Throwable;

class PlanController extends Controller
{
    private $service;

    public function __construct(PlanService $service)
    {
        $this->middleware('can:manage-projects-facilities');
        $this->service = $service;
    }

    public function create(Project $project)
    {
        $areaUnits = Plan::unitsList();

        return view('admin.project.projects.plans.create', compact('project', 'areaUnits'));
    }

    public function store(CreateRequest $request, Project $project): RedirectResponse
    {
        try {
            $plan = $this->service->create($project->id, $request);

            return redirect()->route('admin.project.projects.plans.show', [$project, $plan]);
        } catch (Throwable|Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Project $project, Plan $plan)
    {
        return view('admin.project.projects.plans.show', compact('project', 'plan'));
    }

    public function edit(Project $project, Plan $plan)
    {
        $areaUnits = Plan::unitsList();

        return view('admin.project.projects.plans.edit', compact('project', 'plan', 'areaUnits'));
    }

    public function update(UpdateRequest $request, Project $project, Plan $plan)
    {
        try {
            $this->service->update($project->id, $plan->id, $request);

            return redirect()->route('admin.project.projects.plans.show', [$project, $plan]);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function first(Project $project, Plan $plan)
    {
        try {
            $this->service->moveToFirst($project->id, $plan->id);
            return redirect()->route('admin.developers.projects.show', $project);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function up(Project $project, Plan $plan)
    {
        try {
            $this->service->moveUp($project->id, $plan->id);
            return redirect()->route('admin.developers.projects.show', $project);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function down(Project $project, Plan $plan)
    {
        try {
            $this->service->moveDown($project->id, $plan->id);
            return redirect()->route('admin.developers.projects.show', $project);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function last(Project $project, Plan $plan)
    {
        try {
            $this->service->moveToLast($project->id, $plan->id);
            return redirect()->route('admin.developers.projects.show', $project);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Plan $plan)
    {
        try {
            Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_PROJECT_PLAN . '/' . $plan->id);

            $plan->delete();
            return redirect()->route('admin.project.projects.plans.index');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function removeImage(Plan $plan)
    {
        if ($this->service->removeImage($plan->id)) {
            return response()->json('The icon is successfully deleted!');
        }
        return response()->json('The icon is not deleted!', 400);
    }
}
