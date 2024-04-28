<?php

namespace App\Http\Requests\User\Worker;

use App\Models\Status;
use App\Models\Worker;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateWorkerRequest extends FormRequest
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
            'languages' => ['required', 'array'],
            'languages.*.name' => ['required', 'string', 'max:255'],
            'languages.*.percentage' => ['required', 'numeric', 'between:0,100'],
            'nationality' => ['required', 'string', 'max:255'],
            'age' => ['required', 'numeric'],
            'type' => ['required', 'string', 'max:255'],
            'tall' => ['nullable', 'numeric'],
            'religion' => ['nullable', 'string', 'max:255'],
            'place_of_birth' => ['required', 'string', 'max:255'],
            'children' => ['nullable', 'numeric'],
            'education' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'weight' => ['nullable', 'numeric'],
            'practical_experience' => ['required', 'array'],
            'work_experience_country' => ['required', 'string', 'max:255'],
            'years_of_experience' => ['required', 'numeric'],
            'main_image' => ['nullable', 'image', 'max:2048'],
            'related_images' => ['nullable', 'array'],
            'office_id' => ['required', 'exists:offices,id'],
            'status_id' => 'required|in:' . implode(',', array_keys(Worker::STATUSES)),
        ];
    }
}
