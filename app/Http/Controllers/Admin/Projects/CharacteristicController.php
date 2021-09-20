<?php

namespace App\Http\Controllers\Admin\Projects;

use App\Entity\Projects\Characteristic;
use App\Entity\Category;
use App\Http\Controllers\Controller;
use App\UseCases\Projects\CharacteristicService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CharacteristicController extends Controller
{
    private $service;

    public function __construct(CharacteristicService $service)
    {
        $this->middleware('can:manage-projects-characteristics');
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = Characteristic::orderByDesc('updated_at');

        if (!empty($value = $request->get('name'))) {
            $query->where(function ($query) use ($value) {
                $query->where('name_uz', 'ilike', '%' . $value . '%')
                    ->orWhere('name_ru', 'ilike', '%' . $value . '%')
                    ->orWhere('name_en', 'ilike', '%' . $value . '%');
            });
        }

        $characteristics = $query->paginate(20);

        return view('admin.projects.characteristics.index', compact('characteristics'));
    }

    public function create()
    {
        $types = Characteristic::typesList();

        return view('admin.projects.characteristics.create', compact('types'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'type' => ['required', 'string', 'max:255', Rule::in(array_keys(Characteristic::typesList()))],
            'required' => 'nullable|string|max:255',
            'variants' => 'nullable|string',
            'is_range' => 'boolean',
        ]);

        $characteristic = Characteristic::create([
            'name_uz' => $request['name_uz'],
            'name_ru' => $request['name_ru'],
            'name_en' => $request['name_en'],
            'type' => $request['type'],
            'required' => (bool)$request['required'],
            'variants' => array_map('trim', preg_split('#[\r\n]+#', $request['variants'])),
            'is_range' => $request['is_range'] ?? false,
            'sort' => Characteristic::count() + 1,
        ]);

        return redirect()->route('admin.projects.characteristics.show', $characteristic);
    }

    public function show(Category $category, Characteristic $characteristic)
    {
        return view('admin.projects.characteristics.show', compact('category', 'characteristic'));
    }

    public function edit(Category $category, Characteristic $characteristic)
    {
        $types = Characteristic::typesList();

        return view('admin.projects.characteristics.edit', compact('category', 'characteristic', 'types'));
    }

    public function update(Request $request, Characteristic $characteristic)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'type' => ['required', 'string', 'max:255', Rule::in(array_keys(Characteristic::typesList()))],
            'required' => 'nullable|string|max:255',
            'variants' => 'nullable|string',
            'sort' => 'required|integer',
        ]);

        $characteristic->update([
            'name' => $request['name'],
            'type' => $request['type'],
            'required' => (bool)$request['required'],
            'variants' => array_map('trim', preg_split('#[\r\n]+#', $request['variants'])),
            'sort' => $request['sort'],
        ]);

        return redirect()->route('admin.projects.characteristics.show', $characteristic);
    }

    public function first(Characteristic $characteristic)
    {
        try {
            $this->service->moveToFirst($characteristic->id);
            return redirect()->route('admin.projects.characteristics.index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function up(Characteristic $characteristic)
    {
        try {
            $this->service->moveUp($characteristic->id);
            return redirect()->route('admin.projects.characteristics.index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function down(Characteristic $characteristic)
    {
        try {
            $this->service->moveDown($characteristic->id);
            return redirect()->route('admin.projects.characteristics.index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function last(Characteristic $characteristic)
    {
        try {
            $this->service->moveToLast($characteristic->id);
            return redirect()->route('admin.projects.characteristics.index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Characteristic $characteristic)
    {
        $characteristic->delete();

        return redirect()->route('admin.projects.characteristics.index');
    }
}
