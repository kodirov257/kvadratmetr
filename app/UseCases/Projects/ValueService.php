<?php

namespace App\UseCases\Projects;

use App\Entity\Projects\Characteristic;
use App\Entity\Projects\Project\Project;
use App\Entity\Projects\Project\Value;
use App\Http\Requests\Admin\Projects\ValueRequest;
use Illuminate\Support\Facades\DB;

class ValueService
{
    public function addValue(int $id, ValueRequest $request): Value
    {
        $projects = Project::findOrFail($id);
        $characteristic = Characteristic::findOrFail($request->characteristic_id);

        /* @var $value Value */
        DB::beginTransaction();
        try {
            $value = $projects->values()->create([
                'characteristic_id' => $characteristic->id,
                'value' => $request->value ?? $characteristic->default,
                'main' => (bool)$request->main,
                'sort' => 1000,
            ]);

            $this->sortValues($projects);

            DB::commit();

            return $value;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function editValue(int $id, int $characteristicId, ValueRequest $request): Value
    {
        $project = Project::findOrFail($id);
        $characteristic = Characteristic::findOrFail($request->characteristic_id);
        /* @var $value Value */
        $value = $project->values()->where('characteristic_id', $characteristicId)->firstOrFail();

        DB::beginTransaction();
        try {
            DB::table('project_project_values')->where('project_id', $value->project_id)
                ->where('characteristic_id', $value->characteristic_id)->update([
                    'characteristic_id' => $characteristic->id,
                    'value' => $request->value ?? $characteristic->default,
                    'main' => $request->main,
                ]);

            $value = $project->values()->where('characteristic_id', $request->characteristic_id)->firstOrFail();

            DB::commit();

            return $value;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function removeValue(int $id, int $characteristicId): void
    {
        $projects = Project::findOrFail($id);
        $value = $projects->values()->where('characteristic_id', $characteristicId);

        DB::beginTransaction();
        try {
            $value->delete();
            $this->sortValues($projects);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }


    }

    public function moveValueToFirst(int $id, int $characteristicId): void
    {
        $projects = Project::findOrFail($id);
        $values = $projects->values;

        foreach ($values as $i => $value) {
            if ($value->isCharacteristicIdEqualTo($characteristicId)) {
                for ($j = $i; $j >= 0; $j--) {
                    if (!isset($values[$j - 1])) {
                        break(1);
                    }

                    $prev = $values[$j - 1];
                    $values[$j - 1] = $values[$j];
                    $values[$j] = $prev;
                }
                $projects->values = $values;

                DB::beginTransaction();
                try {
                    $this->sortValues($projects);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveValueUp(int $id, int $characteristicId): void
    {
        $projects = Project::findOrFail($id);
        $values = $projects->values;

        foreach ($values as $i => $value) {
            if ($value->isCharacteristicIdEqualTo($characteristicId)) {
                if (!isset($values[$i - 1])) {
                    $count = count($values);

                    for ($j = 1; $j < $count; $j++) {
                        $next = $values[$j - 1];
                        $values[$j - 1] = $values[$j];
                        $values[$j] = $next;
                    }
                } else {
                    $previous = $values[$i - 1];
                    $values[$i - 1] = $value;
                    $values[$i] = $previous;
                }
                $projects->values = $values;

                DB::beginTransaction();
                try {
                    $this->sortValues($projects);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveValueDown(int $id, int $characteristicId): void
    {
        $projects = Project::findOrFail($id);
        $values = $projects->values;

        foreach ($values as $i => $value) {
            if ($value->isCharacteristicIdEqualTo($characteristicId)) {
                if (!isset($values[$i + 1])) {
                    $last = $values->last();
                    $count = count($values);

                    for ($j = $count - 1; $j > 0; $j--) {
                        $values[$j] = $values[$j - 1];
                    }

                    $values[$j] = $last;
                } else {
                    $next = $values[$i + 1];
                    $values[$i + 1] = $value;
                    $values[$i] = $next;
                }
                $projects->values = $values;

                DB::beginTransaction();
                try {
                    $this->sortValues($projects);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveValueToLast(int $id, int $characteristicId): void
    {
        $projects = Project::findOrFail($id);
        $values = $projects->values;

        foreach ($values as $i => $value) {
            if ($value->isCharacteristicIdEqualTo($characteristicId)) {
                $count = count($values);
                for ($j = $i; $j < $count; $j++) {
                    if (!isset($values[$j + 1])) {
                        break(1);
                    }

                    $next = $values[$j + 1];
                    $values[$j + 1] = $values[$j];
                    $values[$j] = $next;
                }
                $projects->values = $values;

                DB::beginTransaction();
                try {
                    $this->sortValues($projects);
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    private function sortValues(Project $project): void
    {
        foreach ($project->values as $i => $value) {
            $value->setSort($i + 1);
            DB::table('project_project_values')->where('project_id', $value->project_id)
                ->where('characteristic_id', $value->characteristic_id)->update(['sort' => ($i + 1)]);
        }
    }
}