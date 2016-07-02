
    <!-- Main Wallet Modal -->
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

          <!-- Deposit Side tabs -->
          <div id="merchant-tab" class="sidetab-box">
            <div class="sidetab-box-content">
            
              <img src="{{url('img/mainpage/merchant-exchanger-tab.png')}}" alt="merchant exchanger" />
              <p class="text-center">Please enter your Deposit Code below. <br /> Contact our merchants to get your Deposit Code via our <a href="#">Merchant Page</a>. </p>
              <form>
                <p><input type="text" v-model="intactdata.wallet.merchantCode" name="depositcode" class="light-input" placeholder="your deposit code" /></p>
                <p>
                    <input type="text" v-model="intactdata.wallet.deposit | currency" name="amount" class="dark-input"   disabled="disabled" /> 
                    <input  :disabled="intactdata.wallet.merchantCode==''"
                            @click.prevent="depositCode()" type="submit"
                            name="submit" value="Add Funds" class="modal-btn"
                    >
                </p>
              </form>
              <div id="side-tabs">
                <a href="#merchant" class="toggle-button">Deposit</a> 
              </div>
            </div>

          </div>

          <div id="ewiretransfer-tab" class="sidetab-box3">
            <div class="sidetab-box-content3 sidetab-box-common">
            
            <div class="col-md-4 nopadding">
              <img src="{{url("img/mainpage/ewire-tab.png")}}" alt="ewire transfer" />
            </div>
            <div class="col-md-8 nopadding">
                <!-- <h3 class="nomargin text-center semibold">Notify your payment</h3>
                <h3 class="text-center">Upload your proof of payment</h3> -->
            </div>
            <div class="clear"></div>
            <!-- <p>Select file: <input type="file" id="ewiredocument"> <input type="submit" name="submit" value="Upload your documents" class="modal-btn" style="padding: 0 10px !important;"></p> -->
            <h3 class="text-center semibold"> Amount: &nbsp; &nbsp;
                 <input style="margin-right: 0px !important;  padding: 0 96px !important; max-width: 375px !important;" v-model="intactdata.wallet.deposit | currency" type="text" name="amount" class="dark-input"   disabled="disabled" />
            </h3>
            <p>Note (Optional): <br /> <input v-model="intactdata.wallet.notes" type="text" name="note" class="light-input" /></p>
            <p class="text-center"><input @click="processWire()" type="submit" name="submit" value="Deposit" class="modal-btn"></p>
            <!-- <p class="nomargin text-center semibold"><a href="#">Request Invoice</a> for a new payment</p> -->
              <div id="side-tabs">
                <a href="#ewiretransfer" class="toggle-button3">Deposit</a> 
              </div>
            </div>

          </div>

          <div id="skrill-tab" class="sidetab-box4">
            <div class="sidetab-box-content4 sidetab-box-common">
          
            <img src="{{url("img/mainpage/skrill-tab.png")}}" alt="skrill" />
             
            <h3 class="text-center semibold">Amount: <input type="text" name="amount" class="dark-input"   disabled="disabled" value="1000" /> USD</h3>
            <p class="text-center"><input type="text" name="amountid" class="dark-input"   disabled="disabled" value="E-office ID: 12345" /> <input type="submit" name="submit" value="Add Funds" class="modal-btn"></p>
            <p class="text-center semibold">You will be redirect to your Skrill’s Login Page</p>
              <div id="side-tabs">
                <a href="#skrill" class="toggle-button4">Deposit</a> 
              </div>
            </div>

          </div>

        <div id="perfectmoney-tab" class="sidetab-box5">
            <div class="sidetab-box-content5 sidetab-box-common">

            <form action="https://perfectmoney.is/api/step1.asp" method="POST">
                <input type="hidden" name="PAYEE_ACCOUNT" value="U11189043">
                <input v-model="intactdata.profile.eoffice_id" type="hidden" name="PAYEE_NAME" value="Test">
                <input type="hidden" name="PAYMENT_ID" value="{{ str_random(6) }}">
                <input v-model="intactdata.wallet.deposit" type="hidden" name="PAYMENT_AMOUNT">
                <input type="hidden" name="PAYMENT_UNITS" value="USD">
                <input type="hidden" name="STATUS_URL" value=" {{ url('payment/pm/pmprocess') }} ">
                <input type="hidden" name="PAYMENT_URL" value="  {{ url('payment/pm/success') }} ">
                <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
                <input type="hidden" name="NOPAYMENT_URL" value=" {{ url('payment/pm/error') }} ">
                <input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
                <input type="hidden" name="SUGGESTED_MEMO" value="payment comments here">
                <input type="hidden" name="BAGGAGE_FIELDS" value="">
                <img src="{{ url("img/mainpage/perfect-money-tab.png") }}"  alt="perfect money" />
                <div class="gap"></div>
                <h3 class="text-center semibold">Amount: <input v-model="intactdata.wallet.deposit | currency" type="text" name="amount" class="dark-input"   disabled="disabled" /> USD</h3>
                <p class="text-center"><input disabled="disabled" v-model="intactdata.profile.eoffice_id"  type="text" name="amountid" class="dark-input"    /> <input type="submit" name="submit" value="Add Funds" class="modal-btn"></p>
                <p class="text-center semibold">You will be redirect to your Perfect Money Login Page</p>
                  <div id="side-tabs">
                    <a onclick="$(this).closest('form').submit()" href="#perfectmoney" class="toggle-button5">Deposit</a> 
                  </div>
                </div>
            </form>

          </div>

          <div id="neteller-tab" class="sidetab-box6">
            <div class="sidetab-box-content6 sidetab-box-common">
          
            <img src="{{url("img/mainpage/neteller-tab.png")}}" alt="neteller" />
            <div class="gap"></div>
            <p class="text-center"><input type="text" name="accountid" class="light-input" value="Neteller Account ID/ Email" /></p>
            <p class="text-center"><input type="text" name="securityid" class="light-input" value="Secure ID / Authentication Code" /></p>
            <p class="text-center"><input type="text" name="amountid" class="dark-input"   disabled="disabled" value="E-office ID: 12345" /> <input type="submit" name="submit" value="Add Funds" class="modal-btn"></p>
              <div id="side-tabs">
                <a href="#neteller" class="toggle-button6">Deposit</a> 
              </div>
            </div>

          </div>

          <div id="bitcoin-tab" class="sidetab-box7">
            <div class="sidetab-box-content7 sidetab-box-common">
          
            <img src="{{url("img/mainpage/bitcoin-tab.png")}}" alt="bitcoin" />
       <!--      <div class="gap"></div>
            <div class="col-md-4">
                <img src="{{url("img/mainpage/unknown-image.png")}}" alt="unknown" />
            </div>
            <div class="col-md-8">
                <p>Address <br /><input type="text" name="address" class="light-input" value="1PPoBFLZk4AMUcZJM6XNSrsQg4LmfA63nq" /></p>
                <p class="text-center"><input type="submit" name="submit" value="Copy" class="modal-btn"></p>
                <p class="text-center">Please scan QR Code or copy our BTC Address <br />using your Bitcoin Wallet to send payment</p>
            </div> -->
              <div id="side-tabs">
                <a href="#bitcoin" class="toggle-button7">Deposit</a> 
              </div> 
              <!-- <iframe id="coinbase_inline_iframe_d897eca845b8d22bcad0141620ecad22" src="https://sandbox.coinbase.com/checkouts/d897eca845b8d22bcad0141620ecad22/inline" style="width: 460px; height: 350px; border: none; box-shadow: 0 1px 3px rgba(0,0,0,0.25);" allowtransparency="true" frameborder="0"></iframe> -->
            </div>

          </div>

          <!-- payment detected tab-->
          <div id="payment-detected-tab" class="sidetab-box8">
            <div class="sidetab-box-content8 sidetab-box-common">
          
                <div class="gap"></div>
                <p class="text-center">PAYMENT DETECTED</p>
                <div class="gap"></div>
                <p class="text-center">We have detected your payment, and will process <br /> your order as soon as the transaction is confirmed <br /> 
                    on the Bitcoin network. (this usually takes around 10 minutes).</p>
                <div class="gap"></div>
                <p class="text-center">As soon as the transaction is confirmed (normally this takes ~10 minutes), <br />the topup amount will be credited to your main wallet.</p>

            </div>

          </div>


          <!-- withdrawal Side tabs -->
          <div id="merchant-withdraw" class="sidetab-box-withdraw">
              <div class="sidetab-box-withdraw-content sidetab-box-common">
              
                <img src="{{url("img/mainpage/merchant-exchanger-tab.png")}}" alt="merchant exchanger" />
                <div class="gap"></div>
                <p class="text-center">Please select your merchant from exchanger list in <br /> <a href="#">Merchant Page</a> <br />
                  to request withdrawal thru merchant exchanger. </p>
                <div class="gap"></div>
                <div id="side-tabs2">
                  <a href="#merchant-withdrawal" class="next-toggle-button">withdrawal</a> 
                </div>
            </div>
          </div>

          <div id="ewire-withdraw" class="sidetab-box-withdraw2">
              <div class="sidetab-box-withdraw-content2 sidetab-box-common">
                
                <img src="{{ url("img/mainpage/ewire-tab.png") }}" alt="ewire transfer" />
                <form>
                    <div class="gap"></div>
                    <p class="text-center">Please submit your bank account details via <a href="#">Setting Page</a></p>
                    <div class="gap"></div>
                    <p class="text-center"><input :disabled="monitorWithdrawal<0" type="submit" name="submit" value="Cash Out" class="modal-btn"></p>
                </form>

                <div id="side-tabs2">
                  <a href="#ewire-withdrawal" class="next-toggle-button2">withdrawal</a> 
                </div>

            </div>
          </div>

          <div id="skrill-withdraw" class="sidetab-box-withdraw3">
              <div class="sidetab-box-withdraw-content3 sidetab-box-common">
                
                <img src="{{url('img/mainpage/skrill-tab.png')}}" alt="skrill" />
                <form>
                    <div class="gap"></div>
                    <p class="text-center"><input type="text" name="accountid" class="dark-input fullwidth-input" value="Skrill Account ID/ Email" /></p>
                    <div class="gap"></div>
                    <p class="text-center"><input :disabled="monitorWithdrawal<0" type="submit" name="submit" value="Cash Out" class="modal-btn"></p>
                </form>
                <div id="side-tabs2">
                  <a href="#skrill-withdrawal" class="next-toggle-button3">withdrawal</a> 
                </div>
            </div>
          </div>

          <div id="perfectmoney-withdraw" class="sidetab-box-withdraw4">
              <div class="sidetab-box-withdraw-content4 sidetab-box-common">
                
                <img src="{{url('img/mainpage/perfect-money-tab.png')}}" alt="perfect money" />
                <form>
                    <div class="gap"></div>
                    <p class="text-center"><input type="text" name="accountid" class="dark-input fullwidth-input" value="Perfect Money Account ID/ Email" /></p>
                    <div class="gap"></div>
                    <p class="text-center"><input :disabled="monitorWithdrawal<0" type="submit" name="submit" value="Cash Out" class="modal-btn"></p>
                </form>
                <div id="side-tabs2">
                  <a href="#perfectmoney-withdrawal" class="next-toggle-button4">withdrawal</a> 
                </div>
            </div>
          </div>

          <div id="neteller-withdraw" class="sidetab-box-withdraw5">
              <div class="sidetab-box-withdraw-content5 sidetab-box-common">
                
                <img src="{{url('img/mainpage/neteller-tab.png')}}" alt="neteller" />
                <form>
                    <div class="gap"></div>
                    <p class="text-center"><input type="text" name="accountid" class="dark-input fullwidth-input" value="Neteller Account ID/ Email" /></p>
                    <div class="gap"></div>
                    <p class="text-center"><input :disabled="monitorWithdrawal<0" type="submit" name="submit" value="Cash Out" class="modal-btn"></p>
                </form>
                <div id="side-tabs2">
                  <a href="#neteller-withdrawal" class="next-toggle-button5">withdrawal</a> 
                </div>
            </div>
          </div>

         <div id="bitcoin-withdraw" class="sidetab-box-withdraw6">
              <div class="sidetab-box-withdraw-content6 sidetab-box-common">
                
                <img src="{{url('img/mainpage/bitcoin-tab.png')}}" alt="bitcoin" />
                <form>
                    <div class="gap"></div>
                    <p class="text-center semibold">Please write down or paste your BTC Address</p>
                    <p class="text-center"><input type="text" name="accountid" class="light-input fullwidth-input" value="" /></p>
                    <div class="gap"></div>
                    <p class="text-center"><input :disabled="monitorWithdrawal<0" type="submit" name="submit" value="Cash Out" class="modal-btn"></p>
                </form>
                <div id="side-tabs2">
                  <a href="#bitcoin-withdrawal" class="next-toggle-button6">withdrawal</a> 
                </div>

            </div>
          </div>

          <div id="onetime-password-withdraw" class="sidetab-box-withdraw7">
              <div class="sidetab-box-withdraw-content7 sidetab-box-common">

              <form>
                    <div class="gap"></div>
                    <p class="text-center semibold">One Time Password(OTP)<input type="text" name="accountid" class="light-input short-input" value="" />
                    <input type="submit" name="submit" value="Request OTP" class="modal-btn"></p>
                    <div class="gap"></div>
                    <p class="text-center">Your request will be process within 24 hours. <br />Please come back later to check status of your withdrawal via Transaction History</p>
              </form>
            </div>
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
                                <input id="inputDeposit" @click="empty()" v-model="intactdata.wallet.deposit | currency" type="text" class="light-input" name="balance" /> USD</span>
                        </p>
                      
                        <p class="text-center">Choose payment method:</p>

                        <p class="text-center">
                            <input type="button" class="payment-button-1 toggle-button7" name="bitcoin" value="bitcoin">
                            <input type="button" class="payment-button-2 toggle-button6" name="neteller" value="neteller">
                            <input type="button" class="payment-button-3 toggle-button" name="merchant" value="merchant">
                            <input type="button" class="payment-button-4 toggle-button3" name="ewiretransfer" value="ewiretransfer">
                            <input type="button" class="payment-button-5 toggle-button5" name="perfectmoney" value="perfectmoney">
                            <input type="button" class="payment-button-6 toggle-button4" name="skrill" value="skrill">
                        </p>

                    </form>
                </div>

                <p class="bold uppercase nomargin">Withdrawal</p>
                
                <div class="form-box nomargin">
                    <form>
                     <p v-show="monitorWithdrawal<0" class="clear text-center text-danger">
                        Withdrawal Limit for selected merchant is: @{{ intactdata.wallet.withdrawalLimit }}
                     </p>
                        <p class="clear text-center">
                            <span class="col-md-3">Enter Amount:</span>
                            <span class="col-md-9">
                                <input v-model="intactdata.wallet.withdrawal | currency" type="text" class="light-input" name="balance" /> USD</span>
                        </p>
                        <p class="text-center">Choose payment method:</p>
                        <p class="text-center">
                            <input @click="merchantWithdrawal('bitcoin')" type="button" class="payment-button-1 next-toggle-button6" name="bitcoin" value="bitcoin">
                            <input type="button" class="payment-button-2 next-toggle-button5" name="neteller" value="neteller">
                            <input type="button" class="payment-button-3 next-toggle-button" name="merchant" value="merchant">
                            <input type="button" class="payment-button-4 next-toggle-button2" name="ewiretransfer" value="ewiretransfer">
                            <input @click="merchantWithdrawal('pm')" type="button" class="payment-button-5 next-toggle-button4" name="perfectmoney" value="perfectmoney">
                            <input type="button" class="payment-button-6 next-toggle-button3" name="skrill" value="skrill">
                        </p>
                    </form>
                </div>
                <p>Payment method which is available for withdrawal is the same method used to deposit.</p>
            </div>
            <div role="tabpanel" class="tab-pane" id="transaction">
                <div class="transaction-box">
                    <form>
                    <p class="clear" style=";overflow:visible;padding-bottom:10px;">
                        <span class="col-md-6">Select Date: From <input v-model="history.startDate" id="datetimepicker1" type="text" name="datefrom" class="date-input" /><img src="{{url('img/mainpage/date-icon.png')}}" class="date-icon" /></span>
                        <span class="col-md-6">To <input v-model="history.endDate" id="datetimepicker2" type="text" name="dateto" class="date-input" ><img src="{{url('img/mainpage/date-icon.png')}}" class="date-icon" /></span>
                    </p>
                    <br>
                    <p class="text-center" style="z-index:-1;">
                        <input @click.prevent="updateHistory('deposit')" type="submit" name="submit" value="DEPOSIT" class="modal-btn">
                        <input @click.prevent="updateHistory('withdrawal')" type="submit" name="submit" value="WITHDRAWAL" class="modal-btn middle-btn">
                        <input @click.prevent="updateHistory('filter')" type="submit" name="submit" value="ALL" class="modal-btn">
                    </p>
                    </form>
                    <form >
                        <table>
                            <tr>
                              <th class="text-center">Reference Id</th>
                              <th>Date</th>
                              <th>Amount</th>
                              <th>Type</th>
                              <th class="text-center">Status</th>
                            </tr>

                            <tr class="table-dashboard" v-for="transaction in transactionHistory">
                                <td>#@{{ transaction.id}}</td>
                                <td> @{{  moment(transaction.created_at).format('MM/DD/YYYY')  }} </td>
                                <td> @{{transaction.payment_amount | currency }}</td>
                                <td> @{{transaction.type}} 
                                    <img v-if="transaction.funding_service=='bitcoin'" src="{{url('img/mainpage/bitcoin-small-icon.png')}}" class="transaction-icon" />
                                    <img v-if="transaction.funding_service=='wire'" src="{{url('img/mainpage/ewire-small-icon.png')}}" class="transaction-icon" />
                                    <img v-if="transaction.funding_service=='pm'" src="{{url('img/mainpage/pm-small-icon.png')}}" class="transaction-icon" />
                                </td>
                                <td>
                                    <span v-if="transaction.confirm=='0'" class="process-btn">processing</span>
                                    <span v-if="transaction.confirm=='1'" class="pending-btn">pending</span>
                                    <span v-if="transaction.confirm=='2'" class="approve-btn">approved</span>
                                    <span v-if="transaction.confirm=='3'" class="reject-btn">rejected</span>
                                </td>
                            </tr>

                            <!-- <tr>
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
                            </tr> -->
                        </table>
                    </form>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="verification">
                <div class="verification-box">
                <h3>Upload your documents for account verification</h3><br>

                    <p class="clear">
                        <div class="col-md-3" style="line-height:36px;">Verify Identity:</div>
                        <div class="col-md-9 fileinput">
                            {!! Form::open(array('route' => 'identityupload', 'method' => 'POST', 'id' => 'my-dropzone', 'class' => 'my-dropzone', 'files' => true, 'style' => 'padding:0;')) !!}
                                {!! csrf_field() !!}
                                {!! Form::hidden('action', 'identityUpload') !!}
                                <a v-show="intactdata.userProfile.identity_file_url!=''" target="_blank" href="{{ url('uploads') }}/@{{ intactdata.userProfile.identity_file_url }}">View Uploaded File &nbsp;&nbsp;&nbsp;</a>
                                <button id="identityUploadBtn" data-loading-text="Uploading...." type="submit" name="submit" class="upload-submit modal-btn">
                                    <span v-show="intactdata.userProfile.identity_file_url==''" >Upload</span>
                                    <span v-show="intactdata.userProfile.identity_file_url!=''" >Upload New</span>
                                </button>
                            {!! Form::close() !!} 
                            <!--<input type="file" id="indentityfile" />-->
                        </div>
                        <!-- <div class="col-md-2"><input type="submit" name="submit" value="Clear" class="modal-btn"></div> -->
                    </p>
                    <br><br><br>
                    <p class="clear">
                        <div class="col-md-3" style="line-height:36px;">Verify Address:</div>
                         <div class="col-md-9 fileinput">
                            {!! Form::open(array('route' => 'identityupload', 'method' => 'POST', 'id' => 'my-dropzone2', 'class' => 'my-dropzone2 form single-dropzone form-horizontal', 'files' => true, 'style' => 'padding:0;')) !!}
                                {!! Form::hidden('action', 'addressUpload') !!}
                                <a v-show="intactdata.userProfile.address_file_url!=''" target="_blank" href="{{ url('uploads') }}/@{{ intactdata.userProfile.address_file_url }}">View Uploaded File &nbsp;&nbsp;&nbsp;</a>
                                <button id="addressUploadBtn" data-loading-text="Uploading...." type="submit" name="submit" class="upload-submit modal-btn">
                                  <span v-show="intactdata.userProfile.address_file_url==''" >Upload</span>
                                  <span v-show="intactdata.userProfile.address_file_url!=''" >Upload New</span>
                                </button>
                            {!! Form::close() !!} 
                            <!--<input type="file" id="indentityfile" />-->
                        </div>
                        <!-- <span class="col-md-2"><input type="submit" name="submit" value="Clear" class="modal-btn"></span> -->
                    </p>
                    <br><br><br><br>
                    <div class="col-md-12">
                        <p class="clear">
                            <span class="block">Note (Optional):</span>
                            <input type="text" class="input-note" name="note" />
                        </p>
                        <p class="nomargin small">Your Identity verification can be verify using National ID Card, Passport or Driving License</p>
                        <p class="clear small">Your Address verification can be verify using Utility bill, Bank Statement or National official letter</p>
                    </div>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                
                </div>
            </div>
          </div>
            
          </div>
        </div>
      </div>
    </div>