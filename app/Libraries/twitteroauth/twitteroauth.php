<?php 
namespace App\Libraries;

require 'autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

use App\SocialAccessTokens;

define('CONSUMER_KEY', env('TWITTER_CONSUMER_KEY'));
define('CONSUMER_SECRET', env('TWITTER_CONSUMER_SECRET'));
define('OAUTH_CALLBACK', env('TWITTER_OAUTH_CALLBACK'));

class TwitteroAuth_class {

	public $connection;

	public function __construct()
	{
		
	}

	public static function connect_twitter()
	{
		$connection = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'));
		$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => env('TWITTER_OAUTH_CALLBACK')));

		$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));

		session()->put('oauth_token', $request_token['oauth_token']);
		session()->put('oauth_token_secret', $request_token['oauth_token_secret']);

		echo '<a href="'.$url.'">Connect</a>';
	}

	public static function twitter_callback()
	{
		$request_token = [];
		$request_token['oauth_token'] = session()->get('oauth_token');
		$request_token['oauth_token_secret'] = session()->get('oauth_token_secret');

		$connection = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), $request_token['oauth_token'], $request_token['oauth_token_secret']);

		$access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));

		session()->put('access_token', $access_token);
	}

	public static function getTwitter_requestAPI($searchname)
	{
		$getoken = SocialAccessTokens::where('social_name', '=', 'twitter_oauth')->first();

		$access_token = unserialize($getoken->access_token);

		$connection = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), $access_token['oauth_token'], $access_token['oauth_token_secret']);

		return $connection->get('search/tweets', ['q' => $searchname]);
	}
}

?>