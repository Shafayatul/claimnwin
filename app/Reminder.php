<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reminders';

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
    protected $fillable = ['user_id', 'claim_id', 'callback_date', 'callback_time', 'note', 'status', 'snooze'];

    
}
