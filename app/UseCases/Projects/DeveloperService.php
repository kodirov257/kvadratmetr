<?php

namespace App\UseCases\Projects;

use App\Entity\Project\Developer;
use App\Entity\User\User;
use App\Helpers\ImageHelper;
use App\Http\Requests\Cabinet\Developers\CreateRequest;
use App\Http\Requests\Admin\Developers\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class DeveloperService
{
    private $nextId;

    public function create(int $userId, CreateRequest $request): Developer
    {
        /** @var User $user */
        $user = User::findOrFail($userId);

        $developer = Developer::make([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'about_uz' => $request->about_uz,
            'about_ru' => $request->about_ru,
            'about_en' => $request->about_en,
            'address_uz' => $request->address_uz,
            'address_ru' => $request->address_ru,
            'address_en' => $request->address_en,
            'landmark_uz' => $request->landmark_uz,
            'landmark_ru' => $request->landmark_ru,
            'landmark_en' => $request->landmark_en,
            'main_number' => $request->main_number,
            'call_center' => $request->call_center,
            'website' => $request->website,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'tik_tok' => $request->tik_tok,
            'telegram' => $request->telegram,
            'youtube' => $request->youtube,
            'twitter' => $request->twitter,
            'lng' => $request->lng,
            'ltd' => $request->ltd,
            'status' => Developer::STATUS_ACTIVE,
            'slug' => $request->name_en . '123',
        ]);

        $developer->owner()->associate($user);
        $developer->saveOrFail();

        if ($request->files) {
            $this->addLogo($developer->id, $request['logo']);

        }

        return $developer;
    }

    public function edit(int $id, Request $request): void
    {
        $developer = $this->getDeveloper($id);

        $developer->update([
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
            'main_number' => $request->input('main_number'),
            'call_center' => $request->input('call_center'),
            'website' => $request->input('website'),
            'email' => $request->input('email'),
            'facebook' => $request->input('facebook'),
            'instagram' => $request->input('instagram'),
            'tik_tok' => $request->input('tik_tok'),
            'telegram' => $request->input('telegram'),
            'youtube' => $request->input('youtube'),
            'twitter' => $request->input('twitter'),
            'lng' => $request->input('lng'),
            'ltd' => $request->input('ltd'),
            'status' => Developer::STATUS_ACTIVE,
        ]);
        if ($request->files){
            $this->addLogo($developer->id, $request['logo']);

        }

    }

    public function addLogo($id, UploadedFile $file): void
    {
        $developer = $this->getDeveloper($id);
        DB::transaction(function () use ($developer, $file) {
            $photoName = ImageHelper::getRandomName($file);
            $developer->update([
                'logo' => $photoName,
            ]);

            ImageHelper::uploadResizedImage($this->getNextId(), ImageHelper::FOLDER_DEVELOPERS, $file, $photoName);
        });
    }

    public function getNextId(): int
    {
        if (!$this->nextId) {
            $nextId = DB::select("select nextval('project_developers_id_seq')");
            return $this->nextId = intval($nextId['0']->nextval);
        }
        return $this->nextId;
    }

    private function getDeveloper($id): Developer
    {
        return Developer::findOrFail($id);
    }
}