<?php

namespace App\Http\Requests\User\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CreateContractRequest extends FormRequest
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
            'amount_type' => 'required|string|in:monthly,daily,weekly,annually',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status_id' => 'required|exists:statuses,id',
            'location' => 'required|string',
            'renewal_terms' => 'required|string',
            'contractable_type' => 'required|string',
            'contractable_id' => 'nullable|integer',
            // Add other fields as needed
        ];
    }
}
