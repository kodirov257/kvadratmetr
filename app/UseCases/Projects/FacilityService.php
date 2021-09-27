<?php


namespace App\UseCases\Projects;


use App\Entity\Projects\Facility;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Facilities\CreateRequest;
use App\Http\Requests\Admin\Facilities\UpdateRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FacilityService
{
    private $nextId;

    public function create(CreateRequest $request): Facility
    {
        if (!$request->icon) {
            return Facility::create([
                'name_uz' => $request->name_uz,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'comment' => $request->comment,
            ]);
        }

        $imageName = ImageHelper::getRandomName($request->icon);
        $facility = Facility::add($this->getNextId(), $request->name_uz, $request->name_ru, $request->name_en, $request->comment, $imageName);

        $this->uploadIcon($this->getNextId(), $request->icon, $imageName);

        return $facility;
    }

    public function update(int $id, UpdateRequest $request): Facility
    {
        $facility = Facility::findOrFail($id);

        try {
            if (!$request->icon) {
                $facility->edit($request->name_uz, $request->name_ru, $request->name_en, $request->comment);
            } else {
                Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_FACILITIES . '/' . $facility->id);

                $imageName = ImageHelper::getRandomName($request->icon);
                $facility->edit($request->name_uz, $request->name_ru, $request->name_en, $request->comment, $imageName);

                $this->uploadIcon($facility->id, $request->icon, $imageName);
            }

            return $facility;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getNextId(): int
    {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('project_facilities_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    public function removeIcon(int $id): bool
    {
        $facility = Facility::findOrFail($id);
        return Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_FACILITIES . '/' . $facility->id) && $facility->update(['icon' => null]);
    }

    private function uploadIcon(int $brandId, UploadedFile $icon, string $imageName)
    {
        ImageHelper::saveThumbnail($brandId, ImageHelper::FOLDER_FACILITIES, $icon, $imageName);
        ImageHelper::saveOriginal($brandId, ImageHelper::FOLDER_FACILITIES, $icon, $imageName);
    }
}
