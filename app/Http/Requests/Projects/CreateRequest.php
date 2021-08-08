<?php

namespace App\Http\Requests\Projects;

use App\Entity\Projects\Category;
use App\Entity\Region;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property Category $category
 * @property Region $region
 */
class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $items = [];

        foreach ($this->category->allCharacteristics() as $characteristic) {
            $rules = [
                $characteristic->required ? 'required' : 'nullable',
            ];
            if ($characteristic->isInteger()) {
                $rules[] = 'integer';
            } elseif ($characteristic->isFloat()) {
                $rules[] = 'numeric';
            } else {
                $rules[] = 'string';
                $rules[] = 'max:255';
            }
            if ($characteristic->isSelect()) {
                $rules[] = Rule::in($characteristic->variants);
            }
            $items['characteristic.' . $characteristic->id] = $rules;
        }

        return array_merge([
            'title' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|integer',
            'address' => 'required|string',
        ], $items);
    }
}
