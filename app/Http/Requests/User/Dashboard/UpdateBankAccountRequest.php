<?php

namespace App\Http\Requests\User\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBankAccountRequest extends FormRequest
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
            'bank_account.name' => 'sometimes|required|string|max:255',
            'bank_account.bank_name' => 'sometimes|required|string|max:255',
            'bank_account.country_id' => 'sometimes|required|exists:countries,id',
            'bank_account.currency_id' => 'sometimes|required|exists:currencies,id',
            'bank_account.iban_number' => 'sometimes|required|string|max:255',
            'bank_account.number' => 'sometimes|required|string|max:255',
            'bank_account.soft_code' => 'sometimes|required|string|max:255',
            'bank_account.bank_address' => 'sometimes|required|string|max:255',
        ];
    }
}
