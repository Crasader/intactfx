<div class="modal fade" id="Commission2WalletModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#wallettransfer2" aria-controls="wallettransfer2" role="tab" data-toggle="tab">Wallet Transfer</a></li>
            <li role="presentation"><a href="#commissionhistory" aria-controls="commissionhistory" role="tab" data-toggle="tab">Commission History</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="wallettransfer2">
                <div class="col-md-6">
                    <form>
                        <p class="clear text-center"><span class="col-md-5">Total Commission:</span><span class="col-md-7"><input type="text" value="@{{ this.intactdata.wallet.blue | currency }}" class="dark-input" name="balance" /> USD</span></p>
                        <p class="clear text-center"><span class="col-md-5">Enter Amount:</span><span class="col-md-7"><input type="text" value="" class="light-input" name="balance" /> USD</span></p>
                        <p class="text-center"><input type="submit" name="submit" value="Transfer to Main Wallet" class="modal-btn"></p>
                    </form>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="commissionhistory">
                <p>Commission History Tab here.</p>
            </div>

          </div>
            
          </div>
        </div>
      </div>
    </div>