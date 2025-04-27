<?php

namespace App\Services\V1;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


class EmployeeService{
    public function createEmployee($data){
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            //Log::info('User:', $user->toArray()); // Ensure $user is an object and has the expected properties

            $employee = Employee::create([
                'user_id' => $user->id,
                'restaurant_id' => $data['restaurant_id'],
                'role' => $data['role'],
            ]);

            //Log::info('Employee:', $employee->toArray()); // Ensure $employee is an object
            
            DB::commit();

            return ['user' => $user, 'employee' => $employee];
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateEmployee($employee, $data){
        DB::beginTransaction();
        try {
            $user = User::find($employee->user_id);
            if ($user) {
                $user->name = $data['name'] ?? $user->name;
                $user->email = $data['email'] ?? $user->email;
                // if (isset($data['password'])) {
                //     $user->password = Hash::make($data['password']);
                // }
                $user->save();
            }

            //Log::info('User:', $user->toArray()); // Ensure $user is an object and has the expected properties

            $employee->restaurant_id = $data['restaurant_id'] ?? $employee->restaurant_id;
            $employee->role = $data['role'] ?? $employee->role;
            $employee->save();

            //Log::info('Employee:', $employee->toArray()); // Ensure $employee is an object
            
            DB::commit();

            return ['user' => $user, 'employee' => $employee];
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
    
}
