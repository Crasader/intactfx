<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    /**
     *
     */
    public function intactdata(){
        DB::connection()->enableQueryLog();
        $user = Auth::user();
        $account = DB::table('intact_users')
            ->join('intact_accounts', 'intact_accounts.user_id', '=', 'intact_users.id')
            ->select('intact_users.id', 'intact_users.email', 'intact_accounts.id')
            ->where('intact_users.id', $user->id)
            ->get();
                // dd($account);
             // dd(DB::getQueryLog());
            return $account;
    }

    public function miniAccount(Request $request){
        
        $mt4account = Mt4Account::select('eoffice_id', 'mt4login_id', 'account_type', 'balance')->where('eoffice_id', $request->eoffice_id)->get();

        return $mt4account;

    }

    public function checkPassword(Request $request){

        $passwordType =  $request->passwordType;

        if ($passwordType=='password') {
            $mt4account = Mt4Account::where('mt4login_id', $request->mt4login_id)->where('password', $request->password)->get();   
        }else{
            $mt4account = Mt4Account::where('mt4login_id', $request->mt4login_id)->where('password_investor', $request->password)->get();   
        }
        
        return $mt4account;
        
    }

    public function get_twitter_feeds()
    {
        
        $feeds = TwitterOauthController::getFeeds();

        echo json_encode($feeds->statuses);
    }

    public function checkWithdrawal(Request $request){

        $merchant = $request->merchant;

        $user = Auth::user();

        $deposit_history  = Payment::select('funding_service', DB::raw('SUM(payment_amount) as total_deposit'))
                    ->where('email', $user->email)
                    ->where('type', 'deposit')
                    ->where('funding_service', $merchant)
                    ->get();

        $withdraw_history  = Payment::select('funding_service', DB::raw('SUM(payment_amount) as total_withdrawal'))
                    ->where('email', $user->email)
                    ->where('type', 'withdrawal')
                    ->where('funding_service', $merchant)
                    ->get();
        
         // dd($deposit_history[0]->total_deposit);

        $amount_to_withdral = $deposit_history[0]->total_deposit - $withdraw_history[0]->total_withdrawal;

        return $amount_to_withdral;

    }

    public function emails(){
        return view('emails.confirm'); 
    }

    public function getHistory(Request $request){

        $user = Auth::user();
        
        $action = $request->action;

        if ($action!="all") {
            $date1 = strtotime($request->start);
            $start   =   Carbon::create(date('Y',$date1), date('m',$date1), date('d',$date1), 0, 0, 0);
            $date2 = strtotime($request->end);
            $end     =   Carbon::create(date('Y',$date2), date('m',$date2), date('d',$date2), 23, 59, 59);
        }

        if ($action=="all") {

            $payments  = Payment::where('email', $user->email)->get();



        } elseif ($action=="deposit" OR $action=="withdrawal" ) {
           
            $payments  = Payment::where('email', $user->email)
                ->where('type', $action)
                ->where('created_at', '>=', $start)
                ->where('created_at', '<=', $end)
                ->get();

        } else {
         
            $payments  = Payment::where('email', $user->email)
                ->where('created_at', '>=', $start)
                ->where('created_at', '<=', $end)
                ->get();

        }

        return $payments;
        
    }

}
