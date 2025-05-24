<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Log;


class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = Restaurant::all();
        $menus = Menu::all();

        foreach ($restaurants as $restaurant) {
            foreach ($menus as $menu) {
                // Create menu items for the menu
                MenuItem::factory()->create([
                    'menu_id' => $menu->id,
                    'restaurant_id' => $restaurant->id,
                ]);
            }
        }
        
    }
}
