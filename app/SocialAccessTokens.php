<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class SocialAccessTokens extends Model
{
    //
    protected $table = 'socials_access_token';
    protected $primaryKey = 's_id';

    public $timestamps = false;
    
    protected $fillable = [
        's_id', 'social_name', 'access_token'
    ];
}
