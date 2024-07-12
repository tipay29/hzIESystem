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
        Schema::create('v2_packing_list_contents', function (Blueprint $table) {
            $table->id();
            $table->string('v2pl_item_num')->nullable();
            $table->string('v2pl_uniq_item_num')->nullable();
            $table->string('v2pl_sku')->nullable();
            $table->string('v2pl_material')->nullable();
            $table->string('v2pl_mat_description')->nullable();
            $table->string('v2pl_color')->nullable();
            $table->string('v2pl_order_qty')->nullable();
            $table->string('v2pl_net_weight')->nullable();
            $table->string('v2pl_total_net_weight')->nullable();
            $table->string('v2pl_gross_weight')->nullable();
            $table->string('v2pl_total_gross_weight')->nullable();
            $table->unsignedInteger('size_id')->nullable();
            $table->unsignedInteger('carton_id')->nullable();
            $table->integer('v2_pl_mcq')->nullable();
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
        Schema::dropIfExists('v2_packing_list_contents');
    }
};
