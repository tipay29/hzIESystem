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
            [
                'name' => 'Nina Payabyab',
                'email' => 'payabyabnischelle@gmail.com',
                'email_verified_at' => now(),
                'employee_id' => 3,
                'password' => Hash::make('nina1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Meoun Srey',
                'email' => 'meounsrey@gmail.com',
                'email_verified_at' => now(),
                'employee_id' => 4,
                'password' => Hash::make('srey2308'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Christian',
                'email' => 'christian@gmail.com',
                'email_verified_at' => now(),
                'employee_id' => 5,
                'password' => Hash::make('christian1234'), // password
                'remember_token' => Str::random(10),
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }

        

    }
}
