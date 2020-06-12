<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'code' => 'required|min:3|max:25|unique:categories,code',
            'name' => 'required|min:3|max:25',
            'description' => 'required|min:15',
        ];

        if ($this->route()->named('categories.update')){
            // проверка на уникальность кода. Если код был уже использован то выдаст ошибку при создании категории,
            // а не при её редактировании
            $rules['code'] .= ','. $this->route()->parameter('category')->id;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'code.required' => 'Поле "Код" обязательное для ввода',
            'code.min' => 'Поле "Код" должно иметь минимум :min символов',
            'code.max' => 'Поле "Код" должно иметь максимум :max символов',
            'code.unique' => 'Значение с таким кодом уже существует',

            'name.required' => 'Поле "Введите марку" обязательное для ввода',
            'name.min' => 'Поле "Введите марку" должно иметь минимум :min символов',
            'name.max' => 'Поле "Введите марку" должно иметь максимум :max символов',

            'description.required' => 'Поле "Описание" обязательное для ввода',
            'description.min' => 'Поле "Описание" должно иметь минимум :min символов',
        ];
    }
}
