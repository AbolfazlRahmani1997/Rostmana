<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('name');
            $table->unsignedFloat('temp');
            $table->unsignedFloat('light');
            $table->unsignedFloat('humidity_soil');
            $table->unsignedFloat('humidity_air');
            $table->boolean('fan_status');
            $table->boolean('fogger_status');
            $table->unsignedBigInteger('builder_id');
            $table->foreign('builder_id')->references('id')->on('builders');
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
        Schema::dropIfExists('logs');
    }
}
