<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'context' => $this->faker->paragraphs(3, true),
            'author_id' => User::inRandomOrder()->first()->id,
            'status_id' => $this->faker->randomElement(array_keys(Blog::STATUSES)),
            'published_at' => now(),
        ];
    }
}
