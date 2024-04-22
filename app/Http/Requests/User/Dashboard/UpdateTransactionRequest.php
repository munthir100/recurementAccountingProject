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
            'type' => 'string',
            'status_id' => 'required|in:' . implode(',', Transaction::STATUSES),
            'transactionable_type' => 'string',
            'transactionable_id' => 'integer'
        ];
    }
}
