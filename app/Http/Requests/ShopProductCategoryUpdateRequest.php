<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopProductCategoryUpdateRequest extends FormRequest
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
            'id' => 'integer|exists:shop_product_categories,id',
            'title' => 'required|min:4|max:200|unique:shop_product_categories,title,' . $this->id,
            'slug' => 'max:200|unique:shop_product_categories,slug,' . $this->id,
            'description' => 'max:500',
            'parent_id' => 'required|integer'
        ];
    }
}
