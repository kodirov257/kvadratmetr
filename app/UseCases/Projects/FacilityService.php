<?php


namespace App\UseCases\Projects;


use App\Entity\Project\Facility;
use App\Entity\Project\Projects\Project;
use App\Helpers\ImageHelper;
use App\Http\Requests\Admin\Facilities\CreateRequest;
use App\Http\Requests\Admin\Facilities\UpdateRequest;
use Exception;
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
                'sort' => 1000,
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
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function addFacility(int $projectId, int $facilityId): void
    {
        DB::beginTransaction();
        try {
            $project = Project::findOrFail($projectId);

            $project->addOrRemoveFacility($facilityId);
            
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function moveFacilityToFirst(int $id, int $facilityId): void
    {
        $projects = Project::findOrFail($id);
        $projectFacilities = $projects->projectFacilities;

        foreach ($projectFacilities as $i => $projectFacility) {
            if ($projectFacility->isFacilityIdEqualTo($facilityId)) {
                for ($j = $i; $j >= 0; $j--) {
                    if (!isset($projectFacilities[$j - 1])) {
                        break(1);
                    }

                    $prev = $projectFacilities[$j - 1];
                    $projectFacilities[$j - 1] = $projectFacilities[$j];
                    $projectFacilities[$j] = $prev;
                }
                $projects->projectFacilities = $projectFacilities;

                DB::beginTransaction();
                try {
                    $this->sortFacilities($projects);
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveFacilityUp(int $id, int $facilityId): void
    {
        $projects = Project::findOrFail($id);
        $projectFacilities = $projects->projectFacilities;

        foreach ($projectFacilities as $i => $projectFacility) {
            if ($projectFacility->isFacilityIdEqualTo($facilityId)) {
                if (!isset($projectFacilities[$i - 1])) {
                    $count = count($projectFacilities);

                    for ($j = 1; $j < $count; $j++) {
                        $next = $projectFacilities[$j - 1];
                        $projectFacilities[$j - 1] = $projectFacilities[$j];
                        $projectFacilities[$j] = $next;
                    }
                } else {
                    $previous = $projectFacilities[$i - 1];
                    $projectFacilities[$i - 1] = $projectFacility;
                    $projectFacilities[$i] = $previous;
                }
                $projects->projectFacilities = $projectFacilities;

                DB::beginTransaction();
                try {
                    $this->sortFacilities($projects);
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveFacilityDown(int $id, int $facilityId): void
    {
        $projects = Project::findOrFail($id);
        $projectFacilities = $projects->projectFacilities;

        foreach ($projectFacilities as $i => $projectFacility) {
            if ($projectFacility->isFacilityIdEqualTo($facilityId)) {
                if (!isset($projectFacilities[$i + 1])) {
                    $last = $projectFacilities->last();
                    $count = count($projectFacilities);

                    for ($j = $count - 1; $j > 0; $j--) {
                        $projectFacilities[$j] = $projectFacilities[$j - 1];
                    }

                    $projectFacilities[$j] = $last;
                } else {
                    $next = $projectFacilities[$i + 1];
                    $projectFacilities[$i + 1] = $projectFacility;
                    $projectFacilities[$i] = $next;
                }
                $projects->projectFacilities = $projectFacilities;

                DB::beginTransaction();
                try {
                    $this->sortFacilities($projects);
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    public function moveFacilityToLast(int $id, int $facilityId): void
    {
        $projects = Project::findOrFail($id);
        $projectFacilities = $projects->projectFacilities;

        foreach ($projectFacilities as $i => $projectFacility) {
            if ($projectFacility->isFacilityIdEqualTo($facilityId)) {
                $count = count($projectFacilities);
                for ($j = $i; $j < $count; $j++) {
                    if (!isset($projectFacilities[$j + 1])) {
                        break(1);
                    }

                    $next = $projectFacilities[$j + 1];
                    $projectFacilities[$j + 1] = $projectFacilities[$j];
                    $projectFacilities[$j] = $next;
                }
                $projects->projectFacilities = $projectFacilities;

                DB::beginTransaction();
                try {
                    $this->sortFacilities($projects);
                    DB::commit();
                } catch (Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
                return;
            }
        }
    }

    private function sortFacilities(Project $project): void
    {
        foreach ($project->projectFacilities as $i => $facility) {
            $facility->setSort($i + 1);
            DB::table('project_project_facilities')->where('project_id', $facility->project_id)
                ->where('facility_id', $facility->facility_id)->update(['sort' => ($i + 1)]);
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

    private function uploadIcon(int $facilityId, UploadedFile $icon, string $iconName)
    {
        ImageHelper::saveThumbnail($facilityId, ImageHelper::FOLDER_FACILITIES, $icon, $iconName);
        ImageHelper::saveOriginal($facilityId, ImageHelper::FOLDER_FACILITIES, $icon, $iconName);
    }
}
