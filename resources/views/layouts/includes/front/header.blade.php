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
                    <li><a href="{{url('change-language/af')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_South_Africa.png')}}" alt=""></a></li>
                    <li><a href="{{url('change-language/ga')}}"><img src="{{ asset('front_asset/img/country-flags/Flag_of_Ireland.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/sq')}}"><img src="{{ asset('front_asset/img/country-flags/Flag_of_Albania.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/it')}}" ><img src="{{ asset('front_asset/img/country-flags/Flag_of_Italy.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/ar')}}"><img src="{{ asset('front_asset/img/country-flags/Flag_of_Saudi_Arabia.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/ja')}}"><img src="{{ asset('front_asset/img/country-flags/Flag_of_Japan.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/az')}}"><img src="{{ asset('front_asset/img/country-flags/Flag_of_Azerbaijan.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/kn')}}"><img src="{{ asset('front_asset/img/country-flags/Flag_of_Canada.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/eu')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Spain.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/ko')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_South_Korea.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/bn')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Bangladesh.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/la')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Italy.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/be')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Belarus.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/lv')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Latvia.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/bg')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Bulgaria.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/lt')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Lithuania.png')}}" alt=""> </a></li>
                    {{-- <li><a href="{{url('change-language/ca')}}">Catalan</a></li> --}}
                    <li><a href="{{url('change-language/mk')}}"> <img src="Flag_of_Macedonia.png" alt=""> </a></li>
                    <li><a href="{{url('change-language/zh-CN')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_the_Peoples_Republic_of_China.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/ms')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Malaysia.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/zh-TW')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_the_Peoples_Republic_of_China.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/mt')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Malta.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/hr')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Croatia.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/no')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Norway.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/cs')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_the_Czech_Republic.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/fa')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Iran.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/da')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Denmark.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/pl')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Poland.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/nl')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_the_Netherlands.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/pt')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Portugal.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/en')}}"> <img src="{{asset('front_asset/')}}/img/phone.png" alt=""> </a></li>
                    <li><a href="{{url('change-language/ro')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Romania.png')}}" alt=""> </a></li>
                    {{-- <li><a href="{{url('change-language/eo')}}">Esperanto</a></li> --}}
                    <li><a href="{{url('change-language/ru')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Russia.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/et')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Estonia.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/sr')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Serbia.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/tl')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_the_Philippines.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/sk')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Slovakia.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/fi')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Finland.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/sl')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Slovenia.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/fr')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_France.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/es')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Spain.png')}}" alt=""> </a></li>
                    {{-- <li><a href="{{url('change-language/gl')}}">Galician</a></li> --}}
                    <li><a href="{{url('change-language/sw')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Kenya.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/ka')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Georgia.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/sv')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Sweden.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/de')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Germany.png')}}" alt=""> </a></li>
                    {{-- <li><a href="{{url('change-language/ta')}}">Tamil</a></li> --}}
                    <li><a href="{{url('change-language/el')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Greece.png')}}" alt=""> </a></li>
                    {{-- <li><a href="{{url('change-language/te')}}">Telugu</a></li> --}}
                    {{-- <li><a href="{{url('change-language/gu')}}">Gujarati</a></li> --}}
                    <li><a href="{{url('change-language/th')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Thailand.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/ht')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Haiti.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/tr')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Turkey.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/iw')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Israel.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/uk')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Ukraine.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/hi')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_India.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/ur')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Pakistan.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/hu')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Hungary.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/vi')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Vietnam.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/is')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Iceland.png')}}" alt=""> </a></li>
                    {{-- <li><a href="{{url('change-language/cy')}}">Welsh</a></li> --}}
                    <li><a href="{{url('change-language/id')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Indonesia.png')}}" alt=""> </a></li>
                    <li><a href="{{url('change-language/yi')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Israel.png')}}" alt=""> </a></li>
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
