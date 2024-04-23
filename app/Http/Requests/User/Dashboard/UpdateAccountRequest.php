<?php

namespace App\Http\Requests\User\Dashboard;

use App\Models\Account;
use App\Models\AccountType;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
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
            'name' => 'sometimes|string|max:255',
            'email' => [
                'sometimes',
                'email',
                Rule::unique('accounts')->ignore($this->route('account')->id),
            ],
            'phone' => 'sometimes|string|max:20',
            'status_id' => 'sometimes|in:' . implode(',', array_keys(Account::STATUSES)),
            'password' => 'sometimes|string|min:8|confirmed',
            'account_type_id' => 'sometimes|integer|exists:account_types,id',
            'location' => 'required_if:account_type_id,' . \App\Models\AccountType::OFFICE,
        ];
    }
    public function messages(): array
    {
        return [
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than :max characters.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'phone.string' => 'The phone must be a string.',
            'phone.max' => 'The phone may not be greater than :max characters.',
            'status_id.in' => 'The selected status is invalid.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least :min characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            'account_type_id.integer' => 'The account type must be an integer.',
            'account_type_id.exists' => 'The selected account type is invalid.',
            'location.required_if' => 'The location field is required when account type is office.',
        ];
    }
}
