<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'brand_name' => 'TNF',
                'brand_code' => 'NF',
                'brand_type' => 'APPAREL,EQUIPMENT',
            ] ,
            [
                'brand_name' => 'VANS',
                'brand_code' => 'VN',
                'brand_type' => 'APPAREL,EQUIPMENT',
            ] ,
            [
                'brand_name' => 'JANSPORT',
                'brand_code' => 'JS',
                'brand_type' => 'EQUIPMENT',
            ] ,
            [
                'brand_name' => 'KIPLING',
                'brand_code' => 'K',
                'brand_type' => 'EQUIPMENT',
            ] ,
            [
                'brand_name' => 'EASTPAK',
                'brand_code' => 'EK',
                'brand_type' => 'EQUIPMENT',
            ] ,
            [
                'brand_name' => 'DICKIES',
                'brand_code' => 'DK',
                'brand_type' => 'APPAREL,EQUIPMENT',
            ] ,
            [
                'brand_name' => 'NAPAPIJRI',
                'brand_code' => 'NP',
                'brand_type' => 'APPAREL',
            ] ,
            [
                'brand_name' => 'ADVANTUS',
                'brand_code' => 'AD',
                'brand_type' => 'APPAREL',
            ] ,
        ];

        foreach($brands as $brand){
            Brand::create($brand);
        }
    }
}
