<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|min:3|max:25',
            'name' => 'required|min:3|max:25',
            'description' => 'required|min:15',
            'price' => 'required|integer',
        ];
    }

    public function messages() {
        return [
            'code.required' => 'Поле "Код" обязательное для заполнения',
            'code.min' => 'Поле "Код" должно иметь минимум :min символов',
            'code.max' => 'Поле "Код" должно иметь максимум :max символов',

            'name.required' => 'Поле "Название" обязательное для заполнения',
            'name.min' => 'Поле "Название" должно иметь минимум :min символов',
            'name.max' => 'Поле "Название" должно иметь минимум :max символов',

            'description.required' => 'Поле "Описание" обязательное для заполнения',
            'description.min' => 'Поле "Описание" должно иметь минимум :min символов',

            'price.required' => 'Поле "Цена" обязательное для заполнения',
            'price.integer' => 'Введите число',
        ];
    }
}
