<?php

namespace Database\Factories;

use App\Models\Opening;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opening>
 */
class OpeningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraphs(3, true),
            'salary' => $this->faker->numberBetween($min = 10_000, $max = 150_000),
            'location' => $this->faker->city,
            'category' => $this->faker->randomElement(Opening::$category),
            'experience' => $this->faker->randomElement(Opening::$experience)
        ];
    }
}
