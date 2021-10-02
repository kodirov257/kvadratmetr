<?php

namespace App\Http\Controllers\Admin\Project;

use App\Entity\Project\Developer;
use App\Entity\Project\Facility;
use App\Entity\Project\Projects\SaleOffice;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaleOffices\CreateRequest;
use App\Http\Requests\Admin\SaleOffices\UpdateRequest;
use App\UseCases\Projects\SaleOfficeService;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class SaleOfficeController extends Controller
{
    private $service;

    public function __construct(SaleOfficeService $service)
    {
        $this->middleware('can:manage-projects-sale_offices');
        $this->service = $service;
    }

    public function create(Developer $developer)
    {
        return view('admin.project.sale-offices.create', compact('developer'));
    }

    public function store(CreateRequest $request, Developer $developer)
    {
        try {
            $saleOffice = $this->service->create($developer->id, $request);

            return redirect()->route('admin.project.developers.sale-offices.show', [$developer, $saleOffice]);
        } catch (Throwable|Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Developer $developer, SaleOffice $saleOffice)
    {
        return view('admin.project.sale-offices.show', compact('developer', 'saleOffice'));
    }

    public function edit(Developer $developer, SaleOffice $saleOffice)
    {
        return view('admin.project.sale-offices.edit', compact('saleOffice', 'developer'));
    }

    public function update(UpdateRequest $request, Developer $developer, SaleOffice $saleOffice)
    {
        try {
            $this->service->update($saleOffice->id, $request);

            return redirect()->route('admin.project.developers.sale-offices.show', [$developer, $saleOffice]);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Developer $developer, SaleOffice $saleOffice)
    {
        try {
            $saleOffice->delete();

            return redirect()->route('admin.project.users.developers.show', [$developer->owner, $developer]);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
