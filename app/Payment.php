<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'intact_payment_table';

    protected $fillable = [
    	'id',
        'payment_id',
        'funding_service',
        'payee_account',
        'payment_amount',
        'payment_units',
        'payment_batch_num',
        'payor_account',
        'confirm',
        'timestamp_gmt',
        'hash'
    ];

}
