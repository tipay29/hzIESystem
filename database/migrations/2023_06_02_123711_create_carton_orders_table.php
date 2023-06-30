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
            $table->string('ctn_bill_code')->nullable();
            $table->date('ctn_order_date')->nullable();
            $table->date('ctn_delivery_date')->nullable();
            $table->text('ctn_instruction')->nullable();
            $table->text('ctn_remarks')->nullable();
            $table->text('ctn_buy_month')->nullable();
            $table->text('ctn_buy_year')->nullable();
            $table->unsignedInteger('brand_id')->nullable();
            $table->text('ctn_type')->nullable();
            $table->text('ctn_status')->nullable()->default('Open');
            $table->dateTime('ctn_approve_date')->nullable();
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
