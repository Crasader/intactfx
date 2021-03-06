<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests;
use App\Payment;
use Barryvdh\DomPDF\PDF;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class PaymentWireController extends Controller
{
    
    public function generateWireInvoice($id, $amount)
   	{

    	$pdf = \PDF::loadView('pdf.wire', compact('amount'));

        $user = Auth::user();

        // $path = public_path('pdf\\');
        
        $path = public_path() . '/pdf';
        
        File::exists($path) or File::makeDirectory($path);

        $filename = '/wire_' . $id . '.pdf';
        
        if ($pdf->save($path.$filename)) {
            return $pdf->download();
            // return $pdf;
            // return $pdf->stream();
        }

    }

     public function downloadWireInvoice(Request $request)
    {

        $amount = $request->wallet['deposit'];

        $user = Auth::user();

        $account = Account::where('user_id', $user->id)->first();

        $pdf = \PDF::loadView('pdf.wire', compact('amount'));

        $user = Auth::user();

        // $path = public_path('pdf\\');
        
        $path = public_path() . '/pdf';
        
        File::exists($path) or File::makeDirectory($path);

        $filename = '/wire_' . $account->id . '.pdf';
        
        if ($pdf->save($path.$filename)) {
            return $pdf->download();
            // return $pdf;
            // return $pdf->stream();
        }

    }

    public function sendWireEmail(Request $request)
    {
        $deposit_amount = $request->deposit;
        // echo $deposit_amount; dd();

    	$user = Auth::user();

        $profile = $user->profile;

    	$account = Account::where('user_id', $user->id)->first();

    	$payment = Payment::create([
            'id' => Faker::create()->randomNumber($nbDigits = 9),
            'payment_id' =>  Faker::create()->randomNumber($nbDigits = 6),
            'funding_service'  => 'wire',
            'type'  => 'deposit',
            'email'  => $user->email,
            'payee_account'  => '',
            'payment_amount'  => $deposit_amount,
            'payment_units'  => 'USD',
            'payor_account'  =>  '',
            'confirm' => 0,
            'notes' => $request->notes,
        ]);

 		$filename = '/wire_' . $account->id . '.pdf';

    	// if ($this->generateWireInvoice($account->id, $deposit_amount)) {

            Mail::queue('emails.wire', compact('user', 'account',  'profile', 'payment'), function($message) use ($filename, $user){
                $message
                ->to($user->email)
                ->subject('Wire Transfer Invoice');
                // ->attach(public_path() . '/pdf' . $filename);
            });

          	// flash()->success('Form submitted');

	      	return redirect()->back();

        // }
    }
}
