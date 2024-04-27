<?php

namespace App\Http\Requests\User\Dashboard\Settings;

use App\Models\Status;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateCountryRequest extends FormRequest
{
    public function authorize()
    {
        // Ensure the user has authorization to create a country. Adjust as needed.
        return true; // Change to your own authorization logic if necessary.
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status_id' => ['required', Rule::in(Status::PUBLISHED, Status::NOT_PUBLISHED)],
        ];
    }
}
