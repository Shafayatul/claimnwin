<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Claim extends Model
{
    use LogsActivity;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'claims';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'departed_from_id', 'final_destination_id', 'is_direct_flight', 'selected_connection_id', 'what_happened_to_the_flight', 'total_delay', 'reason', 'is_rerouted', 'is_obtain_full_reimbursement', 'ticket_price', 'ticket_currency', 'is_paid_for_rerouting', 'is_spend_on_accommodation', 'is_signed_permission', 'here_from_where', 'here_from_other', 'is_contacted_airline', 'what_happened', 'correspondence_ids_file', 'correspondence_travel_doc_file', 'correspondence_proof_of_expense_file', 'correspondence_others_file'];
    protected static $logAttributes = ['user_id', 'departed_from_id', 'final_destination_id', 'is_direct_flight', 'selected_connection_id', 'what_happened_to_the_flight', 'total_delay', 'reason', 'is_rerouted', 'is_obtain_full_reimbursement', 'ticket_price', 'ticket_currency', 'is_paid_for_rerouting', 'is_spend_on_accommodation', 'is_signed_permission', 'here_from_where', 'here_from_other', 'is_contacted_airline', 'what_happened', 'correspondence_ids_file', 'correspondence_travel_doc_file', 'correspondence_proof_of_expense_file', 'correspondence_others_file'];

    
}
