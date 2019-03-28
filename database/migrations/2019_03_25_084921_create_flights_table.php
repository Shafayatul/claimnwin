<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->nullable();
            $table->string('flight_no')->nullable();
            $table->string('date')->nullable();
            $table->string('scheduled_departure_time_and_date')->nullable();
            $table->string('actual_departure_time_and_date')->nullable();
            $table->string('scheduled_arrival_time_and_date')->nullable();
            $table->string('actual_arrival_time_and_date')->nullable();
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
        Schema::drop('flights');
    }
}
