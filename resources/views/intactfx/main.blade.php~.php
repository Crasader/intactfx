
<div class="container" id="testingapp">
      <div class="row">
        <div class="content">
          <div class="col-md-6">
            <!-- <img @click="openModal()" src="/img/member_img/12k-blue.png" alt="12,000 main wallet" title="12,000 main wallet" class="blue-btn-img"/> -->
                <!-- {{ $wallet->main_wallet }} -->

                <?php //dd($withdraw_available); echo '<pre>' . print_r($withdraw_available) . '</pre>'; ?>            
              <h2>{!! Session::get('success') !!}</h2>
            <div class="col-md-12" @click="mainwallet()">
            @if($user->account_stat==0)
                <div class="mainwallet-red wallet">
            @else
                <div class="mainwallet wallet">    
            @endif
                   <h2>{{ $account->commision_wallet }}</h2>
                <p>Commision Wallet</p>
                </div>
            </div>
            <!-- <img src="/img/member_img/12k-red.png" alt="12,000 commision wallet" title="12,000 commision wallet" class="red-btn-img"/> -->
            
            <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="commisionwallet_red wallet" @click="commisionwallet_red()">
              <div class="position">
                <h2>{{ $account->commision_wallet }}</h2>
                <p>Commision Wallet</p>
              </div>
            </div>
            </div>

            <!-- <img src="/img/member_img/12k-green.png" alt="12,000 commision wallet" title="12,000 commision wallet" class="green-btn-img"/> -->
            <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="commisionwallet_green wallet" @click="commisionwallet_green()">
              <div class="position">
                <h2>{{ $account->iprofit_commision_wallet }}</h2>
                <p>Commision Wallet</p>
              </div>
            </div>
            </div>

          </div>
          <div class="col-md-6">

            <div id="recentnews">
              <h3 class="recentnews-block-title">Recent News</h3>
              <div class="recentnews-block">
                <div class="recentnews-thumb col-md-2">
                  <img src="/img/member_img/recentnews-thumb.jpg" alt="recent news" title="recent news" class="img-responsive" />
                </div>
                <div class="recentnews-content col-md-9">
                  <h4>Proin gravida nibh vel velit auctor aliqut velit auctor aliquet enim</h4>
                  <span class="glyphicon glyphicon-chevron-right blue-icon" aria-hidden="true"></span>
                  <div class="recentnews-excerpt">
                    <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis be bendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
                  </div>
                  <a href="#" class="next-btn">Next</a>
                </div>
              </div>
            </div><!--/ recent news -->

            <div id="twitter">

              <div class="twitter-headline">
                <h3 class="twiiter-ribbon">Recent Tweet</h3>
              </div>
              
              <div v-for="(key, tweets) in tweet_feeds">
                <div class="tweets" v-if="key <= 1">
                  <h4>#intactfx</h4>
                  <p>@{{ tweets.text }}</p>
                   <span class="glyphicon glyphicon-chevron-right gray-icon" aria-hidden="true"></span>
                </div>
              </div>
              <!-- <div class="tweets">
                <h4>#intactfx</h4>
                <p>Proin gravida nibh vel velit auctor aliqut velit auctor aliquet enim </p>
                <span class="glyphicon glyphicon-chevron-right gray-icon" aria-hidden="true"></span>
              </div>
              <div class="separator"></div>
              <div class="tweets last">
                <h4>#intactfx</h4>
                <p>Proin gravida nibh vel velit auctor aliqut velit auctor aliquet enim </p>
                <span class="glyphicon glyphicon-chevron-right gray-icon" aria-hidden="true"></span>
              </div> -->

            </div><!--/ twitter -->
          </div>

          <!-- <div class="col-md-12">
            <div id="content-links">
                <ul>
                  <li><a href="#">Accounts</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Promotions and bonuses</a></li>
                  <li><a href="#">Contests</a></li>
                </ul>
              </div>
          </div> -->

         </div><!--/ content -->
       </div><!--/ row -->
    </div><!--/ container -->


