<?php

namespace Database\Seeders;

use App\Models\PurchaseOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $purchase_orders = [
            [
                'purchase_order' => 123
            ] ,
            [
                'purchase_order' => 1112
            ] ,
            [
                'purchase_order' => 110
            ] ,
            [
                'purchase_order' => 113
            ] ,
            [
                'purchase_order' => 131
            ] ,

        ];

        foreach($purchase_orders as $purchase_order){
            PurchaseOrder::create($purchase_order);

        }
    }
}
