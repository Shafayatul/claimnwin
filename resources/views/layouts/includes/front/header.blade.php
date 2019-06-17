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
                <li class="call"><a href="#">
                    <img src="{{asset('front_asset/')}}/img/phone.png" alt="phone icon">
                    {{$ip_phone_number}}
                </a></li>

                @role('User')
                <li><a href="{{ URL::to('/user-home') }}">My Claims</a></li>
                <li><a href="{{ URL::to('/affiliate') }}">Affiliate</a></li>
                @endrole

                <li class="dropdown country">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('front_asset/')}}/img/flag.png" alt="Flag"> 
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="{{url('change-language/af')}}">Afrikaans</a></li>
                    <li><a href="{{url('change-language/ga')}}">Irish</a></li>
                    <li><a href="{{url('change-language/sq')}}">Albanian</a></li> 
                    <li><a href="{{url('change-language/it')}}" >Italian</a></li>
                    <li><a href="{{url('change-language/ar')}}">Arabic</a></li> 
                    <li><a href="{{url('change-language/ja')}}">Japanese</a></li>
                    <li><a href="{{url('change-language/az')}}">Azerbaijani</a></li>
                    <li><a href="{{url('change-language/kn')}}">Kannada</a></li>
                    <li><a href="{{url('change-language/eu')}}">Basque</a></li> 
                    <li><a href="{{url('change-language/ko')}}">Korean</a></li>
                    <li><a href="{{url('change-language/bn')}}">Bengali</a></li>
                    <li><a href="{{url('change-language/la')}}">Latin</a></li>
                    <li><a href="{{url('change-language/be')}}">Belarusian</a></li> 
                    <li><a href="{{url('change-language/lv')}}">Latvian</a></li>
                    <li><a href="{{url('change-language/bg')}}">Bulgarian</a></li>
                    <li><a href="{{url('change-language/lt')}}">Lithuanian</a></li>
                    <li><a href="{{url('change-language/ca')}}">Catalan</a></li>
                    <li><a href="{{url('change-language/mk')}}">Macedonian</a></li>
                    <li><a href="{{url('change-language/zh-CN')}}">Chinese Simplified</a></li>
                    <li><a href="{{url('change-language/ms')}}">Malay</a></li>
                    <li><a href="{{url('change-language/zh-TW')}}">Chinese Traditional</a></li>
                    <li><a href="{{url('change-language/mt')}}">Maltese</a></li>
                    <li><a href="{{url('change-language/hr')}}">Croatian</a></li> 
                    <li><a href="{{url('change-language/no')}}">Norwegian</a></li>
                    <li><a href="{{url('change-language/cs')}}">Czech</a></li>
                    <li><a href="{{url('change-language/fa')}}">Persian</a></li>
                    <li><a href="{{url('change-language/da')}}">Danish</a></li> 
                    <li><a href="{{url('change-language/pl')}}">Polish</a></li>
                    <li><a href="{{url('change-language/nl')}}">Dutch</a></li>
                    <li><a href="{{url('change-language/pt')}}">Portuguese</a></li>
                    <li><a href="{{url('change-language/en')}}">English</a></li>
                    <li><a href="{{url('change-language/ro')}}">Romanian</a></li>
                    <li><a href="{{url('change-language/eo')}}">Esperanto</a></li>
                    <li><a href="{{url('change-language/ru')}}">Russian</a></li>
                    <li><a href="{{url('change-language/et')}}">Estonian</a></li> 
                    <li><a href="{{url('change-language/sr')}}">Serbian</a></li>
                    <li><a href="{{url('change-language/tl')}}">Filipino</a></li> 
                    <li><a href="{{url('change-language/sk')}}">Slovak</a></li>
                    <li><a href="{{url('change-language/fi')}}">Finnish</a></li>
                    <li><a href="{{url('change-language/sl')}}">Slovenian</a></li>
                    <li><a href="{{url('change-language/fr')}}">French</a></li> 
                    <li><a href="{{url('change-language/es')}}">Spanish</a></li>
                    <li><a href="{{url('change-language/gl')}}">Galician</a></li> 
                    <li><a href="{{url('change-language/sw')}}">Swahili</a></li>
                    <li><a href="{{url('change-language/ka')}}">Georgian</a></li> 
                    <li><a href="{{url('change-language/sv')}}">Swedish</a></li>
                    <li><a href="{{url('change-language/de')}}">German</a></li> 
                    <li><a href="{{url('change-language/ta')}}">Tamil</a></li>
                    <li><a href="{{url('change-language/el')}}">Greek</a></li>
                    <li><a href="{{url('change-language/te')}}">Telugu</a></li>
                    <li><a href="{{url('change-language/gu')}}">Gujarati</a></li> 
                    <li><a href="{{url('change-language/th')}}">Thai</a></li>
                    <li><a href="{{url('change-language/ht')}}">Haitian Creole</a></li>
                    <li><a href="{{url('change-language/tr')}}">Turkish</a></li>
                    <li><a href="{{url('change-language/iw')}}">Hebrew</a></li> 
                    <li><a href="{{url('change-language/uk')}}">Ukrainian</a></li>
                    <li><a href="{{url('change-language/hi')}}">Hindi</a></li>
                    <li><a href="{{url('change-language/ur')}}">Urdu</a></li>
                    <li><a href="{{url('change-language/hu')}}">Hungarian</a></li>
                    <li><a href="{{url('change-language/vi')}}">Vietnamese</a></li>
                    <li><a href="{{url('change-language/is')}}">Icelandic</a></li>
                    <li><a href="{{url('change-language/cy')}}">Welsh</a></li>
                    <li><a href="{{url('change-language/id')}}">Indonesian</a></li> 
                    <li><a href="{{url('change-language/yi')}}">Yiddish</a></li>
                  </ul>
                </li>
                @guest
                <li class="login">
                  <a href="{{ route('user/login') }}">
                    <img src="{{asset('front_asset/')}}/img/lock.png" alt="lock icon">
                    login
                  </a>
                </li>
                <li class="signup"><a href="{{route('user/signup')}}">sign up</a></li>
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
                <li><a href="{{url('/faq')}}">faq</a></li>
                <li><a href="{{url('/press-blog')}}">blog</a></li>
                <li><a href="{{url('/your-rights')}}">Your Rights</a></li>
                <li><a href="{{url('/partner')}}">become a partner</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

        @yield('page-title')
      </div>

    </header>
