<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $table = 'intact_accounts';

    protected $fillable = [
        'id', 'user_id', 'main_wallet', 'commision_wallet', 'iprofit_commision_wallet'
    ];
    
}
