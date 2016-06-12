<div class="modal fade" id="BrokerAccountModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                {{ Form::open(array('url' => 'create', 'method' => 'post')) }}
                    {{ Form::hidden('email', $user->email) }}
                    {{ Form::hidden('eoffice_id', $account->id) }}
                    <p class="clear text-center"><span class="col-md-5">Main Wallet Balance:</span><span class="col-md-7"><input type="text" value="12,000" class="dark-input" name="balance" /> USD</span></p>
                    <p class="clear text-center"><span class="col-md-5">Enter Amount:</span><span class="col-md-7"><input type="text" value="5,000" class="light-input" name="balance" /> USD</span></p>
                    <p class="text-center nomargin"><input type="submit" name="submit" value="Create Account" class="modal-btn"></p>
                    <p class="text-center"><input type="checkbox" value="terms" id="terms" name="terms">I agree to <a href="#" target="_blank">Terms and Conditions</a></p>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>