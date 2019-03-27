<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->nullable();
            $table->string('departed_from_id')->nullable();
            $table->string('final_destination_id')->nullable();
            $table->boolean('is_direct_flight')->nullable();
            $table->string('selected_connection_iata_codes')->nullable();
            $table->string('what_happened_to_the_flight')->nullable();
            $table->string('total_delay')->nullable();
            $table->string('reason')->nullable();
            $table->boolean('is_rerouted')->nullable();
            $table->boolean('is_obtain_full_reimbursement')->nullable();

            // new add for flight cancelation 
            $table->boolean('is_notify_before_forteen_days')->default(0)->nullable();        
                
            // new add for delayed luggage  
            $table->boolean('is_already_written_airline')->default(0)->nullable();
            $table->string('written_airline_date')->nullable();
            $table->string('pir')->nullable();
            $table->string('received_luggage_date')->nullable();
            $table->string('correspondence_property_irregularity_report')->nullable();

            $table->string('ticket_price')->nullable();
            $table->string('ticket_currency')->nullable();
            $table->string('rerouted_ticket_price')->nullable();
            $table->string('rerouted_ticket_currency')->nullable();
            $table->boolean('is_paid_for_rerouting')->nullable();
            $table->string('spend_on_accommodation')->nullable();
            $table->string('here_from_where')->nullable();
            $table->boolean('is_contacted_airline')->nullable();
            $table->string('what_happened')->nullable();
            $table->string('correspondence_ids_file')->nullable();
            $table->string('correspondence_travel_doc_file')->nullable();
            $table->string('correspondence_proof_of_expense_file')->nullable();
            $table->string('correspondence_others_file')->nullable();
            $table->string('claim_table_type')->nullable();
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
        Schema::drop('claims');
    }
}
