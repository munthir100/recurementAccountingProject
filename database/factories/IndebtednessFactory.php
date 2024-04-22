<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Indebtedness;
use Illuminate\Database\Eloquent\Factories\Factory;

class IndebtednessFactory extends Factory
{
    protected $model = Indebtedness::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'amount' => $this->faker->randomFloat(2, 100, 1000),
            'due_date' => $this->faker->date(),
            'type' => $this->faker->randomElement(['Creditor', 'Debtor']),
            'status_id' => $this->faker->randomElement(Indebtedness::STATUSES),
            'account_id' => Account::inRandomOrder()->first()->id,
            'collateral' => $this->faker->sentence,
        ];
    }
}
