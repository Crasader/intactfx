<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMain extends Model
{
    protected $table = 'intact_payment_table_main';

    protected $fillable = [
    	'id',
        'payment_id',
    ];
}
