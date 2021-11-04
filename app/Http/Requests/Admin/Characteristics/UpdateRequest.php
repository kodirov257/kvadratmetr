<?php

namespace App\Http\Requests\Admin\Characteristics;

use App\Entity\Project\Characteristic;
use App\Entity\User\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $type
 * @property string $required
 * @property string $variants
 * @property bool $is_range
 * @property \Illuminate\Http\UploadedFile $icon
 *
 * @property Characteristic $characteristic
 */
class UpdateRequest extends FormRequest
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
            'type' => ['required', 'string', 'max:255', Rule::in(array_keys(Characteristic::typesList()))],
            'required' => 'nullable|string|max:255',
            'variants' => 'nullable|string',
            'is_range' => 'boolean',
            'icon' => 'image|mimes:jpeg,png,jpg',
        ];
    }
}
