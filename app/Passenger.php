<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'passengers';

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
    protected $fillable = ['claim_id', 'first_name', 'last_name', 'address', 'post_code', 'date_of_birth', 'email', 'is_booking_reference', 'booking_refernece'];

    
}
