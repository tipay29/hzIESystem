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
        Schema::create('po_traces', function (Blueprint $table) {
            $table->id();
            $table->string('factory_po')->nullable();
            $table->string('po_number')->nullable();
            $table->string('style_code')->nullable();
            $table->string('style_description')->nullable();
            $table->string('style_color')->nullable();
            $table->string('style_color_name')->nullable();
            $table->string('size')->nullable();
            $table->string('original_quantity')->nullable();
            $table->string('accumulate_quantity')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('po_traces');
    }
};
