<?php
namespace App\Repositories;

use App\Account;
use App\Mt4Account;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Connection;

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

    }

    private function generateAccount($user)
    {

       return Account::create([
            'id' => Faker::create()->numberBetween($min = 100000, $max = 999999),
            // Faker::create()->randomNumber($nbDigits = 6),
            'user_id' => $user->id,
        ]);

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