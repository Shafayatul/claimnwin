<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaimFile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'claim_files';

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
    protected $fillable = ['user_id', 'claim_id', 'name', 'file_name'];

    
}
