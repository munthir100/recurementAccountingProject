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
                'min:10', // The context should have a minimum length of 10 characters
                'max:5000', // The context should not exceed 5000 characters
            ],
        ];
    }
}
