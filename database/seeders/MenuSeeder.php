<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\Menu;
use Illuminate\Support\Facades\Log;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $restaurants = Restaurant::all();

        Log::info('Restaurants count: ' . $restaurants);

        foreach ($restaurants as $restaurant) {
            Menu::factory()->create([
                'restaurant' => $restaurant->id,
                // 'name' => 'Brunch Menu',
                // 'description' => 'Description for brunch Menu',
                // 'status' => 'active',
            ]);
        }
    }
}
