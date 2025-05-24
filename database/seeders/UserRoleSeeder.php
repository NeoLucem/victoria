<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Support\Str;


class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // Create multiple users and assign them roles
        // User::factory(10)->create()->each(function ($user) {
        //     $user->role()->attach(UserRole::factory()->create());
        // });

        $roles = Role::all(); // Fetch all roles
        $users = User::all(); // Fetch all users

        foreach ($users as $user) {
            UserRole::create([
                'id' => (string) Str::uuid(), // Generate a UUID for the id field
                'user_id' => $user->id, // Assign a valid user_id
                'role_id' => $roles->random()->id, // Assign a valid role_id from a random role
            ]);
        }
    }
}
