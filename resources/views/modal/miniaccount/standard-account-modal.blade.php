<div class="modal fade" id="StandardAccountModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                {{ Form::open(array('url' => 'create', 'method' => 'post')) }}
                    {{ Form::hidden('email', $user->email) }}
                    {{ Form::hidden('eoffice_id', $account->id) }}
                    <p class="clear text-center">
                        <span class="col-md-5">Main Wallet Balance:</span>
                        <span class="col-md-7">
                            <input disabled v-model="intactdata.wallet.amount | currencyDisplay " type="text"  class="dark-input" name="balance" /><br>
                        </span>
                    </p>

                    <p class="clear text-center">
                        <span class="col-md-5">Enter Amount:</span>
                        <span class="col-md-7">
                        <input v-model="intactdata.mt4account.standard | currencyDisplay" type="text" class="light-input" name="balance" /> </span>
                    </p>

                        <div v-show="isNaN(intactdata.mt4account.standard)" class="alert alert-danger text-center">
                            <i class="fa fa-exclamation-triangle"></i> Error value!
                        </div>

                        <div v-show="intactdata.mt4account.standard > intactdata.wallet.amount" class="alert alert-danger text-center">
                            <i class="fa fa-exclamation-triangle"></i> Amount is greater than wallet amount.
                        </div>
                        
                         <div v-show="intactdata.mt4account.standard < 500" class="alert alert-danger text-center">
                            <i class="fa fa-exclamation-triangle"></i> Minimum amount to create: $500
                        </div>
                    
                    <p class="text-center nomargin">
                        <input :disabled="intactdata.mt4account.standard  > intactdata.wallet.amount
                                || intactdata.mt4account.standard < 500
                                || isNaN(intactdata.mt4account.standard )"
                                @click.prevent="submitMini" type="submit" name="submit" value="Create Account" class="modal-btn">
                    </p>
                    <p class="text-center"><input type="checkbox" value="terms" id="terms" name="terms">I agree to <a href="#" target="_blank">Terms and Conditions</a></p>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>