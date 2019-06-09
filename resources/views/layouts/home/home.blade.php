@extends('layouts.front_layout')

@section('header-script')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link  href="{{asset('front_asset/front_pages_asset/css/home.css')}}" rel="stylesheet">
@endsection

@section('page-title')
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="home_top_header_div">
          <div class="row">
            <div class="col-md-12" style="margin: 0px; padding: 0px;">
              <div class="home_top_header_title_h1_div">
                <h1>When travel goes wrong, <span class="extra_color">we </br>make it right.</span></h1>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9" style="margin: 0px; padding: 0px;">
              <div class="home_top_header_title_p_div">
                <p>Travel disruptions happen, but that doesn't mean you have to accept them.</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="margin: 0px; padding: 0px;">
              <div class="home_top_header_title_ul_div">
                <ul class="fa-ul">
                  <li> <div class="li_mother_div"> <div class="li_icon_div"><i class="fas fa-check-circle"></i></div><div class="li_text_div">Get up to {!! $amount1 !!} for a cancelled, overbooked or delayed flight.</div></div></li>
                  <li> <div class="li_mother_div"> <div class="li_icon_div"><i class="fas fa-check-circle"></i></div><div class="li_text_div">Get up to {!! $amount2 !!} for a luggage issue.</div></div></li>
                  <li> <div class="li_mother_div"> <div class="li_icon_div"><i class="fas fa-check-circle"></i></div><div class="li_text_div">Get up to {!! $amount3 !!} for expenses you incurred as a result of your distrupted flight.</div></div></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="home_top_header_departed_destination_div">
                {{-- <form class="" action="index.html" method="post"> --}}
                  <div class="row">
                    <div class="col-md-6 col-xs-6 " style="margin: 0px; padding: 0px;">
                      <button class="common_button set_cache_claim" type="button" name="button">CHECK COMPENSATION</button>
                    </div>
                  </div>
                {{-- </form> --}}
              </div>
            </div>
          </div>

          <div class="options_div">
            <div class="total_box_1">
              <div class="box_left_part_1">
                <div class="box_left_part_img_container">
                  <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_free_icon.png') }}" alt="">
                </div>
              </div>
              <div class="box_right_part_1">
                <div class="box_right_part_text_container">
                  <p class="home_top_header_option_text_p_title_div">It's FREE</p>
                  <p class="home_top_header_option_text_p_normal_div">to claim</p>
                </div>
              </div>
            </div>
            <div class="total_box_2">
              <div class="box_left_part_2">
                <div class="box_left_part_img_container">
                  <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_dollar_icon.png') }}" alt="">
                </div>
              </div>
              <div class="box_right_part_2">
                <div class="box_right_part_text_container">
                  <p class="home_top_header_option_text_p_title_div">Up to {{$amount4}}</p>
                  <p class="home_top_header_option_text_p_normal_div">compensation</p>
                </div>
              </div>
            </div>
            <div class="total_box_3">
              <div class="box_left_part_3">
                <div class="box_left_part_img_container">
                  <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_group_icon.png') }}" alt="">
                </div>
              </div>
              <div class="box_right_part_3">
                <div class="box_right_part_text_container">
                  <p class="home_top_header_option_text_p_title_div">Trusted</p>
                  <p class="home_top_header_option_text_p_normal_div">by millions</p>
                </div>
              </div>
            </div>
            <div class="total_box_4">
              <div class="box_left_part_4">
                <div class="box_left_part_img_container">
                  <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_bank_icon.png') }}" alt="">
                </div>
              </div>
              <div class="box_right_part_4">
                <div class="box_right_part_text_container">
                  <p class="home_top_header_option_text_p_title_div">8 Billion EUR</p>
                  <p class="home_top_header_option_text_p_normal_div">available to claim</p>
                </div>
              </div>
            </div>

          </div>
          {{-- <div class="row">
            <div class="col-md-12" style="margin: 0px; padding: 0px;">
              <div class="home_top_header_options_div">
                <div class="row">
                  <div class="col-md-3 col-xs-6 padding_left_right_none">
                    <div class="row padding_bottom">
                      <div class="col-md-3 col-xs-3" style="padding: 0px;">
                        <div class="home_top_header_option_icon_div">
                          <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_free_icon.png') }}" alt="">
                        </div>
                      </div>
                      <div class="col-md-9 col-xs-9" style="margin: 0px; padding: 0px;">
                        <div class="home_top_header_option_text_div text-center">
                          <p class="home_top_header_option_text_p_title_div">It's FREE</p>
                          <p class="home_top_header_option_text_p_normal_div">to claim</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-xs-6 padding_left_right_none">
                    <div class="row padding_bottom">
                      <div class="col-md-3 col-xs-3" style="padding: 0px;">
                        <div class="home_top_header_option_icon_div">
                          <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_dollar_icon.png') }}" alt="">
                        </div>
                      </div>
                      <div class="col-md-9 col-xs-9" style="margin: 0px; padding: 0px;">
                        <div class="home_top_header_option_text_div text-center">
                          <p class="home_top_header_option_text_p_title_div">Up to {!! $amount4 !!}</p>
                          <p class="home_top_header_option_text_p_normal_div">compensation</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-xs-6 padding_left_right_none">
                    <div class="row padding_bottom">
                      <div class="col-md-3 col-xs-3" style="padding: 0px;">
                        <div class="home_top_header_option_icon_div">
                          <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_group_icon.png') }}" alt="">
                        </div>
                      </div>
                      <div class="col-md-9 col-xs-9" style="margin: 0px; padding: 0px;">
                        <div class="home_top_header_option_text_div text-center">
                          <p class="home_top_header_option_text_p_title_div">Trusted</p>
                          <p class="home_top_header_option_text_p_normal_div">by millions</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-xs-6 padding_left_right_none">
                    <div class="row padding_bottom">
                      <div class="col-md-3 col-xs-3" style="padding: 0px;">
                        <div class="home_top_header_option_icon_div">
                          <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_bank_icon.png') }}" alt="">
                        </div>
                      </div>
                      <div class="col-md-9 col-xs-9" style="margin: 0px; padding: 0px;">
                        <div class="home_top_header_option_text_div text-center">
                          <p class="home_top_header_option_text_p_title_div">8 Billion EUR</p>
                          <p class="home_top_header_option_text_p_normal_div">available to claim</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
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
              <h1>HOW IT WORKS</h1>
            </div>
          </div>
        </div>
        <div class="how_it_works_lower_div">
          <div class="row">
            <div class="col-md-4 text-center margin_bottom">
              <div class="how_it_works_background_icon_div">
                <div class="how_it_works_icon_div">
                  <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_how_it_works_compensation.png') }}" alt="">
                </div>
              </div>
              <div class="how_it_works_text_div">
                <p class="how_it_works_text_upper_p_div">Check your compensation</p>
                <p class="how_it_works_text_lower_p_div">Submit your details and we run a quick flight check to see if the airline owes you money.</p>
              </div>
            </div>
            <div class="col-md-4 text-center margin_bottom">
              <div class="how_it_works_background_icon_div">
                <div class="how_it_works_icon_div">
                  <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_how_it_works_admin_setting_male.png') }}" alt="">
                </div>
              </div>
              <div class="how_it_works_text_div">
                <p class="how_it_works_text_upper_p_div">Claim'N Win manages you  claim</p>
                <p class="how_it_works_text_lower_p_div">We're very good at this, so you sit back and relax while we jump into action.</p>
              </div>
            </div>
            <div class="col-md-4 text-center margin_bottom">
              <div class="how_it_works_background_icon_div">
                <div class="how_it_works_icon_div">
                  <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_how_it_works_receive_cash.png') }}" alt="">
                </div>
              </div>
              <div class="how_it_works_text_div">
                <p class="how_it_works_text_upper_p_div">We send you the money</p>
                <p class="how_it_works_text_lower_p_div">We get it to you as quickly as we can, with regular updates along the way.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- How it works div ends -->

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
                        @foreach($reviews as $review)
                        <div class="sliding_div">
                            <div class="sliding_div_rating_div">
                                @if($review->star == 5)
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                @elseif($review->star == 4)
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                @elseif($review->star == 3)
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                @elseif($review->star == 2)
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                @else
                                <span class="rating_span"> <img src="{{ asset('/front_asset/front_pages_asset/img/rating_img.png') }}" alt=""> </span>
                                @endif
                            </div>
                            <div class="sliding_div_title_p_div">
                                <p>{{ $review->title }}</p>
                            </div>
                            <div class="sliding_div_text_p_div" style="overflow:hidden;">
                                {!! $review->description !!}
                            </div>
                            <div class="sliding_div_customer_name_div">
                                <p>{{ $review->name }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- What customer say div ends -->

  <!-- Our Process div Starts -->
  <div class="our_process_div">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="our_process_div_title_div text-center">
            <h1>OUR PROCESS</h1>
          </div>
        </div>
      </div>
      <div class="our_process_lower_div">
        <div class="row">
          <div class="col-md-3 col-xs-6 our_process_padding_bottom">
            <div class="our_process_lower_div_icon_div text-center">
              <img class="" src="{{ asset('/front_asset/front_pages_asset/img/homepage_our_process_calculator.png') }}" alt="">
            </div>
            <div class="our_process_lower_div_icon_text_div text-center">
              <p>Check your flight with</br> our industry-leading</br> calculator </p>
            </div>
          </div>
          <div class="col-md-3 col-xs-6 our_process_padding_bottom">
            <div class="our_process_lower_div_icon_div text-center">
              <img class="" src="{{ asset('/front_asset/front_pages_asset/img/homepage_our_process_passenger_with_bag.png') }}" alt="">
            </div>
            <div class="our_process_lower_div_icon_text_div text-center">
              <p>Add passenger details </br> then submit your claim </p>
            </div>
          </div>
          <div class="clearfix clearfix_display_none"></div>
          <div class="col-md-3 col-xs-6 our_process_padding_bottom">
            <div class="our_process_lower_div_icon_div text-center">
              <img class="" src="{{ asset('/front_asset/front_pages_asset/img/homepage_our_process_collaboration.png') }}" alt="">
            </div>
            <div class="our_process_lower_div_icon_text_div text-center">
              <p>We negotiate with the </br> airline for you and take it </br> to court in necessary </p>
            </div>
          </div>
          <div class="col-md-3 col-xs-6 our_process_padding_bottom">
            <div class="our_process_lower_div_icon_div text-center">
              <img class="" src="{{ asset('/front_asset/front_pages_asset/img/homepage_our_process_cash_in_hand.png') }}" alt="">
            </div>
            <div class="our_process_lower_div_icon_text_div text-center">
              <p>Your claim is settled and </br> your compensation </br> paid to you </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Our Process div ends -->

  <!-- Free Process div Starts -->
  <div class="about_us_middle_content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12 col-12">
          <div class="about_us_middle_content_paragraph">
            <p>Our Services are 100% no win no fee, </br>meaning there's no financial risk to you, </br> even if your claim is unsuccessfull.</p>
          </div>
        </div>
      </div>
        <a href="{{ url('/form-claim') }}">
          <div class="about_us_middle_content_button text-center">
            <button type="button" name="button">CLAIM MY MONEY</button>
          </div>
        </a>
    </div>
  </div>
  <!-- Free Process div ends -->




@endsection

@section('footer-script')
  <script type="text/javascript">
    $(document).ready(function(){


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


      if ($( window ).width() < 360) {
        $('.clearfix_display_none').show();
      }else {
        $('.clearfix_display_none').hide();
      }



      $('.set_cache_claim').click(function(){
          window.location.href = "{{url('/form-claim')}}";
      });



    });


  </script>
@endsection
