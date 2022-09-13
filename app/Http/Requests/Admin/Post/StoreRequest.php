<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
        ];
    }

    public function messages()
    {
        return [
          'title.required' => 'Це поле необіхдно заповнити',
          'title.string' => 'Сюди можна тільки текст',

          'content.required' => 'Це поле необіхдно заповнити',
          'content.string' => 'Сюди можна тільки текст',

          'category_id.required' => 'Необхідно вибрати категорію',

          'preview_image.required' => 'Необхідно загрузити превю',
          'main_image.required' => 'Необхідно загрузити превю',

          'preview_image.file' => 'Це повинен бути файл',
          'main_image.file' => 'Це повинен бути',
        ];
    }
}
