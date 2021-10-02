<?php

namespace App\UseCases\Projects;

use App\Entity\Projects\Project\Plan;
use App\Entity\Projects\Project\Project;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Projects\Plans\CreateRequest;
use App\Http\Requests\Admin\Projects\Plans\UpdateRequest;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PlanService
{
    private $nextId;

    public function create(int $projectId, CreateRequest $request): Plan
    {
        $project = Project::findOrFail($projectId);

        try {
            $plan = Plan::make([
                'area' => $request->area,
                'area_unit' => $request->area_unit,
                'rooms' => $request->rooms,
                'bathroom' => $request->bathroom,
                'sort' => 1000,
            ]);

            $plan->project()->associate($project);

            if (!$request->image) {
                $plan->saveOrFail();

                return $plan;
            }

            $imageName = ImageHelper::getRandomName($request->image);
            $plan->id = $this->getNextId();
            $plan->image = $imageName;

            $plan->saveOrFail();

            $this->uploadIcon($this->getNextId(), $request->image, $imageName);

            return $plan;
        } catch (\Throwable|Exception $e) {
            throw $e;
        }

//        if (!$request->image) {
//            $plan = Plan::make([
//                'area' => $request->area,
//                'area_unit' => $request->area_unit,
//                'rooms' => $request->rooms,
//                'bathroom' => $request->bathroom,
//                'sort' => 1000,
//            ]);
//
//            $plan->project()->associate($project);
//            $plan->saveOrFail();
//
//            return $plan;
//        }
//
//        $imageName = ImageHelper::getRandomName($request->image);
//        $plan = Plan::add($this->getNextId(), $request->area, $request->area_unit, $request->rooms, $request->bathroom, $imageName);
//
//        $this->uploadIcon($this->getNextId(), $request->image, $imageName);
//
//        return $plan;
    }

    public function update(int $projectId, int $planId, UpdateRequest $request): Plan
    {
        $project = Project::findOrFail($projectId);
        /* @var $plan Plan */
        $plan = $project->plans()->where('id', $planId)->firstOrFail();

        try {
            if (!$request->image) {
                $plan->edit($request->area, $request->area_unit, $request->rooms, $request->bathroom);
            } else {
                Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_PROJECT_PLAN . '/' . $plan->id);

                $imageName = ImageHelper::getRandomName($request->image);
                $plan->edit($request->area, $request->area_unit, $request->rooms, $request->bathroom, $imageName);

                $this->uploadIcon($plan->id, $request->image, $imageName);
            }

            return $plan;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function moveToFirst(int $id, int $planId): void
    {
        $projects = Project::findOrFail($id);
        $plans = $projects->plans;

        foreach ($plans as $i => $plan) {
            if ($plan->isIdEqualTo($planId)) {
                for ($j = $i; $j >= 0; $j--) {
                    if (!isset($plans[$j - 1])) {
                        break(1);
                    }

                    $prev = $plans[$j - 1];
                    $plans[$j - 1] = $plans[$j];
                    $plans[$j] = $prev;
                }
                $projects->plans = $plans;

                DB::beginTransaction();
                try {
                    $this->sortPlans($projects);
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveUp(int $id, int $planId): void
    {
        $projects = Project::findOrFail($id);
        $plans = $projects->plans;

        foreach ($plans as $i => $plan) {
            if ($plan->isIdEqualTo($planId)) {
                if (!isset($plans[$i - 1])) {
                    $count = count($plans);

                    for ($j = 1; $j < $count; $j++) {
                        $next = $plans[$j - 1];
                        $plans[$j - 1] = $plans[$j];
                        $plans[$j] = $next;
                    }
                } else {
                    $previous = $plans[$i - 1];
                    $plans[$i - 1] = $plan;
                    $plans[$i] = $previous;
                }
                $projects->plans = $plans;

                DB::beginTransaction();
                try {
                    $this->sortPlans($projects);
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveDown(int $id, int $planId): void
    {
        $projects = Project::findOrFail($id);
        $plans = $projects->plans;

        foreach ($plans as $i => $plan) {
            if ($plan->isIdEqualTo($planId)) {
                if (!isset($plans[$i + 1])) {
                    $last = $plans->last();
                    $count = count($plans);

                    for ($j = $count - 1; $j > 0; $j--) {
                        $plans[$j] = $plans[$j - 1];
                    }

                    $plans[$j] = $last;
                } else {
                    $next = $plans[$i + 1];
                    $plans[$i + 1] = $plan;
                    $plans[$i] = $next;
                }
                $projects->plans = $plans;

                DB::beginTransaction();
                try {
                    $this->sortPlans($projects);
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveToLast(int $id, int $planId): void
    {
        $projects = Project::findOrFail($id);
        $plans = $projects->plans;

        foreach ($plans as $i => $plan) {
            if ($plan->isFacilityIdEqualTo($planId)) {
                $count = count($plans);
                for ($j = $i; $j < $count; $j++) {
                    if (!isset($plans[$j + 1])) {
                        break(1);
                    }

                    $next = $plans[$j + 1];
                    $plans[$j + 1] = $plans[$j];
                    $plans[$j] = $next;
                }
                $projects->plans = $plans;

                DB::beginTransaction();
                try {
                    $this->sortPlans($projects);
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    private function sortPlans(Project $project): void
    {
        foreach ($project->plans as $i => $plan) {
            $plan->setSort($i + 1);
            DB::table('project_project_plans')->where('project_id', $plan->project_id)
                ->where('id', $plan->id)->update(['sort' => ($i + 1)]);
        }
    }

    public function getNextId(): int
    {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('project_project_plans_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    public function removeImage(int $id): bool
    {
        $plan = Plan::findOrFail($id);
        return Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_PROJECT_PLAN . '/' . $plan->id) && $plan->update(['image' => null]);
    }

    private function uploadIcon(int $planId, UploadedFile $icon, string $imageName)
    {
        ImageHelper::saveThumbnail($planId, ImageHelper::FOLDER_PROJECT_PLAN, $icon, $imageName);
        ImageHelper::saveOriginal($planId, ImageHelper::FOLDER_PROJECT_PLAN, $icon, $imageName);
    }
}
