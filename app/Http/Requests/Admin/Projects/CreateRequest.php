<?php

namespace App\Http\Requests\Admin\Projects;

use App\Entity\User\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property int $role
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15|unique:users',
            'role' => ['required', 'string', Rule::in(array_keys(User::rolesList()))],
        ];
    }
}
