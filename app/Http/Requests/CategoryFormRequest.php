<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
            'description' => [
                'required',
            ],
            'image' => [
                'nullable',
                'mimes:jpg,jpeg,png'
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


        ];
    }
}
