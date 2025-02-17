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
        Schema::create('cartons', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('brand_id');
            $table->string('ctn_size');
            $table->float('ctn_weight');
            $table->string('type')->nullable();
            $table->string('ctn_specification')->nullable();
            $table->float('ctn_fob')->default(1.1);
            $table->string('ctn_code_1001')->nullable();
            $table->string('ctn_code_1004')->nullable();
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
        Schema::dropIfExists('cartons');
    }
};
