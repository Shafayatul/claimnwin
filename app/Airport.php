<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'airports';

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
    protected $fillable = ['user_id', 'name', 'iata_code', 'icao_code', 'country', 'municipality', 'home_link','wikipedia_link','type', 'latitude', 'longitude'];


}
