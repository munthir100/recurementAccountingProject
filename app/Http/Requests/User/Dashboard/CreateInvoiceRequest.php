<?php

namespace App\Http\Requests\User\Dashboard;

use App\Models\Invoice;
use Illuminate\Foundation\Http\FormRequest;

class CreateInvoiceRequest extends FormRequest
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
            'status_id' => 'required|in:' . implode(',', array_keys(Invoice::STATUSES)),
            'account_id' => 'required|exists:accounts,id',
            'worker_id' => 'required|exists:workers,id',
            'billing_address' => 'required|string',
        ];
    }
}
