@extends('layouts.app')

@section('override_css')
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic);
        #main {
            clear: both;
            overflow: hidden;
            background: #f4f3f3;
        }
        #main .container {
            background: #f4f3f3;
            overflow: hidden;
            padding-top: 35px;
            padding-bottom: 20px;
        }
    </style>

@endsection

@section('content')

    @include('intactfx.header')

    <section id="main">

        @include('intactfx.main')

        @include('intactfx.account_tabs_head')

        @include('intactfx.account_tabs_content')


    </section><!--/ section main -->

    @include('modal.main_wallet_modal')

    @include('intactfx.footer')
  
   
@endsection


