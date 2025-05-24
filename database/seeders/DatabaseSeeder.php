<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Role;
use App\Models\Tablette;
use App\Models\User;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Order;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tablette::factory(10)
        //     ->create();
        // Menu::factory()->create([
        //     'restaurant' => '25ef21ca-4e34-47f4-ab70-6468bbd2884c',
        //     'name' => 'Debout Menu',
        //     'description' => 'Description for Dinner Menu',
        //     'status' => 'active',
        // ]);
        // Menu::factory()->create([
        //     'restaurant' => '25ef21ca-4e34-47f4-ab70-6468bbd2884c',
        //     'name' => 'test Menu',
        //     'description' => 'Description for Dinner Menu',
        //     'status' => 'inactive',
        // ]);

        // MenuItem::factory()->create([
        //     'restaurant_id' => '25ef21ca-4e34-47f4-ab70-6468bbd2884c',
        //     'menu_id' => '26bf6200-d9fe-4883-9d2a-afbb2550b371',
        //     'name' => 'test Menu Item',
        //     'description' => 'Description for Dinner Menu Item',
        //     'price' => 10.00,
        //     'status' => 'active',
        // ]);
        // MenuItem::factory()->create([
        //     'restaurant_id' => '25ef21ca-4e34-47f4-ab70-6468bbd2884c',
        //     'menu_id' => '7aac176b-178a-4d9e-92fb-2d115903a809',
        //     'name' => 'Bobon Menu Item',
        //     'description' => 'Description for Dinner Menu Item',
        //     'price' => 10.00,
        //     'status' => 'inactive',
        // ]);
        // User::factory(10)
        // ->create();

        

  

        // User::factory()->create([
        //     'name' => 'Test',
        //     'email' => 'test@test.com',
        //     'password' => bcrypt('password'),
        // ]);

        // Role::factory(1)->create([
        //     'name' => 'admin',
        // ]);
        // Role::factory(1)->create([
        //     'name' => 'cashier',
        // ]); 
        // Role::factory(1)->create([
        //     'name' => 'waiter',
        // ]); 
        // Role::factory(1)->create([
        //     'name' => 'cook',
        // ]); 
        // Role::factory(1)->create([
        //     'name' => 'manager',
        // ]); 

       

        $this->call([
             //RestaurantSeeder::class,
        //     // RoleSeeder::class,
             //UserRoleSeeder::class,
             //MenuSeeder::class,
             //MenuItemSeeder::class,
            //OrderSeeder::class,
        ]);
    }
}
