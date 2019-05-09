<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerComposerFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_composer_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('claim_id')->nullable();
            $table->longText('compose_text')->nullable();
            $table->string('compose_file')->nullable();
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
        Schema::dropIfExists('customer_composer_files');
    }
}
