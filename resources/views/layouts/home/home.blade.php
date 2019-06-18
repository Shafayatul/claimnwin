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
                <h1>
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][0]['translatedText'] !!}
                  @else
                    {!! $text[0] !!}
                  @endif
                  <span class="extra_color">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][1]['translatedText'] !!}
                    @else
                      {!! $text[1] !!}
                    @endif
                  </br>
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][2]['translatedText'] !!}
                    @else
                      {!! $text[2] !!}
                    @endif
                  </span>
                </h1>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9" style="margin: 0px; padding: 0px;">
              <div class="home_top_header_title_p_div">
                <p>
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][3]['translatedText'] !!}
                  @else
                    {!! $text[3] !!}
                  @endif
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="margin: 0px; padding: 0px;">
              <div class="home_top_header_title_ul_div">
                <ul class="fa-ul">
                  <li>
                    <div class="li_mother_div">
                      <div class="li_icon_div">
                        <i class="fas fa-check-circle"></i>
                      </div>
                      <div class="li_text_div">
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][4]['translatedText'] !!}
                        @else
                          {!! $text[4] !!}
                        @endif
                        {!! $amount1 !!}
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][5]['translatedText'] !!}
                        @else
                          {!! $text[5] !!}
                        @endif
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="li_mother_div">
                      <div class="li_icon_div">
                        <i class="fas fa-check-circle"></i>
                      </div>
                      <div class="li_text_div">
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][4]['translatedText'] !!}
                        @else
                          {!! $text[4] !!}
                        @endif
                        {!! $amount2 !!}
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][6]['translatedText'] !!}
                        @else
                          {!! $text[6] !!}
                        @endif
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="li_mother_div">
                      <div class="li_icon_div">
                        <i class="fas fa-check-circle"></i>
                      </div>
                      <div class="li_text_div">
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][4]['translatedText'] !!}
                        @else
                          {!! $text[4] !!}
                        @endif
                        {!! $amount3 !!}
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][7]['translatedText'] !!}
                        @else
                          {!! $text[7] !!}
                        @endif
                      </div>
                    </div>
                  </li>
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
                      <button class="common_button set_cache_claim" type="button" name="button">
                        @if ($responseDecoded)
                          {!! $responseDecoded['data']['translations'][8]['translatedText'] !!}
                        @else
                          {!! $text[8] !!}
                        @endif
                      </button>
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
                  <p class="home_top_header_option_text_p_title_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][9]['translatedText'] !!}
                    @else
                      {!! $text[9] !!}
                    @endif
                  </p>
                  <p class="home_top_header_option_text_p_normal_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][10]['translatedText'] !!}
                    @else
                      {!! $text[10] !!}
                    @endif
                  </p>
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
                  <p class="home_top_header_option_text_p_title_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][11]['translatedText'] !!}
                    @else
                      {!! $text[11] !!}
                    @endif
                    {{$amount4}}
                  </p>
                  <p class="home_top_header_option_text_p_normal_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][12]['translatedText'] !!}
                    @else
                      {!! $text[12] !!}
                    @endif
                  </p>
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
                  <p class="home_top_header_option_text_p_title_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][13]['translatedText'] !!}
                    @else
                      {!! $text[13] !!}
                    @endif
                  </p>
                  <p class="home_top_header_option_text_p_normal_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][14]['translatedText'] !!}
                    @else
                      {!! $text[14] !!}
                    @endif
                  </p>
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
                  <p class="home_top_header_option_text_p_title_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][15]['translatedText'] !!}
                    @else
                      {!! $text[15] !!}
                    @endif
                  </p>
                  <p class="home_top_header_option_text_p_normal_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][16]['translatedText'] !!}
                    @else
                      {!! $text[16] !!}
                    @endif
                  </p>
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
              <h1>
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][17]['translatedText'] !!}
                @else
                  {!! $text[17] !!}
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
                  <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_how_it_works_compensation.png') }}" alt="">
                </div>
              </div>
              <div class="how_it_works_text_div">
                <p class="how_it_works_text_upper_p_div">
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][18]['translatedText'] !!}
                  @else
                    {!! $text[18] !!}
                  @endif
                </p>
                <p class="how_it_works_text_lower_p_div">
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][19]['translatedText'] !!}
                  @else
                    {!! $text[19] !!}
                  @endif
                </p>
              </div>
            </div>
            <div class="col-md-4 text-center margin_bottom">
              <div class="how_it_works_background_icon_div">
                <div class="how_it_works_icon_div">
                  <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_how_it_works_admin_setting_male.png') }}" alt="">
                </div>
              </div>
              <div class="how_it_works_text_div">
                <p class="how_it_works_text_upper_p_div">
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][20]['translatedText'] !!}
                  @else
                    {!! $text[20] !!}
                  @endif
                </p>
                <p class="how_it_works_text_lower_p_div">
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][21]['translatedText'] !!}
                  @else
                    {!! $text[21] !!}
                  @endif
                </p>
              </div>
            </div>
            <div class="col-md-4 text-center margin_bottom">
              <div class="how_it_works_background_icon_div">
                <div class="how_it_works_icon_div">
                  <img src="{{ asset('/front_asset/front_pages_asset/img/homepage_how_it_works_receive_cash.png') }}" alt="">
                </div>
              </div>
              <div class="how_it_works_text_div">
                <p class="how_it_works_text_upper_p_div">
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][22]['translatedText'] !!}
                  @else
                    {!! $text[22] !!}
                  @endif
                </p>
                <p class="how_it_works_text_lower_p_div">
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][23]['translatedText'] !!}
                  @else
                    {!! $text[23] !!}
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
  <!-- How it works div ends -->

  <!-- What customer say div starts -->

