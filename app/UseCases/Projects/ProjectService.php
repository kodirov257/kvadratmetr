<?php

namespace App\UseCases\Projects;

use App\Entity\Project\Characteristic;
use App\Entity\Project\Developer;
use App\Entity\Project\Facility;
use App\Entity\Project\Projects\Project;
use App\Entity\Category;
use App\Entity\Region;
use App\Entity\User\User;
use App\Events\Project\ModerationPassed;
use App\Helpers\ImageHelper;
use App\Helpers\LanguageHelper;
use App\Http\Requests\Projects\CharacteristicsRequest;
use App\Http\Requests\Projects\CreateRequest;
use App\Http\Requests\Projects\EditRequest;
use App\Http\Requests\Projects\PhotosRequest;
use App\Http\Requests\Projects\RejectRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectService
{
    private $nextId;

    public function create($developerId, /*$categoryId, $regionId, */ CreateRequest $request): Project
    {
        /** @var User $developer */
        $developer = Developer::findOrFail($developerId);

        return DB::transaction(function () use ($request, $developer/*, $category, $region*/) {

            $characteristics = Characteristic::orderBy('sort')
                ->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
            $facilities = Facility::orderBy('id')
                ->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');

            /** @var Project $project */
            $project = Project::make([
                'id' => $this->getNextId(),
                'name_uz' => $request->name_uz,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'about_uz' => $request->about_uz,
                'about_ru' => $request->about_ru,
                'about_en' => $request->about_en,
                'slug' => $request->name_en . '123',
                'address_uz' => $request->address_uz,
                'address_ru' => $request->address_ru,
                'address_en' => $request->address_en,
                'landmark_uz' => $request->landmark_uz,
                'landmark_ru' => $request->landmark_ru,
                'landmark_en' => $request->landmark_en,
                'lng' => $request->lng,
                'ltd' => $request->ltd,
                'status' => Project::STATUS_DRAFT,
//                'logo' => $logoName,
            ]);

            $project->developer()->associate($developer);
            $project->saveOrFail();

            $this->addCharacteristicsToProduct($characteristics, $project, $request);
            foreach ($facilities as $key => $facility) {
                if ($request[$facility]) {
                    DB::beginTransaction();
                    try {
                        $project->addOrRemoveFacility($key);
                        DB::commit();
                    } catch (Exception $e) {
                        DB::rollBack();
                        throw $e;
                    }
                }
            }
            if ($request->files) {

                $this->addPhotos($project->id, $request);
//                $this->uploadLogo($this->getNextId(), $request['logo'], $logoName);
                $this->addLogo($project->id, $request);

                return $project;
            }

            return $project;
        });
    }

    /**
     * @throws \Throwable
     */
    public function edit($id, Request $request): void
    {
        $project = $this->getProject($id);
        if (!$request->file) {
            $characteristics = Characteristic::orderBy('sort')
                ->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
            $facilities = Facility::orderBy('id')
                ->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
            foreach ($characteristics as $key => $part) {
                $value = $project->values()->where('characteristic_id', $key)->first();
                if ($value) {

                    if (gettype($request[$part]) == 'array') {
                        DB::beginTransaction();
                        try {
                            DB::table('project_project_values')->where('project_id', $value->project_id)
                                ->where('characteristic_id', $value->characteristic_id)->update([
                                    'characteristic_id' => $key,
                                    'value' => $request[$part][1],
                                    'value_from' => $request[$part][0],
                                    'main' => true,
                                    'value_to' => $request[$part][1]
                                ]);

                            $value = $project->values()->where('characteristic_id', $request->characteristic_id)->first();

                            DB::commit();

                        } catch (Exception $e) {
                            DB::rollBack();
                            throw $e;
                        }
                    } else {
                        DB::beginTransaction();
                        try {
                            DB::table('project_project_values')->where('project_id', $value->project_id)
                                ->where('characteristic_id', $value->characteristic_id)->update([
                                    'characteristic_id' => $key,
                                    'value' => $request[$part],
                                    'main' => true,
                                ]);
                            DB::commit();

                        } catch (Exception $e) {
                            DB::rollBack();
                            throw $e;
                        }
                    }
                } else {
                    $this->addCharacteristicsToProduct($characteristics, $project, $request);
                }

            }
            foreach ($facilities as $key => $facility) {
//                dd($request);
                if ($request[$facility]) {
                    DB::beginTransaction();
                    try {
//                        dd($request[$facility]);
                        if ($request[$facility] === 'on' && $project->projectFacilities()->where('facility_id', $key)->exists()) {
                            continue;
                        } else {
                            $project->addOrRemoveFacility($key);
//                            dd('salom');
                            DB::commit();
                        }
                    } catch (Exception $e) {
                        DB::rollBack();
                        throw $e;
                    }
                }
            }

        }
        $project->update([
            'name_uz' => $request->input('name_en'),
            'name_ru' => $request->input('name_en'),
            'name_en' => $request->input('name_en'),
            'about_uz' => $request->input('about_uz'),
            'about_ru' => $request->input('about_ru'),
            'about_en' => $request->input('about_en'),
            'address_uz' => $request->input('address_uz'),
            'address_ru' => $request->input('address_ru'),
            'address_en' => $request->input('address_en'),
            'landmark_uz' => $request->input('landmark_uz'),
            'landmark_ru' => $request->input('landmark_ru'),
            'landmark_en' => $request->input('landmark_en'),
            'lng' => $request->input('lng'),
            'ltd' => $request->input('ltd'),
            'status' => Project::STATUS_DRAFT,
        ]);

    }

    public function addPhotos($id, Request $request): void
    {
        $project = $this->getProject($id);

        DB::transaction(function () use ($request, $project) {
            foreach ($request['images'] as $file) {
                $photoName = ImageHelper::getRandomName($file);
                $photo = $project->photos()->create([
                    'project_id' => $project->id,
                    'file' => $photoName,
                    'sort' => 100,
                ]);

                ImageHelper::uploadResizedImage($project->id, ImageHelper::FOLDER_PROJECTS, $file, $photoName);
//                $project->photos()->create([
//                    'file' => $file->store('projects', 'public')
//                ]);
            }

            $this->sortPhotos($project);
        });
    }

    public function addLogo($id, Request $request): void
    {
        $logoName = ImageHelper::getRandomName($request['logo']);

        $project = $this->getProject($id);
        DB::transaction(function () use ($request, $project, $logoName) {
            $project->update([
                'logo' => $logoName,
            ]);

            $this->uploadLogo($this->getNextId(), $request['logo'], $logoName);
        });
    }

    public function addCharacteristicsToProduct($characteristics, $project, $request): void
    {
        foreach ($characteristics as $key => $part) {
            if (gettype($request[$part]) == 'array') {
                DB::beginTransaction();
                try {
                    $value = $project->values()->create([
                        'characteristic_id' => $key,
                        'value' => $request[$part][1],
                        'value_from' => $request[$part][0],
                        'main' => true,
                        'value_to' => $request[$part][1],
                        'sort' => 1000,
                    ]);

                    foreach ($project->values as $i => $value) {
                        $value->setSort($i + 1);
                        DB::table('project_project_values')->where('project_id', $value->project_id)
                            ->where('characteristic_id', $value->characteristic_id)->update(['sort' => ($i + 1)]);
                    }

                    DB::commit();

                } catch (Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
            } else {
                DB::beginTransaction();
                try {
                    $value = $project->values()->create([
                        'characteristic_id' => $key,
                        'value' => $request[$part],
                        'main' => true,
                        'sort' => 1000,
                    ]);

                    foreach ($project->values as $i => $value) {
                        $value->setSort($i + 1);
                        DB::table('project_project_values')->where('project_id', $value->project_id)
                            ->where('characteristic_id', $value->characteristic_id)->update(['sort' => ($i + 1)]);
                    }

                    DB::commit();

                } catch (Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
            }
        }


    }

    public function sendToModeration($id): void
    {
        $project = $this->getProject($id);
        $project->sendToModeration();
    }

    public function moderate($id): void
    {
        $project = $this->getProject($id);
        $project->moderate(Carbon::now());
        event(new ModerationPassed($project));
    }

    public function reject($id, RejectRequest $request): void
    {
        $project = $this->getProject($id);
        $project->reject($request['reason']);
    }

    public function activate(int $id): void
    {
        $project = $this->getProject($id);
        $project->activate();
    }

    public function editCharacteristics($id, CharacteristicsRequest $request): void
    {
        $project = $this->getProject($id);

        DB::transaction(function () use ($request, $project) {
            $project->values()->delete();
            foreach ($project->category->allCharacteristics() as $characteristic) {
                $value = $request['characteristics'][$characteristic->id] ?? null;
                if (!empty($value)) {
                    $project->values()->create([
                        'characteristic_id' => $characteristic->id,
                        'value' => $value,
                    ]);
                }
            }
            $project->update();
        });
    }

    public function expire(Project $project): void
    {
        $project->expire();
    }

    public function close($id): void
    {
        $project = $this->getProject($id);
        $project->close();
    }

    public function remove($id): void
    {
        $project = $this->getProject($id);
        $project->delete();
    }

    public function getNextId(): int
    {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('project_projects_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    private function sortPhotos(Project $project): void
    {
        foreach ($project->photos as $i => $photo) {
            $photo->setSort($i + 2);
            $photo->saveOrFail();
        }
    }

    private function getProject($id): Project
    {
        return Project::findOrFail($id);
    }

    public function removeIcon(int $id): bool
    {
        $project = Project::findOrFail($id);
        return Storage::disk('public')->deleteDirectory('/files/' . ImageHelper::FOLDER_PROJECTS . '/' . $project->id) && $project->update(['icon' => null]);
    }

    private function uploadLogo(int $projectId, UploadedFile $logo, string $logoName)
    {
        ImageHelper::saveThumbnail($projectId, ImageHelper::FOLDER_PROJECTS, $logo, $logoName);
        ImageHelper::saveOriginal($projectId, ImageHelper::FOLDER_PROJECTS, $logo, $logoName);
    }
}
