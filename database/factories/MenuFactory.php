<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Restaurant;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'restaurant' => Restaurant::factory()->create(),
            'restaurant' => Restaurant::inRandomOrder()->first()?->id,            
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
