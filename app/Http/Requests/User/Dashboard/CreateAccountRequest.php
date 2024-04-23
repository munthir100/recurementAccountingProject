<?php

namespace App\Http\Requests\User\Dashboard;

use App\Models\Account;
use App\Models\AccountType;
use Illuminate\Foundation\Http\FormRequest;

class CreateAccountRequest extends FormRequest
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
        // the location required when account_type_id is AccountType::office
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:accounts,email',
            'phone' => 'nullable|string|max:20',
            'status_id' => 'required|in:' . implode(',', array_keys(Account::STATUSES)),
            'password' => 'required|string|min:8|confirmed',
            'account_type_id' => 'required|integer|exists:account_types,id',
            'location' => 'required_if:account_type_id,' . AccountType::OFFICE,
        ];
    }
}
