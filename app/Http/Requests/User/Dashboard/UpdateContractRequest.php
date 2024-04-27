<?php

namespace App\Http\Requests\User\Dashboard;

use App\Models\Contract;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContractRequest extends FormRequest
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
            'title' => 'sometimes|string',
            'description' => 'sometimes|string',
            'amount' => 'sometimes|numeric',
            'amount_type' => 'sometimes|string|in:monthly,daily,weekly,annually',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date',
            'status_id' => 'sometimes|in:' . implode(',', array_keys(Contract::STATUSES)),
            'location' => 'sometimes|string',
            'renewal_terms' => 'sometimes|string',
            'contractable_type' => 'sometimes|string',
            'contractable_id' => 'sometimes|integer',
            // Add other fields as needed
        ];
    }
}
