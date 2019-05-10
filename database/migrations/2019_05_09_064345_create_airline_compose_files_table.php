<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirlineComposeFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airline_compose_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('claim_id')->nullable();
            $table->longText('airline_compose_text')->nullable();
            $table->string('airline_compose_file')->nullable();
            $table->string('from_email')->nullable();
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
        Schema::dropIfExists('airline_compose_files');
    }
}
