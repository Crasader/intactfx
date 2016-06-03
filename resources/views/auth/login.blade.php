@extends('layouts.app')

@section('content')
<section id="main">
    <div class="container">
        <div class="row">
            <div id="login-register">

                <div id="tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        @if(isset($eoffice_id))
                            <li role="presentation">
                         @else
                            <li role="presentation" class="active">
                         @endif
                            <a href="#login" aria-controls="login" role="tab" data-toggle="tab"><img src="{{ URL::asset('/img/login_img/button-icon.png') }}" alt="login" title="login" />Login</a>
                        </li>
                         @if(isset($eoffice_id))
                            <li role="presentation" class="active">
                         @else
                            <li role="presentation" >
                         @endif
                            <a href="#register" aria-controls="register" role="tab" data-toggle="tab">Register<img src="{{ URL::asset('/img/login_img/button-icon.png') }}" alt="login" title="login" /></a>
                        </li>
                    </ul>
                </div><!--/ tabs -->

                <div id="logo-wrapper">
                    <a href="index.html"><img src="{{ URL::asset('/img/login_img/logo.png') }}" alt="logo" title="logo" /></a>
                </div><!--/ logo wrapper -->

                <div class="tab-content">
                    @if(isset($eoffice_id))
                        <div role="tabpanel" class="tab-pane fade" id="login"> 
                    @else
                        <div role="tabpanel" class="tab-pane fade in active" id="login"> 
                    @endif
                        
                        <div id="form-wrapper">
                           
                            @include('forms.login')

                            @include('forms.loginfooter')

                        </div><!--/ form wrapper -->
                          
                    </div><!--/ tab panel -->
                    @if(isset($eoffice_id))
                        <div role="tabpanel" class="tab-pane fade in active" id="register"> 
                    @else
                        <div role="tabpanel" class="tab-pane fade" id="register"> 
                    @endif
                       
                        <div id="form-wrapper">
                            
                             @include('forms.register')

                             @include('forms.loginfooter')

                        </div><!--/ form wrapper -->
                    
                    </div><!--/ tab panel -->

                </div><!--/ tab content -->

        </div><!--/ login/register -->

        </div> <!-- row -->
    </div> <!--container -->
</section><!--/ section main -->
@endsection
