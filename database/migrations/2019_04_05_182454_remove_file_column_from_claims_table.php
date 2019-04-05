<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveFileColumnFromClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->dropColumn('correspondence_ids_file');
            $table->dropColumn('correspondence_travel_doc_file');
            $table->dropColumn('correspondence_proof_of_expense_file');
            $table->dropColumn('correspondence_others_file');
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
            $table->string('correspondence_ids_file')->nullable();
            $table->string('correspondence_travel_doc_file')->nullable();
            $table->string('correspondence_proof_of_expense_file')->nullable();
            $table->string('correspondence_others_file')->nullable();
        });
    }
}
