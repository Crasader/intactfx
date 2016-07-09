<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{

    protected $table = 'intact_sms_monitoring';
	
    protected $fillable = [
        'id', 'eoffice_id', 'user_id', 'msg', 'to', 'status', 'batch_id'
    ];
    
}
