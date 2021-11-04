<?php

namespace App\Http\Controllers\Admin\Project;

use App\Entity\Project\Characteristic;
use App\Entity\Category;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Characteristics\CreateRequest;
use App\Http\Requests\Admin\Characteristics\UpdateRequest;
use App\UseCases\Projects\CharacteristicService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
//            if (($request->variants && $request->is_range) || ($request->type === Characteristic::TYPE_STRING && $request->is_range)) {
//                throw new Exception('Characteristic range cannot be string.');
//            }

            $characteristic = $this->service->create($request);

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

            $this->service->update($characteristic->id, $request);

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
        try {
            Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_CHARACTERISTICS . '/' . $characteristic->id);

            $characteristic->delete();

            return redirect()->route('admin.project.characteristics.index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function removeIcon(Characteristic $characteristic)
    {
        if ($this->service->removeIcon($characteristic->id)) {
            return response()->json('The icon is successfully deleted!');
        }
        return response()->json('The icon is not deleted!', 400);
    }
}
