<?php

namespace Database\Factories;

use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'job' => $this->faker->jobTitle,
            'month_salary' => $this->faker->numberBetween(1000, 5000),
            'contract_period' => $this->faker->numberBetween(1, 24),
            'languages' => json_encode([
                ['name' => 'English', 'percentage' => $this->faker->numberBetween(10, 100)],
                ['name' => 'French', 'percentage' => $this->faker->numberBetween(10, 100)],
                // Add more languages as needed
            ]),
            'nationality' => $this->faker->country,
            'age' => $this->faker->numberBetween(18, 60),
            'type' => $this->faker->randomElement(['Full-time', 'Part-time']),
            'tall' => $this->faker->numberBetween(150, 200),
            'religion' => $this->faker->randomElement(['Islam', 'Christianity', 'Hinduism', 'Buddhism']),
            'place_of_birth' => $this->faker->city,
            'children' => $this->faker->numberBetween(0, 5),
            'education' => $this->faker->randomElement(['High School', 'Bachelor', 'Master', 'PhD']),
            'birth_date' => $this->faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            'weight' => $this->faker->numberBetween(50, 100),
            'has_practical_experience' => $this->faker->boolean,
            'practical_experience' => json_encode([
                ['name' => 'Skill A', 'value' => $this->faker->randomElement(['Beginner', 'Intermediate', 'Advanced'])],
                ['name' => 'Skill B', 'value' => $this->faker->randomElement(['Beginner', 'Intermediate', 'Advanced'])],
                // Add more practical experiences as needed
            ]),
            'work_experience_country' => $this->faker->country,
            'years_of_experience' => $this->faker->numberBetween(0, 20),
            'office_id' => null, // This should be filled later when attaching workers to offices
            'status_id' => $this->faker->numberBetween(Status::PUBLISHED, Status::NOT_PUBLISHED),
        ];
    }
}
