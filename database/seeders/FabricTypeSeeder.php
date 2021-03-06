<?php

namespace Database\Seeders;

use App\Models\FabricType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FabricTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fabric_types = [
            [
                'fabric_type' => 'WOVEN',
                'sas' => 6.84,
                'sas_cut' => 0.49,
            ] ,
            [
                'fabric_type' => 'KNITTED',
                'sas' => 7.76,
                'sas_cut' => 0.49,
            ] ,
            [
                'fabric_type' => 'WOOL',
                'sas' => 7.65,
                'sas_cut' => 0.51,
            ] ,
            [
                'fabric_type' => 'PADDED',
                'sas' => 7.90,
                'sas_cut' => 1.22,
            ] ,
            [
                'fabric_type' => 'INTERLINING',
                'sas' => 3.42,
                'sas_cut' => 0.49,
            ] ,


        ];

        foreach($fabric_types as $fabric_type){
            FabricType::create($fabric_type);

        }
    }
}
