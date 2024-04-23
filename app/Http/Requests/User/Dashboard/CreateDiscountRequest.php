<?php

namespace App\Http\Requests\User\Dashboard;

use App\Models\Discount;
use Illuminate\Foundation\Http\FormRequest;

class CreateDiscountRequest extends FormRequest
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
            'type' => 'required|in:fixed,percentage',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
            'status_id' => 'required|in:' . implode(',', array_keys(Discount::STATUSES)),
            'account_id' => 'required|exists:accounts,id',
        ];
    }
}
