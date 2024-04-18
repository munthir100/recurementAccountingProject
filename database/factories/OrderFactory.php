<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\Worker;
use App\Models\Account;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customerId = Customer::inRandomOrder()->first()->id;
        $workerId = Worker::inRandomOrder()->first()->id;
        $statusId = Status::inRandomOrder()->first()->id;

        return [
            'customer_id' => $customerId,
            'worker_id' => $workerId,
            'contract_type' => $this->faker->word,
            'contract_start_duration' => $this->faker->date,
            'contract_end_duration' => $this->faker->date,
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'additional_information' => $this->faker->sentence,
            'status_id' => $statusId,
        ];
    }
}
