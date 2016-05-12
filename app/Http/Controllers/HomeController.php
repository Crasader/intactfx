<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Social;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
       
        
        return view('home', compact('social'));
    }
}
