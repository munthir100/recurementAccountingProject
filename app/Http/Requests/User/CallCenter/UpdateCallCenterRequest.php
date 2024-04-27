<?php

namespace App\Http\Requests\User\CallCenter;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCallCenterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $callCenter = $this->route('callCenter');
        return [
            'name' => ['string', 'max:255'],
            'email' => [
                'string',
                'email',
                'max:255',
                Rule::unique('accounts', 'email')->ignore($callCenter->account->id)

            ],
            'phone' => ['string', 'max:255'],
            'password' => ['string', 'min:8'],
            'account_id' => ['exists:accounts,id'],
        ];
    }
}
