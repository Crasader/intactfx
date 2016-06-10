<div class="modal fade" id="TransferInModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            {{ Form::open(array('url' => 'foo/bar', 'method' => 'put')) }}
                <p class="clear text-center"><span class="col-md-5">Main Wallet Balance:</span><span class="col-md-7"><input type="text" value="12,000" class="dark-input" name="balance" /> USD</span></p>
                <p class="clear text-center"><span class="col-md-5">Enter Amount:</span><span class="col-md-7"><input type="text" value="5,000" class="light-input" name="balance" /> USD</span></p>
                <p class="text-center"><input type="submit" name="submit" value="Transfer In" class="modal-btn"></p>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>