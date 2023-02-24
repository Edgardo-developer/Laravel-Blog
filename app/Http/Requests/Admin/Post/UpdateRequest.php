<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'         => 'required|string',
            'content'       => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image'    => 'nullable|file',
            'category_id'   => 'required|exists:categories,id',
            'tag_ids'       => 'nullable|array',
            'tag_ids.*'     => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required'                => 'This field is required for creating the post',
            'title.string'                  => 'This field should be a string',
            'content.required'              => 'This field is required for creating the post',
            'content.string'                => 'This field should be a string',
            'preview_image.required'        => 'Choose the file',
            'preview_image.file'            => 'Choose the right file',
            'main_image.required'           => 'Choose the file',
            'main_image.file'               => 'Choose the right file',
            'category_id.required'          => 'This field is required for creating the post',
            'category_id.exists'            => 'Category should be in DB',
            'tag_ids.array'                 => 'Tags should be an array',
        ];
    }
}
