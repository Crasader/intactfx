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
                    
                    <p class="text-center">
                        <input @click.prevent="submitTransferOut" type="submit" name="submit" value="Transfer Out" class="modal-btn">
                    </p>

                </form>
            </div>
        </div>
    </div>
</div>
