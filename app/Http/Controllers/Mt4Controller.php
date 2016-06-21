<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Mt4Account;
use App\Repositories\Mt4Repository;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Mt4Controller extends Controller
{

	protected $mt4;
	
	/**
	 * load mt4 Repository
	 * @param Mt4Repository $mt4 [description]
	 */
	public function __construct(Mt4Repository $mt4)
    {
        $this->middleware('auth');
        $this->mt4 = $mt4;
    }

   /**
    * create mt4 Account
    * @param  Request $request [description]
    * @return [type]           [description]
    */
   public function createaccount(Request $request){

		$eoffice_id = $request->profile['eoffice_id'];
		$email = $request->profile['email'];
		$group = $request->setSelected['accountType'];
		// echo $group; die();
		// test account for the mean time
		if ($group=='mini') {
			$newgroup = 'demoIntactfx';
			$amount = $request->mt4account['mini'];
		}

		if ($group=='standard') {
			$newgroup = 'demoIntact-eur';
			$amount = $request->mt4account['standard'];
		}

		// $this->emailAccountCreated();
		// echo '<pre>' . print_r($request->mt4account['mini'], 1 ) . '</pre>';

	   	$password = str_random(7);
	   	$password_investor = str_random(7);
	   	   	// echo 'test';
	   	$params['group'] = $newgroup;
		$params['agent'] = $eoffice_id;
		$params['login'] = 0;
		$params['country'] = 'Russia';
		$params['state'] = 'Lenoblast';
		$params['city'] = 'Saint-Petersburg';
		$params['address'] = '18 linia VO';
		$params['name'] = "John Doe";
		$params['email'] = 'test@test.com';
		$params['password'] = $password;
		$params['password_investor'] = $password_investor;
		$params['password_phone'] = '';
		$params['leverage'] = 100;
		$params['zipcode'] = '02217';
		$params['phone'] = '12345678';
		$params['id'] = '';
		$params['comment'] = 'NO COMMENT';

		// $this->emailAccountCreated($params); die();
			
		$answer = $this->mt4->MakeRequest("createaccount", $params);
		
		if($answer['result']!=1)
		{
			print "error ".$answer['reason'];
		}
		else
		{	
			$params['login'] = $answer["login"];

			$this->emailAccountCreated($params);

			$deposit_params['login'] = $answer["login"];
			$deposit_params['value'] = 	$amount;
			$deposit_params['comment']  = 'Intactfx Deposit';	

			$minianswer  = $this->mt4->MakeRequest("changebalance", $deposit_params);

			if($minianswer['result']!=1){
				print "<p style='background-color:#FFEEEE'>An error occured: <b>".$minianswer['reason']."</b>.</p>";
			}else{
				Mt4Account::create([
			        'id' => Faker::create()->numberBetween($min = 10000, $max = 99999),
			        'eoffice_id' => $eoffice_id,
			        'mt4login_id' => $minianswer['login'],
			        'account_type' => $group,
			        'balance' => $minianswer['newbalance'],
			        'password' => $password,
					'password_investor' => $password_investor,
			    ]);
				return $minianswer;
			}

		}

   }

   /**
    * * transferIn money from Main wallet to Mt4 account
    * @param  Request $request [description]
    * @return [type]           [description]
    */
   public function transferIn(Request $request){

		$mt4Account_id = $request->mt4Account_id;
		$value = $request->transferIn;
		// $eoffice_id = $request->profile['eoffice_id'];

		$params['login'] = $mt4Account_id;
		$params['value'] = $value;	
		$params['comment']  = 'Intactfx deposit';	

			
		$answer  = $this->mt4->MakeRequest("changebalance", $params);

		if($answer['result']!=1){
			
			print "<p style='background-color:#FFEEEE'>An error occured: <b>".$answer['reason']."</b>.</p>";
		
		}else{

			$mt4 = Mt4Account::where('mt4login_id', $mt44Account_id)->first();
			$mt4->balance = $answer['newbalance'];
			$mt4->save();
			return $answer;
		}
		
   }

   /**
    * transferOut money from Mt4Account to our Main wallet
    * @param  Request $request [description]
    * @return [type]           [description]
    */
   public function transferOut(Request $request){

		$mt4Account_id = $request->mt4Account_id;
		$value = $request->transferOut * -1;
		// $eoffice_id = $request->profile['eoffice_id'];

		$params['login'] = $mt4Account_id;
		$params['value'] = $value;	
		$params['comment']  = 'Intactfx withdrawal';	

			
		$answer  = $this->mt4->MakeRequest("changebalance", $params);

		if($answer['result']!=1){
			
			print "<p style='background-color:#FFEEEE'>An error occured: <b>".$answer['reason']."</b>.</p>";
		
		}else{

			$mt4 = Mt4Account::where('mt4login_id', $mt4Account_id)->first();
			$mt4->balance = $answer['newbalance'];
			$mt4->save();
			return $answer;
		}
		
		die();
   }

   protected function emailAccountCreated($account){

   		$user = Auth::user();

   		Mail::queue('emails.miniAccountCreated', compact('user', 'account'), function($message) use ($user){
            $message->to($user->email)->subject('Trading Account Created');
        });

   }

   /**
    *  - update all account in intactfx db
    *  - run everytime refreshing the membership panel
    * @param  $eoffice_id [text]
    * @return [text] - 'error' or 'success'
    */
    public function updateAccount(Request $request){

		$eoffice_id = $request->eoffice_id;

		//get all mt4 account from eoffice_id
		$mt4Accounts = Mt4Account::select('mt4login_id')->where('eoffice_id', $eoffice_id)->get();
		
		// loop on all mt4 accounts
		foreach ($mt4Accounts as $mt4) {

			$params['login'] = $mt4['mt4login_id'];
				
			$answer  = $this->mt4->MakeRequest("getaccountinfo", $params);

			if($answer['result']!=1){
				
				print "<p style='background-color:#FFEEEE'>An error occured: <b>".$answer['reason']."</b>.</p>";
				return 'error';
			}else{
				//update balance
				$mt4 = Mt4Account::where('mt4login_id', $mt4['mt4login_id'])->first();
				$mt4->balance = $answer['balance'];
				$mt4->save();

			}
			
		}

		return 'success';
		
   }

   /**
    * change master or investor password
    * @param  Request $request intactfx data
    * @return [text]   return 'error' or 'success'
    */
   public function changepassword(Request $request){
   		
   		$passwordType = $request->setSelected['passwordType'];
   		$mt4Account_id = $request->setSelected['mt4Account_id'];
   		$old_password = $request->profile['sel_password'];
   		$old_investor_password = $request->profile['sel_inpassword'];
   		$new_password = $request->profile['new_password'];

   		//change master password only
   		if ($passwordType=='password') {
   			$params['login'] = $mt4Account_id;
			$params['pass'] = $new_password;	
			$params['investor'] = 0;
   		} else{ //change investor password only
   			$params['login'] = $mt4Account_id;
			$params['pass'] = $old_password;	
			$params['investor'] = $new_password;	
   		}
   		// echo '<pre>' . print_r($params, 1) . '</pre>';
   		// die();
   		$answer  = $this->mt4->MakeRequest("changepassword", $params);

   		if($answer['result']!=1){
			print "<p style='background-color:#FFEEEE'>An error occured: <b>".$answer['reason']."</b>.</p>";
			return 'error';
		}else{
			//update intactfx db
			$mt4 = Mt4Account::where('mt4login_id', $mt4Account_id)->first();
			$mt4->password = $params['pass'];
			$mt4->password_investor = $params['investor']==0 ? $old_investor_password : $params['investor']; //
			$mt4->save();
			return 'success';
		}
   }

   public function pumping(){

   		$params['trades'] = 1;
   		return $this->mt4->MakeRequest("pumping", $params);
   		
   }

}
