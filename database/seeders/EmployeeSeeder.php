<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            [
                'id' => 1,
                'name' => 'Warren Hernandez',
                'phone' => mt_rand(1,9999999999),
                'job_id' => 1,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Admin admin',
                'phone' => mt_rand(1,9999999999),
                'job_id' => 6,
                'building_id' => 4,
                'user_id' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Nina',
                'phone' => mt_rand(1,9999999999),
                'job_id' => 1,
                'building_id' => 5,
                'user_id' => 1,
            ],
            [
                'id' => 1075,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 1076,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 1077,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 1130,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 1437,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 1441,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 1678,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 1705,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 1757,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 1760,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 1764,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 1766,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 1767,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3176,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3178,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3180,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3181,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3185,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3187,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3189,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3191,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3192,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3202,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3203,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3204,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3205,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3206,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3207,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3210,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3211,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3212,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3217,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 4151,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 5143,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 5247,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 6473,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 7163,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 7187,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 7356,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 7581,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 9307,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 9345,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 9352,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 12361,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 12365,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 12521,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 13024,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 13635,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 13730,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 13731,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 17436,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 17668,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 19152,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 19339,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 19462,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 19699,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 20271,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 20274,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 20275,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 20277,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3218,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 12359,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 20155,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 22376,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 4651,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 22800,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 22042,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 23660,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 13200,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 16506,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 24298,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 24255,
                'job_id' => 4,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 6474,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 9043,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 9170,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 9245,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 9392,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 9396,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 10014,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 10429,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 10764,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 11379,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 12180,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 12315,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 12316,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 12415,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 12419,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 13195,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 13198,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 13385,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 13638,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 13639,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 13641,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 13722,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 13735,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 13740,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 13834,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 13873,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 14238,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 14239,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 14240,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 14242,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 14245,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 14800,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 14807,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 15770,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 15837,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 15853,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 15855,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 15856,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 15915,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 15951,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 15962,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 16252,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 16279,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 16513,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 16516,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 16528,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 16530,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 16532,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 16773,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 16777,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 17660,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 17664,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 17665,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 17880,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 17883,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 18231,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 19454,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 19456,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 19457,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 19458,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 19459,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 19460,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 19461,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 19708,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 20141,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 20269,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 20273,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 16529,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 17163,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 15840,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 15745,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 20270,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 19528,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 21311,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 21312,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 21313,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 21315,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 21316,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 21486,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 21904,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 21903,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 21169,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 17872,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 22555,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 22592,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 22598,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 22788,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 21984,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 22375,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 23042,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 23053,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 23646,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 23647,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 23648,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 13643,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 21314,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 16514,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 23698,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 23700,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 23707,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 23923,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 23842,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 24184,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 23840,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 23838,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 23836,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 23895,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 24232,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 24233,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 24261,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 24241,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 24425,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 24359,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 23467,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 3186,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 24663,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 24777,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 24991,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],
            [
                'id' => 24992,
                'job_id' => 5,
                'building_id' => 2,
                'user_id' => 1,
            ],

        ];

        foreach($employees as $employee){
            Employee::create($employee);
        }
    }
}
