<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SentEmail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sent_emails';

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
    protected $fillable = ['body', 'claim_id'];

    
}
