<?php

namespace App\Http\Controllers\Admin\Project;

use App\Entity\Projects\Facility;
use App\Entity\Projects\Project\Project;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Facilities\CreateRequest;
use App\Http\Requests\Admin\Facilities\UpdateRequest;
use App\UseCases\Projects\FacilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    private $service;

    public function __construct(FacilityService $service)
    {
        $this->middleware('can:manage-projects-facilities');
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $query = Facility::orderByDesc('updated_at');

        if (!empty($value = $request->get('name'))) {
            $query->where(function ($query) use ($value) {
                $query->where('name_uz', 'ilike', '%' . $value . '%')
                    ->orWhere('name_ru', 'ilike', '%' . $value . '%')
                    ->orWhere('name_en', 'ilike', '%' . $value . '%');
            });
        }

        $facilities = $query->paginate(20);

        return view('admin.project.facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('admin.project.facilities.create');
    }

    public function store(CreateRequest $request)
    {
        try {
            $facility = $this->service->create($request);

            return redirect()->route('admin.project.facilities.show', $facility);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Facility $facility)
    {
        return view('admin.project.facilities.show', compact('facility'));
    }

    public function edit(Facility $facility)
    {
        return view('admin.project.facilities.edit', compact('facility'));
    }

    public function update(UpdateRequest $request, Facility $facility)
    {
        try {
            $this->service->update($facility->id, $request);

            return redirect()->route('admin.project.facilities.show', $facility);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Facility $facility)
    {
        try {
            Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_FACILITIES . '/' . $facility->id);

            $facility->delete();
            return redirect()->route('admin.project.facilities.index');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function removeIcon(Facility $facility)
    {
        if ($this->service->removeIcon($facility->id)) {
            return response()->json('The icon is successfully deleted!');
        }
        return response()->json('The icon is not deleted!', 400);
    }
}
