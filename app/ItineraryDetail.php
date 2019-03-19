<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItineraryDetail extends Model
{
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

    
}
