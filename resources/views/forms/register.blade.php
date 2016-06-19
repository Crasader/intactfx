<div class="form-body">
    <div class="title-wrapper">
        <img src="{{ URL::asset('/img/login_img/login-icon.png') }}" alt="login icon" title="login icon" />
        <h2><span>Don’t have an account?</span> Register Now</h2>
    </div><!--/ title wrapper -->

    <div class="form-content">
        <form  class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {!! csrf_field() !!}
            
            <input type="hidden" class="form-control" name="eoffice_id" value="{{ $eoffice_id or '' }}"  >
            <div style="margin-left: 0px;" class="form-group">
                <!-- <input type="text" class="form-control" name="email"   id="InputEmail1"  placeholder="Email" required="" autofocus=""> -->
                <input type="email" name="email" class="form-control" value="{{ old('name') }}" id="InputEmail" required="" autofocus="" />
                 @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div style="margin-left: 0px;" class="form-group">
                <input type="password" class="form-control"  name="password" id="InputPassword" required=""/>
                <!-- <input type="password" class="form-control" id="InputPassword3" name="password" required=""  placeholder="Password"> -->
                 @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div style="margin-left: 0px;" class="form-group">
                <input type="password" class="form-control" name="password_confirmation" id="InputConfirm" required=""/>
                <!-- <input type="password" class="form-control" id="InputPassword4" name="password_confirmation" placeholder="Confirm Password" required=""/> -->
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group text-center">
                <img src="{{ URL::asset('/img/login_img/form-separator.png') }}" class="form-separator" />
                <button type="submit" id="registerbutton">Submit</button>
            </div>

        </form>
        
    </div><!--/ form content -->

</div><!--/ form body -->