<div class="what_customer_say_div">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="what_customer_say_title_div text-center">
                <h1>
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][24]['translatedText'] !!}
                  @else
                    {!! $text[24] !!}
                  @endif
                </h1>
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
                                <p>{!! $review->title !!}</p>
                            </div>
                            <div class="sliding_div_text_p_div" style="overflow:hidden;">
                                {!! $review->description !!}
                            </div>
                            <div class="sliding_div_customer_name_div">
                                <p>{!! $review->name !!}</p>
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
            <h1>
              @if ($responseDecoded)
                {!! $responseDecoded['data']['translations'][25]['translatedText'] !!}
              @else
                {!! $text[25] !!}
              @endif
            </h1>
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
              <p>
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][26]['translatedText'] !!}
                @else
                  {!! $text[26] !!}
                @endif
              </br>
              @if ($responseDecoded)
                {!! $responseDecoded['data']['translations'][27]['translatedText'] !!}
              @else
                {!! $text[27] !!}
              @endif
              </br>
              @if ($responseDecoded)
                {!! $responseDecoded['data']['translations'][28]['translatedText'] !!}
              @else
                {!! $text[28] !!}
              @endif
              </p>
            </div>
          </div>
          <div class="col-md-3 col-xs-6 our_process_padding_bottom">
            <div class="our_process_lower_div_icon_div text-center">
              <img class="" src="{{ asset('/front_asset/front_pages_asset/img/homepage_our_process_passenger_with_bag.png') }}" alt="">
            </div>
            <div class="our_process_lower_div_icon_text_div text-center">
              <p>
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][29]['translatedText'] !!}
                @else
                  {!! $text[29] !!}
                @endif
              </br>
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][30]['translatedText'] !!}
                @else
                  {!! $text[30] !!}
                @endif
              </p>
            </div>
          </div>
          <div class="clearfix clearfix_display_none"></div>
          <div class="col-md-3 col-xs-6 our_process_padding_bottom">
            <div class="our_process_lower_div_icon_div text-center">
              <img class="" src="{{ asset('/front_asset/front_pages_asset/img/homepage_our_process_collaboration.png') }}" alt="">
            </div>
            <div class="our_process_lower_div_icon_text_div text-center">
              <p>
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][31]['translatedText'] !!}
                @else
                  {!! $text[31] !!}
                @endif
              </br>
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][32]['translatedText'] !!}
                @else
                  {!! $text[32] !!}
                @endif
              </br>
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][33]['translatedText'] !!}
                @else
                  {!! $text[33] !!}
                @endif
              </p>
            </div>
          </div>
          <div class="col-md-3 col-xs-6 our_process_padding_bottom">
            <div class="our_process_lower_div_icon_div text-center">
              <img class="" src="{{ asset('/front_asset/front_pages_asset/img/homepage_our_process_cash_in_hand.png') }}" alt="">
            </div>
            <div class="our_process_lower_div_icon_text_div text-center">
              <p>
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][34]['translatedText'] !!}
                @else
                  {!! $text[34] !!}
                @endif
              </br>
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][35]['translatedText'] !!}
                @else
                  {!! $text[35] !!}
                @endif
              </br>
                @if ($responseDecoded)
                  {!! $responseDecoded['data']['translations'][36]['translatedText'] !!}
                @else
                  {!! $text[36] !!}
                @endif
              </p>
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
            <p>
              @if ($responseDecoded)
                {!! $responseDecoded['data']['translations'][37]['translatedText'] !!}
              @else
                {!! $text[37] !!}
              @endif
            </br>
              @if ($responseDecoded)
                {!! $responseDecoded['data']['translations'][38]['translatedText'] !!}
              @else
                {!! $text[38] !!}
              @endif
            </br>
              @if ($responseDecoded)
                {!! $responseDecoded['data']['translations'][39]['translatedText'] !!}
              @else
                {!! $text[39] !!}
              @endif
            </p>
          </div>
        </div>
      </div>
        <a href="{{ url('/form-claim') }}">
          <div class="about_us_middle_content_button text-center">
            <button type="button" name="button">
              @if ($responseDecoded)
                {!! $responseDecoded['data']['translations'][40]['translatedText'] !!}
              @else
                {!! $text[40] !!}
              @endif
            </button>
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
