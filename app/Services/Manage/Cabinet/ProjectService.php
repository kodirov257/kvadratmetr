<?php
namespace App\Services\Manage\Cabinet;

use App\Entity\Project\Developer;
use App\Entity\Project\Projects\Project;
use App\Entity\User\User;
use App\Http\Requests\Cabinet\Projects\CreateRequest;
use App\Http\Requests\Projects\PhotosRequest;
use Illuminate\Support\Facades\DB;

class ProjectService
{
    public function create($developerId, CreateRequest $request): Project
    {
        /** @var User $developer */
        $developer = Developer::findOrFail($developerId);

        return DB::transaction(function () use ($request, $developer/*, $category, $region*/) {

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
//            $project->category()->associate($category);
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
}