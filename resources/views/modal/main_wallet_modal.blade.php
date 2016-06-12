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

          <div id="side-tabs">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="#deposit" aria-controls="deposit" role="tab" data-toggle="tab">Deposit</a></li>
                <li role="presentation"><a href="#withdrawal" aria-controls="withdrawal" role="tab" data-toggle="tab">Withdrawal</a></li>
              </ul>
          </div>
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="financial">
                <p class="bold uppercase nomargin">Deposit</p>
                <div class="form-box">
                    <form>

                        <p class="clear text-center">
                            <span class="col-md-3">Enter Amount:</span>
                            <span class="col-md-9">
                                <input v-model="intactdata.wallet.amount" type="text" class="light-input" name="balance" />
                                USD
                            </span>
                        </p>

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
                </div>
                <p>Payment method which is available for withdrawal is the same method used to deposit.</p>
            </div>
            <div role="tabpanel" class="tab-pane" id="transaction">
                <div class="transaction-box">
                    <form>
                    <p class="clear text-center">
                        <span class="col-md-7">Select Date: From <input type="text" name="datefrom" class="date-input" value="dd/mm/yy" /><img src="{{url('img/mainpage/date-icon.png')}}" class="date-icon" /></span>
                        <span class="col-md-5"> To <input type="text" name="dateto" class="date-input" value="dd/mm/yy" /><img src="{{url('img/mainpage/date-icon.png')}}" class="date-icon" /></span>
                    </p>
                    <p class="text-center">
                        <input type="submit" name="submit" value="DEPOSIT" class="modal-btn">
                        <input type="submit" name="submit" value="WITHDRAWAL" class="modal-btn middle-btn">
                        <input type="submit" name="submit" value="ALL" class="modal-btn">
                    </p>
                    </form>
                    <form>
                        <table>
                            <tr>
                              <th class="text-center">Reference Id</th>
                              <th>Date</th>
                              <th>Amount</th>
                              <th>Type</th>
                              <th class="text-center">Status</th>
                            </tr>
                            <tr>
                                <td>#d431723</td>
                                <td>23/09/2015</td>
                                <td>1,000</td>
                                <td>deposit <img src="{{url('img/mainpage/bitcoin-small-icon.png')}}" class="transaction-icon" /></td>
                                <td><span class="pending-btn">pending</span></td>
                            </tr>
                            <tr>
                                <td>#d431723</td>
                                <td>06/09/2015</td>
                                <td>1,200</td>
                                <td>withdrawal <img src="{{url('img/mainpage/ewire-small-icon.png')}}" class="transaction-icon" /></td>
                                <td><span class="process-btn">processing</span></td>
                            </tr>
                            <tr>
                                <td>#w930944</td>
                                <td>22/08/2015</td>
                                <td>3,000</td>
                                <td>withdrawal <img src="{{url('img/mainpage/pm-small-icon.png')}}" class="transaction-icon" /></td>
                                <td><span class="approve-btn">approved</span></td>
                            </tr>
                            <tr>
                                <td>#w913762</td>
                                <td>08/07/2015</td>
                                <td>12,000</td>
                                <td>withdrawal <img src="{{url('img/mainpage/ewire-small-icon.png')}}" class="transaction-icon" /></td>
                                <td><span class="approve-btn">approved</span></td>
                            </tr>
                            <tr>
                                <td>#d426513</td>
                                <td>04/06/2015</td>
                                <td>10,000</td>
                                <td>deposit <img src="{{url('img/mainpage/ewire-small-icon.png')}}" class="transaction-icon" /></td>
                                <td><span class="approve-btn">approved</span></td>
                            </tr>
                            <tr>
                                <td>#w902673</td>
                                <td>04/05/2015</td>
                                <td>2,500</td>
                                <td>withdrawal <img src="{{url('img/mainpage/bitcoin-small-icon.png')}}" class="transaction-icon" /></td>
                                <td><span class="approve-btn">approved</span></td>
                            </tr>
                            <tr>
                                <td>#d399214</td>
                                <td>13/04/2015</td>
                                <td>3,000</td>
                                <td>deposit <img src="{{url('img/mainpage/bitcoin-small-icon.png')}}" class="transaction-icon" /></td>
                                <td><span class="reject-btn">rejected</span></td>
                            </tr>
                            <tr>
                                <td>#w880316</td>
                                <td>17/03/2015</td>
                                <td>1,000</td>
                                <td>withdrawal <img src="{{url('img/mainpage/pm-small-icon.png')}}" class="transaction-icon" /></td>
                                <td><span class="approve-btn">approved</span></td>
                            </tr>
                            <tr>
                                <td>#w874682</td>
                                <td>10/03/2015</td>
                                <td>350</td>
                                <td>withdrawal <img src="{{url('img/mainpage/pm-small-icon.png')}}" class="transaction-icon" /></td>
                                <td><span class="cancel-btn">cancelled</span></td>
                            </tr>
                            <tr>
                                <td>#d348162</td>
                                <td>02/03/2015</td>
                                <td>5,000</td>
                                <td>deposit <img src="{{url('img/mainpage/pm-small-icon.png')}}" class="transaction-icon" /></td>
                                <td><span class="approve-btn">approved</span></td>
                            </tr>
                            <tr>
                                <td>#d331694</td>
                                <td>25/02/2015</td>
                                <td>15,000</td>
                                <td>deposit <img src="{{url('img/mainpage/bitcoin-small-icon.png')}}" class="transaction-icon" /></td>
                                <td><span class="approve-btn">approved</span></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="verification">
                <div class="verification-box">
                <form>
                <h3>Upload your documents for account verification</h3>
                    <p class="clear">
                        <span class="col-md-3">Verify Identity:</span>
                        <span class="col-md-7 fileinput"><input type="file" id="indentityfile" /></span>
                        <span class="col-md-2"><input type="submit" name="submit" value="Send" class="modal-btn"></span>
                    </p>
                    <p class="clear">
                        <span class="col-md-3">Verify Address:</span>
                        <span class="col-md-7 fileinput"><input type="file" id="addressfile" /></span>
                        <span class="col-md-2"><input type="submit" name="submit" value="Send" class="modal-btn"></span>
                    </p>
                    <div class="col-md-12">
                        <p class="clear">
                            <span class="block">Note (Optional):</span>
                            <input type="text" class="input-note" name="note" />
                        </p>
                        <p class="nomargin small">Your Identity verification can be verify using National ID Card, Passport or Driving License</p>
                        <p class="clear small">Your Address verification can be verify using Utility bill, Bank Statement or National official letter</p>
                    </div>
                </form>
                </div>
            </div>
          </div>
            
          </div>
        </div>
      </div>
    </div>