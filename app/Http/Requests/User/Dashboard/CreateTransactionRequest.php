<?php

namespace App\Http\Requests\User\Dashboard;

use App\Models\Transaction;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionRequest extends FormRequest
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
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'transaction_type_id' => 'required|integer|exists:transaction_types,id',
            'status_id' => 'required|in:' . implode(',', array_keys(Transaction::STATUSES)),
            'transactionable_type' => [
                'required',
                'string',
                Rule::in(array_keys(Transaction::TRANSACTIONABLE_MODELS)),
            ],
            'transactionable_id' => 'required|exists:' . request()->input('transactionable_type') . ',id',
        ];
    }

    public function messages(): array
    {
        return [
            'description.required' => 'The description field is required.',
            'amount.required' => 'The amount field is required.',
            'amount.numeric' => 'The amount must be a number.',
            'date.required' => 'The date field is required.',
            'date.date' => 'The date must be a valid date.',
            'transaction_type_id.required' => 'The transaction type field is required.',
            'transaction_type_id.integer' => 'The transaction type must be an integer.',
            'transaction_type_id.exists' => 'The selected transaction type is invalid.',
            'status_id.required' => 'The status field is required.',
            'status_id.in' => 'The selected status is invalid.',
            'transactionable_type.required' => 'The transaction category field is required.',
            'transactionable_type.string' => 'The transaction category must be a string.',
            'transactionable_type.in' => 'The selected transaction category is invalid.',
            'transactionable_id.required' => 'The transaction category ID field is required.',
            'transactionable_id.exists' => 'The selected transaction category ID is invalid.',
        ];
    }
}
