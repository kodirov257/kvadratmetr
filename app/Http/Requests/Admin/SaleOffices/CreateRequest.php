<?php


namespace App\Http\Requests\Admin\SaleOffices;


use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $address_uz
 * @property string $address_ru
 * @property string $address_en
 * @property string $lng
 * @property string $ltd
 */
class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ltd' => 'required|string|max:255',
            'lng' => 'required|string|max:255',
            'address_uz' => 'required|string|max:255',
            'address_ru' => 'required|string|max:255',
            'address_en' => 'required|string|max:255',
        ];
    }
}
