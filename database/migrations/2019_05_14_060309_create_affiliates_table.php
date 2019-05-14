<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('affiliate_user_id')->nullable();
            $table->string('claim_id')->nullable();
            $table->string('commision_amount')->nullable();
            $table->string('percentage')->nullable();
            $table->string('received_amount')->nullable();
            $table->tinyInteger('approved')->default(0);
            $table->string('payment_method')->nullable();
            $table->text('addition_description')->nullable();
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
        Schema::dropIfExists('affiliates');
    }
}
