<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAgainFieldsToTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('from_email')->nullable();
            $table->string('to_email')->nullable();
            $table->string('priority')->nullable();
            $table->string('ticket_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('from_email');
            $table->dropColumn('to_email');
            $table->dropColumn('priority');
            $table->dropColumn('ticket_status');
        });
    }
}
