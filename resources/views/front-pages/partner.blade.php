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
                <h1>
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][0]['translatedText'] !!}
                  @else
                    {!! $text[0] !!}
                  @endif
                </h1>
            </div>
            <div class="page_p">
                <p>
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][1]['translatedText'] !!}
                  @else
                    {!! $text[1] !!}
                  @endif
                </p>
            </div>
            <div class="page_btn">
                <a href="{{ url('/contact-us') }}" class="btn text-uppercase">
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][2]['translatedText'] !!}
                  @else
                    {!! $text[2] !!}
                  @endif
                </a>
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
                        <h1>
                          @if ($responseDecoded)
                            {!! $responseDecoded['data']['translations'][3]['translatedText'] !!}
                          @else
                            {!! $text[3] !!}
                          @endif
                        </h1>
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
                        <p class="how_it_works_text_upper_p_div">
                          @if ($responseDecoded)
                            {!! $responseDecoded['data']['translations'][4]['translatedText'] !!}
                          @else
                            {!! $text[4] !!}
                          @endif
                        </p>
                        <p class="how_it_works_text_lower_p_div">
                          @if ($responseDecoded)
                            {!! $responseDecoded['data']['translations'][5]['translatedText'] !!}
                          @else
                            {!! $text[5] !!}
                          @endif
                        </p>
                    </div>
                    </div>
                    <div class="col-md-4 text-center margin_bottom">
                    <div class="how_it_works_background_icon_div">
                        <div class="how_it_works_icon_div">
                        <img src="{{ asset('/front_asset/front_pages_asset/img/conference-call.png') }}" alt="">
                        </div>
                    </div>
                    <div class="how_it_works_text_div">
                        <p class="how_it_works_text_upper_p_div">
                          @if ($responseDecoded)
                            {!! $responseDecoded['data']['translations'][6]['translatedText'] !!}
                          @else
                            {!! $text[6] !!}
                          @endif
                        </p>
                        <p class="how_it_works_text_lower_p_div">
                          @if ($responseDecoded)
                            {!! $responseDecoded['data']['translations'][7]['translatedText'] !!}
                          @else
                            {!! $text[7] !!}
                          @endif
                        </p>
                    </div>
                    </div>
                    <div class="col-md-4 text-center margin_bottom">
                    <div class="how_it_works_background_icon_div">
                        <div class="how_it_works_icon_div">
                        <img src="{{ asset('/front_asset/front_pages_asset/img/us-doller.png') }}" alt="">
                        </div>
                    </div>
                    <div class="how_it_works_text_div">
                        <p class="how_it_works_text_upper_p_div">
                          @if ($responseDecoded)
                            {!! $responseDecoded['data']['translations'][8]['translatedText'] !!}
                          @else
                            {!! $text[8] !!}
                          @endif
                        </p>
                        <p class="how_it_works_text_lower_p_div">
                          @if ($responseDecoded)
                            {!! $responseDecoded['data']['translations'][9]['translatedText'] !!}
                          @else
                            {!! $text[9] !!}
                          @endif
                        </p>
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
                    <h1>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][10]['translatedText'] !!}
                      @else
                        {!! $text[10] !!}
                      @endif
                    </h1>
                </div>
                <div class="claim_compass_p">
                    <p>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][11]['translatedText'] !!}
                      @else
                        {!! $text[11] !!}
                      @endif
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
                    <h1>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][12]['translatedText'] !!}
                      @else
                        {!! $text[12] !!}
                      @endif
                    </h1>
                </div>
                <div class="affiliate_p">
                    <p>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][13]['translatedText'] !!}
                      @else
                        {!! $text[13] !!}
                      @endif
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
                <h1>
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][14]['translatedText'] !!}
                  @else
                    {!! $text[14] !!}
                  @endif
                </h1>
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
                      <p>
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][15]['translatedText'] !!}
                        @else
                          {!! $text[15] !!}
                        @endif
                      </p>
                    </div>
                    <div class="sliding_div_text_p_div">
                      <p>
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][16]['translatedText'] !!}
                        @else
                          {!! $text[16] !!}
                        @endif
                      </p>
                    </div>
                    <div class="sliding_div_customer_name_div">
                      <p>
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][17]['translatedText'] !!}
                        @else
                          {!! $text[17] !!}
                        @endif
                      </p>
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
                      <p>
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][18]['translatedText'] !!}
                        @else
                          {!! $text[18] !!}
                        @endif
                      </p>
                    </div>
                    <div class="sliding_div_text_p_div">
                      <p>
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][19]['translatedText'] !!}
                        @else
                          {!! $text[19] !!}
                        @endif
                      </p>
                    </div>
                    <div class="sliding_div_customer_name_div">
                      <p>
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][20]['translatedText'] !!}
                        @else
                          {!! $text[20] !!}
                        @endif
                      </p>
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
                      <p>
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][21]['translatedText'] !!}
                        @else
                          {!! $text[21] !!}
                        @endif
                      </p>
                    </div>
                    <div class="sliding_div_text_p_div">
                      <p>
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][22]['translatedText'] !!}
                        @else
                          {!! $text[22] !!}
                        @endif
                      </p>
                    </div>
                    <div class="sliding_div_customer_name_div">
                      <p>
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][23]['translatedText'] !!}
                        @else
                          {!! $text[23] !!}
                        @endif
                      </p>
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
                      <p>
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][24]['translatedText'] !!}
                        @else
                          {!! $text[24] !!}
                        @endif
                      </p>
                    </div>
                    <div class="sliding_div_text_p_div">
                      <p>
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][25]['translatedText'] !!}
                        @else
                          {!! $text[25] !!}
                        @endif
                      </p>
                    </div>
                    <div class="sliding_div_customer_name_div">
                      <p>
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][26]['translatedText'] !!}
                        @else
                          {!! $text[26] !!}
                        @endif
                      </p>
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
                      <p>
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][27]['translatedText'] !!}
                        @else
                          {!! $text[27] !!}
                        @endif
                      </p>
                    </div>
                    <div class="sliding_div_text_p_div">
                      <p>
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][28]['translatedText'] !!}
                        @else
                          {!! $text[28] !!}
                        @endif
                      </p>
                    </div>
                    <div class="sliding_div_customer_name_div">
                      <p>
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][29]['translatedText'] !!}
                        @else
                          {!! $text[29] !!}
                        @endif
                      </p>
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
