<div class="modal fade" id="TransferInModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                {{ Form::open(array('url' => 'foo/bar', 'method' => 'put')) }}
                    <p class="clear text-center">
                        <span class="col-md-5">Main Wallet Balance:</span>
                        <span class="col-md-7">
                            <input disabled v-model="intactdata.wallet.amount | currency " type="text" class="dark-input" name="balance" />
                        </span>
                    </p>
                    
                    <p class="clear text-center">
                        <span class="col-md-5">Enter Amount:</span>
                        <span class="col-md-7">
                            <input v-model="intactdata.setSelected.transferIn | currency "  type="text" class="light-input" name="balance" />
                        </span>
                    </p>
                    
                    <p class="text-center">
                        <input @click.prevent="submitTransferIn" type="submit" name="submit" value="Transfer In" class="modal-btn">
                    </p>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>