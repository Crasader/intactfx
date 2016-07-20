<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Payment;
use Faker\Factory as Faker;
use Illuminate\Http\Request;

class PaymentPerfectMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pm');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function success(Request $request)
    {
      
        $payment = Payment::create([
                'id' => Faker::create()->randomNumber($nbDigits = 9),
                'payment_id' =>  $request->PAYMENT_ID,
                'funding_service'  => 'pm',
                'type'  => 'deposit',
                'payee_account'  => $request->PAYEE_ACCOUNT,
                'payment_amount'  => $request->PAYMENT_AMOUNT,
                'payment_units'  => $request->PAYMENT_UNITS,
                'payor_account'  =>  $request->PAYER_ACCOUNT,
                'email'  =>  $request->CUSTOMER_EMAIL,
                'confirm' => true,
        ]);

        return redirect('/');
    }

    public function error(Request $request)
    {
        echo 'error';
        dd($request);
    }
}
