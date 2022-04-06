<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        Employee::factory(20)->create();
        $this->call(JobSeeder::class);
        $this->call(BuildingSeeder::class);
    }
}
