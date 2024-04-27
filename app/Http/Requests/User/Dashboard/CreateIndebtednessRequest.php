<?php

namespace App\Http\Requests\User\Dashboard;

use App\Models\Indebtedness;
use Illuminate\Foundation\Http\FormRequest;

class CreateIndebtednessRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
            'type' => 'required|string',
            'status_id' => 'required|in:' . implode(',', array_keys(Indebtedness::STATUSES)),
            'account_id' => 'required|exists:accounts,id',
            'customer_id' => 'required|exists:customers,id',
            'collateral' => 'sometimes|string',
        ];
    }
}
