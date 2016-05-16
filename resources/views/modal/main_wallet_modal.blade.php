<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Main Wallet</h4>
      </div>
      <div class="modal-body">

			<div class="tabbable-panel">
				<div id="tabs" class="tabbable-line" style="border: none;">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab_default_1" data-toggle="tab">
								Deposit 
							</a>
						</li>
						<li>
							<a href="#tab_default_2" data-toggle="tab">
								Withdrawal 
							</a>
						</li>
					
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
							<br>
							 <form class="form-inline">
					          <div class="form-group">
					            <label for="recipient-name" class="control-label">Enter Amount:</label>
					            <input v-model="wallet.amount" type="text" class="form-control" id="recipient-name">
					          </div>
					          @{{ amount | json }}
					        </form>

							<br><br>	
							<button  id="wirebutton" @click="processWire()" class="btn btn-success" >
								Wire Transfer
							</button>
						</div>
						<div class="tab-pane" id="tab_default_2">
							<p>
								<a class="btn btn-warning" href="#" target="_blank">
									button
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>


      </div>
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>