<?php

namespace App\Http\Requests\User\Dashboard;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'account_id' => 'sometimes|required|exists:accounts,id',
            'worker_id' => 'sometimes|required|exists:workers,id',
            'contract_type' => 'sometimes|required|string',
            'contract_start_duration' => 'sometimes|required|date',
            'contract_end_duration' => 'sometimes|required|date',
            'amount' => 'sometimes|required|numeric',
            'additional_information' => 'nullable|string',
            'status_id' => 'sometimes|required|in:' . implode(',', array_keys(Order::STATUSES)),
            'delivery_address.country_id' => 'required|exists:countries,id',
            'delivery_address.city' => 'required|string|max:255',
            'delivery_address.address' => 'required|string|max:500',
            'delivery_address.longitude' => 'required|numeric',
            'delivery_address.latitude' => 'required|numeric',
        ];
    }
}
