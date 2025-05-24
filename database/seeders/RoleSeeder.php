<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory(1)->create(
            [
                'name' => 'admin',
            ]
        );
        Role::factory(1)->create(
            [
                'name' => 'cashier',
            ]
        );
        Role::factory(1)->create(
            [
                'name' => 'cook',
            ]
        );
        Role::factory(1)->create(
            [
                'name' => 'waiter',
            ]
        );
    }
}
