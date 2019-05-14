<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDepartureTimeToItineraryDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('itinerary_details', function (Blueprint $table) {
            $table->string('departure_time')->nullable();
            $table->string('arival_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('itinerary_details', function (Blueprint $table) {
            $table->dropColumn('departure_time');
            $table->dropColumn('arival_time');
        });
    }
}
