<?php

namespace App\Http\Controllers\Admin\Project\Projects;

use App\Entity\Project\Characteristic;
use App\Entity\Project\Projects\Project;
use App\Helpers\LanguageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Projects\ValueRequest;
use App\UseCases\Projects\ProjectService;
use App\UseCases\Projects\ValueService;

class ValueController extends Controller
{
    private $service;

    public function __construct(ValueService $service)
    {
        $this->middleware('can:manage-projects-characteristics');
        $this->service = $service;
    }

    public function create(Project $project)
    {
        $characteristics = Characteristic::orderBy('sort')
            ->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.project.projects.values.create', compact('project', 'characteristics'));
    }

    public function store(ValueRequest $request, Project $project)
    {
        try {
            $value = $this->service->addValue($project->id, $request);

            return redirect()->route('admin.project.projects.values.show', ['project' => $project, 'characteristic' => $value->characteristic]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Project $project, Characteristic $characteristic)
    {
        $value = $project->values()->where('characteristic_id', $characteristic->id)->firstOrFail();

        return view('admin.project.projects.values.show', compact('project', 'characteristic', 'value'));
    }

    public function edit(Project $project, Characteristic $characteristic)
    {
        $value = $project->values()->where('characteristic_id', $characteristic->id)->firstOrFail();
        $characteristics = Characteristic::orderBy('sort')
            ->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.project.projects.values.edit', compact('project', 'characteristic', 'value', 'characteristics'));
    }

    public function update(ValueRequest $request, Project $project, Characteristic $characteristic)
    {
        try {
            $value = $this->service->editValue($project->id, $characteristic->id, $request);

            return redirect()->route('admin.project.projects.values.show', ['project' => $project, 'characteristic' => $value->characteristic]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Project $project, Characteristic $characteristic)
    {
        try {
            $this->service->removeValue($project->id, $characteristic->id);
            return redirect()->route('admin.project.developers.projects.show', [$project->developer, $project]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function first(Project $project, Characteristic $characteristic)
    {
        try {
            $this->service->moveValueToFirst($project->id, $characteristic->id);
            return redirect()->route('admin.project.developers.projects.show', [$project->developer, $project]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function up(Project $project, Characteristic $characteristic)
    {
        try {
            $this->service->moveValueUp($project->id, $characteristic->id);
            return redirect()->route('admin.project.developers.projects.show', [$project->developer, $project]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function down(Project $project, Characteristic $characteristic)
    {
        try {
            $this->service->moveValueDown($project->id, $characteristic->id);
            return redirect()->route('admin.project.developers.projects.show', [$project->developer, $project]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function last(Project $project, Characteristic $characteristic)
    {
        try {
            $this->service->moveValueToLast($project->id, $characteristic->id);
            return redirect()->route('admin.project.developers.projects.show', [$project->developer, $project]);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
