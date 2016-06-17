<div class="modal fade" id="MainWalletModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">

      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#financial" aria-controls="financial" role="tab" data-toggle="tab">Financial Operation</a></li>
        <li role="presentation"><a href="#transaction" aria-controls="transaction" role="tab" data-toggle="tab">Transaction History</a></li>
        <li role="presentation"><a href="#verification" aria-controls="verification" role="tab" data-toggle="tab">Verification</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="financial">
            <p class="bold uppercase nomargin">Deposit</p>
            <div class="form-box">
                <form>
                    <p class="clear text-center"><span class="col-md-3">Enter Amount:</span><span class="col-md-9"><input v-model="intactdata.wallet.deposit" type="text" class="light-input" name="balance" /> USD</span></p>
                    <p class="text-center">Choose payment method:</p>
                    <p class="text-center">
                        <!-- <a  class="coinbase-button payment-button-1" data-code="0f73b1b477edc3814748576ad947cd31" data-button-style="none" data-env="sandbox" href="https://sandbox.coinbase.com/checkouts/0f73b1b477edc3814748576ad947cd31"></a><script src="https://sandbox.coinbase.com/assets/button.js" type="text/javascript"></script> --><!-- <input type="submit" class="payment-button-1" name="bitcoin" value="bitcoin"> -->
                        <input type="submit" class="payment-button-2" name="neteller" value="neteller">
                        <input type="submit" class="payment-button-3" name="merchant" value="merchant">
                        <input @click="processWire()" class="payment-button-4" name="ewiretransfer" value="ewiretransfer">
                        <input type="submit" class="payment-button-5" name="perfectmoney" value="perfectmoney">
                        <input type="submit" class="payment-button-6" name="skrill" value="skrill">
                    </p>
                </form>

            </div>
            <p class="bold uppercase nomargin">Withdrawal</p>
            <div class="form-box nomargin">
                <form>
                    <p class="clear text-center"><span class="col-md-3">Enter Amount:</span><span class="col-md-9"><input type="text" class="light-input" name="balance" /> USD</span></p>
                    <p class="text-center">Choose payment method:</p>
                    <p class="text-center">
                        <input type="submit" class="payment-button-1" name="bitcoin" value="bitcoin">
                        <input type="submit" class="payment-button-2" name="neteller" value="neteller">
                        <input type="submit" class="payment-button-3" name="merchant" value="merchant">
                        <input type="submit" class="payment-button-4" name="ewiretransfer" value="ewiretransfer">
                        <input type="submit" class="payment-button-5" name="perfectmoney" value="perfectmoney">
                        <input type="submit" class="payment-button-6" name="skrill" value="skrill">
                    </p>
                </form>
                  <form action="https://perfectmoney.is/api/step1.asp" method="POST">
                            <input type="hidden" name="PAYEE_ACCOUNT" value="U11189043">
                            <input v-model="intactdata.profile.eoffice_id" type="hidden" name="PAYEE_NAME" value="Test">
                            <input type="hidden" name="PAYMENT_ID" value="{{ str_random(6) }}">
                            <input v-model="wallet.amount" type="hidden" name="PAYMENT_AMOUNT">
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
            </div>
            <p>Payment method which is available for withdrawal is the same method used to deposit.</p>
        </div>
        <div role="tabpanel" class="tab-pane" id="transaction">
            <p>Transaction History Tab here.</p>
        </div>
        <div role="tabpanel" class="tab-pane" id="verification">
            <p>Verification Tab here.</p>
        </div>
      </div>
        
      </div>
    </div>
  </div>
</div>