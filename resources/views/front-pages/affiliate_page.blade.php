@extends('layouts.front_layout')
@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/affiliate_page.css')}}" rel="stylesheet" />
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
                {{-- <a href="#" class="btn text-uppercase">sign up</a> --}}
                <a href="{{route('user/signup')}}" class="btn text-uppercase">
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
        <div class="col-md-12 col-sm-12">
          <div class="how_it_works_lower_div">
            <div class="row">
              <div class="col-md-4 text-center margin_bottom">
                <div class="how_it_works_background_icon_div">
                  <div class="how_it_works_icon_div">
                    <img src="{{ asset('/front_asset/front_pages_asset/img/us-doller.png') }}" alt="">
                  </div>
                </div>
                <div class="how_it_works_text_div">
                  <p class="how_it_works_text_upper_p_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][3]['translatedText'] !!}
                    @else
                      {!! $text[3] !!}
                    @endif
                  </p>
                  <p class="how_it_works_text_lower_p_div text-center">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][4]['translatedText'] !!}
                    @else
                      {!! $text[4] !!}
                    @endif
                  </p>
                </div>
              </div>
              <div class="col-md-4 text-center margin_bottom">
                <div class="how_it_works_background_icon_div">
                  <div class="how_it_works_icon_div">
                    <img src="{{ asset('/front_asset/front_pages_asset/img/setting.png') }}" alt="">
                  </div>
                </div>
                <div class="how_it_works_text_div">
                  <p class="how_it_works_text_upper_p_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][5]['translatedText'] !!}
                    @else
                      {!! $text[5] !!}
                    @endif
                  </p>
                  <p class="how_it_works_text_lower_p_div text-center">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][6]['translatedText'] !!}
                    @else
                      {!! $text[6] !!}
                    @endif
                  </p>
                </div>
              </div>
              <div class="col-md-4 text-center margin_bottom">
                <div class="how_it_works_background_icon_div">
                  <div class="how_it_works_icon_div">
                    <img src="{{ asset('/front_asset/front_pages_asset/img/search.png') }}" alt="">
                  </div>
                </div>
                <div class="how_it_works_text_div">
                  <p class="how_it_works_text_upper_p_div">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][7]['translatedText'] !!}
                    @else
                      {!! $text[7] !!}
                    @endif
                  </p>
                  <p class="how_it_works_text_lower_p_div text-center">
                    @if ($responseDecoded)
                      {!! $responseDecoded['data']['translations'][8]['translatedText'] !!}
                    @else
                      {!! $text[8] !!}
                    @endif
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

        <div class="row">
          <div class="col-md-12">
            <div class="how_it_works_lower_div">
              <div class="row">
                <div class="col-md-4 text-center margin_bottom">
                  <div class="how_it_works_background_icon_div">
                    <div class="how_it_works_icon_div">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/like.png') }}" alt="">
                    </div>
                  </div>
                  <div class="how_it_works_text_div">
                    <p class="how_it_works_text_upper_p_div">
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][9]['translatedText'] !!}
                      @else
                        {!! $text[9] !!}
                      @endif
                    </p>
                    <p class="how_it_works_text_lower_p_div text-center">
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][10]['translatedText'] !!}
                      @else
                        {!! $text[10] !!}
                      @endif
                    </p>
                  </div>
                </div>
                <div class="col-md-4 text-center margin_bottom">
                  <div class="how_it_works_background_icon_div">
                    <div class="how_it_works_icon_div">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/globe.png') }}" alt="">
                    </div>
                  </div>
                  <div class="how_it_works_text_div">
                    <p class="how_it_works_text_upper_p_div">
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][11]['translatedText'] !!}
                      @else
                        {!! $text[11] !!}
                      @endif
                    </p>
                    <p class="how_it_works_text_lower_p_div text-center">
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][12]['translatedText'] !!}
                      @else
                        {!! $text[12] !!}
                      @endif
                    </p>
                  </div>
                </div>
                <div class="col-md-4 text-center margin_bottom">
                  <div class="how_it_works_background_icon_div">
                    <div class="how_it_works_icon_div">
                      <img src="{{ asset('/front_asset/front_pages_asset/img/online_support.png') }}" alt="">
                    </div>
                  </div>
                  <div class="how_it_works_text_div">
                    <p class="how_it_works_text_upper_p_div">
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][13]['translatedText'] !!}
                      @else
                        {!! $text[13] !!}
                      @endif
                    </p>
                    <p class="how_it_works_text_lower_p_div text-center">
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][14]['translatedText'] !!}
                      @else
                        {!! $text[14] !!}
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

