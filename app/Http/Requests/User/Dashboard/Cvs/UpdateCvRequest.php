<?php

namespace App\Http\Requests\User\Dashboard\Cvs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCvRequest extends FormRequest
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
            'office_id' => 'required|exists:offices,id',
            'cv' => 'required|file|max:2048|mimes:pdf,doc,docx',
        ];
    }
}
