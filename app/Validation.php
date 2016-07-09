<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{

    protected $table = 'intact_validation_table';
	
    protected $fillable = [
        'id', 'eoffice_id', 'user_id', 'otp', 'validationcode', 'is_deleted'
    ];
    
}
