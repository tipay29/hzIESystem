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
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.99',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',

            ] ,
            [
                'brand_id' => 2,
                'ctn_size' => '68.5*45.5*16',
                'ctn_weight' => '1.03',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.03',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 2,
                'ctn_size' => '68.5*45.5*18',
                'ctn_weight' => '1.10',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.06',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 2,
                'ctn_size' => '68.5*45.5*26',
                'ctn_weight' => '1.26',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.19',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 2,
                'ctn_size' => '68.5*45.5*28',
                'ctn_weight' => '1.26',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.23',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 2,
                'ctn_size' => '68.5*45.5*37.5',
                'ctn_weight' => '1.46',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.39',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 2,
                'ctn_size' => '68.5*45.5*26',
                'ctn_weight' => '1.26',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.19',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 2,
                'ctn_size' => '68.5*45.5*37.5',
                'ctn_weight' => '1.46',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.39',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 8,
                'ctn_size' => '60*40*25',
                'ctn_weight' => '1.24',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.95',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 8,
                'ctn_size' => '60*40*38',
                'ctn_weight' => '1.44',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.15',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 8,
                'ctn_size' => '60*40*40',
                'ctn_weight' => '1.44',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.18',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 3,
                'ctn_size' => '53.34*40.64*33.02',
                'ctn_weight' => '1.06',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.02',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 3,
                'ctn_size' => '60.01*39.69*45.72',
                'ctn_weight' => '1.21',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.25',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 3,
                'ctn_size' => '73.66*47.63*29.21',
                'ctn_weight' => '1.37',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.36',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 3,
                'ctn_size' => '76.2*38.1*33.02',
                'ctn_weight' => '1.25',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.19',
                'ctn_code_1001' => 'R8',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 3,
                'ctn_size' => '46.36*36.83*11.43',
                'ctn_weight' => '.60',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.59',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 3,
                'ctn_size' => '46.36*36.83*17.78',
                'ctn_weight' => '.70',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.67',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 3,
                'ctn_size' => '46.36*36.83*27.76',
                'ctn_weight' => '.75',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.79',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '50.6*36.8*21',
                'ctn_weight' => '1.17',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.84',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '58.4*38.1*38.1',
                'ctn_weight' => '1.17',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.08',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '58.42*38.1*47',
                'ctn_weight' => '1.2',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.21',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '76.2*38.1*48.26',
                'ctn_weight' => '1.4',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.45',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '59*38*16.5',
                'ctn_weight' => '.95',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.78',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '59*38*40',
                'ctn_weight' => '1.42',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.11',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '68*38*29',
                'ctn_weight' => '1.34',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.04',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '68*38*47',
                'ctn_weight' => '1.44',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.32',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '60*40*7.5',
                'ctn_weight' => '.65',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.7',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '60*40*13',
                'ctn_weight' => '1.3',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.78',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '60*40*20',
                'ctn_weight' => '1.18',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.88',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '60*40*30',
                'ctn_weight' => '1.04',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.03',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '60*40*40',
                'ctn_weight' => '1.44',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.18',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '65*38.5*23.5',
                'ctn_weight' => '1.1',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.94',
                'ctn_code_1001' => 'R5',
                'ctn_code_1004' => 'R5',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '71.5*38.5*13',
                'ctn_weight' => '.8',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.83',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '71.5*38.5*29.5',
                'ctn_weight' => '1.29',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.10',
                'ctn_code_1001' => 'R7',
                'ctn_code_1004' => 'R7',
            ] ,
            [
                'brand_id' => 1,
                'ctn_size' => '74.5*38.5*44.5',
                'ctn_weight' => '1.44',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.37',
                'ctn_code_1001' => 'R7',
                'ctn_code_1004' => 'R7',
            ] ,
            [
                'brand_id' => 5,
                'ctn_size' => '80*38*14',
                'ctn_weight' => '1.04',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.90',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 5,
                'ctn_size' => '80*38*29',
                'ctn_weight' => '1.28',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.16',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 5,
                'ctn_size' => '80*38*44',
                'ctn_weight' => '1.64',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.42',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '80*38*14',
                'ctn_weight' => '1.04',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.90',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '80*38*29',
                'ctn_weight' => '1.28',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.16',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '80*38*44',
                'ctn_weight' => '1.68',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.42',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '40*40*14',
                'ctn_weight' => '0.8',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.64',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',

            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '40*40*25',
                'ctn_weight' => '1.2',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.77',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '60*36*28',
                'ctn_weight' => '0.92',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '.90',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '58.4*43.2*12',
                'ctn_weight' => '0.62',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.82',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '58.4*43.2*15.88',
                'ctn_weight' => '0.86',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.88',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '58.4*43.2*21',
                'ctn_weight' => '0.97',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '0.96',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 4,
                'ctn_size' => '58.4*43.2*28.6',
                'ctn_weight' => '1.18',
                'type' => 'EQUIPMENT',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.07',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 7,
                'ctn_size' => '60*40*12',
                'ctn_weight' => '1.1',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '.76',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 7,
                'ctn_size' => '60*40*18',
                'ctn_weight' => '1.15',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '.76',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 7,
                'ctn_size' => '60*40*38',
                'ctn_weight' => '1.2',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1.15',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 2,
                'ctn_size' => '60.5*40*20',
                'ctn_weight' => '1.26',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
            [
                'brand_id' => 2,
                'ctn_size' => '60.5*40*37.5',
                'ctn_weight' => '1.46',
                'type' => 'APPAREL',
                'ctn_specification' => 'A=A 200LB',
                'ctn_fob' => '1',
                'ctn_code_1001' => '',
                'ctn_code_1004' => '',
            ] ,
        ];

        foreach($cartons as $carton){
            Carton::create($carton);
        }
    }
}
