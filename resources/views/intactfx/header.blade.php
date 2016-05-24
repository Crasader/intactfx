<div class="prehead"></div>
<header id="header">
    <div class="container" style="position:relative;">
        <div id="logo" class="col-md-2 col-sm-12 col-xs-12">
            <a href="index.html"><img src="/img/member_img/logo.png" alt="logo" title="logo" /></a> 
        </div><!--/ logo -->
        <div class="header-buttons col-md-5 col-sm-12 col-xs-12 nopadding">
            <ul>
                <li><a href="#">Account Logs</a></li>
                <li><a href="#" class="lang">Language</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </div>
        <div id="profile" class="col-md-5 col-sm-12 col-xs-12">

            <div class="profile-content">
                @if(Auth::user()->name!='')
                    <h3 class="username">Welcome, {{ Auth::user()->name }}</h3>
                @else
                    <h3 class="username">Welcome, Daniel</h3>
                @endif
                
                <p class="userid">( I.D. - {{ $account->id }})</p>
                <p><a href="#">Change Password</a> &nbsp;<span class="separator">|</span>&nbsp; <a href="{{ url('logout') }}">Log out</a></p>
            </div>

            <div class="profile-thumb">
                <img src="{{ $social->avatar or '../img/member_img/profile-thumb.jpg'}}" alt="profile photo" title="profile photo" />
            </div>

        </div>
    </div><!--/ container -->
</header><!--/ header -->