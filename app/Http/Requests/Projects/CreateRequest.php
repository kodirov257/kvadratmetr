<?php

namespace App\Http\Requests\Projects;

use App\Entity\Category;
use App\Entity\Region;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $about_uz
 * @property string $about_ru
 * @property string $about_en
 * @property string $slug
 * @property int $category_id
 * @property int $price
 * @property string $address_uz
 * @property string $address_ru
 * @property string $address_en
 * @property string $landmark_uz
 * @property string $landmark_ru
 * @property string $landmark_en
 * @property string $lng
 * @property string $ltd
 */
class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'about_uz' => 'required|string',
            'about_ru' => 'required|string',
            'about_en' => 'required|string',
            'slug' => ['required', 'string', 'max:255', 'regex:/^[a-z0-9-]+$/', 'unique:project_projects'],
//            'category_id' => 'required|numeric|min:1|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'address_uz' => 'required|string|max:255',
            'address_ru' => 'required|string|max:255',
            'address_en' => 'required|string|max:255',
            'landmark_uz' => 'required|string|max:255',
            'landmark_ru' => 'required|string|max:255',
            'landmark_en' => 'required|string|max:255',
            'lng' => 'required|string|max:20',
            'ltd' => 'required|string|max:20',
        ];
    }
}
