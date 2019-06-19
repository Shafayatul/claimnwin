@extends('layouts.front_layout')
@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/pricing_list.css')}}" rel="stylesheet">
@endsection

@section('page-title')
  <div class="page_title">
    <h1 class="text-center">
      @if ($responseDecoded1)
        {!! $responseDecoded1['data']['translations'][0]['translatedText'] !!}
      @else
        {!! $text1[0] !!}
      @endif
    </h1>
  </div>
@endsection

@section('content')
<div class="container">
    <div class="first_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>
                      @if ($responseDecoded1)
                        {!! $responseDecoded1['data']['translations'][1]['translatedText'] !!}
                      @else
                        {!! $text1[1] !!}
                      @endif
                    </h1>
                </div>
                <div class="first_row_p no_padding_bottom">
                    <p>
                      @if ($responseDecoded1)
                        {!! $responseDecoded1['data']['translations'][2]['translatedText'] !!}
                      @else
                        {!! $text1[2] !!}
                      @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="second_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>
                      @if ($responseDecoded1)
                        {!! $responseDecoded1['data']['translations'][3]['translatedText'] !!}
                      @else
                        {!! $text1[3] !!}
                      @endif
                    </h1>
                </div>
                <div class="second_row_p">
                    <p>
                      @if ($responseDecoded1)
                        {!! $responseDecoded1['data']['translations'][4]['translatedText'] !!}
                      @else
                        {!! $text1[4] !!}
                      @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="third_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>
                      @if ($responseDecoded1)
                        {!! $responseDecoded1['data']['translations'][5]['translatedText'] !!}
                      @else
                        {!! $text1[5] !!}
                      @endif
                    </h1>
                </div>
                <div class="third_row_p">
                    <p>
                      @if ($responseDecoded1)
                        {!! $responseDecoded1['data']['translations'][6]['translatedText'] !!}
                      @else
                        {!! $text1[6] !!}
                      @endif
                    </p>
                </div>
                <div class="third_row_p">
                    <p>
                      @if ($responseDecoded1)
                        {!! $responseDecoded1['data']['translations'][7]['translatedText'] !!}
                      @else
                        {!! $text1[7] !!}
                      @endif
                    </p>
                </div>
                <div class="third_row_p">
                  @if ($responseDecoded1)
                    {!! $responseDecoded1['data']['translations'][8]['translatedText'] !!}
                  @else
                    {!! $text1[8] !!}
                  @endif
                </div>
                <div class="third_row_p">
                    <p>
                      @if ($responseDecoded1)
                        {!! $responseDecoded1['data']['translations'][9]['translatedText'] !!}
                      @else
                        {!! $text1[9] !!}
                      @endif
                    </p>
                </div>
                <div class="third_row_p">
                    <p>
                      @if ($responseDecoded1)
                        {!! $responseDecoded1['data']['translations'][10]['translatedText'] !!}
                      @else
                        {!! $text1[10] !!}
                      @endif
                    </p>
                </div>
                <div class="third_row_p">
                    <p>
                      @if ($responseDecoded1)
                        {!! $responseDecoded1['data']['translations'][11]['translatedText'] !!}
                      @else
                        {!! $text1[11] !!}
                      @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="fourth_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>
                      @if ($responseDecoded1)
                        {!! $responseDecoded1['data']['translations'][12]['translatedText'] !!}
                      @else
                        {!! $text1[12] !!}
                      @endif
                    </h1>
                </div>
                <div class="fourth_row_p">
                    <p>
                      @if ($responseDecoded1)
                        {!! $responseDecoded1['data']['translations'][13]['translatedText'] !!}
                      @else
                        {!! $text1[13] !!}
                      @endif
                    </p>
                </div>
                <div class="fourth_row_p">
                    <p>
                      @if ($responseDecoded1)
                        {!! $responseDecoded1['data']['translations'][14]['translatedText'] !!}
                      @else
                        {!! $text1[14] !!}
                      @endif
                    </p>
                </div>
                <div class="fourth_row_p">
                  @if ($responseDecoded1)
                    {!! $responseDecoded1['data']['translations'][15]['translatedText'] !!}
                  @else
                    {!! $text1[15] !!}
                  @endif
                </div>
                <div class="fourth_row_p">
                    <p>
                      @if ($responseDecoded2)
                        {!! $responseDecoded2['data']['translations'][0]['translatedText'] !!}
                      @else
                        {!! $text2[0] !!}
                      @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="five_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>
                      @if ($responseDecoded2)
                        {!! $responseDecoded2['data']['translations'][1]['translatedText'] !!}
                      @else
                        {!! $text2[1] !!}
                      @endif
                    </h1>
                </div>
                <div class="five_row_p">
                    <p>
                      @if ($responseDecoded2)
                        {!! $responseDecoded2['data']['translations'][2]['translatedText'] !!}
                      @else
                        {!! $text2[2] !!}
                      @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="six_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>
                      @if ($responseDecoded2)
                        {!! $responseDecoded2['data']['translations'][3]['translatedText'] !!}
                      @else
                        {!! $text2[3] !!}
                      @endif
                    </h1>
                </div>
                <div class="six_row_p">
                    <p>
                      @if ($responseDecoded2)
                        {!! $responseDecoded2['data']['translations'][4]['translatedText'] !!}
                      @else
                        {!! $text2[4] !!}
                      @endif
                    </p>
                </div>
                <div class="six_row_p">
                    <p>
                      @if ($responseDecoded2)
                        {!! $responseDecoded2['data']['translations'][5]['translatedText'] !!}
                      @else
                        {!! $text2[5] !!}
                      @endif
                    </p>
                </div>
                <div class="six_row_p">
                    <p>
                      @if ($responseDecoded2)
                        {!! $responseDecoded2['data']['translations'][6]['translatedText'] !!}
                      @else
                        {!! $text2[6] !!}
                      @endif
                    </p>
                </div>
                <div class="six_row_p no_bottom_padding">
                    <p>
                      @if ($responseDecoded2)
                        {!! $responseDecoded2['data']['translations'][7]['translatedText'] !!}
                      @else
                        {!! $text2[7] !!}
                      @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="seven_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>
                      @if ($responseDecoded2)
                        {!! $responseDecoded2['data']['translations'][8]['translatedText'] !!}
                      @else
                        {!! $text2[8] !!}
                      @endif
                    </h1>
                </div>
                <div class="seven_row_p">
                    <p>
                      @if ($responseDecoded2)
                        {!! $responseDecoded2['data']['translations'][9]['translatedText'] !!}
                      @else
                        {!! $text2[9] !!}
                      @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="eight_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>
                      @if ($responseDecoded2)
                        {!! $responseDecoded2['data']['translations'][10]['translatedText'] !!}
                      @else
                        {!! $text2[10] !!}
                      @endif
                    </h1>
                </div>
                <div class="eight_row_p">
                    <p>
                      @if ($responseDecoded2)
                        {!! $responseDecoded2['data']['translations'][11]['translatedText'] !!}
                      @else
                        {!! $text2[11] !!}
                      @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="nine_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>
                      @if ($responseDecoded2)
                        {!! $responseDecoded2['data']['translations'][12]['translatedText'] !!}
                      @else
                        {!! $text2[12] !!}
                      @endif
                    </h1>
                </div>
                <div class="nine_row_p">
                    <p>
                      @if ($responseDecoded2)
                        {!! $responseDecoded2['data']['translations'][13]['translatedText'] !!}
                      @else
                        {!! $text2[13] !!}
                      @endif
                    </p>
                </div>
                <div class="nine_row_p no_bottom_padding">
                    <p>
                      @if ($responseDecoded2)
                        {!! $responseDecoded2['data']['translations'][14]['translatedText'] !!}
                      @else
                        {!! $text2[14] !!}
                      @endif
                      : 2019.04.09
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
