<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCarParkSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_car_park_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime("start_time");
            $table->dateTime("end_time")->nullable();
            $table->integer("user_id")->unsigned();
            $table->integer("carpark_id")->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('carpark_id')->references('id')->on('car_parks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_car_park_sessions');
    }
}
