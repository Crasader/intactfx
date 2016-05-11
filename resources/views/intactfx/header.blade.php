<header id="header">
    <div class="container">
        <div id="logo">
            <a href="index.html"><img src="/img/member_img/logo.png" alt="logo" title="logo" /></a> 
        </div><!--/ logo -->
        <div class="header-buttons">
            <a href="#">Language</a>
            <a href="#">Settings</a>
        </div>
        <div id="profile">

            <div class="profile-content">

                <h3 class="username">Welcome, {{ Auth::user()->name }}</h3>
                <p class="userid">( I.D. - 12345)</p>
                <p><a href="#">Change Password</a> &nbsp;<span class="separator">|</span>&nbsp; <a href="{{ url('logout') }}">Log out</a></p>
            </div>

            <div class="profile-thumb">
                <img src="{{ $social->avatar }}" alt="profile photo" title="profile photo" />
            </div>

        </div>
    </div><!--/ container -->
</header><!--/ header -->