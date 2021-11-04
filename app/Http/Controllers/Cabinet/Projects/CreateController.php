<?php

namespace App\Http\Controllers\Cabinet\Projects;

use App\Entity\Category;
use App\Entity\Region;
use App\Helpers\LanguageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Projects\CreateRequest;
use App\UseCases\Projects\ProjectService;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    private $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }

    public function category()
    {
        $categories = Category::defaultOrder()->withDepth()->get()->toTree();
//        dd($categories);

        return view('cabinet.projects.create.category', compact('categories'));
    }

    public function create()
    {
        dd('salom');
        return view('cabinet.projects.create.create_project');
    }

    public function region(Category $category, Region $region = null)
    {
        $regions = Region::where('parent_id', $region ? $region->id : null)->orderBy('name_' . LanguageHelper::getCurrentLanguagePrefix())->get();

        return view('cabinet.projects.create.region', compact('category', 'region', 'regions'));
    }

    public function project(Category $category, Region $region = null)
    {
        return view('cabinet.projects.create.project', compact('category', 'region'));
    }

    public function store(CreateRequest $request, Category $category, Region $region = null)
    {
        try {
            $project = $this->service->create(
                Auth::id(),
//                $category->id,
//                $region ? $region->id : null,
                $request
            );
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()->route('projects.show', $project);
    }
}
