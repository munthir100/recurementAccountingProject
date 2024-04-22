<?php

namespace App\Http\Requests\User\Dashboard;

use App\Models\Transaction;
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
            'type' => 'required|string',
            'status_id' => 'required|in:' . implode(',', Transaction::STATUSES),
            'transactionable_type' => 'required|string',
            'transactionable_id' => 'integer'
        ];
    }
}
