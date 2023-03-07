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
                'name' => 'Pak Soklin',
                'email' => 'paksoklin@gmail.com',
                'email_verified_at' => now(),
                'employee_id' => 19455,
                'password' => Hash::make('soklin1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Chea Sreynith',
                'email' => 'cheasreynith@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('sreynith1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Oun Nysar',
                'email' => 'niza@gmail.com',
                'email_verified_at' => now(),
                'employee_id' => 14243,
                'password' => Hash::make('niza1234'), // password
                'remember_token' => Str::random(10),
            ],

            [
                'name' => 'Rou Srey',
                'email' => 'rousrey@gmail.com',
                'email_verified_at' => now(),
                'employee_id' => 1137,
                'password' => Hash::make('rou1234'), // password
                'remember_token' => Str::random(10),
            ],

            [
                'name' => 'So Thy',
                'email' => 'sothy@gmail.com',
                'email_verified_at' => now(),
                'employee_id' => 1823,
                'password' => Hash::make('sothy1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'leang',
                'email' => 'leang@gmail.com',
                'email_verified_at' => now(),
                'employee_id' => 19613,
                'password' => Hash::make('leang1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'vin',
                'email' => 'vin@gmail.com',
                'email_verified_at' => now(),
                'employee_id' => 13200,
                'password' => Hash::make('vin1234'), // password
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
            [
                'name' => 'Floy Sibayan',
                'email' => 'floysibayan@gmail.com',
                'email_verified_at' => now(),
                'employee_id' => 6,
                'password' => Hash::make('floy1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Raksa Kong',
                'email' => 'raksakong@gmail.com',
                'email_verified_at' => now(),
                'employee_id' => 7,
                'password' => Hash::make('raksa1234'), // password
                'remember_token' => Str::random(10),
            ],
            

            
        ];

        foreach($users as $user){
            User::create($user);
        }

        

    }
}
