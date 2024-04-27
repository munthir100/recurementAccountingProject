<?php

// CreateCallCenterRequest.php
namespace App\Http\Requests\User\CallCenter;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\AccountType;

class CreateCallCenterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:accounts,email'],
            'phone' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $this->addUserType($validator);
        });
    }

    protected function addUserType($validator)
    {
        $this->merge(['account_type_id' => AccountType::CALL_CENTER]);
    }
}
