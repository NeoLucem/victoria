<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\User;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create multiple users and a restaurant for each user
        User::factory(10)->create()->each(function ($user) {
            Restaurant::factory()->for($user)->create();
        });
    }
}
