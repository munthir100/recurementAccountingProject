<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Contract;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    protected $model = Contract::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'amount' => $this->faker->randomFloat(2, 1000, 10000),
            'amount_type' => $this->faker->randomElement(['monthly', 'daily', 'weekly', 'annually']),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'status_id' => $this->faker->randomElement(array_keys(Contract::STATUSES)),
            'location' => $this->faker->address,
            'renewal_terms' => $this->faker->sentence,
            'contractable_type' => Account::class, // Replace with your logic for contractable_type
            'contractable_id' => Account::inRandomOrder()->first()->id, // Replace with your logic for contractable_id
        ];
    }
}
