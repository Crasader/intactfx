<?php
namespace App\Repositories;


use App\Validation;
use Carbon\Carbon;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\Auth;

class SmsRepository
{
	protected $username;
    protected $password;
    protected $url;
    protected $port;

	public function __construct()
    {
       $this->username = env('BULKSMS_USERNAME');
       $this->password = env('BULKSMS_PASSWORD');
       $this->url = env('BULKSMS_URL');
       $this->port = env('BULKSMS_PORT');
    }

	public function sendValidation($phone){
		
		$user = Auth::user();

		$validation_code = $this->generateRandomString();

		$msg = "Your Validation code is: " . $validation_code;

		//delete old validation_code
		Validation::where('eoffice_id', $user->account->id)->update(['is_deleted' => 1]);

		//create new validation_code
		$validation = Validation::create([
           'eoffice_id' => $user->account->id,
           'user_id' =>  $user->id,
           'validationcode' => $validation_code
        ]);
		
		$post_body = $this->seven_bit_sms( $this->get_username(), $this->get_password(), $msg, $phone );

		$result = $this->send_message( $post_body, $this->get_url(), $this->get_port() );

		$result['text_message'] = $msg;

		if( $result['success'] ) {

		  $result['message'] = $this->formatted_server_response( $result );

		}
		else {
			//delete all validation code
			$validation->is_deleted = 1;
			$validation->save();

			//return error
			$result['message'] = $this->formatted_server_response( $result );

		}

		return $result;

	}

	public function sendOtp($phone){
		
		$user = Auth::user();

		$otp_code = $this->generateOtp();

		$msg = "Your One-Time Password code is: " . $otp_code . ". It will expire upon logout. Please Keep your OTP confidential. Call IntactFX support if you did not request for your OTP";

		//delete old validation_code
		Validation::where('eoffice_id', $user->account->id)->update(['is_deleted' => 1]);

		//create new validation_code
		$validation = Validation::create([
           'eoffice_id' => $user->account->id,
           'user_id' =>  $user->id,
           'otp' => $otp_code
        ]);
		
		$post_body = $this->seven_bit_sms( $this->get_username(), $this->get_password(), $msg, $phone );

		$result = $this->send_message( $post_body, $this->get_url(), $this->get_port() );

		$result['text_message'] = $msg;

		if( $result['success'] ) {

		  $result['message'] = $this->formatted_server_response( $result );

		}
		else {
			//delete all validation code
			$validation->is_deleted = 1;
			$validation->save();

			//return error
			$result['message'] = $this->formatted_server_response( $result );

		}

		return $result;

	}

	protected function seven_bit_sms ( $username, $password, $message, $msisdn ) {
		
		$post_fields = array (
			'username' => $username,
			'password' => $password,
			'message'  => $this->character_resolve( $message ),
			'msisdn'   => $msisdn,
			'allow_concat_text_sms' => 0, # Change to 1 to enable long messages
			'concat_text_sms_max_parts' => 2
		);

		return $this->make_post_body($post_fields);

	}

	protected function character_resolve($body) {
		$special_chrs = array(
			'Δ'=>'0xD0', 'Φ'=>'0xDE', 'Γ'=>'0xAC', 'Λ'=>'0xC2', 'Ω'=>'0xDB',
			'Π'=>'0xBA', 'Ψ'=>'0xDD', 'Σ'=>'0xCA', 'Θ'=>'0xD4', 'Ξ'=>'0xB1',
			'¡'=>'0xA1', '£'=>'0xA3', '¤'=>'0xA4', '¥'=>'0xA5', '§'=>'0xA7',
			'¿'=>'0xBF', 'Ä'=>'0xC4', 'Å'=>'0xC5', 'Æ'=>'0xC6', 'Ç'=>'0xC7',
			'É'=>'0xC9', 'Ñ'=>'0xD1', 'Ö'=>'0xD6', 'Ø'=>'0xD8', 'Ü'=>'0xDC',
			'ß'=>'0xDF', 'à'=>'0xE0', 'ä'=>'0xE4', 'å'=>'0xE5', 'æ'=>'0xE6',
			'è'=>'0xE8', 'é'=>'0xE9', 'ì'=>'0xEC', 'ñ'=>'0xF1', 'ò'=>'0xF2',
			'ö'=>'0xF6', 'ø'=>'0xF8', 'ù'=>'0xF9', 'ü'=>'0xFC',
		);

		$ret_msg = '';
		if( mb_detect_encoding($body, 'UTF-8') != 'UTF-8' ) {
			$body = utf8_encode($body);
		}
		for ( $i = 0; $i < mb_strlen( $body, 'UTF-8' ); $i++ ) {
			$c = mb_substr( $body, $i, 1, 'UTF-8' );
			if( isset( $special_chrs[ $c ] ) ) {
				$ret_msg .= chr( $special_chrs[ $c ] );
			}
			else {
				$ret_msg .= $c;
			}
		}

		return $ret_msg;
	}

