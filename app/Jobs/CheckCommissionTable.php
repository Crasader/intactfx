<?php

namespace App\Jobs;

use App\Account;
use App\Affiliate;
use App\Commission;
use App\CommissionHistory;
use App\Jobs\Job;
use App\Mt4Account;
use App\Pumping;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckCommissionTable extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $closeTrades = Pumping::where('has_read', 0)->get();

        foreach ($closeTrades as $trade) {
            $pumping_id = $trade->id;
            $profit = $trade->profit;
            $mt4_account = $trade->mt4login_id;
            $volume = $trade->volume;

            //get the eoffice id
            $mt4 = Mt4Account::where('mt4login_id', $mt4_account)->first();
            $eoffice_id = $mt4->eoffice_id;
            $account_type = $mt4->account_type;

            //Commision first level
            $first = Affiliate::where('eoffice_id', $eoffice_id)->first();
            $first_eoffice_id = $first->affiliate_id;
            
            //Commision second level
            $second = Affiliate::where('eoffice_id', $first_eoffice_id)->first();
            $second_eoffice_id = $second->affiliate_id;

            //Commision third level
            $third = Affiliate::where('eoffice_id', $second_eoffice_id)->first();
            $third_eoffice_id = $third->affiliate_id;

            //compute the commission
            if ($account_type=='mini' OR $account_type=='standard') {

                $first_level_commision  = $volume * .6;
                $second_level_commision = $volume * .2;
                $third_level_commision = $volume * .2;

            }else{

                $first_level_commision  = $volume * .1;
                $second_level_commision = $volume * .05;
                $third_level_commision = $volume * .03;
                $forth_level_commision = $volume * .015;
                $fifth_level_commision = $volume * .005;

                //Commision forth level
                $forth = Affiliate::where('eoffice_id', $third_eoffice_id)->first();
                $forth_eoffice_id = $forth->affiliate_id;
                
                //Commision fifth level
                $fifth = Affiliate::where('eoffice_id', $forth_eoffice_id)->first();
                $fifth_eoffice_id = $fifth->affiliate_id;
            }

            //deposit
            if ($account_type=='mini' OR $account_type=='standard') {

                //first level
                Commission::create([
                   'from_mt4login_id' => $mt4_account,
                   'from_eoffice' =>  $eoffice_id,
                   'to_eoffice' => $first_eoffice_id,
                   'commission_type' => 'deposit',
                   'account_type' => $account_type,
                   'volume' => $volume,
                   'amount' =>  $first_level_commision,
                ]);

                //second level
                Commission::create([
                   'from_mt4login_id' => $mt4_account,
                   'from_eoffice' =>  $eoffice_id,
                   'to_eoffice' => $second_eoffice_id,
                   'commission_type' => 'deposit',
                   'account_type' => $account_type,
                   'volume' => $volume,
                   'amount' =>  $second_level_commision,
                ]);

                //third level
                Commission::create([
                   'from_mt4login_id' => $mt4_account,
                   'from_eoffice' =>  $eoffice_id,
                   'to_eoffice' => $third_eoffice_id,
                   'commission_type' => 'deposit',
                   'account_type' => $account_type,
                   'volume' => $volume,
                   'amount' =>  $third_level_commision,
                ]);

                //insert history logs
                CommissionHistory::create([
                   'eoffice_id' => $eoffice_id,
                   'volume' => $volume,
                   'account_type' => $account_type,
                   'level1' =>  $first_level_commision,
                   'level2' =>  $second_level_commision,
                   'level3' =>  $third_level_commision,
                ]);

            } else {

                //first level
                Commission::create([
                   'from_mt4login_id' => $mt4_account,
                   'from_eoffice' =>  $eoffice_id,
                   'to_eoffice' => $first_eoffice_id,
                   'commission_type' => 'deposit',
                   'account_type' => $account_type,
                   'volume' => $volume,
                   'amount' =>  $first_level_commision,
                ]);

                //second level
                Commission::create([
                   'from_mt4login_id' => $mt4_account,
                   'from_eoffice' =>  $eoffice_id,
                   'to_eoffice' => $second_eoffice_id,
                   'commission_type' => 'deposit',
                   'account_type' => $account_type,
                   'volume' => $volume,
                   'amount' =>  $second_level_commision,
                ]);

                //third level
                Commission::create([
                   'from_mt4login_id' => $mt4_account,
                   'from_eoffice' =>  $eoffice_id,
                   'to_eoffice' => $third_eoffice_id,
                   'commission_type' => 'deposit',
                   'account_type' => $account_type,
                   'volume' => $volume,
                   'amount' =>  $third_level_commision,
                ]);

                Commission::create([
                   'from_mt4login_id' => $mt4_account,
                   'from_eoffice' =>  $eoffice_id,
                   'to_eoffice' => $forth_eoffice_id,
                   'commission_type' => 'deposit',
                   'account_type' => $account_type,
                   'volume' => $volume,
                   'amount' =>  $forth_level_commision,
                ]);

                Commission::create([
                   'from_mt4login_id' => $mt4_account,
                   'from_eoffice' =>  $eoffice_id,
                   'to_eoffice' => $fifth_eoffice_id,
                   'commission_type' => 'deposit',
                   'account_type' => $account_type,
                   'volume' => $volume,
                   'amount' =>  $fifth_level_commision,
                ]);

                //insert history logs
                CommissionHistory::create([
                   'eoffice_id' => $eoffice_id,
                   'volume' => $volume,
                   'account_type' => $account_type,
                   'level1' =>  $first_level_commision,
                   'level2' =>  $second_level_commision,
                   'level3' =>  $third_level_commision,
                   'level4' =>  $forth_level_commision,
                   'level5' =>  $fifth_level_commision,
                ]);

               
            }

            //update table
            // $trade->has_read = 1;
            $trade->save();

        }

    }

}
