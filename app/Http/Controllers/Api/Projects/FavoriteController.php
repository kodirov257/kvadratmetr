<?php

namespace App\Http\Controllers\Api\Projects;

use App\Entity\Projects\Project\Project;
use App\Http\Controllers\Controller;
use App\UseCases\Projects\FavoriteService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    private $service;

    public function __construct(FavoriteService $service)
    {
        $this->service = $service;
    }

    /**
     * @SWG\Post(
     *     path="/projects/{projectId}/favorite",
     *     tags={"Projects"},
     *     @SWG\Parameter(name="projectId", in="path", required=true, type="integer"),
     *     @SWG\Response(
     *         response=201,
     *         description="Success response",
     *     ),
     *     security={{"Bearer": {}, "OAuth2": {}}}
     * )
     */
    public function add(Project $project)
    {
        $this->service->add(Auth::id(), $project->id);
        return response()->json([], Response::HTTP_CREATED);
    }

    /**
     * @SWG\Delete(
     *     path="/projects/{projectId}/favorite",
     *     tags={"Projects"},
     *     @SWG\Parameter(name="projectId", in="path", required=true, type="integer"),
     *     @SWG\Response(
     *         response=204,
     *         description="Success response",
     *     ),
     *     security={{"Bearer": {}, "OAuth2": {}}}
     * )
     */
    public function remove(Project $project)
    {
        $this->service->remove(Auth::id(), $project->id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
