<?php


namespace App\UseCases\Projects;


use App\Entity\Project\Projects\SaleOffice;
use App\Http\Requests\Admin\SaleOffices\CreateRequest;
use App\Http\Requests\Admin\SaleOffices\UpdateRequest;

class SaleOfficeService
{
    public function create(int $developerId, CreateRequest $request): SaleOffice
    {
        $saleOffice = SaleOffice::make([
            'lng' => $request->lng,
            'ltd' => $request->ltd,
            'address_uz' => $request->address_uz,
            'address_ru' => $request->address_ru,
            'address_en' => $request->address_en,
        ]);


        $saleOffice->developer()->associate($developerId);
        $saleOffice->saveOrFail();

        return $saleOffice;
    }

    public function update(int $id, UpdateRequest $request): void
    {
        $saleOffice = $this->getSaleOffice($id);

        $saleOffice->update([
            'lng' => $request->lng,
            'ltd' => $request->ltd,
            'address_uz' => $request->address_uz,
            'address_ru' => $request->address_ru,
            'address_en' => $request->address_en,
        ]);
    }

    private function getSaleOffice($id): SaleOffice
    {
        return SaleOffice::findOrFail($id);
    }
}
