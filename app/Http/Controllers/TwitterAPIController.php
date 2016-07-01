<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\TwitterAPI;

class TwitterAPIController extends Controller
{

	public function test()
	{
		$response = [
			'success' => FALSE,
			'data' => []
		];

		try {
			$tweets = TwitterAPI::get_tweets();			
			if ( is_array($tweets) && count($tweets) > 0 ) {
				$response['success'] = TRUE;
				$response['data'] = $tweets;
			} else {
				$response['data'] = [];
			}
		} catch ( Exception $err ) {
			$response['error'] = $err;
		}

		echo json_encode($response);
	}

}
