<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'airlines';

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
    protected $fillable = ['user_id', 'name', 'email', 'iata_code', 'icao_code', 'country', 'phone', 'ability', 'sub_name', 'address_line_1', 'address_line_2', 'address_line_3', 'address_line_4', 'online_form_link', 'status'];

    
}
