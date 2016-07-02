<div class="modal fade" id="CommissionWalletModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#wallettransfer" aria-controls="wallettransfer" role="tab" data-toggle="tab">Wallet Transfer</a></li>
            <li role="presentation"><a href="#commission" aria-controls="commission" role="tab" data-toggle="tab">Commission History</a></li>
            <li v-show="intactdata.userProfile.merchant_stat=='1' || intactdata.userProfile.account_stat=='ib_account' " role="presentation"><a href="#merchant" aria-controls="merchant" role="tab" data-toggle="tab">Merchant E-Office</a></li>
            <li v-show="intactdata.userProfile.merchant_stat=='1' || intactdata.userProfile.account_stat=='ib_account' " role="presentation"><a href="#code" aria-controls="code" role="tab" data-toggle="tab">Code Tracking</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="wallettransfer">

                <div class="col-md-6">
                    <p class="bold nomargin">Transfer your commission to Main Wallet</p>
                    <div class="form-box">
                        <form>
                            <!-- validation -->
                            <div v-show="isNaN(redCommissionData.transferToMain)" class="alert alert-danger text-center">
                                <i class="fa fa-exclamation-triangle"></i> Error value!
                            </div>

                            <div v-show="redCommissionData.transferToMain > intactdata.wallet.red" class="alert alert-danger text-center">
                                <i class="fa fa-exclamation-triangle"></i> Cannot transfer in greater than commision amount.
                            </div>
                            
                             <div v-show="redCommissionData.transferToMain < 10" class="alert alert-danger text-center">
                                <i class="fa fa-exclamation-triangle"></i> Minimum amount to transfer: $10
                            </div>

                            <p class="clear text-center">
                                <span class="col-md-5">Total Commission:</span>
                                <span class="col-md-7">
                                    <input type="text"  v-model="intactdata.wallet.red | currency" class="dark-input" name="balance" disabled="disabled" /> 
                                </span>
                            </p>

                            <p class="clear text-center">
                                <span class="col-md-5">Enter Amount:</span>
                                <span class="col-md-7">
                                    <input type="text"  @click="redCommissionData.transferToMain=''" v-model="redCommissionData.transferToMain | currency" class="light-input" name="balance" /> 
                                </span>
                            </p>

                            <p class="text-center">
                                <input :disabled="redCommissionData.transferToMain > intactdata.wallet.red 
                                        || redCommissionData.transferToMain < 10
                                        || isNaN(redCommissionData.transferToMain)"
                                        @click.prevent="transferToMainWallet()" type="submit" name="submit" value="Transfer to Main Wallet" class="modal-btn"
                                >
                            </p>

                        </form>
                    </div>

                    <div  v-show="intactdata.userProfile.merchant_stat==0 && intactdata.userProfile.account_stat!='ib_account'" class="form-box">
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p class="text-center"><a href="#" class="modal-btn"> Apply Now</a></p>
                        <p class="text-center small">Your application will be process within 7 working days</p>
                        <p>&nbsp;</p>
                    </div>

                    <p v-show="intactdata.userProfile.merchant_stat==1 || intactdata.userProfile.account_stat=='ib_account'" class="bold nomargin">Transfer your funds to Merchant Wallet</p>
                    <div v-show="intactdata.userProfile.merchant_stat==1 || intactdata.userProfile.account_stat=='ib_account'" class="form-box">
                        <form>
                          <!-- validation -->
                            <div v-show="isNaN(redCommissionData.transferToMerchant)" class="alert alert-danger text-center">
                                <i class="fa fa-exclamation-triangle"></i> Error value!
                            </div>

                            <div v-show="redCommissionData.transferToMerchant > intactdata.wallet.amount" class="alert alert-danger text-center">
                                <i class="fa fa-exclamation-triangle"></i> Cannot transfer in greater than wallet amount.
                            </div>
                            
                             <div v-show="redCommissionData.transferToMerchant < 10" class="alert alert-danger text-center">
                                <i class="fa fa-exclamation-triangle"></i> Minimum amount to transfer: $10
                            </div>

                            <p class="clear text-center">
                                <span class="col-md-5">Main Wallet Balance:</span>
                                <span class="col-md-7">
                                    <input v-model="intactdata.wallet.amount | currency" type="text"  class="dark-input" name="balance" disabled="disabled" /> 
                                </span>
                            </p>

                            <p class="clear text-center">
                                <span class="col-md-5">Enter Amount:</span>
                                <span class="col-md-7">
                                    <input type="text"   @click="redCommissionData.transferToMerchant=''" v-model="redCommissionData.transferToMerchant | currency"  class="light-input" name="balance" /> 
                                </span>
                            </p>

                            <p class="text-center">
                                <input :disabled="redCommissionData.transferToMerchant > intactdata.wallet.amount
                                        || redCommissionData.transferToMerchant < 10
                                        || isNaN(redCommissionData.transferToMerchant)"
                                        @click.prevent="transferToMerchantWallet()" type="submit" name="submit" value="Transfer to Merchant Wallet" class="modal-btn"
                                >
                            </p>
                        </form>
                    </div>

                </div>
                 <div v-show="intactdata.affiliate.count>0" class="col-md-6">
                     <form>
                        <table>
                            <tr>
                              <th class="text-center">Date</th>
                              <th class="text-center">Your EofficeID</th>
                              <th class="text-center">Signed Up By</th>
                           </tr>
                            <tr v-for="affiliate in intactdata.affiliate.data">
                                <td> @{{  moment(affiliate.created_at).format('MM/DD/YYYY')  }} </td>
                                <td> @{{ affiliate.affiliate_id }} </td>
                                <td> @{{ affiliate.eoffice_id }} </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="commission">
                <div class="transaction-box">
                    <form>
                    <p class="clear">
                        <span class="col-md-6 text-right">Select Date: From <input type="text" name="datefrom" class="date-input" value="dd/mm/yy" /><img src="{{url('img/mainpage/date-icon.png')}}" class="date-icon" /></span>
                        <span class="col-md-6 text-left"> To <input type="text" name="dateto" class="date-input" value="dd/mm/yy" /><img src="{{url('img/mainpage/date-icon.png')}}" class="date-icon" /></span>
                    </p>
                    <p class="text-center">
                        <input type="submit" name="submit" value="Level 1" class="modal-btn">
                        <input type="submit" name="submit" value="Level 2" class="modal-btn middle-btn">
                        <input type="submit" name="submit" value="Level 3" class="modal-btn">
                    </p>
                    </form>
                    <form>
                        <table>
                            <tr>
                              <th class="text-center">Date</th>
                              <th class="text-center">Level 1</th>
                              <th class="text-center">Level 2</th>
                              <th class="text-center">Level 3</th>
                              <!-- <th class="text-center">Total</th> -->
                            </tr>
                            <tr v-for="redcommission in redCommissionHistory">
                                <td> @{{  moment(redcommission.created_at).format('MM/DD/YYYY')  }} </td>
                                <td> @{{ redcommission.level1 | currency }} </td>
                                <td> @{{ redcommission.level2 | currency }} </td>
                                <td> @{{ redcommission.level3 | currency }} </td>
                                <!-- <td>@{{ getSum(redcommission.level1, redcommission.level2, redcommission.level3 ) | currency  }} </td> -->
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="navigation">
                    <span><a href="#"><<</a> &nbsp; <a href="#"><</a> <span class="navigation-label">Prev</span><span class="navigation-label">Next</span> <a href="#"> ></a> &nbsp; <a href="#">>></a></span>
                </div>
            </div>
            <div v-show="intactdata.userProfile.merchant_stat=='1' || intactdata.userProfile.account_stat=='ib_account' " role="tabpanel" class="tab-pane" id="merchant">
                <h3 class="tab-title">Merchant Wallet Balance: 
                    <input v-model="intactdata.wallet.merchant_wallet | currency" type="text"  class="dark-input" name="balance" disabled="disabled" />
                </h3>
                <div class="merchant-box">
                    <form>
                    <h3 class="clear text-center">Please enter Deposit Code value to be generated: 
                        <input v-model="merchantWallet.amount | currency" type="text" value="Amount" class="light-input" name="balance" /> USD
                        <span class="block red">(Amount must be multiples of10. Min: 100 usd)</span>
                    </h3>
                    <p class="clear text-center">One Time Password (OTP) 
                        <input v-model="merchantWallet.otp" type="text" class="dark-input" name="balance" />
                        <input type="submit" name="submit" value="Request OTP" class="small-btn">
                    </p>
                    <p class="text-center small">One Time Password (OTP) are mandotary upon generating Deposit Code. OTP will be expired once you Logout from your E-Office.</p>
                    </form>
                    <form>
                        <p class="clear text-center">
                            <input @click.prevent="generateCode()" type="submit" name="submit" value="GENERATE" class="modal-btn"></p>
                        <p class="clear text-center">
                            <input v-model="merchantWallet.code" type="text" class="generate-input" name="generatecode" />
                        </p>
                        <p class="text-center small">Code generated will be shown once. Please copy and keep it in safe place or your can refer to ‘Code Tracking’ tab for history.</p>
                    </form>
                </div>
                <p class="text-center small semibold">You can use your merchant wallet balance to generate Deposit Code for your clients. Please go to ‘Wallet Transfer’ tab and <br />choose ‘Transfer your funds to Merchant Wallet’ function.</p>
                <p>&nbsp;</p>
            </div>
            <div v-show="intactdata.userProfile.merchant_stat=='1' || intactdata.userProfile.account_stat=='ib_account' " role="tabpanel" class="tab-pane" id="code">
                <div class="codetracking-box">
                    <form>
                        <h3 class="text-center">Please enter One Time Password(OTP) to access Tracking Code page</h3>
                        <h3 class="text-center bold">One Time Password(OTP) <input type="text" value="" class="amount-input" name="amount" /> 
                            <input type="submit" name="submit" value="Request OTP" class="small-btn"></h3>
                    </form>
                    <p class="text-center"><a href="#" @click.prevent="codeTracking()" class="modal-btn">ENTER</a></p>
                    
                    <p class="text-center">Code Tracking services will only be available after you enter One Time Password(OTP)</p>
                        <br><br>
                        <table>
                            <tr>
                                <th class="text-center">Date</th>
                                <th class="text-center">Code</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Consumed</th>
                            </tr>
                            <tr v-for="code in merchantWallet.codeTracking">
                                <td> @{{ moment(code.created_at).format('MM/DD/YYYY') }}</td>
                                <td> @{{ code.code }}</td>
                                <td> @{{ code.amount }}</td>
                                <td> @{{ code.consumed }}</td>
                            </tr>
                        </table>
                </div>




            </div>
          </div>
            
          </div>
        </div>
      </div>
    </div>