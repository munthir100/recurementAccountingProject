<?php

namespace App\Http\Requests\User\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
            'title' => [
                'sometimes', // The title is sometimes and cannot be empty
                'string', // The title should be a string
                'max:255', // The title should not exceed 255 characters
            ],
            'context' => [
                'sometimes', // The context is sometimes and cannot be empty
                'string', // The context should be a string
            ],
            'image' => [
                'sometimes', // The image is sometimes
                'image', // The file should be an image
                'mimes:jpeg,jpg,png', // The file must be of one of the allowed image types
                'max:2048', // The file size should not exceed 2MB
            ],
            'is_published' => [
                'boolean', // The field should be a boolean (true or false)
                'nullable', // The field can be null
            ],
        ];
    }
}
