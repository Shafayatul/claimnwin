<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Flight extends Model
{
    use LogsActivity;
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
    protected $fillable = ['user_id', 'flight_no', 'date', 'scheduled_departure_time_and_date', 'actual_departure_time_and_date', 'scheduled_arrival_time_and_date', 'actual_arrival_time_and_date', 'airline_id'];
    protected static $logAttributes = ['user_id', 'flight_no', 'date', 'scheduled_departure_time_and_date', 'actual_departure_time_and_date', 'scheduled_arrival_time_and_date', 'actual_arrival_time_and_date', 'airline_id'];


}
