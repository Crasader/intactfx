 <div class="form-body">
    <div class="title-wrapper">
        <img src="{{ URL::asset('/img/login_img/login-icon.png') }}" alt="login icon" title="login icon" />
        <h2><span>Already have an account?</span> Log In Here</h2>
    </div><!--/ title wrapper -->
    <div class="form-content">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
             {!! csrf_field() !!}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                <input  class="form-control"  name="email" value="{{ old('email') }}" id="InputEmail" required="" autofocus="" />
              
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            
            </div> 

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                <input type="password" name="password" class="form-control" id="InputPassword" required=""/>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

            </div>

            <div class="form-group text-center">
                <img src="{{ URL::asset('/img/login_img/form-separator.png') }}" class="form-separator" />
                <button type="submit" id="loginbutton">Submit</button>
            </div>

        </form>
    </div><!--/ form content -->
</div><!--/ form body -->