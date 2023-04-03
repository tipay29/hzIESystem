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
        Schema::create('packing_lists', function (Blueprint $table) {
            $table->id();
            $table->text('pl_po_cut')->nullable();
            $table->string('pl_master_po')->nullable();
            $table->string('pl_factory_po')->nullable();
            $table->string('pl_sku')->nullable();
            $table->string('pl_material')->nullable();
            $table->text('pl_description')->nullable();
            $table->string('pl_color')->nullable();
            $table->string('pl_style_size')->nullable();
            $table->string('pl_country')->nullable();
            $table->string('pl_country_two')->nullable();
            $table->string('pl_destination')->nullable();
            $table->date('pl_crd')->nullable();
            $table->BigInteger('pl_order_quantity')->nullable();
            $table->double('pl_nw_one')->nullable();
            $table->double('pl_nw_two')->nullable();
            $table->double('pl_gw_one')->nullable();
            $table->double('pl_gw_two')->nullable();
            $table->integer('pl_pre_pack')->nullable();
            $table->string('pl_brand')->nullable();
            $table->string('pl_type')->nullable();
            $table->text('pl_remarks')->nullable();
            $table->text('pl_special_packs')->nullable();
            $table->string('pl_status')->default('Draft');
            $table->string('pl_shipment_mode')->nullable();
            $table->string('pl_season')->nullable();
            $table->integer('pl_batch')->nullable();
            $table->string('pl_buy_month')->nullable();
            $table->integer('pl_buy_year')->nullable();
            $table->integer('pl_number_batch')->nullable();
            $table->integer('pl_uniq_number_batch_number')->nullable();
            $table->integer('pl_uniq_number_batch')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('packing_lists');
    }
};
