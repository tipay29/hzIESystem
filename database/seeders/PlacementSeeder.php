<?php

namespace Database\Seeders;

use App\Models\Placement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlacementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $placement = [
            [
                'placement' => 'M18W'
            ] ,
            [
                'placement' => '14G'
            ] ,
            [
                'placement' => 'LZH9'
            ] ,
            [
                'placement' => '180G'
            ] ,
            [
                'placement' => 'LTJI'
            ] ,
            [
                'placement' => 'M18W'
            ] ,
            [
                'placement' => '14G'
            ] ,
            [
                'placement' => 'LZH9'
            ] ,
            [
                'placement' => '180G'
            ] ,
            [
                'placement' => 'LTJI'
            ] ,
            [
                'placement' => 'M18W'
            ] ,
            [
                'placement' => '14G'
            ] ,
            [
                'placement' => 'LZH9'
            ] ,
            [
                'placement' => '180G'
            ] ,
            [
                'placement' => 'LTJI'
            ] ,
            [
                'placement' => 'M18W'
            ] ,
            [
                'placement' => '14G'
            ] ,
            [
                'placement' => 'LZH9'
            ] ,
            [
                'placement' => '180G'
            ] ,
            [
                'placement' => 'LTJI'
            ] ,
            [
                'placement' => 'M18W'
            ] ,
            [
                'placement' => '14G'
            ] ,
            [
                'placement' => 'LZH9'
            ] ,
            [
                'placement' => '180G'
            ] ,
            [
                'placement' => 'LTJI'
            ] ,
        ];

        foreach($placement as $placement){
            Placement::create($placement);

        }
    }
}
