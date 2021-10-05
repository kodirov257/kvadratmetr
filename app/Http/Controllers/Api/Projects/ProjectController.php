<?php

namespace App\Http\Controllers\Api\Projects;

use App\Entity\Project\Projects\Project;
use App\Entity\Category;
use App\Entity\Region;
use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\SearchRequest;
use App\Http\Resources\Projects\ProjectDetailResource;
use App\Http\Resources\Projects\ProjectListResource;
use App\UseCases\Projects\SearchService;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    private $search;

    public function __construct(SearchService $search)
    {
        $this->search = $search;
    }

    /**
     * @SWG\Get(
     *     path="/projects",
     *     tags={"Projects"},
     *     @SWG\Response(
     *         response=200,
     *         description="Success response",
     *         @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/ProjectList")
     *         ),
     *     ),
     *     security={{"Bearer": {}, "OAuth2": {}}}
     * )
     */
    public function index(SearchRequest $request)
    {
        $region = $request->get('region') ? Region::findOrFail($request->get('region')) : null;
        $category = $request->get('category') ? Category::findOrFail($request->get('category')) : null;

        $result = $this->search->search($category, $region, $request, 20, $request->get('page', 1));

        return ProjectListResource::collection($result->projects);
    }

    /**
     * @SWG\Get(
     *     path="/projects/{projectId}",
     *     tags={"Projects"},
     *     @SWG\Parameter(
     *         name="projectId",
     *         description="ID of project",
     *         in="path",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Success response",
     *         @SWG\Schema(ref="#/definitions/ProjectDetail"),
     *     ),
     *     security={{"Bearer": {}, "OAuth2": {}}}
     * )
     */
    public function show(Project $project)
    {
        if (!($project->isActive() || Gate::allows('show-project', $project))) {
            abort(403);
        }

        return new ProjectDetailResource($project);
    }
}
