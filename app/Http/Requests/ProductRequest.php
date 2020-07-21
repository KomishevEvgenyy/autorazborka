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
        $rules = [
            'code' => 'required|min:3|max:25|unique:products,code',
            'name' => 'required|min:3|max:25',
            'description' => 'required|min:15',
            'price' => 'required|numeric|min:1',
        ];

        if($this->route()->named('products.update ')){
            // проверка на уникальность кода. Если код был уже использован то выдаст ошибку при создании продукта,
            // а не при её редактировании
            $rules['code'] .= ','. $this->route()->parameter('product')->id;
        }
        return $rules;
    }

    public function messages() {
        return [
            'code.required' => 'Поле "Код" обязательное для заполнения',
            'code.min' => 'Поле "Код" должно иметь минимум :min символов',
            'code.max' => 'Поле "Код" должно иметь максимум :max символов',
            'code.unique' => 'Значение с таким кодом уже существует',

            'name.required' => 'Поле "Название" обязательное для заполнения',
            'name.min' => 'Поле "Название" должно иметь минимум :min символов',
            'name.max' => 'Поле "Название" должно иметь максимум :max символов',

            'description.required' => 'Поле "Описание" обязательное для заполнения',
            'description.min' => 'Поле "Описание" должно иметь минимум :min символов',

            'price.required' => 'Поле "Цена" обязательное для заполнения',
            'price.numeric' => 'Введите число',
            'price.min' => 'Поле "Цена" должно иметь минимум :min символ'
        ];
    }
}
