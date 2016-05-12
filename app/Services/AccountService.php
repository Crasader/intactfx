<?php
namespace App\Services;

use App\User;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\Repositories\AccountRepository;

class AccountService
{

    protected $mailer;

    protected $account;

    public function __construct(Mailer $mailer, AccountRepository $account)
    {
        $this->account = $account;
    }

    

}