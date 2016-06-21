<?php
namespace App\Services;

use App\User;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use App\Repositories\AccountRepository;
use App\Repositories\ActivationRepository;

class ActivationService
{

    protected $mailer;

    protected $activationRepo;
    
    protected $accountRepo;

    protected $resendAfter = 24;

    public function __construct(Mailer $mailer, ActivationRepository $activationRepo, AccountRepository $accountRepo)
    {
        $this->mailer = $mailer;
        $this->activationRepo = $activationRepo;
        $this->accountRepo = $accountRepo;
    }

    public function sendActivationMail($user)
    {

        if ($user->activated || !$this->shouldSend($user)) {
            return;
        }

        $token = $this->activationRepo->createActivation($user);

        $password = $user->password_text;
        // dd($password);

        $account = $user->account; 
        // dd($account);
        $link = route('user.activate', $token);

        $message = sprintf('Activate account <a href="%s">click here</a>', $link, $link);

        Mail::queue('emails.confirm', compact('user', 'token', 'password', 'account'), function($message) use ($user){
            $message->to($user->email)->subject('Activation mail');
        });
        
        return true;
    }
  
    public function activateUser($token)
    {
        $activation = $this->activationRepo->getActivationByToken($token);

        if ($activation === null) {
            return null;
        }

        $user = User::find($activation->user_id);

        $user->activated = true;

        $user->save();

        $this->activationRepo->deleteActivation($token);

        // $this->accountRepo->createAccount($user);

        return $user;

    }

    private function shouldSend($user)
    {
        $activation = $this->activationRepo->getActivation($user);
        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }

}