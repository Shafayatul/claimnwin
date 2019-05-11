<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAgainFieldsToAirlineComposeFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('airline_compose_files', function (Blueprint $table) {
            $table->string('from_name')->nullable();
            $table->string('to_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('airline_compose_files', function (Blueprint $table) {
            $table->dropColumn('from_name');
            $table->dropColumn('to_email');
        });
    }
}
