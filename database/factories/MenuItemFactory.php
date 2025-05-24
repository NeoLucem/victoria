<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Models\Restaurant;
use App\Models\MenuItem;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuItem>
 */
class MenuItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'id' => $this->faker->uuid(),
            'menu_id' => Menu::inRandomOrder()->first()?->id,
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'image' => $this->faker->imageUrl(),
            'category' => $this->faker->word,
            'preparation_time' => $this->faker->numberBetween(5, 60),
            'stock' => $this->faker->numberBetween(0, 100),
        ];
    }
}
