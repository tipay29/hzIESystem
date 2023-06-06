<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name_ch' => '永成包装（柬埔寨）有限公司',
                'name_en' => 'WING CHENG PACKAGING CO.,LTD',
                'address_one' => 'National Road $, Tumnup Kop SROV Road',
                'address_two' => 'Phum Chung Rouk, Sangkat Trapeang Krasang, ',
                'address_three' => 'Khan Por Senchey, Phnom Penh, Cambodia',
                'attn' => '唐雪艳',
                'phone' => '0887937999/092786688',
                'email' => 'wingchengxueyan@gmail.com; wingcheng6688@gmail.com',
                'remark' => 'VAT#L2021060941',
            ],
            [
                'name_ch' => '柬华纸箱（柬埔寨）有限公司',
                'name_en' => 'PULIN PACKAGINNG CO.LTD',
                'address_one' => 'St#2004 Phum Trapeang Lvea',
                'address_two' => 'Phnom Penh, Cambodia ',
                'address_three' => 'Cambodia',
                'attn' => 'Lee Heling',
                'phone' => '012-352248',
                'email' => 'jianhuacarton@gmail.com',
                'remark' => 'VAT#901636164',
            ],
            [
                'name_ch' => '东鑫纸业装饰品(柬埔寨)有限公司',
                'name_en' => 'EAST GOLDEN PAPER INDUSTRY (CAMBODIA) CO., LTD',
                'address_one' => 'Phum Peam,Sangkat Prey Sor,Khan Dongkor',
                'address_two' => 'Phnom Penh',
                'address_three' => 'Cambodia',
                'attn' => 'Ah Lian',
                'phone' => '+855 012656638',
                'email' => 'xinding888@gmail.com',
                'remark' => 'VAT#L001-100186432',
            ],

        ];

        foreach($users as $user){
            Supplier::create($user);
        }
    }
}
