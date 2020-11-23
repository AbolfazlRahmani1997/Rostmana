<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('name','25');
            $table->string('photo');
            $table->integer('typeplant')->unsigned();
            $table->unsignedFloat('temp');
            $table->unsignedFloat('light');
            $table->unsignedFloat('humidity_soil');
            $table->unsignedFloat('humidity_air');
            $table->integer('type_soil')->unsigned();
            $table->integer('type_fertilizer')->unsigned();
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
        Schema::dropIfExists('plants');
    }
}
