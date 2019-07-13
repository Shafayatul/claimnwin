<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Faq extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'faqs';

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
    protected $fillable = ['title', 'content'];
    protected static $logAttributes = ['title', 'content'];

    
}
