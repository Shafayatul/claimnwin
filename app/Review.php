<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Review extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reviews';

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
    protected $fillable = ['star', 'title', 'description', 'name'];
    protected static $logAttributes = ['star', 'title', 'description', 'name'];

    
}
