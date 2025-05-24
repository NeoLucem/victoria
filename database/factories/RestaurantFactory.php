<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->make()->toArray(),
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->url,
            'description' => $this->faker->text(200),
            'logo' => $this->faker->imageUrl(640, 480, 'business'),
            'cover_image' => $this->faker->imageUrl(640, 480, 'business'),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
