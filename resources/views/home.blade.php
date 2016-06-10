@extends('layouts.app')

@section('override_css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main-style.css') }}">
@endsection
    
@section('content')

    @include('intactfx.header')

    <section id="main">

        @include('intactfx.main')

        @include('intactfx.account_tabs_head')

        @include('intactfx.account_tabs_content')

    </section><!--/ section main -->

    @include('intactfx.footer') 


    <!-- main modals -->

    <!-- Social Media Modal -->
   @include('modal.social-modal')

    <!-- TransferOut Modal -->
    @include('modal.transferout-modal')    
    
    <!-- TransferIn Modal -->
    @include('modal.transferin-modal')        
   
    <!-- Create Account Modal -->
    @include('modal.createaccount-modal')            

    <!-- Main Wallet Modal -->
    @include('modal.mainwallet-modal')                

    <!-- Commission Wallet Modal -->
    @include('modal.commisionwallet-modal')           

    <!-- Commission Wallet 2 Modal -->
    @include('modal.commisionwallet2-modal')           
    
    <!-- setting modal -->
    @include('modal.setting-modal')           

    <!-- /main modals -->

@endsection


    
