<?php

namespace App\Http\Controllers\Admin\Project;

use App\Entity\Project\Characteristic;
use App\Entity\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Characteristics\CreateRequest;
use App\Http\Requests\Admin\Characteristics\UpdateRequest;
use App\UseCases\Projects\CharacteristicService;
use Exception;
use Illuminate\Http\Request;

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

        return view('admin.project.characteristics.index', compact('characteristics'));
    }

    public function create()
    {
        $types = Characteristic::typesList();

        return view('admin.project.characteristics.create', compact('types'));
    }

    public function store(CreateRequest $request)
    {
        try {
            if (($request->variants && $request->is_range) || ($request->type === Characteristic::TYPE_STRING && $request->is_range)) {
                throw new Exception('Characteristic range cannot be string.');
            }

            $characteristic = Characteristic::create([
                'name_uz' => $request->name_uz,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'type' => $request->type,
                'required' => $request->required,
                'variants' => array_map('trim', preg_split('#[\r\n]+#', $request->variants)),
                'is_range' => $request->is_range ?? false,
                'sort' => Characteristic::count() + 1,
            ]);

            return redirect()->route('admin.project.characteristics.show', $characteristic);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Category $category, Characteristic $characteristic)
    {
        return view('admin.project.characteristics.show', compact('category', 'characteristic'));
    }

    public function edit(Category $category, Characteristic $characteristic)
    {
        $types = Characteristic::typesList();

        return view('admin.project.characteristics.edit', compact('category', 'characteristic', 'types'));
    }

    public function update(UpdateRequest $request, Characteristic $characteristic)
    {
        try {
            if (($request->variants && $request->is_range) || ($request->type === Characteristic::TYPE_STRING && $request->is_range)) {
                throw new Exception('Characteristic range cannot be string.');
            }

            $characteristic->update([
                'name_uz' => $request->name_uz,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'type' => $request->type,
                'required' => $request->required,
                'variants' => array_map('trim', preg_split('#[\r\n]+#', $request->variants)),
                'is_range' => $request->is_range ?? false,
            ]);

            return redirect()->route('admin.project.characteristics.show', $characteristic);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function first(Characteristic $characteristic)
    {
        try {
            $this->service->moveToFirst($characteristic->id);
            return redirect()->route('admin.project.characteristics.index');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function up(Characteristic $characteristic)
    {
        try {
            $this->service->moveUp($characteristic->id);
            return redirect()->route('admin.project.characteristics.index');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function down(Characteristic $characteristic)
    {
        try {
            $this->service->moveDown($characteristic->id);
            return redirect()->route('admin.project.characteristics.index');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function last(Characteristic $characteristic)
    {
        try {
            $this->service->moveToLast($characteristic->id);
            return redirect()->route('admin.project.characteristics.index');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Characteristic $characteristic)
    {
        $characteristic->delete();

        return redirect()->route('admin.project.characteristics.index');
    }
}
