<?php

namespace Database\Factories;

use App\Models\Bond;
use Illuminate\Database\Eloquent\Factories\Factory;

class BondFactory extends Factory
{

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'amount' => $this->faker->randomFloat(2, 1000, 10000),
            'interest_rate' => $this->faker->randomFloat(2, 1, 10),
            'maturity_date' => $this->faker->date(),
            'issuer' => $this->faker->company,
            'date_of_issue' => $this->faker->date(),
            'status_id' => $this->faker->randomElement(array_keys(Bond::STATUSES)),
        ];
    }
}
