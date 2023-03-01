<?php

namespace Database\Seeders;

use App\Models\Carton;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cartons = [
            [
                'brand_id' => 2,
                'ctn_size' => '68.5*45.5*14',
                'ctn_weight' => '1.03',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 2,
                'ctn_size' => '68.5*45.5*16',
                'ctn_weight' => '1.03',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 2,
                'ctn_size' => '68.5*45.5*18',
                'ctn_weight' => '1.10',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 2,
                'ctn_size' => '68.5*45.5*26',
                'ctn_weight' => '1.26',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 2,
                'ctn_size' => '68.5*45.5*28',
                'ctn_weight' => '1.26',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 2,
                'ctn_size' => '68.5*45.5*37.5',
                'ctn_weight' => '1.46',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 2,
                'ctn_size' => '68.5*45.5*26',
                'ctn_weight' => '1.26',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 2,
                'ctn_size' => '68.5*45.5*37.5',
                'ctn_weight' => '1.46',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 8,
                'ctn_size' => '60*40*25',
                'ctn_weight' => '1.1',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 8,
                'ctn_size' => '60*40*40',
                'ctn_weight' => '1.3',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 3,
                'ctn_size' => '53.34*40.64*33.02',
                'ctn_weight' => '1.06',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 3,
                'ctn_size' => '60.01*39.69*45.72',
                'ctn_weight' => '1.21',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 3,
                'ctn_size' => '76.2*38.1*33.02',
                'ctn_weight' => '1.25',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '50.6*36.8*21',
                'ctn_weight' => '1.17',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '58.4*38.1*38.1',
                'ctn_weight' => '1.17',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '58.42*38.1*47',
                'ctn_weight' => '1.2',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '76.2*38.1*48.26',
                'ctn_weight' => '1.4',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '59*38*16.5',
                'ctn_weight' => '.9',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '59*38*40',
                'ctn_weight' => '1.42',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '68*38*29',
                'ctn_weight' => '1.34',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '68*38*47',
                'ctn_weight' => '1.44',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '60*40*7.5',
                'ctn_weight' => '.65',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '60*40*13',
                'ctn_weight' => '1.3',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '60*40*20',
                'ctn_weight' => '1.18',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '60*40*30',
                'ctn_weight' => '1.04',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '60*40*40',
                'ctn_weight' => '1.44',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '65*38.5*23.5',
                'ctn_weight' => '1.1',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '71.5*38.5*13',
                'ctn_weight' => '.8',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '71.5*38.5*29.5',
                'ctn_weight' => '1.29',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '74.5*38.5*44.5',
                'ctn_weight' => '1.44',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 5,
                'ctn_size' => '80*38*14',
                'ctn_weight' => '1.04',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 5,
                'ctn_size' => '80*38*29',
                'ctn_weight' => '1.28',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 5,
                'ctn_size' => '80*38*44',
                'ctn_weight' => '1.64',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '80*38*14',
                'ctn_weight' => '1.04',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '80*38*29',
                'ctn_weight' => '1.28',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '40*40*14',
                'ctn_weight' => '0.8',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '40*40*25',
                'ctn_weight' => '1.2',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '60*36*28',
                'ctn_weight' => '0.92',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '58.4*43.2*12',
                'ctn_weight' => '0.62',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '58.4*43.2*15.88',
                'ctn_weight' => '0.86',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '58.4*43.2*21',
                'ctn_weight' => '0.97',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '58.4*43.2*28.6',
                'ctn_weight' => '1.18',
                'type' => 'EQUIPMENT',
            ] ,
            [
                'brand_id' => 7,
                'ctn_size' => '60*40*12',
                'ctn_weight' => '1.1',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 7,
                'ctn_size' => '60*40*18',
                'ctn_weight' => '1.15',
                'type' => 'APPAREL',
            ] ,
            [
                'brand_id' => 7,
                'ctn_size' => '60*40*38',
                'ctn_weight' => '1.2',
                'type' => 'APPAREL',
            ] ,
        ];

        foreach($cartons as $carton){
            Carton::create($carton);
        }
    }
}
