<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::group(['middleware' => ['web', 'auth']], function () {
	Route::get('/', 'HomeController@index');		
	Route::get('/home', 'HomeController@index');		
	Route::get('/pm', 'PaymentPerfectMoneyController@index');
	Route::get('/bitcoin', 'PaymentBitcoinController@index');

	Route::post('fetchtwitterfeeds', 'HomeController@get_twitter_feeds');
});


/**
 * Social Logins
 */
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/callback/{provider}',  'Auth\AuthController@handleProviderCallback');

Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');


/**
 * Funding
 */
Route::post('payment/pm/success', 'PaymentPerfectMoneyController@success');
Route::post('payment/pm/error', 'PaymentPerfectMoneyController@error');

Route::get('payment/bitcoin/success', 'PaymentBitcoinController@success');
Route::post('payment/bitcoin/notification', 'PaymentBitcoinController@notificationEndpoints');
Route::get('payment/bitcoin/coinbase', 'PaymentBitcoinController@coinbase');

Route::get('wireinvoice','PaymentWireController@generateWireInvoice');
Route::post('wire','PaymentWireController@sendWireEmail');

/**
 * Authenticate Twitter
 */
Route::get('twitter-authenticate', 'TwitterOauthController@auth_twitter');
Route::get('twitter-callback', 'TwitterOauthController@auth_callback');


// other routes
Route::get('user/register', 'Auth\AuthController@showLoginFormAffiliate'); 

Route::post('file/upload', 'FileController@upload');

Route::post('create', 'Mt4Controller@createaccount');
Route::get('create', 'Mt4Controller@createaccount');