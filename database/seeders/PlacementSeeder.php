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
                'placement' => 'AWP'
            ] ,
            [
                'placement' => 'L3ON'
            ] ,
            [
                'placement' => 'CHR1S'
            ] ,
            [
                'placement' => '4D4'
            ] ,
            [
                'placement' => '4SH'
            ] ,
            [
                'placement' => '4lY'
            ] ,
            [
                'placement' => '33S'
            ] ,
            [
                'placement' => '55S'
            ] ,
            [
                'placement' => '4TT'
            ] ,
            [
                'placement' => 'G55'
            ] ,

        ];

        foreach($placement as $placement){
            Placement::create($placement);

        }
    }
}
