<div class="form-body">
    <div class="title-wrapper">
        <img src="{{ URL::asset('/img/login_img/login-icon.png') }}" alt="login icon" title="login icon" />
        <h2><span>Don’t have an account?</span> Register Now</h2>
    </div><!--/ title wrapper -->

    <div class="form-content">
        <form  class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {!! csrf_field() !!}
            
           <!--  <div class="form-group">

                <div class="styled-select1">
                    <select class="form-control" id="accountselect">
                        <option value="">Account Type</option>
                        <option>Account 1</option>
                        <option>Account 2</option>
                        <option>Account 3</option>
                        <option>Account 4</option>
                    </select>
                </div>

                <div class="styled-select2">
                    <select class="form-control" id="currencyselect">
                        <option value="">a</option>
                        <option>USD</option>
                        <option>AUD</option>
                        <option>PHP</option>
                        <option>SGD</option>
                    </select>
                </div>

            </div> -->

            <div class="form-group">
                <input type="text" class="form-control" name="email" value="{{ old('name') }}"  id="InputEmail1"  placeholder="Email" required="" autofocus="">
                 @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input type="password" class="form-control" id="InputPassword3" name="password" required=""  placeholder="Password">
                 @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <input type="password" class="form-control" id="InputPassword4" name="password_confirmation" placeholder="Confirm Password" required=""/>
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