<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarSaleRequest extends FormRequest
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
        $rules = [
            'name' => 'required|min:3|max:50',
            'description' => 'required|min:15',
            'price' => 'required|numeric|min:1',
        ];
        return $rules;
    }

    public function messages(){
        return [
            'name.required' => 'Поле обязательное для заполнения',
            'name.min' => 'Поле должно иметь минимум :min символов',
            'name.max' => 'Поле должно иметь максимум :max символов',

            'description.required' => 'Поле обязательное для заполнения',
            'description.min' => 'Поле "Описание" должно иметь минимум :min символов',
            'description.max' => 'Поле "Описание" должно иметь минимум :max символов',

            'price.required' => 'Поле обязательное для заполнения',
            'price.min' => 'Поле "Цена" должно иметь минимум :min символов',
            'price.numeric' => 'Введите число',
        ];
    }
}
