@extends('layouts.front_layout')
@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/about_us.css')}}" rel="stylesheet">
@endsection

@section('page-title')
  <div class="page_title">
    <h1 class="text-center">About Us</h1>
  </div>
@endsection

@section('content')
  <div class="container">
    <div class="about_us_top_content">
      <div class="row">
        <div class="col-md-6">
          <div class="about_us_image_div">
            <img src="{{ asset('front_asset/front_pages_asset/img/about_us.jpg') }}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="about_us_top_content_title">
            <h2>We Are Experts In
              Delayed Flight Compensation.</h2>
          </div>
          <div class="about_us_top_content_paragraph">
            <p>Our team of Delayed Flight experts and solicitors will manage your claim from
              start to finish while keeping you updated along the way.</p>
            <p>We are dedicated to ensuring the best possible outcome for your claim. You will
            receive all of the money you are entitled to and we will save you the time and
            hassle of going it alone.</p>
          </div>
          <div class="about_us_top_content_button text-center">
            <a href="{{ url('/form-claim') }}"><button type="button" name="button">START YOUR CLAIM</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="about_us_middle_content">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-12 col-xs-12 col-12">
            <div class="about_us_middle_content_paragraph">
              <p>Our Services are 100% no win no fee, </br>meaning there's no financial risk to you, </br> even if your claim is unsuccessfull.</p>
            </div>
          </div>
        </div>
        <div class="about_us_middle_content_button text-center">
          <a href="{{ url('/form-claim') }}"><button type="button" name="button">CLAIM MY MONEY</button></a>
        </div>
      </div>
    </div>
    <div class="about_us_bottom_content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="about_us_bottom_content_title_div text-center">
              <h2>We Work With All Airlines, Including...</h2>
            </div>
          </div>
        </div>
        <div class="about_us_bottom_content_airline_div">
          <div class="row">
            <div class="col-lg-2 col-md-4 col-xs-6">
              <div class="about_us_bottom_content_airline_img_div text-center">
                <img src="{{ asset('front_asset/front_pages_asset/img/about-us_bottom_airline_img.jpg')}}" alt="">
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-xs-6">
              <div class="about_us_bottom_content_airline_img_div text-center">
                <img src="{{ asset('front_asset/front_pages_asset/img/about-us_bottom_airline_img.jpg')}}" alt="">
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-xs-6">
              <div class="about_us_bottom_content_airline_img_div text-center">
                <img src="{{ asset('front_asset/front_pages_asset/img/about-us_bottom_airline_img.jpg')}}" alt="">
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-xs-6">
              <div class="about_us_bottom_content_airline_img_div text-center">
                <img src="{{ asset('front_asset/front_pages_asset/img/about-us_bottom_airline_img.jpg')}}" alt="">
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-xs-6">
              <div class="about_us_bottom_content_airline_img_div text-center">
                <img src="{{ asset('front_asset/front_pages_asset/img/about-us_bottom_airline_img.jpg')}}" alt="">
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-xs-6">
              <div class="about_us_bottom_content_airline_img_div text-center">
                <img src="{{ asset('front_asset/front_pages_asset/img/about-us_bottom_airline_img.jpg')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
