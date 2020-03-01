<header class="bgf">
    <div class="main_nav_container">
        <nav class="navbar main-nav">
          <div class="container-fluid sticky">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button class="hamburger hamburger--collapse navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#mainMenu" aria-expanded="false">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                    <a class="navbar-brand" href="{{url('/')}}">
                        <img src="{{asset('front_asset/img/logo.webp')}}" class="main-logo-top" id="main-logo-top" alt="Logo">
                        <img src="{{asset('front_asset/img/logo.png')}}" style="display: none;" class="main-logo-top" id="main-logo-top" alt="Logo">
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
                              <h5 class="modal-title" id="exampleModalLabel">WWSuggested Language</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <div class="" style="padding-top: 20px; padding-bottom: 20px;">
                                <ul>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="en"> British (en)</li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="fr"> French (fr)</li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="de"> German (de)</li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="iw"> Hebrew (iw)</li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="pt">
                                  Portuguese (pt)</li>
                                  <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="es"> Spanish (es)</li>

                                </ul>
                              </div>
                            </div>
                            <div class="modal-body">
                              <h5 class="modal-title" id="exampleModalLabel">Select Language</h5>
                              <ul style="overflow-y:scroll; padding-bottom: 80px; padding-top: 20px;">
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="af"> Afrikaans (af)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="sq"> Albanian (sq)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="ar"> Arabic (ar)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="az"> Azerbaijani (az)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="eu"> Basque (eu)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="be"> Belarusian (be)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="bn"> Bengali (bn)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="en"> British (en)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="bg">  Bulgarian (bg)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="zh-CN"> Chinese Simplified/(zh-CN)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="zh-TW"> Chinese Traditional/(zh-TW)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="hr"> Croatian (hr)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="cs">  Czech (cs)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="da"> Danish (da)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="nl">  Dutch (nl)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="et"> Estonian (et)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="tl">  Filipino (tl)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="fi"> Finnish (fi)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="fr"> French (fr)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="ka"> Georgian (ka)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="de"> German (de)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="el"> Greek (el)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="ht"> Haitian (ht)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="iw"> Hebrew (iw)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="hi"> Hindi (hi)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="hu"> Hungarian (hu)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="is"> Icelandic (is)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="id"> Indonesian (id)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="ga"> Irish (ga)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="it"> Italian (it)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="ja"> Japanese (ja)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="kn"> Kannada (kn)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="ko">  Korean (ko)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="la">  Latin (la)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="lv">  Latvian (lv)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="lt">  Lithuanian (lt)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="mk"> Macedonian (mk)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="ms"> Malay (ms)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="mt"> Maltese (mt)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="no"> Norwegian (no)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="fa"> Persian (fa)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="pl"> Polish (pl)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="pt">
                                Portuguese (pt)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="ro"> Romanian (ro)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="ru"> Russian (ru)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="sr"> Serbian (sr)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="sk"> Slovak (sk)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="sl"> Slovenian (sl)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="es"> Spanish (es)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="sw"> Swahili (sw)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="sv"> Swedish (sv)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="th"> Thai (th)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="tr"> Turkish (tr)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="uk"> Ukrainian (uk)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="ur"> Urdu (ur)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="vi"> Vietnamese (vi)</li>
                                <li style="width: 180px; display:inline-block; padding: 5px 10px;" class="js-change-lang" lang="yi"> Yiddish (yi)</li>

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
          <div>
        </nav>
        @yield('page-title')
    </div>

</header>
