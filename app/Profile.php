<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Profile extends Authenticatable
{
    protected $table = 'intact_user_profile';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'account_stat', 
        'profile_picture_url', 
        'identity_file_url', 
        'address_file_url', 
        'last_name', 
        'first_name', 
        'gender', 
        'birthdate', 
        'phone_number', 
        'email', 
        'address', 
        'address2', 
        'city', 
        'state', 
        'country', 
        'zipcode', 
        'skype_id', 
        'icq_number', 
        'twitter_username', 
        'google_email', 
        'facebook_url', 
        'instagram_url', 
        'bank_name', 
        'bank_account', 
        'bank_fullname', 
        'bank_swiftcode', 
        'bank_country', 
        'bank_state', 
        'netteller', 
        'skrill', 
        'perfect_money'
    ];

    
}
