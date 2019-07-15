<footer>
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <div class="footer-col">

                            <h2>
                                @if ($translated_menu)
                                  {{ $translated_menu['data']['translations'][6]['translatedText']}}
                                @else
                                    {{ $menu_t[6]}}
                                @endif
                            </h2>
                            <ul>
                                <li><a href="{{url('/form-claim')}}">
                                    @if ($translated_menu)
                                      {{ $translated_menu['data']['translations'][7]['translatedText']}}
                                    @else
                                        {{ $menu_t[7]}}
                                    @endif
                                </a></li>
                                <li><a href="{{url('/faq')}}">
                                    @if ($translated_menu)
                                      {{ $translated_menu['data']['translations'][8]['translatedText']}}
                                    @else
                                        {{ $menu_t[8]}}
                                    @endif
                                </a></li>
                                <li><a href="{{url('/pricing-list')}}">
                                    @if ($translated_menu)
                                      {{ $translated_menu['data']['translations'][9]['translatedText']}}
                                    @else
                                        {{ $menu_t[9]}}
                                    @endif
                                </a></li>
                                <li><a href="{{url('/your-rights')}}">
                                    @if ($translated_menu)
                                      {{ $translated_menu['data']['translations'][10]['translatedText']}}
                                    @else
                                        {{ $menu_t[10]}}
                                    @endif
                                </a></li>
                                <li><a href="{{url('/partner')}}">
                                    @if ($translated_menu)
                                      {{ $translated_menu['data']['translations'][11]['translatedText']}}
                                    @else
                                        {{ $menu_t[11]}}
                                    @endif
                                 </a></li>
                            </ul>
                        </div><!-- /.footer-col -->
                    </div><!-- /.col-lg-3 col-md-6 -->
                    <div class="col-lg-3 col-xs-6">
                        <div class="footer-col">
                            <h2>
                                @if ($translated_menu)
                                  {{ $translated_menu['data']['translations'][12]['translatedText']}}
                                @else
                                    {{ $menu_t[12]}}
                                @endif
                            </h2>
                            <ul>
                                <li><a href="{{url('/press-blog')}}">
                                    @if ($translated_menu)
                                      {{ $translated_menu['data']['translations'][13]['translatedText']}}
                                    @else
                                        {{ $menu_t[13]}}
                                    @endif
                                </a></li>
                                <li><a href="{{url('/about-us')}}">
                                    @if ($translated_menu)
                                      {{ $translated_menu['data']['translations'][14]['translatedText']}}
                                    @else
                                        {{ $menu_t[14]}}
                                    @endif
                                </a></li>
                                <li><a href="{{url('/app')}}">
                                    @if ($translated_menu)
                                      {{ $translated_menu['data']['translations'][15]['translatedText']}}
                                    @else
                                        {{ $menu_t[15]}}
                                    @endif
                                </a></li>
                                <li><a href="{{url('/contact-us')}}">
                                    @if ($translated_menu)
                                      {{ $translated_menu['data']['translations'][16]['translatedText']}}
                                    @else
                                        {{ $menu_t[16]}}
                                    @endif
                                </a></li>
                            </ul>
                        </div><!-- /.footer-col -->
                    </div><!-- /.col-lg-3 col-md-6 -->
                    <div class="col-lg-3 col-xs-6">
                        <div class="footer-col">
                            <h2>
                                @if ($translated_menu)
                                  {{ $translated_menu['data']['translations'][17]['translatedText']}}
                                @else
                                    {{ $menu_t[17]}}
                                @endif
                            </h2>
                            <ul>
                                <li><a href="{{url('/privacy-policy')}}">
                                    @if ($translated_menu)
                                      {{ $translated_menu['data']['translations'][18]['translatedText']}}
                                    @else
                                        {{ $menu_t[18]}}
                                    @endif
                                </a></li>
                                <li><a href="{{url('/terms-and-conditions')}}">
                                    @if ($translated_menu)
                                      {{ $translated_menu['data']['translations'][19]['translatedText']}}
                                    @else
                                        {{ $menu_t[19]}}
                                    @endif
                                </a></li>
                                <li><a href="{{url('/affiliate-page')}}">
                                    @if ($translated_menu)
                                      {{ $translated_menu['data']['translations'][29]['translatedText']}}
                                    @else
                                        {{ $menu_t[29]}}
                                    @endif
                                </a></li>
                            </ul>
                        </div><!-- /.footer-col -->
                    </div><!-- /.col-lg-3 col-md-6 -->
                    <div class="col-lg-3 col-xs-6">
                        <div class="footer-col">
                            <h2>
                                    @if ($translated_menu)
                                      {{ $translated_menu['data']['translations'][21]['translatedText']}}
                                    @else
                                        {{ $menu_t[21]}}
                                    @endif
                                </h2>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/claimn.win" target="_blank">
                                        <span><i class="fab fa-facebook-f"></i></span>
                                        @if ($translated_menu)
                                          {{ $translated_menu['data']['translations'][22]['translatedText']}}
                                        @else
                                            {{ $menu_t[22]}}
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/claim_win" target="_blank">
                                        <span><i class="fab fa-twitter"></i></span>
                                        @if ($translated_menu)
                                          {{ $translated_menu['data']['translations'][23]['translatedText']}}
                                        @else
                                            {{ $menu_t[23]}}
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/channel/UCzUC3c5sXttoshGkWjOThJg" target="_blank">
                                        <span><i class="fab fa-youtube"></i></span>
                                        @if ($translated_menu)
                                          {{ $translated_menu['data']['translations'][24]['translatedText']}}
                                        @else
                                            {{ $menu_t[24]}}
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/company/claim-n-win-ltd" target="_blank">
                                        <span><i class="fab fa-linkedin"></i></span>
                                        @if ($translated_menu)
                                          {{ $translated_menu['data']['translations'][25]['translatedText']}}
                                        @else
                                            {{ $menu_t[25]}}
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div><!-- /.footer-col -->
                    </div><!-- /.col-lg-3 col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.footer-middle -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>
                              @if ($translated_menu)
                              {!! $translated_menu['data']['translations'][30]['translatedText'] !!}
                              @else
                              {!! $menu_t[30] !!}
                              @endif
                        ©
                              @if ($translated_menu)
                              {!! $translated_menu['data']['translations'][26]['translatedText'] !!}
                              @else
                              {!! $menu_t[26] !!}
                              @endif
                          </p>
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6 text-right">
                        <a href="https://uk.trustpilot.com/review/claimnwin.com">
                            <img style="width: 90px; height: 40px;" src="{{asset('front_asset/')}}/img/add/01.png" alt="Add">
                        </a>
                        <img src="{{asset('TrustL.png')}}" alt="Add">
                        {{-- <script language="JavaScript" type="text/javascript">
                            TrustLogo("https://claimnwin.com/TrustL.png", "SC5", "none");
                        </script>
                        <a href="https://www.instantssl.com/wildcard-ssl.html" id="comodoTL">Wildcard SSL</a> --}}
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.footer-bottom -->
    </footer>
    <script type="text/javascript">
    if ((/MSIE (\d+\.\d+);/.test(navigator.userAgent) || navigator.userAgent.indexOf("Trident/") > -1) || (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) ){
        change_logo_type();
    }
    if (/Edge/.test(navigator.userAgent)) {
        change_logo_type();
    }

    function change_logo_type(){
        document.getElementById("main-logo-top").src = "{{asset('front_asset/')}}/img/logo.png";
    }
    </script>
