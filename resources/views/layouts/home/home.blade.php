@extends('layouts.front_layout')

@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/home.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
@endsection

@section('page-title')
  <div class="container">
    <div class="row">
      <div class="col-md-7">
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
                  <li><i class="fas fa-check-circle"></i>Get up to €1300 for a cancelled, overbooked or delayed flight.</li>
                  <li><i class="fas fa-check-circle"></i>Get up to $3400 for a luggage issue.</li>
                  <li><i class="fas fa-check-circle"></i>Get up to $7000 for expenses you incurred as a result of your distrupted flight.</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="home_top_header_departed_destination_div">
                <form class="" action="index.html" method="post">
                  <div class="row">
                    <div class="col-md-4" style="margin: 0px; padding: 0px;">
                      <input class="common_input no_right_border" type="text" name="" value="" placeholder="Departed From">
                    </div>
                    <div class="col-md-4" style="margin: 0px; padding: 0px;">
                      <input class="common_input" type="text" name="" value="" placeholder="Final Destination">
                    </div>
                    <div class="col-md-4" style="margin: 0px; padding: 0px;">
                      <button class="common_button" type="button" name="button">CHECK COMPENSATION</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="margin: 0px; padding: 0px;">
              <div class="home_top_header_options_div">
                <div class="row">
                  <div class="col-md-3">
                    <div class="row">
                      <div class="col-md-3" style="padding: 0px;">
                        <div class="home_top_header_option_icon_div">
                          <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_free_icon.png') }}" alt="">
                        </div>
                      </div>
                      <div class="col-md-9" style="margin: 0px; padding: 0px;">
                        <div class="home_top_header_option_text_div text-center">
                          <p class="home_top_header_option_text_p_title_div">It's FREE</p>
                          <p class="home_top_header_option_text_p_normal_div">to claim</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="row">
                      <div class="col-md-3" style="padding: 0px;">
                        <div class="home_top_header_option_icon_div">
                          <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_dollar_icon.png') }}" alt="">
                        </div>
                      </div>
                      <div class="col-md-9" style="margin: 0px; padding: 0px;">
                        <div class="home_top_header_option_text_div text-center">
                          <p class="home_top_header_option_text_p_title_div">Up to €600</p>
                          <p class="home_top_header_option_text_p_normal_div">to claim</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="row">
                      <div class="col-md-3" style="padding: 0px;">
                        <div class="home_top_header_option_icon_div">
                          <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_group_icon.png') }}" alt="">
                        </div>
                      </div>
                      <div class="col-md-9" style="margin: 0px; padding: 0px;">
                        <div class="home_top_header_option_text_div text-center">
                          <p class="home_top_header_option_text_p_title_div">Trusted</p>
                          <p class="home_top_header_option_text_p_normal_div">to claim</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="row">
                      <div class="col-md-3" style="padding: 0px;">
                        <div class="home_top_header_option_icon_div">
                          <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_top_header_bank_icon.png') }}" alt="">
                        </div>
                      </div>
                      <div class="col-md-9" style="margin: 0px; padding: 0px;">
                        <div class="home_top_header_option_text_div text-center">
                          <p class="home_top_header_option_text_p_title_div">8 Billion EUR</p>
                          <p class="home_top_header_option_text_p_normal_div">to claim</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
<div class="container">
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
        <div class="row">
          <div class="how_it_works_lower_div">
            <div class="col-md-4 text-center">
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
            <div class="col-md-4 text-center">
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
            <div class="col-md-4 text-center">
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
@endsection
