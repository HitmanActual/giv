<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'parent_id'=>'numeric',
            'order'=>'numeric',
            'name'=>'string|max:255',
            'slug'=>'unique:categories|string|max:255',
            'description'=>'string',
        ];
    }

    public function messages()
    {
        return [
            'slug.unique' => 'The slug must be unique',

        ];
    }
}
