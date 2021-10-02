<?php

namespace App\Http\Requests\Admin\Projects\Plans;

use App\Entity\Projects\Facility;
use App\Entity\Projects\Project\Plan;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property int $area
 * @property int $area_unit
 * @property int $rooms
 * @property int $bathroom
 * @property \Illuminate\Http\UploadedFile $image
 *
 * @property Plan $plan
 */
class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'area' => 'required|numeric|min:1',
            'area_unit' => ['required', 'string', Rule::in(array_keys(Plan::unitsList()))],
            'rooms' => 'required|numeric|min:1',
            'image' => 'image|mimes:jpeg,png,jpg',
            'bathroom' => 'required|numeric|min:0',
        ];
    }
}
