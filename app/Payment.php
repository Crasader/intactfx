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
        'type',
        'payee_account',
        'payment_amount',
        'payment_units',
        'payment_batch_num',
        'payor_account',
        'email',
        'confirm',
        'timestamp_gmt',
        'hash',
        'notes'
    ];

    protected $dates = ['created_at', 'updated_at'];

}
