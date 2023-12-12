<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'description' => fake()->text(),
            'image' => fake()->imageUrl(800,600),
            'From' => fake()->numberBetween($min = 10, $max = 99),
            'To' => fake()->numberBetween($min = 100, $max = 999)
        ];
    }
}
