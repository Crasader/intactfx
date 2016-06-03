 <div class="modal fade" id="CommissionWalletModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">

      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#wallettransfer" aria-controls="wallettransfer" role="tab" data-toggle="tab">Wallet Transfer</a></li>
        <li role="presentation"><a href="#commission" aria-controls="commission" role="tab" data-toggle="tab">Commission History</a></li>
        <li role="presentation"><a href="#merchant" aria-controls="merchant" role="tab" data-toggle="tab">Merchant E-Office</a></li>
        <li role="presentation"><a href="#code" aria-controls="code" role="tab" data-toggle="tab">Code Tracking</a></li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="wallettransfer">
            <div class="col-md-6">
                <p class="bold nomargin">Transfer your commission to Main Wallet</p>
                <div class="form-box">
                    <form>
                        <p class="clear text-center"><span class="col-md-5">Total Commission:</span><span class="col-md-7"><input type="text" value="12,000" class="dark-input" name="balance" /> USD</span></p>
                        <p class="clear text-center"><span class="col-md-5">Enter Amount:</span><span class="col-md-7"><input type="text" value="5,000" class="light-input" name="balance" /> USD</span></p>
                        <p class="text-center"><input type="submit" name="submit" value="Transfer to Main Wallet" class="modal-btn"></p>
                    </form>
                </div>
                <p class="bold nomargin">Transfer your funds to Merchant Wallet</p>
                <div class="form-box">
                    <form>
                        <p class="clear text-center"><span class="col-md-5">Main Wallet Balance:</span><span class="col-md-7"><input type="text" value="12,000" class="dark-input" name="balance" /> USD</span></p>
                        <p class="clear text-center"><span class="col-md-5">Enter Amount:</span><span class="col-md-7"><input type="text" value="5,000" class="light-input" name="balance" /> USD</span></p>
                        <p class="text-center"><input type="submit" name="submit" value="Transfer from Main Wallet" class="modal-btn"></p>
                    </form>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="commission">
            <p>Commission History Tab here.</p>
        </div>
        <div role="tabpanel" class="tab-pane" id="merchant">
            <p>Merchant E-Office Tab here.</p>
        </div>
        <div role="tabpanel" class="tab-pane" id="code">
            <p>Code Tracking Tab here.</p>
        </div>
      </div>
        
      </div>
    </div>
  </div>
</div>