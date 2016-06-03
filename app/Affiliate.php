<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    protected $table = 'intact_affiliate';

    protected $fillable = [
        'id', 'eoffice_id', 'affiliate_id'
    ];
    
}
