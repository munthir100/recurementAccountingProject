<?php

namespace App\Http\Requests\User\Dashboard;

use App\Models\Bond;
use Illuminate\Foundation\Http\FormRequest;

class CreateBondRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'maturity_date' => 'required|date',
            'issuer' => 'required|string',
            'date_of_issue' => 'required|date',
            'status_id' => 'required|in:' . implode(',', Bond::STATUSES),
        ];
    }
}
