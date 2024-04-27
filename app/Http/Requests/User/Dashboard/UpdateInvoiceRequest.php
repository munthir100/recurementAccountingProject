<?php

namespace App\Http\Requests\User\Dashboard;

use App\Models\Invoice;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
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
            'title' => 'string',
            'description' => 'string',
            'amount' => 'numeric',
            'due_date' => 'date',
            'type' => 'string',
            'status_id' => 'in:' . implode(',', array_keys(Invoice::STATUSES)),
            'account_id' => 'exists:accounts,id',
            'worker_id' => 'exists:workers,id',
            'billing_address' => 'string',
        ];
    }
}
