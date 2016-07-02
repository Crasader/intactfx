<div class="modal fade" id="TransferOutModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form>
                    <p class="clear text-center">
                        <span class="col-md-4">MT4 Balance:</span>
                        <span class="col-md-8">
                            <input disabled v-model="intactdata.setSelected.mt4Balance | currency " type="text" class="dark-input" name="balance" />
                        </span>
                    </p>

                    <p class="clear text-center">
                        <span class="col-md-4">Enter Amount:</span>
                        <span class="col-md-8">
                            <input  v-model="intactdata.setSelected.transferOut | currency "  type="text" class="light-input" name="balance" />
                        </span>
                    </p>
                    <div v-show="isNaN(intactdata.setSelected.transferOut)" class="alert alert-danger text-center">
                        <i class="fa fa-exclamation-triangle"></i> Error value!
                    </div>
                    <div v-show="!isNaN(intactdata.setSelected.transferOut) && intactdata.profile.hasOpenTrades==1" class="alert alert-warning text-center">
                        <i class="fa fa-exclamation-triangle"></i> Cannot transfer out from MT4 Account. <br> Close Open trades first.
                    </div>

                     <div v-show="!isNaN(intactdata.setSelected.transferOut) && intactdata.setSelected.transferOut > intactdata.setSelected.mt4Balance" class="alert alert-danger text-center">
                        <i class="fa fa-exclamation-triangle"></i> Cannot transfer out greater than selected MT4 account amount.    
                    </div>
                    
                    <div v-show="!isNaN(intactdata.setSelected.transferOut) && intactdata.setSelected.transferOut < 10" class="alert alert-danger text-center">
                        <i class="fa fa-exclamation-triangle"></i> Minimum amount to transfer: $10
                    </div>

                   <!--  :disabled="intactdata.profile.hasOpenTrades==1 
                                || intactdata.setSelected.transferOut > intactdata.wallet.amount 
                                || intactdata.setSelected.transferOut < 10 
                                || isNaN(intactdata.setSelected.transferOut) " -->

                    <p class="text-center">
                        <input  
                                @click.prevent="submitTransferOut()" type="submit" name="submit" value="Transfer Out" class="modal-btn"
                        >
                    </p>

                </form>
            </div>
        </div>
    </div>
</div>
