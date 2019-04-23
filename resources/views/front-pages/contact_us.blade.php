@extends('layouts.front_layout')
@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/contact_us.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
@endsection

@section('page-title')
  <div class="page_title">
    <h1 class="text-center">Contact Us</h1>
  </div>
@endsection

@section('content')
  <div class="contact_us_main_content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="contact_us_main_content_left_div">
            <div class="row">
              <div class="col-md-6">
                <div class="contact_us_main_content_left_div_paragraph text-left">
                  <p style="color: #114478;">Do you have any question?</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="contact_us_main_content_left_div_paragraph text-right">
                  <p><span style="color: #114478;"><i class="fas fa-phone-volume"></i></span> or call us on <span style="color: #114478;">+180 000 1234</span></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="contact_us_form">
                  <form class="" action="{{ url('contacts/create') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row" style="padding-bottom:15px;">
                      <div class="col-md-6 input_name">
                        <input type="text" name="name" placeholder="Your name (required)">
                      </div>
                      <div class="col-md-6">
                        <input type="email" name="email" placeholder="Your email (required)">
                      </div>
                    </div>
                    <div class="row" style="padding-bottom:15px;">
                      <div class="col-md-12">
                        <input type="text" name="subject" placeholder="Subject">
                      </div>
                    </div>
                    <div class="row" style="padding-bottom:15px;">
                      <div class="col-md-12">
                        <textarea name="message" rows="8" cols="80" placeholder="your message"></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="contact_us_form_button text-center">
                          <button type="submit" name="button">SUBMIT</button>
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
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.4113982101535!2d90.4213037149817!3d23.76836028458052!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c788c8f61b57%3A0x954685dc33a0d16e!2sRampura+Bridge%2C+Dhaka+1212!5e0!3m2!1sen!2sbd!4v1554624183570!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
                          <h2>Registered Office</h2>
                        </div>
                        <div class="child_div_content_paragraph">
                          <p>Fulham Court Road, Chelsea, London, England, M25 4WS </br> Company No: 0665xxxx | Reg No: CRM00000|</br> Reg In: England & Wales, ICO number CAC98765</p>
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
                          <h2>Email Us</h2>
                        </div>
                        <div class="child_div_content_paragraph">
                          <p>info@claimwin.com</p>
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
                          <h2>Talk To Us</h2>
                        </div>
                        <div class="child_div_content_paragraph">
                          <p>+180 000 1234</p>
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
