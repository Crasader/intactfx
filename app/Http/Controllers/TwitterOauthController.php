<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SocialAccessTokens;

use App\Libraries\TwitteroAuth_class;

class TwitterOauthController extends Controller
{
    //
    
    public function auth_twitter()
    {
    	\App\Libraries\TwitteroAuth_class::connect_twitter();
    }

    public function auth_callback()
    {
    	\App\Libraries\TwitteroAuth_class::twitter_callback();

    	$social_accesstoken = SocialAccessTokens::where('social_name', '=', 'twitter_oauth')->get();

    	if($social_accesstoken->isEmpty() == false ){

	    	$social_accesstoken[0]->social_name = 'twitter_oauth';
	    	$social_accesstoken[0]->access_token = serialize(session()->get('access_token'));

	    	$social_accesstoken[0]->save();

	    	return redirect('/');

    	}else{
    		$socialaccesstoken = new SocialAccessTokens;

    		$socialaccesstoken->social_name = 'twitter_oauth';
	    	$socialaccesstoken->access_token = serialize(session()->get('access_token'));

	    	$socialaccesstoken->save();

	    	return redirect('/');
    	}

    	
    }

    public static function getFeeds()
    {
    	$t = TwitteroAuth_class::getTwitter_requestAPI('#intactfx');

        $arr = [];
        foreach ($t->statuses as $key => $value) {
            # code...
            $txt = $value->text;
            $txt = str_replace('#intactfx', "", $value->text);
            $arr[$key]['text'] = $txt;
            $arr[$key]['id'] = $value->id;    
        }

        echo json_encode($arr);

        exit();
    }


}
