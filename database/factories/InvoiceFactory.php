<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Invoice;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'amount' => $this->faker->randomFloat(2, 100, 1000),
            'due_date' => $this->faker->date(),
            'type' => $this->faker->randomElement(['standard', 'recurring']),
            'status_id' => $this->faker->randomElement(Invoice::STATUSES),
            'account_id' => Account::inRandomOrder()->first()->id,
            'worker_id' => Worker::inRandomOrder()->first()->id,
            'billing_address' => $this->faker->address,
        ];
    }
}
