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
    protected $fillable = ['user_id', 'name', 'iata_code', '3_digit_code', 'country', 'continent', 'sub_continent', 'latitude', 'longitude'];

    
}
