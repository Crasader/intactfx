    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="accounts">
            <div id="tab-wrapper">
                <div class="container">
                    <div class="row">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#miniaccount" aria-controls="miniaccount" role="tab" data-toggle="tab" class="icon1">Mini Account</a></li>
                            <li role="presentation"><a href="#standard" aria-controls="standard" role="tab" data-toggle="tab" class="icon2">Standard Account</a></li>
                            <li role="presentation"><a href="#lowrisk" aria-controls="lowrisk" role="tab" data-toggle="tab" class="icon3">I-Profit Low Risk</a></li>
                            <li role="presentation"><a href="#highrisk" aria-controls="highrisk" role="tab" data-toggle="tab" class="icon4">I-Profit High Risk</a></li>
                            <li role="presentation"><a href="#broker" aria-controls="broker" role="tab" data-toggle="tab" class="icon5">Intact Broker Capital</a></li>
                        </ul>
                        <div class="tab-content">

                            @include('intactfx.mt4table.miniAccount')  

                            @include('intactfx.mt4table.standardAccount')  

                            @include('intactfx.mt4table.iprofitAccount')  

                            @include('intactfx.mt4table.iprofitHighAccount')  

                            @include('intactfx.mt4table.brokerAccount')  

                        </div><!--/ tab content -->
                    </div><!--/ row -->
                </div><!--/ container -->
            </div><!--/ tab wrapper -->
        </div><!--/ accounts -->

        <div role="tabpanel" class="tab-pane fade" id="services">
            <div class="container">
                <div class="row">
                    <div class="tab-inner-content">
                        <p>Services Tab</p>
                    </div>
                </div>
            </div>
        </div><!--/ services -->

        <div role="tabpanel" class="tab-pane fade" id="promotions">
            <div class="container">
                <div class="row">
                    <div class="tab-inner-content">
                        <p>Promotions and Bonuses Tab</p>
                    </div>
                </div>
            </div>
        </div><!--/ promotions -->

        <div role="tabpanel" class="tab-pane fade" id="contests">
            <div class="container">
                <div class="row">
                    <div class="tab-inner-content">
                        <p>Contests Tab</p>
                    </div>
                </div>
            </div>
        </div><!--/ contests -->

    </div><!--/ tab content -->
</div><!--/ white bar -->