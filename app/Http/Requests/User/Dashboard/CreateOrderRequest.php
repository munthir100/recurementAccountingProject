<?php

namespace App\Http\Requests\User\Dashboard;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            'account_id' => 'required|exists:accounts,id',
            'worker_id' => 'required|exists:workers,id',
            'contract_type' => 'required|string',
            'contract_start_duration' => 'required|date',
            'contract_end_duration' => 'required|date',
            'amount' => 'required|numeric',
            'additional_information' => 'nullable|string',
            'status_id' => 'required|in:' . implode(',', array_keys(Order::STATUSES)),
        ];
    }
}
