<?php

namespace Database\Seeders;

use App\Models\Style;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $styles = [
            [
                'style_code' => 'ASS3S'
            ] ,
            [
                'style_code' => 'CG55'
            ] ,
            [
                'style_code' => 'A3BTJ'
            ] ,
            [
                'style_code' => 'A43TB'
            ] ,
            [
                'style_code' => 'A5GCW'
            ] ,
            [
                'style_code' => 'A4STK'
            ] ,
            [
                'style_code' => 'A4QEY'
            ] ,
            [
                'style_code' => 'EK818',
            ] ,
            [
                'style_code' => 'MRCT9931'
            ] ,
            [
                'style_code' => 'A2SDD'
            ] ,

        ];

        foreach($styles as $style){
            Style::create($style);

        }

        $styles = Style::all();

        foreach($styles as $key => $style){
            $style->purchase_orders()->sync($key+1);
            $style->placements()->sync([$key+1,$key+3]);
            $style->fabric_colors()->sync([$key+1,$key+3]);
            $style->fabric_codes()->sync([$key+1,$key+2]);
            $style->fabric_types()->sync(4);
        }

    }
}
