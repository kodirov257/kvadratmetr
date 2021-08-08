<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Entity\Projects\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage-projects-categories');
    }

    public function index()
    {
        $categories = Category::defaultOrder()->withDepth()->get();

        return view('admin.projects.categories.index', compact('categories'));
    }

    public function create()
    {
        $parents = Category::defaultOrder()->withDepth()->get();

        return view('admin.projects.categories.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'parent' => 'nullable|integer|exists:project_categories,id',
        ]);

        $category = Category::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'parent_id' => $request['parent'],
        ]);

        return redirect()->route('admin.projects.categories.show', $category);
    }

    public function show(Category $category)
    {
        $parentCharacteristics = $category->parentCharacteristics();
        $characteristics = $category->characteristics()->orderBy('sort')->get();

        return view('admin.projects.categories.show', compact('category', 'characteristics', 'parentCharacteristics'));
    }

    public function edit(Category $category)
    {
        $parents = Category::defaultOrder()->withDepth()->get();

        return view('admin.projects.categories.edit', compact('category', 'parents'));
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'parent' => 'nullable|integer|exists:project_categories,id',
        ]);

        $category->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'parent_id' => $request['parent'],
        ]);

        return redirect()->route('admin.projects.categories.show', $category);
    }

    public function first(Category $category)
    {
        if ($first = $category->siblings()->defaultOrder()->first()) {
            $category->insertBeforeNode($first);
        }

        return redirect()->route('admin.projects.categories.index');
    }

    public function up(Category $category)
    {
        $category->up();

        return redirect()->route('admin.projects.categories.index');
    }

    public function down(Category $category)
    {
        $category->down();

        return redirect()->route('admin.projects.categories.index');
    }

    public function last(Category $category)
    {
        if ($last = $category->siblings()->defaultOrder('desc')->first()) {
            $category->insertAfterNode($last);
        }

        return redirect()->route('admin.projects.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.projects.categories.index');
    }
}
