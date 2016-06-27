<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pumping extends Model
{

    protected $table = 'intact_pumpingtrades';
	
    protected $fillable = [
        'mt4login_id', 'symbol', 'profit', 'volume', 'has_read'
    ];
    
}
