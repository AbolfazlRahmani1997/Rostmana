<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('builders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model');
            $table->float('width');
            $table->float('length');
            $table->string('icon');
            $table->unsignedInteger('gender_id');
            $table->unsignedInteger('automode_id');
            $table->unsignedInteger('watermode_id');
            $table->unsignedInteger('picture');
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
        Schema::dropIfExists('builders');
    }
}
