<?php

namespace App\Http\Controllers\Projects;

use App\Entity\Project\Developer;
use App\Entity\Project\Projects\Project;
use App\Entity\Category;
use App\Entity\Region;
use App\Helpers\LanguageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\SearchRequest;
use App\Http\Router\ProjectsPath;
use App\UseCases\Projects\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    private $search;

    public function __construct(SearchService $search)
    {
        $this->search = $search;
    }

    public function index(Request $request)
    {
//        SearchRequest $request, ProjectsPath $path this inside qovus
//        $region = $path->region;
//        $category = $path->category;
//
//        $result = $this->search->search($category, $region, $request, 20, $request->get('page', 1));
//

        $result = Project::orderByDesc('created_at');
//        dd($request->name);

        if ($request->name){
            $developer_id = Developer::where('name_en', 'like', '%'.$request->name.'%')->first();
            $result = $result->where('developer_id', $developer_id);
        }
        if ($request->rooms){
//            TODO: After plan and price for project
        }
        if ($request->district){
            $result = $result->where('address_en', 'like', '%'.$request->district.'%');
        }
        if ($request->range_1){
//            TODO: Price range after price and plan
        }
        if ($request->range_2){
//            TODO: Price range after price and plan
        }
//        $projects = $result->projects;
//        $regionsCounts = $result->regionsCounts;
//        $categoriesCounts = $result->categoriesCounts;
//
//        $query = $region ? $region->children() : Region::roots();
//        $regions = $query->orderBy('name_' . LanguageHelper::getCurrentLanguagePrefix())->getModels();
//
//        $query = $category ? $category->children() : Category::whereIsRoot();
//        $categories = $query->defaultOrder()->getModels();
//
//        $regions = array_filter($regions, function (Region $region) use ($regionsCounts) {
//            return isset($regionsCounts[$region->id]) && $regionsCounts[$region->id] > 0;
//        });
//
//        $categories = array_filter($categories, function (Category $category) use ($categoriesCounts) {
//            return isset($categoriesCounts[$category->id]) && $categoriesCounts[$category->id] > 0;
//        });
//        dd($result);
        $resultNumber = $result->count();
        $result = $result->paginate(10);

        return view('clients.search', compact('result', 'resultNumber'));
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
