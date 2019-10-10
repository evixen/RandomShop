<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopOrderCreateRequest extends FormRequest
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
            'receiver_name' => 'required|min:4|max:200',

            // TODO после тестов заменить проверку ввода емейла
            'email' => 'required',
            'phone' => 'required|min:10|max:12',
            'address' => 'required|min:10|max:400',
        ];
    }
}
