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
                        <img src="{{asset('front_asset/')}}/img/logo.webp" alt="Logo">
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
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt"></i>
                              @if ($translated_menu)
                              {!! $translated_menu['data']['translations'][27]['translatedText'] !!}
                              @else
                              {!! $menu_t[27] !!}
                              @endif
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endauth

                    </ul>
                    <ul class="nav navbar-nav navbar-right text-uppercase main-menu">
                      <li class="dropdown country">
                          {{-- <a href="{{url('change-language/en')}}" class="dropdown-toggle" data-toggle="modal" data-target="#exampleModal">
                              EN
                              <span class="caret"></span>
                          </a> --}}
                          <button style="background-color: transparent; color: #000; border-color: transparent; font-weight: 600; line-height: 2.5;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            @if (Session::has('locale'))
                              {{ strtoupper(\Session::get('locale')) }}
                            @else
                              EN
                            @endif
                            <span class="caret"></span>
                          </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Suggested Language</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="" style="padding-top: 20px; padding-bottom: 20px;">
                                  <ul>
                                    <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/en')}}"> British (en)</a></li>
                                    <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/fr')}}"> French (fr)</a></li>
                                    <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/de')}}"> German (de)</a></li>
                                    <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/iw')}}"> Hebrew (iw)</a></li>
                                    <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/pt')}}">
                                    Portuguese (pt)</a></li>
                                    <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/es')}}"> Spanish (es)</a></li>

                                  </ul>
                                </div>
                              </div>
                              <div class="modal-body">
                                <h5 class="modal-title" id="exampleModalLabel">Select Language</h5>
                                <ul style="overflow-y:scroll; padding-bottom: 80px; padding-top: 20px;">
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/af')}}"> Afrikaans (af)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/sq')}}"> Albanian (sq)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/ar')}}"> Arabic (ar)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/az')}}"> Azerbaijani (az)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/eu')}}"> Basque (eu)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/be')}}"> Belarusian (be)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/bn')}}"> Bengali (bn)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/en')}}"> British (en)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/bg')}}">  Bulgarian (bg)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/zh-CN')}}"> Chinese Simplified/(zh-CN)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/zh-TW')}}"> Chinese Traditional/(zh-TW)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/hr')}}"> Croatian (hr)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/cs')}}">  Czech (cs)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/da')}}"> Danish (da)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/nl')}}">  Dutch (nl)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/et')}}"> Estonian (et)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/tl')}}">  Filipino (tl)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/fi')}}"> Finnish (fi)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/fr')}}"> French (fr)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/ka')}}"> Georgian (ka)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/de')}}"> German (de)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/el')}}"> Greek (el)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/ht')}}"> Haitian (ht)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/iw')}}"> Hebrew (iw)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/hi')}}"> Hindi (hi)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/hu')}}"> Hungarian (hu)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/is')}}"> Icelandic (is)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/id')}}"> Indonesian (id)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/ga')}}"> Irish (ga)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/it')}}"> Italian (it)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/ja')}}"> Japanese (ja)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/kn')}}"> Kannada (kn)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/ko')}}">  Korean (ko)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/la')}}">  Latin (la)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/lv')}}">  Latvian (lv)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/lt')}}">  Lithuanian (lt)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/mk')}}"> Macedonian (mk)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/ms')}}"> Malay (ms)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/mt')}}"> Maltese (mt)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/no')}}"> Norwegian (no)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/fa')}}"> Persian (fa)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/pl')}}"> Polish (pl)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/pt')}}">
                                  Portuguese (pt)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/ro')}}"> Romanian (ro)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/ru')}}"> Russian (ru)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/sr')}}"> Serbian (sr)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/sk')}}"> Slovak (sk)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/sl')}}"> Slovenian (sl)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/es')}}"> Spanish (es)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/sw')}}"> Swahili (sw)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/sv')}}"> Swedish (sv)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/th')}}"> Thai (th)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/tr')}}"> Turkish (tr)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/uk')}}"> Ukrainian (uk)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/ur')}}"> Urdu (ur)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/vi')}}"> Vietnamese (vi)</a></li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;"><a href="{{url('change-language/yi')}}"> Yiddish (yi)</a></li>

                                </ul>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                              </div>
                            </div>
                          </div>
                        </div>
                  </li>
                        <li><a href="{{ URL::to('/user-home') }}">
                          @if ($translated_menu)
                          {!! $translated_menu['data']['translations'][28]['translatedText'] !!}
                          @else
                          {!! $menu_t[28] !!}
                          @endif
                        </a></li>
                        <li><a href="{{ URL::to('/affiliate') }}">
                          @if ($translated_menu)
                          {!! $translated_menu['data']['translations'][29]['translatedText'] !!}
                          @else
                          {!! $menu_t[29] !!}
                          @endif
                        </a></li>
                        <li><a href="{{ URL('/faq') }}">
                          @if ($translated_menu)
                          {!! $translated_menu['data']['translations'][8]['translatedText'] !!}
                          @else
                          {!! $menu_t[8] !!}
                          @endif
                        </a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        @yield('page-title')
    </div>

</header>
