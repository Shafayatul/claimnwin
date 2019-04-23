@extends('layouts.front_layout')
@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/slick.css')}}" rel="stylesheet">
<link  href="{{asset('front_asset/front_pages_asset/css/slick-theme.css')}}" rel="stylesheet">
<link  href="{{asset('front_asset/front_pages_asset/css/partner.css')}}" rel="stylesheet">
@endsection

@section('page-title')
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page_title">
                <h1>Be there for your customers, <br> even when things don't go as <br> planned.</h1>
            </div>
            <div class="page_p">
                <p>Opportunities that will bring money to you and your customers.</p>
            </div>
            <div class="page_btn">
                <a href="{{ url('/contact-us') }}" class="btn text-uppercase">contact us</a>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('content')
<div class="container">
    <!-- How it works div starts -->
    <div class="how_it_works_div">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="how_it_works_title_div text-center">
                        <h1>Partnership programs</h1>
                        </div>
                    </div>
                </div>
                <div class="how_it_works_lower_div">
                <div class="row">
                    <div class="col-md-4 text-center margin_bottom">
                    <div class="how_it_works_background_icon_div">
                        <div class="how_it_works_icon_div">
                        <img src="{{ asset('/front_asset/front_pages_asset/img/21_millon_image.png') }}" alt="">
                        </div>
                    </div>
                    <div class="how_it_works_text_div">
                        <p class="how_it_works_text_upper_p_div">21 million</p>
                        <p class="how_it_works_text_lower_p_div">21 million passengers are entitled <br> to compensation</p>
                    </div>
                    </div>
                    <div class="col-md-4 text-center margin_bottom">
                    <div class="how_it_works_background_icon_div">
                        <div class="how_it_works_icon_div">
                        <img src="{{ asset('/front_asset/front_pages_asset/img/conference-call.png') }}" alt="">
                        </div>
                    </div>
                    <div class="how_it_works_text_div">
                        <p class="how_it_works_text_upper_p_div">8 Billion Euro</p>
                        <p class="how_it_works_text_lower_p_div">8 Billion Euro available to claim annually</p>
                    </div>
                    </div>
                    <div class="col-md-4 text-center margin_bottom">
                    <div class="how_it_works_background_icon_div">
                        <div class="how_it_works_icon_div">
                        <img src="{{ asset('/front_asset/front_pages_asset/img/us-doller.png') }}" alt="">
                        </div>
                    </div>
                    <div class="how_it_works_text_div">
                        <p class="how_it_works_text_upper_p_div">Millions</p>
                        <p class="how_it_works_text_lower_p_div">Millions in potential ancillary revenues</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="claim_campass_api">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="claim_campass_api_img">
                    <img src="{{asset('/front_asset/front_pages_asset/img/claim_campass_api_image.png')}}" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="claim_compass_title">
                    <h1>ClaimCompass API</h1>
                </div>
                <div class="claim_compass_p">
                    <p>
                        Developed in partnership with Microsoft, the ClaimCompass API uses cutting edge
                        technology and monitors in real-time all of your bookings, notifying you and your
                        clients when they're entitled to compensation. Our API is first of its kind and is built in
                        a way, which does not require any personal data - all we need is the flight number
                        and the date.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="affiliate">
    <div class="container">
        <div class="row">
            <div class="col-md-6 margin_bottom">
                <div class="affiliate_title">
                    <h1>Affiliate</h1>
                </div>
                <div class="affiliate_p">
                    <p>
                        Become an affiliate partner and help us reach even more passengers, while earning
                        money for each successful claim. Choose from either placing an affiliate link or
                        embedding your very own ClaimCompass Widget on your website.  We'll still do all
                        the work, but you'll get all the credit!
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="affiliate_img">
                    <img src="{{asset('/front_asset/front_pages_asset/img/affiliate_image.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- What customer say div starts -->

<div class="what_customer_say_div">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="what_customer_say_title_div text-center">
                <h1>WHAT OUR CUSTOMERS SAY</h1>
              </div>
            </div>
          </div>
          <div class="what_customer_say_lower_div">
            <div class="row">
              <div class="col-md-12">
                <div class="slider-area slider">
                  <div class="sliding_div">
                    <div class="sliding_div_rating_div">
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                    </div>
                    <div class="sliding_div_title_p_div">
                      <p>Great advisor and transparent...</p>
                    </div>
                    <div class="sliding_div_text_p_div">
                      <p>Great advisor and transparent communication<br> about the process. Fast turn around too.<br> Strongly recomend it</p>
                    </div>
                    <div class="sliding_div_customer_name_div">
                      <p>Denise Roberts</p>
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_div_rating_div">
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                    </div>
                    <div class="sliding_div_title_p_div">
                      <p>Great advisor and transparent...</p>
                    </div>
                    <div class="sliding_div_text_p_div">
                      <p>Great advisor and transparent communication<br> about the process. Fast turn around too.<br> Strongly recomend it</p>
                    </div>
                    <div class="sliding_div_customer_name_div">
                      <p>Clare Burchell</p>
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_div_rating_div">
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                    </div>
                    <div class="sliding_div_title_p_div">
                      <p>Great advisor and transparent...</p>
                    </div>
                    <div class="sliding_div_text_p_div">
                      <p>Great advisor and transparent communication<br> about the process. Fast turn around too.<br> Strongly recomend it</p>
                    </div>
                    <div class="sliding_div_customer_name_div">
                      <p>Kjell Caminha</p>
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_div_rating_div">
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                    </div>
                    <div class="sliding_div_title_p_div">
                      <p>Great advisor and transparent...</p>
                    </div>
                    <div class="sliding_div_text_p_div">
                      <p>Great advisor and transparent communication<br> about the process. Fast turn around too.<br> Strongly recomend it</p>
                    </div>
                    <div class="sliding_div_customer_name_div">
                      <p>Sarah Green</p>
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_div_rating_div">
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                      <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                    </div>
                    <div class="sliding_div_title_p_div">
                      <p>Great advisor and transparent...</p>
                    </div>
                    <div class="sliding_div_text_p_div">
                      <p>Great advisor and transparent communication<br> about the process. Fast turn around too.<br> Strongly recomend it</p>
                    </div>
                    <div class="sliding_div_customer_name_div">
                      <p>Denise Roberts</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- What customer say div ends -->
@endsection
@section('footer-script')
  <script src="{{asset('front_asset/front_pages_asset/js/slick.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      console.log($( window ).width());
    });
    if ($( window ).width() > 767) {
      $(".slider-area").slick({
          dots: true,
          infinite: true,
          slidesToShow: 4,
          slidesToScroll: 1

        });
    }else {
      $(".slider-area").slick({
          dots: true,
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1

        });
    }

  </script>
@endsection
