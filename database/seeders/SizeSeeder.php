<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{

    public function run()
    {
        $sizes = [
            [
                'size' => 'OS'
            ] ,
            [
                'size' => 'XXXXXS'
            ] ,
            [
                'size' => 'XXXXS'
            ] ,
            [
                'size' => 'XXXS'
            ] ,
            [
                'size' => 'XXS'
            ] ,
            [
                'size' => 'XS'
            ] ,
            [
                'size' => 'S'
            ] ,
            [
                'size' => 'M'
            ] ,
            [
                'size' => 'L'
            ] ,
            [
                'size' => 'XL'
            ] ,
            [
                'size' => 'XXL'
            ] ,
            [
                'size' => 'XXXL'
            ] ,
            [
                'size' => 'XXXXL'
            ] ,
            [
                'size' => 'XXXXXL'
            ] ,
        ];

        foreach($sizes as $size){
            Size::create($size);
        }
    }
}
