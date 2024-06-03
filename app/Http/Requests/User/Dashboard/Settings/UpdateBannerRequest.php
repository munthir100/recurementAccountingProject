<?php

namespace App\Http\Requests\User\Dashboard\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            'banners' => 'required|array',
            'banners.*.en.title' => 'required|string',
            'banners.*.en.details' => 'required|string',
            'banners.*.ar.title' => 'required|string',
            'banners.*.ar.details' => 'required|string',
            'banners.*.image' => 'nullable|string',
        ];
    }
}
