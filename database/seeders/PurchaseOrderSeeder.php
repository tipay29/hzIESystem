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
                'purchase_order' => 124
            ] ,
            [
                'purchase_order' => 125
            ] ,
            [
                'purchase_order' => 126
            ] ,
            [
                'purchase_order' => 131
            ] ,
            [
                'purchase_order' => 132
            ] ,
            [
                'purchase_order' => 133
            ] ,
            [
                'purchase_order' => 134
            ] ,
            [
                'purchase_order' => 135
            ] ,
            [
                'purchase_order' => 141
            ] ,
            [
                'purchase_order' => 142
            ] ,
            [
                'purchase_order' => 143
            ] ,
            [
                'purchase_order' => 144
            ] ,
            [
                'purchase_order' => 145
            ] ,
            [
                'purchase_order' => 155
            ] ,
            [
                'purchase_order' => 156
            ] ,

        ];

        foreach($purchase_orders as $purchase_order){
            PurchaseOrder::create($purchase_order);

        }
    }
}
