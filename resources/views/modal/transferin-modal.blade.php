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

                     <div v-show="isNaN(intactdata.setSelected.transferIn)" class="alert alert-danger text-center">
                        <i class="fa fa-exclamation-triangle"></i> Error value!
                    </div>

                    <div v-show="intactdata.setSelected.transferIn > intactdata.wallet.amount" class="alert alert-danger text-center">
                        <i class="fa fa-exclamation-triangle"></i> Cannot transfer in greater than wallet amount.
                    </div>
                    
                     <div v-show="intactdata.setSelected.transferIn < 10" class="alert alert-danger text-center">
                        <i class="fa fa-exclamation-triangle"></i> Minimum amount to transfer: $10
                    </div>

                    <p class="text-center">
                        <input  :disabled="intactdata.setSelected.transferIn > intactdata.wallet.amount 
                                || intactdata.setSelected.transferIn < 10
                                || isNaN(intactdata.setSelected.transferIn)"
                                 @click.prevent="submitTransferIn" type="submit" name="submit" value="Transfer In" class="modal-btn"    
                        >
                    </p>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>