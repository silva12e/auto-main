<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{

    public function up()
    {
        Schema::create('cars', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->integer('vehicle_id');
            $table->string('make');
            $table->string('model');
            $table->string('year');
            $table->string('odometer_reading');
            $table->string('engine');
            $table->string('color')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
