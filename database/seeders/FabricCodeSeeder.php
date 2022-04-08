<?php

namespace Database\Seeders;

use App\Models\FabricCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FabricCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fabric_codes = [
            [
                'fabric_code' => 'SH4'
            ] ,
            [
                'fabric_code' => 'JK3'
            ] ,
            [
                'fabric_code' => 'M19'
            ] ,
            [
                'fabric_code' => '400D'
            ] ,
            [
                'fabric_code' => 'ZCV'
            ] ,
        ];

        foreach($fabric_codes as $fabric_code){
            FabricCode::create($fabric_code);

        }
    }
}
