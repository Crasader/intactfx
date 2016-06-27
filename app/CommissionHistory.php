<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommissionHistory extends Model
{

    protected $table = 'intact_commission_history_table';
	
    protected $fillable = [
    	'eoffice_id', 'volume', 'account_type', 'level1', 'level2', 'level3', 'level4', 'level5'
    ];
    
}