<!-- Modal -->
<div id="mainWallet">
  <div>
  
  <div class="side_right_tabs">
    <ul>
      <li style="top: 3.2rem;"><img src="{{url('img/Deposit-tab.png')}}"></li>
      <li><img src="{{url('img/Withdrawal-tab.png')}}"></li>
    </ul>
  </div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs mainwallet-nav" role="tablist">
    @if($user->account_stat!=0)
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Financial Operation</a></li>
        <li role="presentation"><a href="#transactionhistory" aria-controls="transactionhistory" role="tab" data-toggle="tab">Transaction History</a></li>
    @endif
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Verification</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    @if($user->account_stat!=0)
    <div role="tabpanel" class="tab-pane active" id="home">
    @else
    <div role="tabpanel" class="tab-pane" id="home">
    @endif
      <h2>Deposit</h2>
      <div class="tab_divider">
      <div class="modal_section">
        <label>Enter Amount</label>
        <input v-model="wallet.amount" type="text">
        USD
      </div><!-- .modal_section -->
      <div class="modal_section">
        <h3 class="text-center">Choose payment method:</h3>
        <ul class="pg-logos">
         <!--  <li><img src="{{url('img/pg-logos/bitcoin.png')}}"></li> -->
          <li>
            <a class="coinbase-button" data-code="0f73b1b477edc3814748576ad947cd31" data-button-style="none" data-env="sandbox" href="https://sandbox.coinbase.com/checkouts/0f73b1b477edc3814748576ad947cd31"><img src="{{url('img/pg-logos/bitcoin.png')}}"></a><script src="https://sandbox.coinbase.com/assets/button.js" type="text/javascript"></script>
          </li>
          <li><img src="{{url('img/pg-logos/netteller.png')}}"></li>
          <li><img src="{{url('img/pg-logos/merchant-exchanger.png')}}"></li>
          <li id="wireli"><img @click="processWire()" src="{{url('img/pg-logos/wire-transfer.png')}}"></li>
          <li><img src="{{url('img/pg-logos/perfect-money.png')}}"></li>
          <li><img src="{{url('img/pg-logos/skrill.png')}}"></li>
        </ul>
      </div><!-- .modal_section -->
      </div><!-- .tab_divider -->
      <h2>Widthrawal</h2>
      <div class="tab_divider">
        <div class="modal_section">
          <label>Enter Amount</label>
            <input type="text">
            USD
        </div><!-- .modal_section -->
        <div class="modal_section">
          <h3 class="text-center">Choose available payment method:</h3>
          <ul class="pg-logos">
            @if(isset($withdraw_available))
                @foreach ($withdraw_available as $merchant)
                    @if ($merchant->funding_service === 'bitcoin')
                        <li><img src="{{url('img/pg-logos/bitcoin.png')}}"></li>
                    @elseif ($merchant->funding_service === 'wire')
                        <li><img src="{{url('img/pg-logos/wire-transfer.png')}}"></li>
                    @else
                        
                    @endif
                    
                    <!-- <li><img src="{{url('img/pg-logos/netteller.png')}}"></li>
                    <li><img src="{{url('img/pg-logos/merchant-exchanger.png')}}"></li>
                    <li><img src="{{url('img/pg-logos/perfect-money.png')}}"></li>
                    <li><img src="{{url('img/pg-logos/skrill.png')}}"></li> -->
                @endforeach
            @endif
          </ul>
        </div>
      </div><!-- .tab_divider -->
      <h3 class="text-center">Payment method which is available for withdrawal is the same method used to deposit.</h3>

    </div><!-- .tabpanel -->
    <div role="tabpanel" class="tab-pane" id="transactionhistory">
      <div class="modal_section">
        <div class="input-daterange input-group" id="datepicker">
            <input type="text" class="input-sm form-control" name="start" />
            <span class="input-group-addon">to</span>
            <input type="text" class="input-sm form-control" name="end" />
        </div>
      </div><!-- .modal_section -->
      <div class="modal_section">
        <ul class="transaction_btn">
          <li><a class="btn" href="#">DEPOSIT</a></li>
          <li><a class="btn" href="#">WIDTHRAWAL</a></li>
          <li><a class="btn" href="#">ALL</a></li>
        </ul>
      </div><!-- .modal_section -->
      <div class="modal_section">
        <table>
          <thead>
            <th>Reference Id</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Status</th>
          </thead>
          <tbody>
          @if(isset($payments))
                @foreach ($payments as $payment)
                    <tr>
                      <td>{{ $payment->id }}</td>
                      <td> {{ $payment->created_at }} </td>
                      <td> {{ $payment->payment_amount }} </td>
                      <td> {{ $payment->type }} </td>
                      <td>
                          @if($payment->confirm==1)
                            <div class="pending">confirm</div>
                          @else
                            <div class="pending">processing</div>
                          @endif
                      </td>
                    </tr>    
                @endforeach
            @endif
           <!--  <tr>
              <td>#sdfdfg</td>
              <td>23/09/2015</td>
              <td>1,000</td>
              <td>deposit</td>
              <td><div class="pending">pending</div></td>
            </tr>
            <tr>
              <td>#sdfdfg</td>
              <td>23/09/2015</td>
              <td>1,000</td>
              <td>deposit</td>
              <td><div class="processing">processing</div></td>
            </tr> -->
          </tbody>
        </table>
      </div><!-- .modal_section -->
    </div><!-- .tabpanel -->
    @if($user->account_stat!=0)
        <div role="tabpanel" class="tab-pane" id="messages">
    @else
        <div role="tabpanel" class="tab-pane active" id="messages">
    @endif
      <div class="modal_section">
        <h2>Upload your documents for account verification</h2>
          {!! Form::open(array('url'=>'file/upload','method'=>'POST', 'files'=>true)) !!}
         

          {!! Form::file('image') !!}

      {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
      {!! Form::close() !!} 



        <ul class="verification_list">
          <li>
            <span class="left">Verify Identity</span> <div class="left upload_area"><input type="file" name="ver_identity"></div>
            <!-- <div class="left"><input type="submit" value="Send"></div> -->
            <br>
          </li>
          <li>
            <span class="left">Verify Address</span> <div class="left upload_area"><input type="file" name="ver_address"></div>
            <!-- <div class="left"><input type="submit" value="Send"></div> -->
            <br>
          </li>
          <li>
            <span>Note (Optional):</span>
            <br>
            <input type="text" name="note_opt">
            <br>
          </li>
            <li>
            <input type="submit" value="Send">
          </li>
        </ul>
      </div><!-- .modal_section -->
      <div class="modal_section">
        <p>Your Identity verification can be verify using National ID Card, Passport or Driving License</p>
        <p>Your Address verification can be verify using Utility bill, Bank Statement or National official letter</p>
      </div><!-- .modal_section -->
    </div><!-- .tabpanel -->
  </div>

</div>

</div><!-- #mainWallet -->


<!-- Modal -->
<div class="modal fade" id="commisionwallet_red" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="commisionwallet_green" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
