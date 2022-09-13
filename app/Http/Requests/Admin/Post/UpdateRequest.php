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
            'title' => 'string',
            'content' => 'string',
            'category_id' => 'integer|exists:categories,id',
            'preview_image' => 'file',
            'main_image' => 'file',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ];
    }
}
