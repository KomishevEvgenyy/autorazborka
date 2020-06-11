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
        return [
            'code' => 'required|min:3|max:25',
            'name' => 'required|min:3|max:25',
            'description' => 'required|min:15',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательное для ввода',
            'min' => 'Поле :attribute должно иметь минимум :min символов',
            'max' => 'Поле :attribute должно иметь максимум :max символов',
        ];
    }
}
