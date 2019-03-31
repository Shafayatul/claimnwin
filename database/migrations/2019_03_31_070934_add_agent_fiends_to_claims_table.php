<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAgentFiendsToClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('claims', function (Blueprint $table) {
          $table->string('ip')->nullable();
          $table->string('browser')->nullable();
          $table->string('language')->nullable();
          $table->string('os')->nullable();
          $table->boolean('is_deleted')->default(0)->nullable();
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
          $table->dropColumn('ip');
          $table->dropColumn('browser');
          $table->dropColumn('language');
          $table->dropColumn('os');
          $table->dropColumn('is_deleted');
        });
    }
}
