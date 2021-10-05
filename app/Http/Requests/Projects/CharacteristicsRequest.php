<?php

namespace App\Http\Requests\Projects;

use App\Entity\Project\Projects\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property Project $project
 */
class CharacteristicsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $items = [];

        foreach ($this->project->category->allCharacteristics() as $characteristic) {
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

        return $items;
    }
}
