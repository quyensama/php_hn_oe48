<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'title' => [
                'required',
                'min:3',
                'max:191',
                Rule::unique('products')->ignore($this->product)
            ],
            'content' => 'required|min:3|max:5000',
            'description'=> 'required|min:3|max:5000',
            'quantity' => 'required|integer|digits_between:1,5',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
            'retail_price'=> 'required|numeric|digits_between:4,9',
            'original_price'=> 'required|numeric|digits_between:4,9',
        ];
    }
}
