<header id="header">
    <div class="container">
      <div id="logo">
        <a href="index.html"><img src="{{url('img/mainpage/logo.png')}}" alt="logo" title="logo" /></a> 
      </div><!--/ logo -->
      <div class="header-buttons">
        <a href="#">Account Logs</a>
        <a href="#">Language</a>
        <a href="#">Settings</a>
      </div>
      <div id="profile">
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