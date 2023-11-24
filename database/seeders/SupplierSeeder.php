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
        $suppliers = [
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

        $suppliers_ningbo = [
            [
                'name_ch' => '宁波市鄞州丰顺纸箱厂',
                'name_en' => '',
                'address_one' => '宁波市鄞州区塘溪镇管江村',
                'address_two' => '浙江省宁波市',
                'address_three' => '',
                'attn' => '钱丰',
                'phone' => '13306611613',
                'email' => '13306611613@163.com',
                'remark' => '',
            ],
        ];

        $factory_number = Factory::where('active',1)->first()->factory_number;
        if($factory_number === "0000721415"){
            foreach($suppliers as $supplier){
                Supplier::create($supplier);
            }
        }elseif($factory_number === "0000721414"){
            foreach($suppliers_ningbo as $supplier){
                Supplier::create($supplier);
            }
        }
    }
}
