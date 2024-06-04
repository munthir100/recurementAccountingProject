<?php

namespace Database\Factories;

use App\Models\Currency;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->country(), // Use Faker to generate a random country name
            'status_id' => $this->faker->randomElement([
                Status::PUBLISHED,
                Status::NOT_PUBLISHED,
            ]),
            'currency_id' => Currency::inRandomOrder()->first()->id
        ];
    }
}
