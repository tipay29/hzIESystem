<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carton_orders', function (Blueprint $table) {
            $table->id();
            $table->string('ctn_bill_code');
            $table->date('ctn_order_date');
            $table->date('ctn_delivery_date');
            $table->text('ctn_instruction');
            $table->text('ctn_remarks');
            $table->unsignedInteger('supplier_id')->default(1);
            $table->unsignedInteger('user_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carton_orders');
    }
};
