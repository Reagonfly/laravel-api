<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Exists;

class UpdatePostRequest extends FormRequest
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
            'title'         => ['required', Rule::unique('posts')->ignore($this->post), 'max:150'],
            'author'        => ['nullable'],
            'category_id'   => ['nullable', 'exists:categories,id'],
            'content'       => ['nullable'],
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
            'category_id.exists'    => 'You Have to select a valid Category',
            'cover_img.image'       => 'Not a valid Image',
            'cover_img.max'         => 'Image path exceed max characters'
        ];
    }
}
