<?php

namespace Database\Seeders;

use App\Models\Employee;

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


        Employee::factory(20)->create();
        $this->call([
            JobSeeder::class,
            BuildingSeeder::class,
            FabricCodeSeeder::class,
            FabricColorSeeder::class,
            FabricTypeSeeder::class,
            PlacementSeeder::class,
            PurchaseOrderSeeder::class,
            UserSeeder::class,
        ]);

    }
}
