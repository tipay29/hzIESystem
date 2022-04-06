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
        Schema::create('employees', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->string('name');
            $table->bigInteger('phone');
            $table->unsignedInteger('job_id');
            $table->unsignedInteger('building_id');
            $table->text('address')->nullable();
            $table->date('birthday')->nullable();
            $table->date('join_date')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('user_account_id')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
