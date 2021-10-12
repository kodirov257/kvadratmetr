<?php

namespace App\UseCases\Projects;

use App\Entity\Project\Developer;
use App\Entity\User\User;
use App\Http\Requests\Cabinet\Developers\CreateRequest;
use App\Http\Requests\Admin\Developers\UpdateRequest;
use Illuminate\Http\Request;

class DeveloperService
{
    public function create(int $userId, Request $request): Developer
    {
        /** @var User $user */
        $user = User::findOrFail($userId);
//        dd($request->input('address_uz'));
        $developer = Developer::make([
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
            'slug' => $request->input('name_en').'123',
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