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
            <p>
              @if ($responseDecoded)
                {{ $responseDecoded['data']['translations'][2]['translatedText']}}
              @else
                {{ $text[2]}}
              @endif
          </p>
            <p>
              @if ($responseDecoded)
                {{ $responseDecoded['data']['translations'][3]['translatedText']}}
              @else
                {{ $text[3]}}
              @endif
          </p>
          </div>
            <a href="{{ url('/form-claim') }}">
              <div class="about_us_top_content_button text-center">
                <button type="button" name="button">
                  @if ($responseDecoded)
                    {{ $responseDecoded['data']['translations'][4]['translatedText']}}
                  @else
                    {{ $text[4]}}
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
                  {{ $responseDecoded['data']['translations'][5]['translatedText']}}
                @else
                  {{ $text[5]}}
                @endif
                </br>
                @if ($responseDecoded)
                  {{ $responseDecoded['data']['translations'][6]['translatedText']}}
                @else
                  {{ $text[6]}}
                @endif
                </br>
                @if ($responseDecoded)
                  {{ $responseDecoded['data']['translations'][7]['translatedText']}}
                @else
                  {{ $text[7]}}
                @endif
              </p>
            </div>
          </div>
        </div>
          <a href="{{ url('/form-claim') }}">
            <div class="about_us_middle_content_button text-center">
              <button type="button" name="button">
                @if ($responseDecoded)
                  {{ $responseDecoded['data']['translations'][8]['translatedText']}}
                @else
                  {{ $text[8]}}
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
                  {{ $responseDecoded['data']['translations'][9]['translatedText']}}
                @else
                  {{ $text[9]}}
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
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/1.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/2.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/3.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/4.jpg') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/5.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/6.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/7.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/8.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/9.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/10.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/11.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/12.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/13.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/14.jpg') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/15.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/16.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/17.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/18.jpg') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/19.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/20.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/21.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/22.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/23.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/24.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/25.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/26.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/27.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/28.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/29.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/30.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/31.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/32.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/33.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/34.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/35.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/36.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/37.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/38.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/39.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/40.jpg') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/41.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/42.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/43.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/44.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/45.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/46.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/47.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/48.png') }}" alt="">
                    </div>
                  </div>
                  <div class="sliding_div">
                    <div class="sliding_img_container">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/airlines_image/49.png') }}" alt="">
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
