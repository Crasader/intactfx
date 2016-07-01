<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Merchant;
use App\Payment;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;

class MerchantExchangerController extends Controller
{

	/**
	* Create a new controller instance.
	*
	* @return void
	*/
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function generateCode(Request $request){

        $user = Auth::user();

        $amount = $request->amount;
        
        $code = $this->generateRandomString();

        Merchant::create([
            'eoffice_id' => $user->account->id,
            'type' => 'code',
            'amount'  => $amount,
            'code' => $code, 
            'consumed' => false,
        ]);

        return $code;

    }

    public function codeTracking(){
        $user = Auth::user();
        $merchant = Merchant::where('type', 'code')
                    ->where('eoffice_id', $user->account->id)
                    ->get();

        return $merchant;
    }

    public function checkCode(Request $request){

        $count = Merchant::where('code', $request->code)->first();

        if ($count) {
            $merchant = Merchant::where('code', $request->code)->first();
            if ($merchant->consumed==1) {

                $return['status'] = 'consumed';

            }else{

                $amount = $merchant->amount;
                $return['amount'] = $amount;
                $return['status'] = 'available';

            }

        }else{

            $return['status'] = 'empty';

        }

        return $return;

    }

    public function depositcode(Request $request){

        $merchant = Merchant::where('code', $request->code)->first();

        $payment = $this->deposit($merchant);

        $merchant->consumed = 1;
        $merchant->save();

        return 'success';
    }

    /**
     * [generate 15 alphanumeric char]
     * @param  integer $length  [description]
     * @return [string]          [description]
     */
    private function generateRandomString($length = 15) {
	    return substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	}

    private function deposit($merchant){

        $user = Auth::user();

        $eoffice_id = $user->account->id;

        $payment =  Payment::create([

            'id' => Faker::create()->randomNumber($nbDigits = 9),
            'payment_id' =>  Faker::create()->randomNumber($nbDigits = 6),
            'funding_service'  => 'merchant_exchanger',
            'type'  => 'deposit',
            'email'  => $user->email,
            'payee_account'  => '',
            'payment_amount'  => $merchant->amount,
            'payment_units'  => 'USD',
            'payor_account'  =>  '',
            'confirm' => 0,
            'notes' => 'merchant exchanger deposit',

        ]);

        return $payment;

    }

}
