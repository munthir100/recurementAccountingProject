<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' =>  [
                'en' => $this->faker->sentence(),
                'ar' => $this->faker->sentence(),
            ],
            'description' =>  [
                'en' => $this->faker->paragraph(),
                'ar' => $this->faker->paragraph(),
            ],
            'is_new' => $this->faker->boolean(),
            'status_id' => $this->faker->randomElement(array_keys(Service::STATUSES)),
        ];
    }
}
