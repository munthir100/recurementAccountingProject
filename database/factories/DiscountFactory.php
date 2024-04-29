<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Discount;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscountFactory extends Factory
{
    protected $model = Discount::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'type' => $this->faker->randomElement(['fixed', 'percentage']),
            'amount' => $this->faker->randomFloat(2, 10, 100),
            'end_data' => $this->faker->date(),
            'status_id' => $this->faker->randomElement(array_keys(Discount::STATUSES)),
            'account_id' => Account::inRandomOrder()->first()->id,
        ];
    }
}
