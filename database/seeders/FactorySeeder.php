<?php

namespace Database\Seeders;


use App\Models\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factories = [
                [
                    'factory_number' => '0000721415',
                    'key_name' => 'Cambodia',
                    'name' => 'HORIZON OUTDOOR (CAMBODIA) CO., LTD.',
                    'address_one' => 'Phoum Psar Trach, National road NO.5,',
                    'address_two' => 'Khum LoungVek, Srok Kompong Trach,',
                    'address_three' => 'Kompong Chhnang Province,',
                    'address_four' => 'Cambodia',

                ] ,
                [
                    'factory_number' => '0000721414',
                    'key_name' => 'Ningbo',
                    'name' => 'Ningbo Horizon Outdoor Production Co., Ltd.',
                    'address_one' => 'NO.166 LongJiao Shan Road,',
                    'address_two' => 'BeiLun, Ningbo, ',
                    'address_three' => 'Post Code 315800',
                    'address_four' => 'China',
                ] ,
                [
                    'factory_number' => '0000755347',
                    'key_name' => 'Vicmark',
                    'name' => 'Vicmark Fashion Cambodia Co. LTD',
                    'address_one' => 'Lot 2071, Plov Lum, Prey Pring Village',
                    'address_two' => 'Sangkat Chom Chao 3, Khan Por Senchey',
                    'address_three' => 'Pnhom Penh, ',
                    'address_four' => 'Cambodia',
                ] ,
            ];

        foreach($factories as $factory){
            Factory::create($factory);
        }
    }
}
