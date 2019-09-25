@extends('layouts.front_layout')
@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/about_us.css')}}" rel="stylesheet">
@endsection

@section('page-title')
  <div class="page_title">
    <h1 class="text-center">
      @if ($responseDecoded)
        {!! $responseDecoded['data']['translations'][0]['translatedText'] !!}
      @else
        {!! $text[0] !!}
      @endif
    </h1>
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
            <h2>
              @if ($responseDecoded)
                {!! $responseDecoded['data']['translations'][1]['translatedText'] !!}
              @else
                {!! $text[1] !!}
              @endif
            </h2>
          </div>
          <div class="about_us_top_content_paragraph">
            @if ($responseDecoded)
              {!! $responseDecoded['data']['translations'][2]['translatedText'] !!}
            @else
              {!! $text[2] !!}
            @endif
          </div>
            <a href="{{ url('/form-claim') }}">
              <div class="about_us_top_content_button text-center">
                <button type="button" name="button">
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][3]['translatedText'] !!}
                  @else
                    {!! $text[3] !!}
                  @endif
                </button>
              </div>
            </a>
        </div>
      </div>
    </div>
  </div>
    <div class="about_us_middle_content">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-12 col-xs-12 col-12">
            <div class="about_us_middle_content_paragraph">
              <p>
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][4]['translatedText'] !!}
                @else
                  {!! $text[4] !!}
                @endif
              </p>
            </div>
          </div>
        </div>
          <a href="{{ url('/form-claim') }}">
            <div class="about_us_middle_content_button text-center">
              <button type="button" name="button">
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][5]['translatedText'] !!}
                @else
                  {!! $text[5] !!}
                @endif
              </button>
            </div>
          </a>
      </div>
    </div>
    <div class="about_us_bottom_content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="about_us_bottom_content_title_div text-center">
              <h2>
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][6]['translatedText'] !!}
                @else
                  {!! $text[6] !!}
                @endif
              </h2>
            </div>
          </div>
        </div>
        <div class="about_us_bottom_content_airline_div">
            <div class="row">
              <div class="col-md-12">
                <div class="slider-area slider">
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/aer_lingus.JPG') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/aeroflot.JPG') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/air_canada.JPG') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/air_france.JPG') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/american_airlines.JPG') }}" alt="">
                    </div>
                  </div>
                  {{-- <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/austrian_airlines.JPG') }}" alt="">
                    </div>
                  </div> --}}
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/British_airways.JPG') }}" alt="">
                    </div>
                  </div>
                  {{-- <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/brussels_airlines.JPG') }}" alt="">
                    </div>
                  </div> --}}
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/delta_airlines.JPG') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/klm_airlines.JPG') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/lot_polish_airlines.JPG') }}" alt="">
                    </div>
                  </div>
                  {{-- <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/Lufthansa.JPG') }}" alt="">
                    </div>
                  </div> --}}
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/Norwegian_airlines.JPG') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/ryanair.JPG') }}" alt="">
                    </div>
                  </div>
                  {{-- <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/Swiss_airlines.JPG') }}" alt="">
                    </div>
                  </div> --}}
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/virgin_attlantic.JPG') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/wizz_air.JPG') }}" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>

@endsection

@section('footer-script')
  <script type="text/javascript">
    $(document).ready(function(){
      // $(".slider-area").slick({
      //   dots: true,
      //   infinite: true,
      //   slidesToShow: 4,
      //   slidesToScroll: 1,
      //   autoplay: true,
      //   autoplaySpeed: 10000
      // });
      if ($( window ).width() > 767) {
        $(".slider-area").slick({
          dots: true,
          infinite: true,
          slidesToShow: 4,
          slidesToScroll: 1,
          // autoplay: true,
          // autoplaySpeed: 1000
          });
      }else {
        $(".slider-area").slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            // autoplay: true,
            // autoplaySpeed: 1000
          });
      }
  });
  </script>
@endsection
