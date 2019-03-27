<header class="bgf">
        <nav class="navbar main-nav">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button class="hamburger hamburger--collapse navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#mainMenu" aria-expanded="false">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
              <a class="navbar-brand" href="#">
                  <img src="{{asset('front_asset/')}}/img/logo.png" alt="Logo">
              </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="mainMenu">
              <ul class="nav navbar-nav navbar-right">
                <li class="call"><a href="#">
                    <img src="{{asset('front_asset/')}}/img/phone.png" alt="phone icon">
                    +180 000 1234
                </a></li>
                <li class="dropdown country">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{asset('front_asset/')}}/img/flag.png" alt="Flag"> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#"><img src="{{asset('front_asset/')}}/img/flag.png" alt="Flag"></a></li>
                    <li><a href="#"><img src="{{asset('front_asset/')}}/img/flag.png" alt="Flag"></a></li>
                    <li><a href="#"><img src="{{asset('front_asset/')}}/img/flag.png" alt="Flag"></a></li>
                  </ul>
                </li>
            <li class="login"><a href="{{ route('user/login') }}">
                    <img src="{{asset('front_asset/')}}/img/lock.png" alt="lock icon">
                    login
                </a></li>
            <li class="signup"><a href="{{route('user/signup')}}">sign up</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right text-uppercase main-menu">
                <li><a href="#">faq</a></li>
                <li><a href="#">blog</a></li>
                <li><a href="#">your rights</a></li>
                <li><a href="#">become a partner</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </header>