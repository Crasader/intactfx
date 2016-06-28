<?php

namespace App\Http\Controllers;

use App\Account;
use App\Commission;
use App\CommissionHistory;
use App\Http\Requests;
use App\Jobs\CheckCommissionTable;
use App\Mt4Account;
use App\Payment;
use App\Profile;
use App\Social;
use App\User;
use Auth;
use Carbon\Carbon;
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

    public function testjobs(){
        $job = new CheckCommissionTable;
        $this->dispatch($job);
    }

    public function updateWallet(Request $request){
        $user = Auth::user();
        DB::connection()->enableQueryLog();


        $eoffice_id = $request->eoffice_id;

        //main_wallet
        
        $deposit_history  = Payment::select('funding_service', DB::raw('SUM(payment_amount) as total_deposit'))
                    ->where('email', $user->email)
                    ->where('type', 'deposit')
                    ->get();

        $withdrawal_history  = Payment::select('funding_service', DB::raw('SUM(payment_amount) as total_withdrawal'))
                    ->where('email', $user->email)
                    ->where('type', 'withdrawal')
                    ->get();



        //commission red
        $red_deposit_history  = Commission::select('to_eoffice', DB::raw('SUM(amount) as total_commission_deposit'))
                    ->where('to_eoffice', $eoffice_id)
                    ->where('commission_type', 'deposit')
                    ->whereIn('account_type', ['mini', 'stadard'])
                    ->get();

        $red_transfer_history  = Commission::select('to_eoffice', DB::raw('SUM(amount) as total_commission_transfer'))
                    ->where('to_eoffice', $eoffice_id)
                    ->where('commission_type', 'transfer')
                    ->whereIn('account_type', ['mini', 'stadard'])
                    ->get();

        //commission green
        $green_deposit_history  = Commission::select('to_eoffice', DB::raw('SUM(amount) as total_commission_deposit'))
                    ->where('to_eoffice', $eoffice_id)
                    ->where('commission_type', 'deposit')
                    ->whereIn('account_type', ['iprofit', 'iprofit_high', 'broker'])
                    ->get();

        $queries = DB::getQueryLog();
        // dd($queries);


        $green_transfer_history  = Commission::select('to_eoffice', DB::raw('SUM(amount) as total_commission_transfer'))
                    ->where('to_eoffice', $eoffice_id)
                    ->where('commission_type', 'transfer')
                    ->whereIn('account_type', ['iprofit', 'iprofit_high', 'broker'])
                    ->get();

         // dd($green_deposit_history);
        
        $main_wallet = $deposit_history[0]->total_deposit - $withdrawal_history[0]->total_withdrawal;
        $red_wallet = $red_deposit_history[0]->total_commission_deposit - $red_transfer_history[0]->total_commission_transfer;
        $green_wallet = $green_deposit_history[0]->total_commission_deposit - $green_transfer_history[0]->total_commission_transfer;
        
        $wallet['main'] =  $main_wallet;
        $wallet['red'] =  $red_wallet;
        $wallet['green'] =  $green_wallet;

        return $wallet;


    }

    public function getRedCommissionHistory(Request $request){

        $user = Auth::user();
        
        $eoffice_id = $request->eoffice_id;

        // if ($action!="all") {
        //     $date1 = strtotime($request->start);
        //     $start   =   Carbon::create(date('Y',$date1), date('m',$date1), date('d',$date1), 0, 0, 0);
        //     $date2 = strtotime($request->end);
        //     $end     =   Carbon::create(date('Y',$date2), date('m',$date2), date('d',$date2), 23, 59, 59);
        // }

        $history  = CommissionHistory::where('eoffice_id', $eoffice_id)
                    ->whereIn('account_type', ['mini', 'stadard'])
                    ->get();
        
        // if ($action=="all") {

        //     $payments  = Payment::where('email', $user->email)->get();

        // } elseif ($action=="deposit" OR $action=="withdrawal" ) {
           
        //     $payments  = Payment::where('email', $user->email)
        //         ->where('type', $action)
        //         ->where('created_at', '>=', $start)
        //         ->where('created_at', '<=', $end)
        //         ->get();

        // } else {
         
        //     $payments  = Payment::where('email', $user->email)
        //         ->where('created_at', '>=', $start)
        //         ->where('created_at', '<=', $end)
        //         ->get();

        // }

        return $history;
        
    }

    public function getProfile(){
        $user = Auth::user();

        return $user->profile;

    }

    public function profileUpdate(Request $request){
        
        $user = Auth::user();

        $profile = Profile::where('user_id', $user->id)->first();
        $profile->last_name =  $request->last_name;
        $profile->first_name =  $request->first_name;
        $profile->gender =  $request->gender;
        $profile->birthdate =  $request->birthdate;
        $profile->phone_number =  $request->phone_number;
        $profile->email =  $request->email;
        $profile->address =  $request->address;
        $profile->address2 =  $request->address2;
        $profile->city =  $request->city;
        $profile->state =  $request->state;
        $profile->country =  $request->country;
        $profile->zipcode =  $request->zipcode;
        $profile->skype_id =  $request->skype_id;
        $profile->icq_number =  $request->icq_number;
        $profile->twitter_username =  $request->twitter_username;
        $profile->google_email =  $request->google_email;
        $profile->facebook_url =  $request->facebook_url;
        $profile->instagram_url =  $request->instagram_url;
        $profile->bank_name =  $request->bank_name;
        $profile->bank_account =  $request->bank_account;
        $profile->bank_fullname =  $request->bank_fullname;
        $profile->bank_swiftcode =  $request->bank_swiftcode;
        $profile->bank_country =  $request->bank_country;
        $profile->bank_state =  $request->bank_state;
        $profile->netteller =  $request->netteller;
        $profile->skrill =  $request->skrill;
        $profile->perfect_money =  $request->perfect_money;
        $profile->save();

        return 'success';

    }

}