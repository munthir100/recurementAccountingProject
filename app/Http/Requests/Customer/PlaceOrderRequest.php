<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class PlaceOrderRequest extends FormRequest
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
            'worker_id' => 'required|exists:workers,id',
            'contract_type' => 'required|string|max:255',
            'contract_start_duration' => 'required|date|after_or_equal:today',
            'contract_end_duration' => 'required|date|after:contract_start_duration',
            'amount' => 'required|numeric|min:0',
            'additional_information' => 'sometimes|string|nullable|max:1000',
        ];
    }
}
