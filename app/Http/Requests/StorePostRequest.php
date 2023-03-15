<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'         => ['required', 'unique:posts', 'max:150'],
            'content'       => ['nullable'],
            'author'        => ['nullable'],
            'category_id'   => ['nullable', 'exists:categories,id'],
            'tags'          => ['exists:tags,id'],
            'cover_img'     => ['nullable', 'image', 'max:250']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.requied'         => 'A Title is Requied to Procede',
            'title.unique'          => 'A Post With this Title is already IN MEMORY',
            'title.max'             => 'Post cannot Excede :max Digits',
            'category_id.exists'    => 'Not Valid Category',
            'tags.exists'           => 'Not Valid Tag',
            'cover_img.image'       => 'Not a valid Image',
            'cover_img.max'         => 'Image path exceed max characters'
        ];
    }
}
