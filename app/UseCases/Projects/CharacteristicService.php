<?php

namespace App\UseCases\Projects;

use App\Entity\Project\Characteristic;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Characteristics\CreateRequest;
use App\Http\Requests\Admin\Characteristics\UpdateRequest;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CharacteristicService
{
    private $nextId;

    public function create(CreateRequest $request): Characteristic
    {
        if (!$request->icon) {
            return Characteristic::create([
                'name_uz' => $request->name_uz,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'type' => $request->type,
                'required' => $request->required,
                'variants' => array_map('trim', preg_split('#[\r\n]+#', $request->variants)),
                'is_range' => $request->is_range ?? false,
                'sort' => Characteristic::count() + 1,
            ]);
        }

        $imageName = ImageHelper::getRandomName($request->icon);
        $characteristic = Characteristic::add($this->getNextId(), $request->name_uz, $request->name_ru, $request->name_en,
            $request->type, $request->required, $request->variants, $request->is_range ?? false, $imageName);

        $this->uploadIcon($this->getNextId(), $request->icon, $imageName);

        return $characteristic;
    }

    public function update(int $id, UpdateRequest $request): Characteristic
    {
        $facility = Characteristic::findOrFail($id);

        try {
            if (!$request->icon) {
                $facility->edit($request->name_uz, $request->name_ru, $request->name_en, $request->type, $request->required, $request->variants, $request->is_range);
            } else {
                Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_CHARACTERISTICS . '/' . $facility->id);

                $imageName = ImageHelper::getRandomName($request->icon);
                $facility->edit($request->name_uz, $request->name_ru, $request->name_en, $request->type, $request->required,
                    $request->variants, $request->is_range, $imageName);

                $this->uploadIcon($facility->id, $request->icon, $imageName);
            }

            return $facility;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function moveToFirst(int $id): void
    {
        $characteristics = Characteristic::all();

        foreach ($characteristics as $i => $characteristic) {
            if ($characteristic->isIdEqualTo($id)) {
                for ($j = $i; $j >= 0; $j--) {
                    if (!isset($characteristics[$j - 1])) {
                        break(1);
                    }

                    $prev = $characteristics[$j - 1];
                    $characteristics[$j - 1] = $characteristics[$j];
                    $characteristics[$j] = $prev;
                }

                DB::beginTransaction();
                try {
                    $this->sortCharacteristics($characteristics);
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveUp(int $id): void
    {
        $characteristics = Characteristic::all();

        foreach ($characteristics as $i => $value) {
            if ($value->isCharacteristicIdEqualTo($id)) {
                if (!isset($characteristics[$i - 1])) {
                    $count = count($characteristics);

                    for ($j = 1; $j < $count; $j++) {
                        $next = $characteristics[$j - 1];
                        $characteristics[$j - 1] = $characteristics[$j];
                        $characteristics[$j] = $next;
                    }
                } else {
                    $previous = $characteristics[$i - 1];
                    $characteristics[$i - 1] = $value;
                    $characteristics[$i] = $previous;
                }

                DB::beginTransaction();
                try {
                    $this->sortCharacteristics($characteristics);
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveDown(int $id): void
    {
        $characteristics = Characteristic::all();

        foreach ($characteristics as $i => $value) {
            if ($value->isCharacteristicIdEqualTo($id)) {
                if (!isset($characteristics[$i + 1])) {
                    $last = $characteristics->last();
                    $count = count($characteristics);

                    for ($j = $count - 1; $j > 0; $j--) {
                        $characteristics[$j] = $characteristics[$j - 1];
                    }

                    $characteristics[$j] = $last;
                } else {
                    $next = $characteristics[$i + 1];
                    $characteristics[$i + 1] = $value;
                    $characteristics[$i] = $next;
                }

                DB::beginTransaction();
                try {
                    $this->sortCharacteristics($characteristics);
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveToLast(int $id): void
    {
        $characteristics = Characteristic::all();

        foreach ($characteristics as $i => $value) {
            if ($value->isCharacteristicIdEqualTo($id)) {
                $count = count($characteristics);
                for ($j = $i; $j < $count; $j++) {
                    if (!isset($characteristics[$j + 1])) {
                        break(1);
                    }

                    $next = $characteristics[$j + 1];
                    $characteristics[$j + 1] = $characteristics[$j];
                    $characteristics[$j] = $next;
                }

                DB::beginTransaction();
                try {
                    $this->sortCharacteristics($characteristics);
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    private function sortCharacteristics($characteristics): void
    {
        foreach ($characteristics as $i => $characteristic) {
            $characteristic->setSort($i + 1);
            $characteristic->saveOrFail();
        }
    }

    public function getNextId(): int
    {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('project_characteristics_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    public function removeIcon(int $id): bool
    {
        $characteristic = Characteristic::findOrFail($id);
        return Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_CHARACTERISTICS . '/' . $characteristic->id) && $characteristic->update(['icon' => null]);
    }

    private function uploadIcon(int $facilityId, UploadedFile $icon, string $iconName)
    {
        ImageHelper::saveThumbnail($facilityId, ImageHelper::FOLDER_CHARACTERISTICS, $icon, $iconName);
        ImageHelper::saveOriginal($facilityId, ImageHelper::FOLDER_CHARACTERISTICS, $icon, $iconName);
    }
}