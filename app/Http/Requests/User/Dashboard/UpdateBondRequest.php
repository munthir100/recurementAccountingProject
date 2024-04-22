<?php

namespace App\Http\Requests\User\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBondRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'string',
            'description' => 'string',
            'amount' => 'numeric',
            'interest_rate' => 'numeric',
            'maturity_date' => 'date',
            'issuer' => 'string',
            'date_of_issue' => 'date',
            'status_id' => 'exists:statuses,id',
        ];
    }
}
