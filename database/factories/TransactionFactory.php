<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\TransactionType;
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
            'transaction_type_id' => TransactionType::inRandomOrder()->first()->id,
            'status_id' => $this->faker->randomElement(array_keys(Transaction::STATUSES)),
            'transactionable_type' => Account::class,
            'transactionable_id' => Account::inRandomOrder()->first()->id,
        ];
    }
}
