<header class="bgf">
      <div class="main_nav_container">
        <nav class="navbar main-nav">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button class="hamburger hamburger--collapse navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#mainMenu" aria-expanded="false">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
              <a class="navbar-brand" href="{{url('/')}}">
                  <img src="{{asset('front_asset/')}}/img/logo.png" alt="Logo">
              </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="mainMenu">
              <ul class="nav navbar-nav navbar-right">
                {{-- <li class="call"><a href="#">
                    <img src="{{asset('front_asset/')}}/img/phone.png" alt="phone icon">
                    {{$ip_phone_number}}
                </a></li> --}}

                @role('User')
                {{-- <li><a href="{{ URL::to('/user-home') }}">My Claims</a></li>
                <li><a href="{{ URL::to('/affiliate') }}">Affiliate</a></li> --}}
                @endrole

                {{-- <li class="dropdown country">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{asset('front_asset/')}}/img/flag.png" alt="Flag"> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#"><img src="{{asset('front_asset/')}}/img/flag.png" alt="Flag"></a></li>
                    <li><a href="#"><img src="{{asset('front_asset/')}}/img/flag.png" alt="Flag"></a></li>
                    <li><a href="#"><img src="{{asset('front_asset/')}}/img/flag.png" alt="Flag"></a></li>
                  </ul>
                </li> --}}
                @guest
                {{-- <li class="login">
                  <a href="{{ route('user/login') }}">
                    <img src="{{asset('front_asset/')}}/img/lock.png" alt="lock icon">
                    login
                  </a>
                </li> --}}
                {{-- <li class="signup"><a href="{{route('user/signup')}}">sign up</a></li> --}}
                @endguest

                @auth
                   <li class="signup">
                      <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt"></i> Logout</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                   </li>
                @endauth

              </ul>
              <ul class="nav navbar-nav navbar-right text-uppercase main-menu">
                {{-- <li><a href="{{url('/faq')}}">faq</a></li>
                <li><a href="{{url('/press-blog')}}">blog</a></li>
                <li><a href="{{url('/your-rights')}}">Your Rights</a></li>
                <li><a href="{{url('/partner')}}">become a partner</a></li> --}}
                <li><a href="{{ URL::to('/user-home') }}">My Claims</a></li>
                <li><a href="{{ URL::to('/affiliate') }}">Affiliate</a></li>
                <li><a href="{{URL::to('/affiliate-info')}}">Affiliate Info</a></li>
                <li><a href="{{ URL('/faq') }}">FAQs</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

        @yield('page-title')
      </div>

    </header>
