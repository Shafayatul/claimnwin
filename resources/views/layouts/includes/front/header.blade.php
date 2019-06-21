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
                          <img src="{{asset($flag_url)}}" alt="Flag" style="width:30px">
                          <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu flag-dropdown">
                          <li><a href="{{url('change-language/en')}}"> <img src="{{asset('front_asset/img/country-flags/flag.png')}}" alt="">British (en)</a></li>
                          <li><a href="{{url('change-language/yi')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Israel.png')}}" alt="">Yiddish (yi)</a></li>
                          <li><a href="{{url('change-language/af')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_South_Africa.png')}}" alt="">Afrikaans (af)</a></li>
                          <li><a href="{{url('change-language/ga')}}"><img src="{{ asset('front_asset/img/country-flags/Flag_of_Ireland.png')}}" alt=""> Irish (ga)</a></li>
                          <li><a href="{{url('change-language/sq')}}"><img src="{{ asset('front_asset/img/country-flags/Flag_of_Albania.png')}}" alt=""> Albanian (sq)</a></li>
                          <li><a href="{{url('change-language/it')}}"><img src="{{ asset('front_asset/img/country-flags/Flag_of_Italy.png')}}" alt=""> Italian (it)</a></li>
                          <li><a href="{{url('change-language/ar')}}"><img src="{{ asset('front_asset/img/country-flags/Flag_of_Saudi_Arabia.png')}}" alt="">Arabic (ar)</a></li>
                          <li><a href="{{url('change-language/ja')}}"><img src="{{ asset('front_asset/img/country-flags/Flag_of_Japan.png')}}" alt=""> Japanese (ja)</a></li>
                          <li><a href="{{url('change-language/az')}}"><img src="{{ asset('front_asset/img/country-flags/Flag_of_Azerbaijan.png')}}" alt=""> Azerbaijani (az)</a></li>
                          <li><a href="{{url('change-language/kn')}}"><img src="{{ asset('front_asset/img/country-flags/Flag_of_Canada.png')}}" alt=""> Kannada (kn)</a></li>
                          <li><a href="{{url('change-language/eu')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Spain.png')}}" alt=""> Basque (eu)</a></li>
                          <li><a href="{{url('change-language/ko')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_South_Korea.png')}}" alt=""> Korean (ko)</a></li>
                          <li><a href="{{url('change-language/bn')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Bangladesh.png')}}" alt=""> Bengali (bn)</a></li>
                          <li><a href="{{url('change-language/la')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Italy.png')}}" alt=""> Latin (la)</a></li>
                          <li><a href="{{url('change-language/be')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Belarus.png')}}" alt=""> Belarusian (be)</a></li>
                          <li><a href="{{url('change-language/lv')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Latvia.png')}}" alt=""> Latvian (lv)</a></li>
                          <li><a href="{{url('change-language/bg')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Bulgaria.png')}}" alt=""> Bulgarian (bg)</a></li>
                          <li><a href="{{url('change-language/lt')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Lithuania.png')}}" alt=""> Lithuanian (lt)</a></li>
                          {{-- <li><a href="{{url('change-language/ca')}}">Catalan</a>
                  </li> --}}
                  <li><a href="{{url('change-language/mk')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Macedonia.png')}}" alt="">Macedonian (mk)</a></li>
                  <li><a href="{{url('change-language/zh-CN')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_the_Peoples_Republic_of_China.png')}}" alt="">Chinese Simplified/(zh-CN)</a></li>
                  <li><a href="{{url('change-language/ms')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Malaysia.png')}}" alt="">Malay (ms)</a></li>
                  <li><a href="{{url('change-language/zh-TW')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_the_Peoples_Republic_of_China.png')}}" alt="">Chinese Traditional/(zh-TW)</a></li>
                  <li><a href="{{url('change-language/mt')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Malta.png')}}" alt="">Maltese (mt)</a></li>
                  <li><a href="{{url('change-language/hr')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Croatia.png')}}" alt="">Croatian (hr)</a></li>
                  <li><a href="{{url('change-language/no')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Norway.png')}}" alt="">Norwegian (no)</a></li>
                  <li><a href="{{url('change-language/cs')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_the_Czech_Republic.png')}}" alt=""> Czech (cs)</a></li>
                  <li><a href="{{url('change-language/fa')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Iran.png')}}" alt="">Persian (fa)</a></li>
                  <li><a href="{{url('change-language/da')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Denmark.png')}}" alt="">Danish (da)</a></li>
                  <li><a href="{{url('change-language/pl')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Poland.png')}}" alt="">Polish (pl)</a></li>
                  <li><a href="{{url('change-language/nl')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_the_Netherlands.png')}}" alt=""> Dutch (nl)</a></li>
                  <li><a href="{{url('change-language/pt')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Portugal.png')}}" alt="">
                  Portuguese (pt)</a></li>
                  <li><a href="{{url('change-language/ro')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Romania.png')}}" alt="">Romanian (ro)</a></li>
                  {{-- <li><a href="{{url('change-language/eo')}}" (Esperanto)</a></li> --}}
                  <li><a href="{{url('change-language/ru')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Russia.png')}}" alt="">Russian (ru)</a></li>
                  <li><a href="{{url('change-language/et')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Estonia.png')}}" alt="">Estonian (et)</a></li>
                  <li><a href="{{url('change-language/sr')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Serbia.png')}}" alt="">Serbian (sr)</a></li>
                  <li><a href="{{url('change-language/tl')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_the_Philippines.png')}}" alt=""> Filipino (tl)</a></li>
                  <li><a href="{{url('change-language/sk')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Slovakia.png')}}" alt="">Slovak (sk)</a></li>
                  <li><a href="{{url('change-language/fi')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Finland.png')}}" alt="">Finnish (fi)</a></li>
                  <li><a href="{{url('change-language/sl')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Slovenia.png')}}" alt="">Slovenian (sl)</a></li>
                  <li><a href="{{url('change-language/fr')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_France.png')}}" alt="">French (fr)</a></li>
                  <li><a href="{{url('change-language/es')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Spain.png')}}" alt="">Spanish (es)</a></li>
                  {{-- <li><a href="{{url('change-language/gl')}}" (Galician)</a></li> --}}
                  <li><a href="{{url('change-language/sw')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Kenya.png')}}" alt="">Swahili (sw)</a></li>
                  <li><a href="{{url('change-language/ka')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Georgia.png')}}" alt="">Georgian (ka)</a></li>
                  <li><a href="{{url('change-language/sv')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Sweden.png')}}" alt="">Swedish (sv)</a></li>
                  <li><a href="{{url('change-language/de')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Germany.png')}}" alt="">German (de)</a></li>
                  {{-- <li><a href="{{url('change-language/ta')}}" (Tamil)</a></li> --}}
                  <li><a href="{{url('change-language/el')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Greece.png')}}" alt="">Greek (el)</a></li>
                  {{-- <li><a href="{{url('change-language/te')}}" (Telugu)</a></li> --}}
                  {{-- <li><a href="{{url('change-language/gu')}}" (Gujarati)</a></li> --}}
                  <li><a href="{{url('change-language/th')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Thailand.png')}}" alt="">Thai (th)</a></li>
                  <li><a href="{{url('change-language/ht')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Haiti.png')}}" alt="">Haitian (ht)</a></li>
                  <li><a href="{{url('change-language/tr')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Turkey.png')}}" alt="">Turkish (tr)</a></li>
                  <li><a href="{{url('change-language/iw')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Israel.png')}}" alt="">Hebrew (iw)</a></li>
                  <li><a href="{{url('change-language/uk')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Ukraine.png')}}" alt="">Ukrainian (uk)</a></li>
                  <li><a href="{{url('change-language/hi')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_India.png')}}" alt="">Hindi (hi)</a></li>
                  <li><a href="{{url('change-language/ur')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Pakistan.png')}}" alt="">Urdu (ur)</a></li>
                  <li><a href="{{url('change-language/hu')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Hungary.png')}}" alt="">Hungarian (hu)</a></li>
                  <li><a href="{{url('change-language/vi')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Vietnam.png')}}" alt="">Vietnamese (vi)</a></li>
                  <li><a href="{{url('change-language/is')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Iceland.png')}}" alt="">Icelandic (is)</a></li>
                  {{-- <li><a href="{{url('change-language/cy')}}" (Welsh)</a></li> --}}
                  <li><a href="{{url('change-language/id')}}"> <img src="{{ asset('front_asset/img/country-flags/Flag_of_Indonesia.png')}}" alt="">Indonesian (id)</a></li>
              </ul>
              </li>
              @guest
              <li class="login">
                  <a href="{{ route('user/login') }}">
                      <img src="{{asset('front_asset/')}}/img/lock.png" alt="lock icon">
                      @if ($translated_menu)
                      {{ $translated_menu['data']['translations'][4]['translatedText']}}
                      @else
                      {{ $menu_t[4]}}
                      @endif
                  </a>
              </li>
              <li class="signup"><a href="{{route('user/signup')}}">
                      @if ($translated_menu)
                      {{ $translated_menu['data']['translations'][5]['translatedText']}}
                      @else
                      {{ $menu_t[5]}}
                      @endif
                  </a></li>
              @endguest

              @auth
              <li class="signup">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt"></i>
                      @if ($translated_menu)
                      {{ $translated_menu['data']['translations'][26]['translatedText']}}
                      @else
                      {{ $menu_t[26]}}
                      @endif

                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </li>
              @endauth

              </ul>
              <ul class="nav navbar-nav navbar-right text-uppercase main-menu">
                  <li>
                      <a href="{{url('/faq')}}">
                          @if ($translated_menu)
                          {{ $translated_menu['data']['translations'][0]['translatedText']}}
                          @else
                          {{ $menu_t[0]}}
                          @endif
                      </a>
                  </li>
                  <li>
                      <a href="{{url('/press-blog')}}">
                          @if ($translated_menu)
                          {{ $translated_menu['data']['translations'][1]['translatedText']}}
                          @else
                          {{ $menu_t[1]}}
                          @endif
                      </a>
                  </li>
                  <li>
                      <a href="{{url('/your-rights')}}">
                          @if ($translated_menu)
                          {{ $translated_menu['data']['translations'][2]['translatedText']}}
                          @else
                          {{ $menu_t[2]}}
                          @endif
                      </a>
                  </li>
                  <li>
                      <a href="{{url('/partner')}}">
                          @if ($translated_menu)
                          {{ $translated_menu['data']['translations'][3]['translatedText']}}
                          @else
                          {{ $menu_t[3]}}
                          @endif
                      </a>
                  </li>
              </ul>
          </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    @yield('page-title')
  </div>

</header>