<div class="travel">
    <div class="container">
        <div class="row margin_bottom">
            <div class="col-md-6">
                <div class="travel_title">
                    <h1>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][15]['translatedText'] !!}
                      @else
                        {!! $text[15] !!}
                      @endif
                    </h1>
                </div>
                <div class="travel_p">
                    <p>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][16]['translatedText'] !!}
                      @else
                        {!! $text[16] !!}
                      @endif
                    </p>
                </div>
                <div class="travel_p">
                    <p>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][17]['translatedText'] !!}
                      @else
                        {!! $text[17] !!}
                      @endif
                    </p>
                </div>
                <div class="travel_p">
                    <p>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][18]['translatedText'] !!}
                      @else
                        {!! $text[18] !!}
                      @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- What customer say div starts -->
<div class="container">
    <div class="what_customer_say_div">
        <div class="row">
            <div class="col-md-12">
                <div class="what_customer_say_title_div text-center">
                <h1>
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][19]['translatedText'] !!}
                  @else
                    {!! $text[19] !!}
                  @endif
                </h1>
                </div>
            </div>
        </div>
        <div class="works">
            <div class="row">
                <div class="col-md-4">
                    <div class="work_first_column">
                                <div class="work_number">
                                    <span>1</span>
                                </div>

                                <div class="work_text">
                                    <div class="work_text_h1">
                                        <h1>
                                          @if ($responseDecoded)
                                            {!! $responseDecoded['data']['translations'][2]['translatedText'] !!}
                                          @else
                                            {!! $text[2] !!}
                                          @endif
                                        </h1>
                                    </div>
                                    <div class="work_text_p">
                                        <p>
                                          @if ($responseDecoded)
                                            {!! $responseDecoded['data']['translations'][20]['translatedText'] !!}
                                          @else
                                            {!! $text[20] !!}
                                          @endif
                                        </p>
                                    </div>
                                </div>
                        </div>
                </div>
                <div class="col-md-4">
                    <div class="work_first_column">
                        <div class="work_number">
                            <span>2</span>
                        </div>
                        <div class="work_text">
                            <div class="work_text_h1">
                                <h1>
                                  @if ($responseDecoded)
                                    {!! $responseDecoded['data']['translations'][21]['translatedText'] !!}
                                  @else
                                    {!! $text[21] !!}
                                  @endif
                                </h1>
                            </div>
                            <div class="work_text_p">
                                <p>
                                  @if ($responseDecoded)
                                    {!! $responseDecoded['data']['translations'][22]['translatedText'] !!}
                                  @else
                                    {!! $text[22] !!}
                                  @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="work_first_column">
                        <div class="work_number">
                            <span>3</span>
                        </div>
                        <div class="work_text">
                            <div class="work_text_h1">
                                <h1>
                                  @if ($responseDecoded)
                                    {!! $responseDecoded['data']['translations'][23]['translatedText'] !!}
                                  @else
                                    {!! $text[23] !!}
                                  @endif
                                </h1>
                            </div>
                            <div class="work_text_p">
                                <p>
                                  @if ($responseDecoded)
                                    {!! $responseDecoded['data']['translations'][24]['translatedText'] !!}
                                  @else
                                    {!! $text[24] !!}
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

<div class="become_an_affiliate">
    <div class="container">
        <div class="row margin_top_70">
            <div class="col-md-6">
                <div class="become_an_affiliate_title">
                    <h1>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][25]['translatedText'] !!}
                      @else
                        {!! $text[25] !!}
                      @endif
                    </h1>
                </div>
                <div class="become_an_affiliate_p">
                    <p>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][26]['translatedText'] !!}
                      @else
                        {!! $text[26] !!}
                      @endif
                    </p>
                </div>
                <div class="become_an_affiliate_btn">
                    <a href="{{route('user/signup')}}" class="btn">
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][27]['translatedText'] !!}
                      @else
                        {!! $text[27] !!}
                      @endif
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
