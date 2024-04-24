<?php

namespace App\Http\Requests\User\Dashboard\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTopbarRequest extends FormRequest
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
            'top_bar' => 'array',
            'top_bar.en.text' => 'required|string|max:255',
            'top_bar.ar.text' => 'required|string|max:255',
            'top_bar.en.phone' => 'required|string|max:20',
            'top_bar.ar.phone' => 'required|string|max:20',
            'top_bar.en.address' => 'required|string|max:255',
            'top_bar.ar.address' => 'required|string|max:255',
            'top_bar.visibility' => 'required|boolean',
        ];
    }
}
