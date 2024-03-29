<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class BankAccount extends Model
{
    use LogsActivity;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bank_accounts';

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
    protected $fillable = ['user_id', 'account_name', 'bank_name', 'iban_no', 'swift_bic_code', 'currency_of_account', 'status'];
    protected static $logAttributes = ['user_id', 'account_name', 'bank_name', 'iban_no', 'swift_bic_code', 'currency_of_account', 'status'];

    
}
