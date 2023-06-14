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
        Schema::create('carton_order_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('carton_order_id')->default(1);
            $table->unsignedInteger('carton_id')->default(1);
            $table->string('ctn_factory_po')->nullable();
            $table->string('ctn_dc_code')->nullable();
            $table->text('ctn_po_cut')->nullable();
            $table->string('ctn_material')->nullable();
            $table->text('ctn_description')->nullable();
            $table->text('ctn_style_size')->nullable();
            $table->integer('ctn_po_quantity')->nullable();
            $table->integer('ctn_quantity_per_carton')->nullable();
            $table->integer('ctn_quantity')->nullable();
            $table->double('ctn_nw_one')->nullable();
            $table->double('ctn_gw_one')->nullable();
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
        Schema::dropIfExists('carton_order_contents');
    }
};
