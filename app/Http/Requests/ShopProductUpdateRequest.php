<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopProductUpdateRequest extends FormRequest
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
            'id' => 'integer|exists:shop_products,id',
            'name' => 'required|min:4|max:200|unique:shop_products,name,' . $this->id,
            'slug' => 'max:200|unique:shop_products,slug, ' . $this->id,
            'details' => 'max:2000',
            'category_id' => 'required|integer'
        ];
    }
}
