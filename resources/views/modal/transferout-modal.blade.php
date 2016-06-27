<div class="modal fade" id="TransferOutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form>
                    <p class="clear text-center">
                        <span class="col-md-4">MT4 Balance:</span>
                        <span class="col-md-8">
                            <input disabled v-model="intactdata.wallet.amount | currency " type="text" class="dark-input" name="balance" />
                        </span>
                    </p>

                    <p class="clear text-center">
                        <span class="col-md-4">Enter Amount:</span>
                        <span class="col-md-8">
                            <input  v-model="intactdata.setSelected.transferOut | currency "  type="text" class="light-input" name="balance" />
                        </span>
                    </p>
                    
                    <div v-show="intactdata.profile.hasOpenTrades==1" class="alert alert-warning text-center">
                        <i class="fa fa-exclamation-triangle"></i> Cannot transfer out from MT4 Account. <br> Close Open trades first.
                    </div>

                    <p class="text-center">
                        <input :disabled="intactdata.profile.hasOpenTrades==1" @click.prevent="submitTransferOut" type="submit" name="submit" value="Transfer Out" class="modal-btn">
                   </p>
                   

                </form>
            </div>
        </div>
    </div>
</div>
