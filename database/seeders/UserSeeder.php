<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Warren Hernandez',
                'email' => 'jwarren.hernandez@gmail.com',
                'email_verified_at' => now(),
                'employee_id' => 1,
                'password' => Hash::make('warren29'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Admin Admin',
                'email' => 'admin.admin@gmail.com',
                'email_verified_at' => now(),
                'employee_id' => 2,
                'password' => Hash::make('admin'), // password
                'remember_token' => Str::random(10),
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }

        $employees = [
            [
                'id' => 1,
                'name' => 'Warren Hernandez',
                'phone' => mt_rand(1,9999999999),
                'job_id' => 1,
                'building_id' => mt_rand(1,7),
                'user_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Admin admin',
                'phone' => mt_rand(1,9999999999),
                'job_id' => 6,
                'building_id' => mt_rand(1,7),
                'user_id' => 1,
            ],
        ];

        foreach($employees as $employee){
            Employee::create($employee);
        }

    }
}
