<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string'
            ],
            'category_id' => [
                'required',
                'integer'
            ],
            'brand' => [
                'required',
                'string',
                'max:255'
            ],
            'small_description' => [
                'required',
                'string'
            ],
            'description' => [
                'required',
                'string'
            ],
            'original_price' => [
                'required',
                'integer'
            ],
            'selling_price' => [
                'required',
                'integer'
            ],
            'quantity' => [
                'required',
                'integer'
            ],
            'image' => [
                'nullable',
//                'mimes:jpeg,jpg,png,gif'
            ],
            'meta_title' => [
                'required',
            ],
            'meta_keyword' => [
                'required',
            ],
            'meta_description' => [
                'required',
            ],
            'status' => [
                'required',
                'in:active,inactive'
            ],
            'trending' => [
                'required',
                'in:yes,no'
            ],
        ];
    }
}
