<?php

namespace Database\Seeders;

use App\Models\Cut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cuts = [
            [
                'building_id' => 2,
                'table_num' => 1,
                'marker_length' => 6.01,
                'layer_count' => 18,
                'part_count' => 36,
                'size_ratio' => 8,
                'cut_count' => 1,
                'work_hours' => 10,
                'spread_start' => '22-03-14 10:34:09',
                'spread_end' => '22-03-14 13:34:09',
                'cut_start' => '22-03-14 13:34:09',
                'cut_end' => '22-03-14 14:34:09',
                'user_id' => 1,
            ] ,
            [
                'building_id' => 2,
                'table_num' => 1,
                'marker_length' => 6.56,
                'layer_count' => 20,
                'part_count' => 56,
                'size_ratio' => 12,
                'cut_count' => 1,
                'work_hours' => 10,
                'spread_start' => '22-03-15 14:34:09',
                'spread_end' => '22-03-15 16:34:09',
                'cut_start' => '22-03-15 16:55:09',
                'cut_end' => '22-03-15 17:34:09',
                'user_id' => 1,
            ] ,
        ];

        foreach($cuts as $cut){
            Cut::create($cut);

        }

        $cuts = Cut::all();

        foreach($cuts as $key => $cut){
            $cut->styles()->sync($key+1);
            $cut->purchase_orders()->sync($key+1);
            $cut->placements()->sync([$key+1,$key+3]);
            $cut->fabric_colors()->sync([$key+1,$key+3]);
            $cut->fabric_codes()->sync([$key+1,$key+2]);
            $cut->fabric_types()->sync(mt_rand(1,5));
            $cut->employees()->sync(1,2);
        }
    }
}
