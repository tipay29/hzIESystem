<?php

namespace Database\Seeders;

use App\Models\FabricColor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FabricColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fabric_colors = [
            [
                'fabric_color' => 'TNF BLACK'
            ] ,
            [
                'fabric_color' => 'BANFF BLUE'
            ] ,
            [
                'fabric_color' => 'WHITE'
            ] ,
            [
                'fabric_color' => 'GREY'
            ] ,
            [
                'fabric_color' => 'GREEN'
            ] ,
        ];

        foreach($fabric_colors as $fabric_color){
            FabricColor::create($fabric_color);

        }
    }
}
