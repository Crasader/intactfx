<?php
namespace App\Repositories;

use App\Account;
use App\Affiliate;
use App\Mt4Account;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AccountRepository
{
    
    protected $db;

    public function __construct(Connection $db)
    {

        $this->db = $db;

    }

    public function createAccount($user)
    {

       $account = $this->generateAccount($user);

       $this->generateMt4Account($account);

        Mail::queue('emails.affiliate', compact('user', 'account'), function($message) use ($user){
            $message->to($user->email)->subject('Thank you for signing up.');
        });

    }

    private function generateAccount($user)
    {
        $id = strval(strtoupper(Faker::create()->randomLetter($nbDigits = 2)) . strtoupper(Faker::create()->randomLetter($nbDigits = 2)) . Faker::create()->numberBetween($min = 100000, $max = 999999));
        // . Faker::create()->numberBetween($min = 100000, $max = 999999)
        
        $account = new Account;
        $account->id = $id;
        $account->user_id = $user->id;
        $account->save();

        //affiliate table
        $affiliate = new Affiliate;
        $affiliate->eoffice_id = $id;
        
        // if user register with affiliate link
        if ($user->affiliate_id!='') {
            $affiliate->affiliate_id = $user->affiliate_id;
            $affiliate->save();
        } else { // if user register using social
            
            //if affiliate_id existing
            if (Session::has('affiliate_id')){
                $affiliate_id = Session::get('affiliate_id');    

                $affiliate->affiliate_id = $affiliate_id;
                $affiliate->save();

                Session::forget('affiliate_id');
            } else { // get random affiliate id

                $random_eoffice_id = Account::all()->random(1);
                $affiliate->affiliate_id = $random_eoffice_id->id;
                $affiliate->save();
            }

        }
        
        
        return $account;

    }

    private function generateMt4Account($account)
    {

        $accountType = [
            'mini',
            'standard',
            'ip_low',
            'ip_high',
            'broker'
        ];


        foreach ($accountType as $value) {
            Mt4Account::create([
                'id' => Faker::create()->numberBetween($min = 10000, $max = 99999),
                 // Faker::create()->randomNumber($nbDigits = 5),
                'eoffice_id' => $account->id,
                'account_type' => $value,
                'balance' => 0
            ]);
        }

    }

}