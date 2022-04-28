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
            [
                'fabric_color' => 'RED'
            ] ,
            [
                'fabric_color' => 'YELLOW'
            ] ,
            [
                'fabric_color' => 'ORANGE'
            ] ,
            [
                'fabric_color' => 'PINK'
            ] ,
            [
                'fabric_color' => 'VIOLET'
            ] ,
            [
                'fabric_color' => 'DARK GREY'
            ] ,
            [
                'fabric_color' => 'AQUA'
            ] ,
            [
                'fabric_color' => 'YELLOW GREEN'
            ] ,
            [
                'fabric_color' => 'OCEAN'
            ] ,
            [
                'fabric_color' => 'MODERN STEEL'
            ] ,
            [
                'fabric_color' => 'SPORTY RED'
            ] ,
            [
                'fabric_color' => 'RAFFETA WHITE'
            ] ,

        ];

        foreach($fabric_colors as $fabric_color){
            FabricColor::create($fabric_color);

        }
    }
}
