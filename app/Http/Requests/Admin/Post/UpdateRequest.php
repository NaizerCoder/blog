<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'main_image' => 'nullable|file',
            'preview_image' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле пустое',
            'content.required' => 'Поле не может быть пустым',
            'main_image.required' => 'Файл не выбран',
            'main_image.file' => 'Добавьте файл',
            'preview_image.required' => 'Файл не выбран',
            'preview_image.file' => 'Добавьте файл',

        ];
    }
}
