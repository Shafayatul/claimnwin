@extends('layouts.front_layout')
@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/privacy_policy.css')}}" rel="stylesheet">
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
<div class="container">
    <div class="first_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][1]['translatedText']}}
                        @else
                            {{ $text[1]}}
                        @endif
                    </h1>
                </div>
                <div class="first_row_p">
                    <p>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][2]['translatedText']}}
                        @else
                            {{ $text[2]}}
                        @endif
                        <br>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][3]['translatedText']}}
                        @else
                            {{ $text[3]}}
                        @endif
                        <br>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][4]['translatedText']}}
                        @else
                            {{ $text[4]}}
                        @endif
                    </p>
                </div>

                <div class="first_row_p">
                    <p>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][5]['translatedText']}}
                        @else
                            {{ $text[5]}}
                        @endif
                        <br>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][6]['translatedText']}}
                        @else
                            {{ $text[6]}}
                        @endif
                        <br>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][7]['translatedText']}}
                        @else
                            {{ $text[7]}}
                        @endif
                    </p>
                </div>

                <div class="first_row_p">
                    <p>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][8]['translatedText']}}
                        @else
                            {{ $text[8]}}
                        @endif
                        <br>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][9]['translatedText']}}
                        @else
                            {{ $text[9]}}
                        @endif
                        <br>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][10]['translatedText']}}
                        @else
                            {{ $text[10]}}
                        @endif
                    </p>
                </div>

                <div class="first_row_p no_bottom_padding">
                    <p>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][11]['translatedText']}}
                        @else
                            {{ $text[11]}}
                        @endif
                        <br>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][12]['translatedText']}}
                        @else
                            {{ $text[12]}}
                        @endif
                        <br>
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

    <div class="second_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][14]['translatedText']}}
                        @else
                            {{ $text[14]}}
                        @endif
                    </h1>
                </div>
                <div class="second_row_p">
                    <p>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][15]['translatedText']}}
                        @else
                            {{ $text[15]}}
                        @endif
                        <br>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][16]['translatedText']}}
                        @else
                            {{ $text[16]}}
                        @endif
                        <br>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][17]['translatedText']}}
                        @else
                            {{ $text[17]}}
                        @endif
                        <br>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][18]['translatedText']}}
                        @else
                            {{ $text[18]}}
                        @endif
                        <br>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][19]['translatedText']}}
                        @else
                            {{ $text[19]}}
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
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][20]['translatedText']}}
                        @else
                            {{ $text[20]}}
                        @endif
                    </h1>
                </div>
                <div class="third_row_p">
                    <p>
                        @if ($responseDecoded)
                        {{ $responseDecoded['data']['translations'][21]['translatedText']}}
                        @else
                            {{ $text[21]}}
                        @endif
                        :
                    </p>
                    <ul>
                        <li>
                            @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][22]['translatedText']}}
                            @else
                                {{ $text[22]}}
                            @endif
                            <br>
                            @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][23]['translatedText']}}
                            @else
                                {{ $text[23]}}
                            @endif
                            <br>
                            @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][24]['translatedText']}}
                            @else
                                {{ $text[24]}}
                            @endif
                        </li>
                        <li>
                            @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][25]['translatedText']}}
                            @else
                                {{ $text[25]}}
                            @endif
                            <br>
                            @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][26]['translatedText']}}
                            @else
                                {{ $text[26]}}
                            @endif
                            <br>
                            @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][27]['translatedText']}}
                            @else
                                {{ $text[27]}}
                            @endif
                        </li>
                        <li>
                            @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][28]['translatedText']}}
                            @else
                                {{ $text[28]}}
                            @endif
                            <br>
                            @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][29]['translatedText']}}
                            @else
                                {{ $text[29]}}
                            @endif
                        </li>
                        <li>
                            @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][30]['translatedText']}}
                            @else
                                {{ $text[30]}}
                            @endif
                            <br>
                            @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][31]['translatedText']}}
                            @else
                                {{ $text[31]}}
                            @endif
                            <br>
                            @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][32]['translatedText']}}
                            @else
                                {{ $text[32]}}
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="fourth_row">
        <div class="row">
            <div class="col-md-12">
                <div class="title_row">
                    <h1>
                        @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][33]['translatedText']}}
                        @else
                            {{ $text[33]}}
                        @endif
                    </h1>
                </div>
                <div class="fourth_row_p">
                    <p>
                        @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][34]['translatedText']}}
                        @else
                            {{ $text[34]}}
                        @endif
                        <br>
                        @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][35]['translatedText']}}
                        @else
                            {{ $text[35]}}
                        @endif
                        <br>
                        @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][36]['translatedText']}}
                        @else
                            {{ $text[36]}}
                        @endif
                        <br>
                        @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][37]['translatedText']}}
                        @else
                            {{ $text[37]}}
                        @endif
                    </p>
                </div>
                <div class="fourth_row_p">
                    <p>
                        @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][38]['translatedText']}}
                        @else
                            {{ $text[38]}}
                        @endif
                    </p>
                </div>
                <div class="fourth_row_p">
                    <p>
                        @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][39]['translatedText']}}
                        @else
                            {{ $text[39]}}
                        @endif
                    </p>
                </div>
                <div class="fourth_row_p no_bottom_padding">
                    <p>
                        @if ($responseDecoded)
                            {{ $responseDecoded['data']['translations'][40]['translatedText']}}
                        @else
                            {{ $text[40]}}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
