<?php

namespace App\Http\Requests\User\Worker;

use App\Models\Status;
use App\Models\Worker;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'job' => ['required', 'string', 'max:255'],
            'month_salary' => ['required', 'numeric'],
            'contract_period' => ['required', 'string', 'max:255'],
            'languages' => ['nullable', 'array', 'required'],
            'languages.*.name' => ['required_with:languages', 'distinct', 'string', 'max:255'],
            'languages.*.percentage' => ['required_with:languages', 'numeric', 'between:0,100'],
            'practical_experience' => ['nullable', 'array', 'required'],
            'practical_experience.*.name' => ['required_with:practical_experience', 'distinct', 'string', 'max:255'],
            'practical_experience.*.value' => ['required_with:practical_experience', 'string', 'max:255'],


            'nationality' => ['required', 'string', 'max:255'],
            'age' => ['required', 'numeric', 'min:18'],
            'type' => ['required', 'string', 'max:255'],
            'tall' => ['required', 'numeric'],
            'religion' => ['required', 'string', 'max:255'],
            'place_of_birth' => ['required', 'string', 'max:255'],
            'children' => ['required', 'numeric'],
            'education' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'weight' => ['required', 'numeric'],
            'work_experience_country' => ['required', 'string', 'max:255'],
            'years_of_experience' => ['required', 'numeric'],
            'status_id' => 'in:' . implode(',', array_keys(Worker::STATUSES)),
        ];
    }
}
