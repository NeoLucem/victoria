<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tablette>
 */
class TabletteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'restaurant_id' => Restaurant::inRandomOrder()->first()->id,
            'table_number' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['available', 'occupied']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
