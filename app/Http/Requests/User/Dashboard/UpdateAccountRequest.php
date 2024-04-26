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
            'location' => [
                Rule::requiredIf(function () {
                    return optional(request()->account)->account_type_id === AccountType::OFFICE;
                }),
                'string',
            ],

        ];
    }
    public function messages(): array
    {
        return [
            'location.required_if' => __('The location field is required when account type is office account.'),
        ];
    }
}
