<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->string('bank_details_id')->nullable();
            $table->string('affiliate_commision')->nullable();
            $table->string('admin_commision')->nullable();
            $table->text('additional_details_for_lba')->nullable();
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
            $table->dropColumn('bank_details_id');
            $table->dropColumn('affiliate_commision');
            $table->dropColumn('admin_commision');
            $table->dropColumn('additional_details_for_lba');
        });
    }
}
