<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'flights';

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
    protected $fillable = ['user_id', 'flight_no', 'date', 'scheduled_departure_time', 'actual_departure_time_and_date', 'scheduled_arrival_time_and_date', 'actual_arrival_time_and_date'];

    
}
