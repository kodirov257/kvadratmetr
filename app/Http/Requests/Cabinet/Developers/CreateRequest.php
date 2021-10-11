<?php

namespace App\Http\Requests\Cabinet\Developers;

use App\Entity\Project\Developer;
use App\Entity\User\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $about_uz
 * @property string $about_ru
 * @property string $about_en
 * @property string $address_uz
 * @property string $address_ru
 * @property string $address_en
 * @property string $landmark_uz
 * @property string $landmark_ru
 * @property string $landmark_en
 * @property string $main_number
 * @property string $call_center
 * @property string $website
 * @property string $email
 * @property string $facebook
 * @property string $instagram
 * @property string $tik_tok
 * @property string $telegram
 * @property string $youtube
 * @property string $twitter
 * @property string $lng
 * @property string $ltd
 * @property string $slug
 */
class CreateRequest extends FormRequest
{


    public function rules(): array
    {
        return [
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'about_uz' => 'required|string',
            'about_ru' => 'required|string',
            'about_en' => 'required|string',
            'address_uz' => 'required|string|max:255',
            'address_ru' => 'required|string|max:255',
            'address_en' => 'required|string|max:255',
            'landmark_uz' => 'required|string|max:255',
            'landmark_ru' => 'required|string|max:255',
            'landmark_en' => 'required|string|max:255',
            'main_number' => 'nullable|string|max:20',
            'call_center' => 'nullable|string|max:20',
            'website' => 'nullable|string|max:50',
            'email' => 'nullable|string|email|max:50',
            'facebook' => 'nullable|string|max:50',
            'instagram' => 'nullable|string|max:50',
            'tik_tok' => 'nullable|string|max:50',
            'telegram' => 'nullable|string|max:50',
            'youtube' => 'nullable|string|max:50',
            'twitter' => 'nullable|string|max:50',
            'lng' => 'required|string|max:20',
            'ltd' => 'required|string|max:20',
            'slug' => ['required', 'string', 'max:255', 'regex:/^[a-z0-9-]+$/', 'unique:project_developers'],
        ];
    }
}
