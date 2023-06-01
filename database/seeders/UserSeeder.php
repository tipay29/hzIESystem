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
                'employee_id' => 15929,
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
                'email' => 'christian_pp@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 5,
                'password' => Hash::make('christian1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Floy Sibayan',
                'email' => 'floyd_sibayan@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 6,
                'password' => Hash::make('floy1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Raksa Kong',
                'email' => 'raksa_kong@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 7,
                'password' => Hash::make('raksa1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Lucina Chan',
                'email' => 'lucinachan@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 8,
                'password' => Hash::make('lucina1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Jevon Ey',
                'email' => 'jevon_ey@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 9,
                'password' => Hash::make('jevon1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Daniel Go',
                'email' => 'daniel_go@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 10,
                'password' => Hash::make('daniel1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Harris Guo',
                'email' => 'harris_guo@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 11,
                'password' => Hash::make('daniel1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Bert Zheng',
                'email' => 'bert_zheng@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 12,
                'password' => Hash::make('bert1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Franklin Fu',
                'email' => 'franklin_fu@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 13,
                'password' => Hash::make('franklin1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Vinus Gelio',
                'email' => 'vinus_gelio@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 14,
                'password' => Hash::make('vinus1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Julius Randle',
                'email' => 'julius_randle@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 15,
                'password' => Hash::make('julius1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Jayson Manio',
                'email' => 'jayson_manio@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 16,
                'password' => Hash::make('jayson1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Quenie Capule',
                'email' => 'quenie_capule@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 17,
                'password' => Hash::make('quenie1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Jhon De Leon',
                'email' => 'jhon_deleon@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 18,
                'password' => Hash::make('jhon1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Hua Lan',
                'email' => 'hualan@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 19,
                'password' => Hash::make('hualan1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Planning PP',
                'email' => 'planning_pp@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 20,
                'password' => Hash::make('planning1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Packing PP',
                'email' => 'packing_pp@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 21,
                'password' => Hash::make('packing1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Quality PP',
                'email' => 'quality_pp@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 22,
                'password' => Hash::make('quality1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'William Zhang',
                'email' => 'wiliam_zhang@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 23,
                'password' => Hash::make('william1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Shipping PP',
                'email' => 'shipping_pp@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 24,
                'password' => Hash::make('shipping1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Kun Larkhena',
                'email' => 'kun_larkhena@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 25,
                'password' => Hash::make('larkhena1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Eng Dara',
                'email' => 'eng_dara@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 26,
                'password' => Hash::make('eng1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Kin Daly',
                'email' => 'kin_daly@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 27,
                'password' => Hash::make('kin1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Sherry Vicmark',
                'email' => 'sherry_vicmark@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 28,
                'password' => Hash::make('sherry1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Merchandiser Vicmark',
                'email' => 'merchandiser_vicmark@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 29,
                'password' => Hash::make('merchandiser1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Sophaltith Vicmark',
                'email' => 'sophaltith_vicmark@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 30,
                'password' => Hash::make('sophaltith1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Vicheyly Vicmark',
                'email' => 'vicheyly_vicmark@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 31,
                'password' => Hash::make('vicheyly1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Export Vicmark',
                'email' => 'export_vicmark@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 32,
                'password' => Hash::make('export1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Qc Vicmark',
                'email' => 'qc_vicmark@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 33,
                'password' => Hash::make('qc1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'QC Garment',
                'email' => 'qcgarment_pp@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 33,
                'password' => Hash::make('qcgarment1234'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Qc Bag',
                'email' => 'qcbag_pp@horizon-outdoor.com',
                'email_verified_at' => now(),
                'employee_id' => 33,
                'password' => Hash::make('qcbag1234'), // password
                'remember_token' => Str::random(10),
            ],


        ];

        foreach($users as $user){
            User::create($user);
        }




    }
}
