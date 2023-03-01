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
        Schema::create('sizeables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('sizeable_id');
            $table->string('sizeable_type');
            $table->float('weight')->nullable();
            $table->integer('mcq')->nullable();
            $table->unsignedInteger('carton_id')->nullable();
            $table->unsignedInteger('size_style_carton_id')->nullable();
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
        Schema::dropIfExists('sizeables');
    }
};
