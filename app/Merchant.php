<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{

    protected $table = 'intact_merchant_wallet';
	
	protected $fillable = [
        'id', 'eoffice_id', 'type', 'amount', 'code', 'consumed'
    ];
    
}
