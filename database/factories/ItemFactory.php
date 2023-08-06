<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'price' => fake()->numberBetween(1000, 100000),
            'stock' => fake()->numberBetween(0, 100),
            'weight' => fake()->numberBetween(0, 100),
            'sold' => fake()->numberBetween(0, 100),
            'rating' => fake()->numberBetween(0, 5),
            'discount' => fake()->numberBetween(0, 100),
            'discount_price' => fake()->numberBetween(0, 100000),
        ];
    }
}
