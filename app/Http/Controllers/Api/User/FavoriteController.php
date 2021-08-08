<?php

namespace App\Http\Controllers\Api\User;

use App\Entity\Projects\Project\Project;
use App\Http\Controllers\Controller;
use App\Http\Resources\Projects\ProjectDetailResource;
use App\UseCases\Projects\FavoriteService;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    private $service;

    public function __construct(FavoriteService $service)
    {
        $this->service = $service;
        $this->middleware('auth');
    }

    /**
     * @SWG\Get(
     *     path="/user/favorites",
     *     tags={"Favorites"},
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
    public function index()
    {
        $projects = Project::favoredByUser(Auth::user())->orderByDesc('id')->paginate(20);

        return ProjectDetailResource::collection($projects);
    }

    /**
     * @SWG\Delete(
     *     path="/user/favorites/{projectId}",
     *     tags={"Favorites"},
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
        try {
            $this->service->remove(Auth::id(), $project->id);
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('cabinet.favorites.index');
    }
}
