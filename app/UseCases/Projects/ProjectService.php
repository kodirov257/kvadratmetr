<?php

namespace App\UseCases\Projects;

use App\Entity\Projects\Developer;
use App\Entity\Projects\Project\Project;
use App\Entity\Category;
use App\Entity\Region;
use App\Entity\User\User;
use App\Events\Project\ModerationPassed;
use App\Http\Requests\Projects\CharacteristicsRequest;
use App\Http\Requests\Projects\CreateRequest;
use App\Http\Requests\Projects\EditRequest;
use App\Http\Requests\Projects\PhotosRequest;
use App\Http\Requests\Projects\RejectRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProjectService
{
    public function create($developerId, $categoryId, /*$regionId, */CreateRequest $request): Project
    {
        /** @var User $developer */
        $developer = Developer::findOrFail($developerId);
        /** @var Category $category */
        $category = Category::findOrFail($categoryId);
//        /** @var Region $region */
//        $region = $regionId ? Region::findOrFail($regionId) : null;

        return DB::transaction(function () use ($request, $developer, $category/*, $region*/) {

            /** @var Project $project */
            $project = Project::make([
                'name_uz' => $request->name_uz,
                'name_ru' => $request->name_ru,
                'name_en' => $request->name_en,
                'about_uz' => $request->about_uz,
                'about_ru' => $request->about_ru,
                'about_en' => $request->about_en,
                'slug' => $request->slug,
                'address_uz' => $request->address_uz,
                'address_ru' => $request->address_ru,
                'address_en' => $request->address_en,
                'landmark_uz' => $request->landmark_uz,
                'landmark_ru' => $request->landmark_ru,
                'landmark_en' => $request->landmark_en,
                'lng' => $request->lng,
                'ltd' => $request->ltd,
                'status' => Project::STATUS_DRAFT,
            ]);

            $project->developer()->associate($developer);
            $project->category()->associate($category);
//            $project->region()->associate($region);

            $project->saveOrFail();

            return $project;
        });
    }

    public function addPhotos($id, PhotosRequest $request): void
    {
        $project = $this->getProject($id);

        DB::transaction(function () use ($request, $project) {
            foreach ($request['files'] as $file) {
                $project->photos()->create([
                    'file' => $file->store('projects', 'public')
                ]);
            }
            $project->update();
        });
    }

    public function edit($id, EditRequest $request): void
    {
        $project = $this->getProject($id);
        $project->update($request->only([
            'title',
            'content',
            'price',
            'address',
        ]));
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

    private function getProject($id): Project
    {
        return Project::findOrFail($id);
    }
}
