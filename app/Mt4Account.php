<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mt4Account extends Model
{
    protected $table = 'intact_mt4accounts';

    protected $fillable = [
        'id', 'eoffice_id', 'account_type', 'balance'
    ];

}
