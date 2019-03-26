<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItineraryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerary_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('claim_id')->nullable();
            $table->string('airline_id')->nullable();
            $table->string('flight_number')->nullable();
            $table->string('flight_segment')->nullable();
            $table->string('departure_date')->nullable();
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
        Schema::drop('itinerary_details');
    }
}
