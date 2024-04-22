<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'description' => $this->faker->sentence,
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'date' => $this->faker->date(),
            'type' => $this->faker->randomElement(['income', 'expense']),
            'status_id' => $this->faker->randomElement(Transaction::STATUSES),
            'transactionable_type' => Account::class,
            'transactionable_id' => Account::inRandomOrder()->first()->id,
        ];
    }
}