	protected function make_post_body($post_fields) {

		$stop_dup_id = $this->make_stop_dup_id();
		if ($stop_dup_id > 0) {
		$post_fields['stop_dup_id'] = $this->make_stop_dup_id();
		}
		$post_body = '';
		foreach( $post_fields as $key => $value ) {
		$post_body .= urlencode( $key ).'='.urlencode( $value ).'&';
		}
		$post_body = rtrim( $post_body,'&' );

		return $post_body;

	}

	protected function make_stop_dup_id() {
	  return 0;
	}

	protected function send_message ( $post_body, $url, $port ) {
		
		/*
		* Do not supply $post_fields directly as an argument to CURLOPT_POSTFIELDS,
		* despite what the PHP documentation suggests: cUrl will turn it into in a
		* multipart formpost, which is not supported:
		*/

		$ch = curl_init( );
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_PORT, $port );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_body );
		// Allowing cUrl funtions 20 second to execute
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 20 );
		// Waiting 20 seconds while trying to connect
		curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 20 );

		$response_string = curl_exec( $ch );
		$curl_info = curl_getinfo( $ch );

		$sms_result = array();
		$sms_result['success'] = 0;
		$sms_result['details'] = '';
		$sms_result['transient_error'] = 0;
		$sms_result['http_status_code'] = $curl_info['http_code'];
		$sms_result['api_status_code'] = '';
		$sms_result['api_message'] = '';
		$sms_result['api_batch_id'] = '';

		if ( $response_string == FALSE ) {
			$sms_result['details'] .= "cURL error: " . curl_error( $ch ) . "\n";
		} elseif ( $curl_info[ 'http_code' ] != 200 ) {
			$sms_result['transient_error'] = 1;
			$sms_result['details'] .= "Error: non-200 HTTP status code: " . $curl_info[ 'http_code' ] . "\n";
		}
		else {

			$sms_result['details'] .= "Response from server: $response_string\n";
			$api_result = explode( '|', $response_string );
			$status_code = $api_result[0];
			$sms_result['api_status_code'] = $status_code;
			$sms_result['api_message'] = $api_result[1];

			if ( count( $api_result ) != 3 ) {

				$sms_result['details'] .= "Error: could not parse valid return data from server.\n" . count( $api_result );

			} else {
				
				if ($status_code == '0') {
					$sms_result['success'] = 1;
					$sms_result['api_batch_id'] = $api_result[2];
					$sms_result['details'] .= "Message sent - batch ID $api_result[2]\n";
				}
				else if ($status_code == '1') {
					# Success: scheduled for later sending.
					$sms_result['success'] = 1;
					$sms_result['api_batch_id'] = $api_result[2];
				}
				else {
					$sms_result['details'] .= "Error sending: status code [$api_result[0]] description [$api_result[1]]\n";
				}
			}
		}

		curl_close( $ch );

		return $sms_result;
	}

	protected function formatted_server_response( $result ) {
		$this_result = "";

		if ($result['success']) {
			$this_result .= "Success: batch ID " .$result['api_batch_id']. "API message: ".$result['api_message']. "\nFull details " .$result['details'];
		}
		else {
			$this_result .= "Fatal error: HTTP status " .$result['http_status_code']. ", API status " .$result['api_status_code']. " API message " .$result['api_message']. " full details " .$result['details'];

			if ($result['transient_error']) {
				$this_result .=  "This is a transient error - you should retry it in a production environment";
			}
		}

		return $this_result;
	}

	protected function print_ln($content) {
		if (isset($_SERVER["SERVER_NAME"])) {
			print $content."<br />";
		}
		else {
			print $content."\n";
		}
	}

	private function generateRandomString($length = 6) {
	    return substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	}

	private function generateOtp($length = 6) {
	    return substr(str_shuffle("0123456789"), 0, $length);
	}

	private function get_username(){
        return $this->username;
    }

    private function get_password(){
        return $this->password;   
    }

    private function get_url(){
        return $this->url;   
    }

    private function get_port(){
        return $this->port;   
    }

   
}