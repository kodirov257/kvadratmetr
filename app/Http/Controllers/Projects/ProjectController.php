<?php

namespace App\Http\Controllers\Projects;

use App\Entity\Projects\Project\Project;
use App\Entity\Projects\Category;
use App\Entity\Region;
use App\Helpers\LanguageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\SearchRequest;
use App\Http\Router\ProjectsPath;
use App\UseCases\Projects\SearchService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    private $search;

    public function __construct(SearchService $search)
    {
        $this->search = $search;
    }

    public function index(SearchRequest $request, ProjectsPath $path)
    {
        $region = $path->region;
        $category = $path->category;

        $result = $this->search->search($category, $region, $request, 20, $request->get('page', 1));

        $projects = $result->projects;
        $regionsCounts = $result->regionsCounts;
        $categoriesCounts = $result->categoriesCounts;

        $query = $region ? $region->children() : Region::roots();
        $regions = $query->orderBy('name_' . LanguageHelper::getCurrentLanguagePrefix())->getModels();

        $query = $category ? $category->children() : Category::whereIsRoot();
        $categories = $query->defaultOrder()->getModels();

        $regions = array_filter($regions, function (Region $region) use ($regionsCounts) {
            return isset($regionsCounts[$region->id]) && $regionsCounts[$region->id] > 0;
        });

        $categories = array_filter($categories, function (Category $category) use ($categoriesCounts) {
            return isset($categoriesCounts[$category->id]) && $categoriesCounts[$category->id] > 0;
        });

        return view('projects.index', compact(
            'category', 'region',
            'categories', 'regions',
            'regionsCounts', 'categoriesCounts',
            'projects'
        ));
    }

    public function show(Project $project)
    {
        if (!($project->isActive() || Gate::allows('show-project', $project))) {
            abort(403);
        }

        $user = Auth::user();

        return view('projects.show', compact('project', 'user'));
    }

    public function phone(Project $project): string
    {
        if (!($project->isActive() || Gate::allows('show-project', $project))) {
            abort(403);
        }

        return $project->user->phone;
    }
}
