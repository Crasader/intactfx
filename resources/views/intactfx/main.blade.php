<div class="container">
  <div class="row">
    <div class="content">
      <div class="col-md-6">
       {{ $wallet->main_wallet }}
        <a href="#" data-toggle="modal" data-target="#MainWalletModal"><img src="{{url('img/mainpage/12k-blue.png')}}" alt="12,000 main wallet" title="12,000 main wallet" class="blue-btn-img"/></a>
        <a href="#" data-toggle="modal" data-target="#CommissionWalletModal"><img src="{{url('img/mainpage/12k-red.png')}}" alt="12,000 commision wallet" title="12,000 commision wallet" class="red-btn-img"/></a>
        <a href="#" data-toggle="modal" data-target="#Commission2WalletModal"><img src="{{url('img/mainpage/12k-green.png')}}" alt="12,000 commision wallet" title="12,000 commision wallet" class="green-btn-img"/></a>
      </div>
      <div class="col-md-6">

        <div id="recentnews">
          <h3 class="recentnews-block-title">Recent News</h3>
          <div class="recentnews-block">
            <div class="recentnews-thumb">
              <img src="{{url('img/mainpage/recentnews-thumb.jpg')}}" alt="recent news" title="recent news" />
            </div>
            <div class="recentnews-content">
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
          <div class="tweets">
            <h4>#intactfx</h4>
            <p>Proin gravida nibh vel velit auctor aliqut velit auctor aliquet enim </p>
            <span class="glyphicon glyphicon-chevron-right gray-icon" aria-hidden="true"></span>
          </div>
          <div class="separator"></div>
          <div class="tweets last">
            <h4>#intactfx</h4>
            <p>Proin gravida nibh vel velit auctor aliqut velit auctor aliquet enim </p>
            <span class="glyphicon glyphicon-chevron-right gray-icon" aria-hidden="true"></span>
          </div>
        </div><!--/ twitter -->
      </div>

     </div><!--/ content -->
   </div><!--/ row -->
</div><!--/ container -->