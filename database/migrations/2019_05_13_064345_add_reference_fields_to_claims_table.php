<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferenceFieldsToClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->string('caa_ref')->nullable();
            $table->string('adr_ref')->nullable();
            $table->string('airline_ref')->nullable();
            $table->string('court_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->dropColumn('caa_ref');
            $table->dropColumn('adr_ref');
            $table->dropColumn('airline_ref');
            $table->dropColumn('court_no');
        });
    }
}
