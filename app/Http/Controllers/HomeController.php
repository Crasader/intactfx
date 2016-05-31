<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests;
use App\Mt4Account;
use App\Social;
use App\User;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

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

        // dd($mt4account);

        return view('home', compact('user', 'social', 'account', 'mt4account'));

    }

    public function get_twitter_feeds()
    {
        
        $feeds = TwitterOauthController::getFeeds();

        echo json_encode($feeds->statuses);
    }

}
