<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('v2_packing_lists', function (Blueprint $table) {
            $table->id();
            $table->string('v2pl_factory_po')->nullable();
            $table->string('v2pl_crd')->nullable();
            $table->string('v2pl_country')->nullable();
            $table->string('v2pl_country_two')->nullable();
            $table->string('v2pl_destination')->nullable();
            $table->integer('v2pl_total_order_qty')->nullable(); //combine sizes
            $table->string('v2pl_brand')->nullable();
            $table->string('v2pl_type')->nullable();
            $table->string('v2pl_remarks')->nullable();
            $table->string('v2pl_remarks_two')->nullable();
            $table->string('v2pl_status')->nullable();
            $table->string('v2pl_shipment_mode')->nullable();
            $table->string('v2pl_buy_month')->nullable();
            $table->string('v2pl_buy_year')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('v2_packing_list_batch_id')->nullable();
            $table->integer('v2pl_version')->default(1);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('v2_packing_lists');
    }
};
