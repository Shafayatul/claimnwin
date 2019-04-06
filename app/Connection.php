<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Connection extends Model
{
    use LogsActivity;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'connections';

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
    protected $fillable = ['claim_id', 'airport_id'];
    protected static $logAttributes = ['claim_id', 'airport_id'];

    
}
