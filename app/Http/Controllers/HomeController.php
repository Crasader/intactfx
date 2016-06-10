<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests;
use App\Mt4Account;
use App\Payment;
use App\Social;
use App\User;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = Auth::user();
        // dd($user);
        try {

            $social = Social::where('user_id', $user->id)->firstOrFail();

        } catch (ModelNotFoundException $ex) {

            $social = '';
            
        }

        $account = Account::where('user_id', $user->id)->first();

        $mt4account = Mt4Account::where('eoffice_id', $account->id)->get();

        // $wallet = Payment::select(DB::raw('sum(payment_amount) as user_count, status'))->where('email', $user->email)->get();

        $wallet = DB::table('intact_payment_table')
                ->select(DB::raw('SUM(payment_amount) as main_wallet'))
                ->where('email', $user->email)
                ->first();

        $payments  = Payment::where('email', $user->email)
                ->get();

        $withdraw_available  = Payment::select('funding_service', DB::raw('SUM(payment_amount) as total_deposit'))
                    ->where('email', $user->email)
                    ->groupBy('funding_service')
                    ->get();

        $affiliate_id = Session::get('affiliate_id');

        return view('home', compact('user', 'social', 'account', 'mt4account', 'wallet', 'payments', 'withdraw_available'));

    }

    public function get_twitter_feeds()
    {
        
        $feeds = TwitterOauthController::getFeeds();

        echo json_encode($feeds->statuses);
    }

}
