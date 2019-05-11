<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAgainFieldsToCustomerComposerFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_composer_files', function (Blueprint $table) {
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
        Schema::table('customer_composer_files', function (Blueprint $table) {
            $table->dropColumn('from_name');
            $table->dropColumn('to_email');
        });
    }
}
