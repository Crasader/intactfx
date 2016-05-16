@extends('layouts.app')

@section('override_css')
    
  
    
@endsection

@section('content')

    @include('intactfx.header')

  
    <a class="coinbase-button" data-code="9f3f45ddfb025131f44746b8b68c315e" data-button-style="custom_small" data-env="sandbox" href="https://sandbox.coinbase.com/checkouts/9f3f45ddfb025131f44746b8b68c315e">Pay With Bitcoin</a><script src="https://sandbox.coinbase.com/assets/button.js" type="text/javascript"></script>
 

    @include('intactfx.footer')
  
   
@endsection

@section('footer')
 
@endsection
