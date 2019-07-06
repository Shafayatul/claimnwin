@extends('layouts.front_layout')
@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/contact_us.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
@endsection

@section('page-title')
  <div class="page_title">
    <h1 class="text-center">
        @if ($responseDecoded)
            {{ $responseDecoded['data']['translations'][0]['translatedText']}}
        @else
            {{ $text[0]}}
        @endif
    </h1>
  </div>
@endsection

@section('content')
  <div class="contact_us_main_content">
    <div class="container">
      <div class="row">
        <div class="result_messgae" style="width:75%; margin: 0 auto;">
          <h1 style="font-size: 20px; margin-bottom: 20px;" class="text-success text-center">
            <?php
              $message = Session::get('flash_message');
              if ($message)
              {
                echo $message;
                Session::put('message', null);
              }

            ?>
          </h1>
        </div>
        <div class="col-md-6">
          <div class="contact_us_main_content_left_div">
            <div class="row">
              <div class="col-md-6">
                <div class="contact_us_main_content_left_div_paragraph text-left">
                    <p style="color: #114478;">
                        @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][1]['translatedText']}}
                        @else
                            {{ $text[1]}}
                        @endif
                        ?
                    </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="contact_us_main_content_left_div_paragraph text-right">
                  <p><span style="color: #114478;"><i class="fas fa-phone-volume"></i></span>
                    @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][2]['translatedText']}}
                    @else
                        {{ $text[2]}}
                    @endif
                    <span style="color: #114478;">{{$ip_phone_number}}</span></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="contact_us_form">
                  <form class="" action="{{ url('/contacts-create') }}" method="post">
                    @csrf
                    <div class="row" style="padding-bottom:15px;">
                      <div class="col-md-6 input_name">
                        <input type="text" name="name" placeholder="@if ($responseDecoded){{ $responseDecoded['data']['translations'][3]['translatedText']}} @else {{ $text[3]}} @endif" required>
                      </div>
                      <div class="col-md-6">
                        <input type="email" name="email" placeholder="@if ($responseDecoded){{ $responseDecoded['data']['translations'][4]['translatedText']}} @else {{ $text[4]}} @endif" required>
                      </div>
                    </div>
                    <div class="row" style="padding-bottom:15px;">
                      <div class="col-md-12">
                        <input type="text" name="subject" placeholder="@if ($responseDecoded){{ $responseDecoded['data']['translations'][5]['translatedText']}} @else {{ $text[5]}} @endif" required>
                      </div>
                    </div>
                    <div class="row" style="padding-bottom:15px;">
                      <div class="col-md-12">
                        <textarea name="message" rows="8" cols="80" placeholder="@if ($responseDecoded){{ $responseDecoded['data']['translations'][6]['translatedText']}} @else {{ $text[6]}} @endif" required></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="contact_us_form_button text-center">
                            <button type="submit" name="button">@if ($responseDecoded){{ $responseDecoded['data']['translations'][7]['translatedText']}} @else {{ $text[7]}} @endif</button>
                          </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact_us_main_content_right_div">
            <div class="row">
              <div class="col-md-12">
                <div class="google_map_iframe_div">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2479.9485775853004!2d-0.0758379!3d51.5691762!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761c685f22c247%3A0xda47559619f45af!2sMontefiore+Court%2C+Stamford+Hill%2C+London+N16+5TY%2C+UK!5e0!3m2!1sen!2sbd!4v1558851700333!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="contact_us_main_content_right_common_child_div">
                  <div class="row">
                    <div class="col-md-2 col-xs-3">
                      <div class="child_div_logo">
                        <img src="{{ asset('/front_asset/front_pages_asset/img/contact_us_registered_office.png') }}" alt="">
                      </div>
                    </div>
                    <div class="col-md-10 col-xs-9">
                      <div class="child_div_content">
                        <div class="child_div_content_title">
                          <h2>@if ($responseDecoded){{ $responseDecoded['data']['translations'][8]['translatedText']}} @else {{ $text[8]}} @endif</h2>
                        </div>
                        <div class="child_div_content_paragraph">
                          <p>
                            @if ($responseDecoded){{ $responseDecoded['data']['translations'][8]['translatedText']}} @else {{ $text[8]}} @endif
                            </br>
                            @if ($responseDecoded){{ $responseDecoded['data']['translations'][9]['translatedText']}} @else {{ $text[9]}} @endif
                            </br>
                            @if ($responseDecoded){{ $responseDecoded['data']['translations'][10]['translatedText']}} @else {{ $text[10]}} @endif
                            </br>
                            @if ($responseDecoded){{ $responseDecoded['data']['translations'][11]['translatedText']}} @else {{ $text[11]}} @endif
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="contact_us_main_content_right_common_child_div">
                  <div class="row">
                    <div class="col-md-2 col-xs-3">
                      <div class="child_div_logo">
                        <img src="{{ asset('/front_asset/front_pages_asset/img/contact_us_email_logo.png') }}" alt="">
                      </div>
                    </div>
                    <div class="col-md-10 col-xs-9">
                      <div class="child_div_content">
                        <div class="child_div_content_title">
                          <h2>
                            @if ($responseDecoded)
                                {{ $responseDecoded['data']['translations'][12]['translatedText']}}
                            @else
                                {{ $text[12]}}
                            @endif
                          </h2>
                        </div>
                        <div class="child_div_content_paragraph">
                          <p>
                            @if ($responseDecoded)
                                {{ $responseDecoded['data']['translations'][13]['translatedText']}}
                            @else
                                {{ $text[13]}}
                            @endif
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="contact_us_main_content_right_common_child_div">
                  <div class="row">
                    <div class="col-md-2 col-xs-3">
                      <div class="child_div_logo">
                        <img src="{{ asset('/front_asset/front_pages_asset/img/contact_us_call.png') }}" alt="">
                      </div>
                    </div>
                    <div class="col-md-10 col-xs-9">
                      <div class="child_div_content">
                        <div class="child_div_content_title">
                          <h2>
                            @if ($responseDecoded)
                                {{ $responseDecoded['data']['translations'][14]['translatedText']}}
                            @else
                                {{ $text[14]}}
                            @endif
                          </h2>
                        </div>
                        <div class="child_div_content_paragraph">
                          <p>{{$ip_phone_number}}</p>
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
