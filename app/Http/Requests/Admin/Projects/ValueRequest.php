<?php

namespace App\Http\Requests\Admin\Projects;

use App\Entity\Project\Characteristic;
use App\Entity\Project\Projects\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property int $characteristic_id
 * @property int $value
 * @property boolean $main
 *
 * @property Project $product
 */
class ValueRequest extends FormRequest
{
    private $isSelect;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $characteristic = Characteristic::findOrFail($this->characteristic_id);

        $items['main'] = 'boolean';

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
        if ($this->isSelect = $characteristic->isSelect()) {
            $rules[] = Rule::in($characteristic->variants);
        }

        if ($characteristic->is_range) {
            $items['value_from'] = $rules;
            $items['value_to'] = $rules;
        } else {
            $items['value'] = $rules;
        }

        return $items;
    }

    public function isSelect(): bool
    {
        return $this->isSelect;
    }
}
