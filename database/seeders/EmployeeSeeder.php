<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            [
                'id' => 3,
                'name' => 'Nina',
                'phone' => mt_rand(1,9999999999),
                'job_id' => 1,
                'building_id' => 7,
                'user_id' => 1,
            ],
        ];

        foreach($employees as $employee){
            Employee::create($employee);
        }
    }
}
