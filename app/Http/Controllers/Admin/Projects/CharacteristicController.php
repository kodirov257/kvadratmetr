<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Entity\Projects\Characteristic;
use App\Entity\Projects\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CharacteristicController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage-projects-categories');
    }

    public function create(Category $category)
    {
        $types = Characteristic::typesList();

        return view('admin.projects.categories.characteristics.create', compact('category', 'types'));
    }

    public function store(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'type' => ['required', 'string', 'max:255', Rule::in(array_keys(Characteristic::typesList()))],
            'required' => 'nullable|string|max:255',
            'variants' => 'nullable|string',
            'sort' => 'required|integer',
        ]);

        $characteristic = $category->characteristics()->create([
            'name' => $request['name'],
            'type' => $request['type'],
            'required' => (bool)$request['required'],
            'variants' => array_map('trim', preg_split('#[\r\n]+#', $request['variants'])),
            'sort' => $request['sort'],
        ]);

        return redirect()->route('admin.projects.categories.characteristics.show', [$category, $characteristic]);
    }

    public function show(Category $category, Characteristic $characteristic)
    {
        return view('admin.projects.categories.characteristics.show', compact('category', 'characteristic'));
    }

    public function edit(Category $category, Characteristic $characteristic)
    {
        $types = Characteristic::typesList();

        return view('admin.projects.categories.characteristics.edit', compact('category', 'characteristic', 'types'));
    }

    public function update(Request $request, Category $category, Characteristic $characteristic)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'type' => ['required', 'string', 'max:255', Rule::in(array_keys(Characteristic::typesList()))],
            'required' => 'nullable|string|max:255',
            'variants' => 'nullable|string',
            'sort' => 'required|integer',
        ]);

        $category->characteristics()->findOrFail($characteristic->id)->update([
            'name' => $request['name'],
            'type' => $request['type'],
            'required' => (bool)$request['required'],
            'variants' => array_map('trim', preg_split('#[\r\n]+#', $request['variants'])),
            'sort' => $request['sort'],
        ]);

        return redirect()->route('admin.projects.categories.show', $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.projects.categories.show', $category);
    }
}
