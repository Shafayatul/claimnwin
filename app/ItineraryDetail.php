<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ItineraryDetail extends Model
{
    use LogsActivity;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'itinerary_details';

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
    protected $fillable = ['claim_id', 'airline', 'flight_number', 'departure_date'];
    protected static $logAttributes = ['claim_id', 'airline', 'flight_number', 'departure_date'];

    
}
