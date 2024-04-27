<?php

namespace Database\Factories;

use App\Models\Office;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfficeFactory extends Factory
{
    protected $model = Office::class;

    public function definition()
    {
        return [
            'location' => $this->faker->address,
            'account_id' => null,
        ];
    }
}
