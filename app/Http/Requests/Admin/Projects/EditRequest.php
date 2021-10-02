<?php

namespace App\Http\Requests\Admin\Projects;

use App\Entity\Project\Projects\Project;
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
 *
 * @property Project $project
 */
class EditRequest extends FormRequest
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
            'slug' => ['required', 'string', 'max:255', 'regex:/^[a-z0-9-]+$/', Rule::unique('project_projects')->ignore($this->project->id)],
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
