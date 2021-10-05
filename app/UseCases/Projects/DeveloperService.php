<?php

namespace App\UseCases\Projects;

use App\Entity\Project\Developer;
use App\Entity\User\User;
use App\Http\Requests\Admin\Developers\CreateRequest;
use App\Http\Requests\Admin\Developers\UpdateRequest;

class DeveloperService
{
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
            'slug' => $request->slug,
        ]);

        $developer->owner()->associate($user);
        $developer->saveOrFail();

        return $developer;
    }

    public function edit(int $id, UpdateRequest $request): void
    {
        $developer = $this->getDeveloper($id);

        $developer->update([
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
            'slug' => $request->slug,
        ]);
    }

    private function getDeveloper($id): Developer
    {
        return Developer::findOrFail($id);
    }
}