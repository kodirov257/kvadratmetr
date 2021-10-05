<?php

namespace App\Http\Controllers\Admin\Project\Projects;

use App\Entity\Project\Facility;
use App\Entity\Project\Projects\Project;
use App\Helpers\LanguageHelper;
use App\Http\Controllers\Controller;
use App\UseCases\Projects\FacilityService;
use Exception;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    private $service;

    public function __construct(FacilityService $service)
    {
        $this->middleware('can:manage-projects-facilities');
        $this->service = $service;
    }

    public function addForm(Project $project)
    {
        $facilities = Facility::pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

        return view('admin.project.projects.facility', compact('project', 'facilities'));
    }

    public function add(Request $request, Project $project)
    {
        try {
            $this->validate($request, [
                'facility_id' => 'required|numeric|min:1|exists:project_facilities,id'
            ]);

            $this->service->addFacility($project->id, $request['facility_id']);

            return redirect()->route('admin.developers.projects.show', [$project->developer, $project]);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function first(Project $project, Facility $facility)
    {
        try {
            $this->service->moveFacilityToFirst($project->id, $facility->id);
            return redirect()->route('admin.developers.projects.show', $project);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function up(Project $project, Facility $facility)
    {
        try {
            $this->service->moveFacilityUp($project->id, $facility->id);
            return redirect()->route('admin.developers.projects.show', $project);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function down(Project $project, Facility $facility)
    {
        try {
            $this->service->moveFacilityDown($project->id, $facility->id);
            return redirect()->route('admin.developers.projects.show', $project);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function last(Project $project, Facility $facility)
    {
        try {
            $this->service->moveFacilityToLast($project->id, $facility->id);
            return redirect()->route('admin.developers.projects.show', $project);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
