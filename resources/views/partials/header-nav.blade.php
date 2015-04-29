<nav id="header" class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img id="logo" src="/static/img/logo.png" alt="My Broken Phone Logo"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/fix-phone/brands">Fix</a></li>
            <li><a href="/buy-phone/carriers">Sell</a></li>
            <li><a href="http://contourbeta.com/my-broken-phone/?cat=all">Blog</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Phone Facts <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="http://contourbeta.com/my-broken-phone/hacks/">Phone Hacks</a></li>
                <li><a href="http://contourbeta.com/my-broken-phone/reviews/">Review Releases</a></li>
                <li><a href="http://contourbeta.com/my-broken-phone/diy/">DIY</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Services <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="http://contourbeta.com/my-broken-phone/smartphone-repair/iphone-repair/">iPhone Repair</a></li>
                <li><a href="http://contourbeta.com/my-broken-phone/smartphone-repair/samsung-repair/">Samsung Repair</a></li>
                <li><a href="http://contourbeta.com/my-broken-phone/contact/">Something else here</a></li>
              </ul>
            </li>
            <li><a href="http://contourbeta.com/my-broken-phone/about/">About</a></li>
            <li><a href="#">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Locations <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Phone Hacks</a></li>
                <li><a href="#">Review Releases</a></li>
                <li><a href="#">Something else here</a></li>
              </ul>
            </li>
            @if(Auth::check())
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ucwords(Auth::user()->username)}} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/{{Auth::user()->slug}}/orders">Orders</a></li>
                <li><a href="/auth/logout">Logout</a></li>
                <li><a href="#">Something else here</a></li>
              </ul>
            </li>
            @else
              <li><a href="/auth/sign-up">Sign In</a></li>
              <li><a href="/auth/sign-up">Sign Up</a></li>
            @endif
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>