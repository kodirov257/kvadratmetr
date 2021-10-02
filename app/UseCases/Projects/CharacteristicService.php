<?php

namespace App\UseCases\Projects;

use App\Entity\Project\Characteristic;
use Illuminate\Support\Facades\DB;

class CharacteristicService
{
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
                } catch (\Exception $e) {
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
                } catch (\Exception $e) {
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
                } catch (\Exception $e) {
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
                } catch (\Exception $e) {
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
}