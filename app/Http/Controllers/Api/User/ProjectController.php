<?php

namespace App\Http\Controllers\Api\User;

use App\Entity\Project\Projects\Project;
use App\Entity\Category;
use App\Entity\Region;
use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\CharacteristicsRequest;
use App\Http\Requests\Projects\CreateRequest;
use App\Http\Requests\Projects\EditRequest;
use App\Http\Requests\Projects\PhotosRequest;
use App\Http\Resources\Projects\ProjectDetailResource;
use App\Http\Resources\Projects\ProjectListResource;
use App\UseCases\Projects\ProjectService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    private $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $projects = Project::forUser(Auth::user())->orderByDesc('id')->paginate(20);

        return ProjectListResource::collection($projects);
    }

    public function show(Project $project)
    {
        $this->checkAccess($project);
        return new ProjectDetailResource($project);
    }

    public function store(CreateRequest $request, Category $category, Region $region = null)
    {
        $project = $this->service->create(
            Auth::id(),
//            $category->id,
//            $region ? $region->id : null,
            $request
        );

        return (new ProjectDetailResource($project))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(EditRequest $request, Project $project)
    {
        $this->checkAccess($project);
        $this->service->edit($project->id, $request);
        return new ProjectDetailResource(Project::findOrFail($project->id));
    }

    public function characteristics(CharacteristicsRequest $request, Project $project)
    {
        $this->checkAccess($project);
        $this->service->editCharacteristics($project->id, $request);
        return new ProjectDetailResource(Project::findOrFail($project->id));
    }

    public function photos(PhotosRequest $request, Project $project)
    {
        $this->checkAccess($project);
        $this->service->addPhotos($project->id, $request);
        return new ProjectDetailResource(Project::findOrFail($project->id));
    }

    public function send(Project $project)
    {
        $this->checkAccess($project);
        $this->service->sendToModeration($project->id);
        return new ProjectDetailResource(Project::findOrFail($project->id));
    }

    public function close(Project $project)
    {
        $this->checkAccess($project);
        $this->service->close($project->id);
        return new ProjectDetailResource(Project::findOrFail($project->id));
    }

    public function destroy(Project $project)
    {
        $this->checkAccess($project);
        $this->service->remove($project->id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    private function checkAccess(Project $project): void
    {
        if (!Gate::allows('manage-own-project', $project)) {
            abort(403);
        }
    }
}
