<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwitterAPI extends Model
{

    private $consumer_key = 'rR4rUhiytje3nsUtBJ6Tu2wbB';

	private $consumer_secret = 'Lu5g3fTjdH6gN7cEA4gp2qPYiFTvv8B2Arwua2lW8OK2SjFuA8';

	private static $instance;

	
	public function __construct()
	{

	}


	public static function get_instance()
	{
		if ( !isset(static::$instance) ) {
			static::$instance = new static;
		}
		return static::$instance;
	}


	/**
	 * Performs curl request to retrieve latest tweets
	 * @return [type] [description]
	 */
	public static function get_tweets()
	{
		$access_token = static::get_access_token();

		ob_start();// buffer output

		// Execute CURL
		
		//open connection
		$ch = curl_init();

		//set the url
		curl_setopt($ch,CURLOPT_URL, 'https://api.twitter.com/1.1/search/tweets.json?count=4&q='.urlencode('from:@intactfx'));

		// headers
		curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer {$access_token}"]);

		//execute
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);

		//close connection
		curl_close($ch);

		// capture contents
		$search_result = ob_get_contents();
		ob_end_clean();

		return json_decode($search_result)->statuses;
	}


	/**
	 * Requests Bearer access token from twitter auth
	 * @return string the Bearer access token
	 */
	public static function get_access_token()
	{
		$instance = static::get_instance();

		$encoded_key = urlencode($instance->consumer_key);
		$encoded_secret = urlencode($instance->consumer_secret);

		$concat = "{$encoded_key}:{$encoded_secret}";
		$base64 = base64_encode($concat);

		ob_start();// buffer output

		//-- Execute CURL
		
		//open connection
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, 'https://api.twitter.com//oauth2/token');
		curl_setopt($ch,CURLOPT_POST, 1);
		curl_setopt($ch,CURLOPT_POSTFIELDS, 'grant_type=client_credentials');

		// headers
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded;charset=UTF-8', "Authorization: Basic {$base64}"]);

		//execute post
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);

		//close connection
		curl_close($ch);

		// capture contents
		$contents = ob_get_contents();
		ob_end_clean();

		return json_decode($contents)->access_token;
	}



	
}
