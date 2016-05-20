@extends('layouts.app')

@section('override_css')
    
  
    
@endsection

@section('content')

    @include('intactfx.header')

    <form action="https://perfectmoney.is/api/step1.asp" method="POST">
        <input type="hidden" name="PAYEE_ACCOUNT" value="U11189043">
        <input type="hidden" name="PAYEE_NAME" value="Test">
        <input type="hidden" name="PAYMENT_ID" value="4564813">
        <input type="hidden" name="PAYMENT_AMOUNT" value="0.01">
        <input type="hidden" name="PAYMENT_UNITS" value="USD">
        <input type="hidden" name="STATUS_URL" value="http://dev.intactfx/payment/pm/pmprocess">
        <input type="hidden" name="PAYMENT_URL" value="http://dev.intactfx/payment/pm/success">
        <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
        <input type="hidden" name="NOPAYMENT_URL" value="http://dev.intactfx/payment/pm/error">
        <input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
        <input type="hidden" name="SUGGESTED_MEMO" value="payment comments here">
        <input type="hidden" name="BAGGAGE_FIELDS" value="">
        <input type="submit" name="PAYMENT_METHOD" value="Pay Now!">
    </form>
 

    @include('intactfx.footer')
  
   
@endsection

@section('footer')
 
@endsection
