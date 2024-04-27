<?php

namespace App\Http\Requests\User\Dashboard;

use App\Models\Transaction;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' => 'string',
            'amount' => 'numeric',
            'date' => 'date',
            'transaction_type_id' => 'string|exists:transaction_types,id',
            'status_id' => 'required|in:' . implode(',', array_keys(Transaction::STATUSES)),
            'transactionable_type' => 'string',
            'transactionable_id' => 'integer'
        ];
    }
}
