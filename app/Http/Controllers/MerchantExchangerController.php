<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Merchant;
use Illuminate\Http\Request;
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

    /**
     * [generate 15 alphanumeric char]
     * @param  integer $length  [description]
     * @return [string]          [description]
     */
    private function generateRandomString($length = 15) {
	    return substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	}

}
