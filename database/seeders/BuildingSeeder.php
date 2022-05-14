<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buildings = [
            [
                'building' => 'A1',

            ] ,
            [
              'building' => 'B2',
                'cutting' => 1,
                'cut_tables' => 13,
            ] ,
            [
                'building' => 'C3',

            ] ,
            [
                'building' => 'D4',
                'cutting' => 1,
                'cut_tables' => 14,
            ] ,
            [
                'building' => 'E5',
                'cutting' => 1,
                'cut_tables' => 13,
            ] ,
            [
                'building' => 'F6',

            ] ,
            [
                'building' => 'K11',

            ] ,
        ];

        foreach($buildings as $building){
            Building::create($building);
        }
    }
}
