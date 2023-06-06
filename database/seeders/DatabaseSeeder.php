<?php

namespace Database\Seeders;

use App\Models\Destination;
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
            EmployeeSeeder::class,
            UserSeeder::class,
            StyleSeeder::class,
            // CutSeeder::class,
            BrandSeeder::class,
            CartonSeeder::class,
            SizeSeeder::class,
            DestinationSeeder::class,
            SupplierSeeder::class,
        ]);

    }
}
