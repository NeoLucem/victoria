<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Models\Restaurant;
use App\Models\Tablette;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'restaurant_id' => Restaurant::inRandomOrder()->first()->id, // Random restaurant ID
            'table_id' => Tablette::factory()->create(),
            'total_amount' => $this->faker->randomFloat(2, 10, 1000), // Random total amount between 10 and 1000
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']), // Random status
        ];
    }
}
