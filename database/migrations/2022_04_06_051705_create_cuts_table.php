<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('cuts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('building_id');
            $table->integer('table_num');
            $table->integer('work_hours');
            $table->double('marker_length');
            $table->integer('layer_count');
            $table->integer('part_count');
            $table->integer('size_ratio');
            $table->dateTime('spread_start');
            $table->dateTime('spread_end');
            $table->dateTime('cut_start');
            $table->dateTime('cut_end');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('cuts');
    }
};
