<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{

    protected $table = 'intact_commission_table';
	
    protected $fillable = [
    	'from_mt4login_id','from_eoffice','to_eoffice','commission_type', 'account_type', 'volume','amount'
    ];
    
}
