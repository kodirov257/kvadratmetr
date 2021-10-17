<?php

namespace App\UseCases\Projects;

use App\Entity\Project\Characteristic;
use App\Entity\Project\Developer;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectService
{
    public function create($developerId, /*$categoryId, $regionId, */ Request $request): Project
    {
        /** @var User $developer */
        $developer = Developer::findOrFail($developerId);
//        /** @var Category $category */
//        $category = Category::findOrFail($categoryId);
//        /** @var Region $region */
//        $region = $regionId ? Region::findOrFail($regionId) : null;

        return DB::transaction(function () use ($request, $developer/*, $category, $region*/) {


            if (!$request->file) {
//                $characteristics = Characteristic::orderBy('sort')
//                    ->pluck('name_' . LanguageHelper::getCurrentLanguagePrefix(), 'id');
////                dd($characteristics);
//                $index = 0;
//                foreach ($characteristics as $key => $part) {
//                    dd($request->offsetGet($index));
//                    if ($part === $request[$index]) {
//                            dd($request, 'salom');
//                    }
//                    $index++;
//                }
//                dd($request, 'request');
                /** @var Project $project */
                $project = Project::make([
                    'name_uz' => $request->input('name_en'),
                    'name_ru' => $request->input('name_en'),
                    'name_en' => $request->input('name_en'),
                    'about_uz' => $request->input('about_uz'),
                    'about_ru' => $request->input('about_ru'),
                    'about_en' => $request->input('about_en'),
                    'slug' => $request->input('name_en') . '123',
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

                $project->developer()->associate($developer);
//            $project->category()->associate($category);
//            $project->region()->associate($region);


                $project->saveOrFail();
                return $project;
            }
            /** @var Project $project */
            $project = Project::make([
                'name_uz' => $request->input('name_en'),
                'name_ru' => $request->input('name_en'),
                'name_en' => $request->input('name_en'),
                'about_uz' => $request->input('about_uz'),
                'about_ru' => $request->input('about_ru'),
                'about_en' => $request->input('about_en'),
                'slug' => $request->input('slug'),
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

            $project->developer()->associate($developer);
//            $project->category()->associate($category);
//            $project->region()->associate($region);

            $project->saveOrFail();
            dd($project);


            $this->addPhotos($project->id, $request);


            return $project;

        });
    }

    public function addPhotos($id, Request $request): void
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

    public function edit($id, Request $request): void
    {
        $project = $this->getProject($id);
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
