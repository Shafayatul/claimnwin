@extends('layouts.front_layout')
@section('content')
<main class="mainBanner">
        <div class="container">
            <div class="banner-content text-center">
                <h1 class="fw-6">
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][0]['translatedText'] !!}
                  @else
                    {!! $text[0] !!}
                  @endif
                </h1>
                <h2 class="fw-5">
                  @if ($responseDecoded)
                    {!! $responseDecoded['data']['translations'][1]['translatedText'] !!}
                  @else
                    {!! $text[1] !!}
                  @endif
                </h2>
                <a href="#">
                <img src="{{asset('front_asset/')}}/img/apple.png" alt="apple app">
                </a>
                <a href="#">
                    <img src="{{asset('front_asset/')}}/img/google.png" alt="google app">
                </a>
            </div><!-- /.banner-content -->
        </div><!-- /.container -->
    </main>

    <div class="intro">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <section>
                      @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][2]['translatedText'] !!}
                      @else
                        {!! $text[2] !!}
                      @endif
                    </section>
                </div><!-- /.col-md-6 -->
                <div class="col-md-6 text-center">
                    <img src="{{asset('front_asset/')}}/img/mobiles.png" alt="Mobiles">
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.intro -->


    <div class="inner-banner">
        <div class="container">
            <h1 class="fw-5">
              @if ($responseDecoded)
                {!! $responseDecoded['data']['translations'][3]['translatedText'] !!}
              @else
                {!! $text[3] !!}
              @endif
            </h1>
            <p class="fw-4">
              @if ($responseDecoded)
                {!! $responseDecoded['data']['translations'][4]['translatedText'] !!}
              @else
                {!! $text[4] !!}
              @endif
            </p>
            <a href="{{ url('/form-claim') }}">
              @if ($responseDecoded)
                {!! $responseDecoded['data']['translations'][5]['translatedText'] !!}
              @else
                {!! $text[5] !!}
              @endif
            </a>
        </div><!-- /.cnotainer -->
    </div><!-- /.inner-banner -->

    <div class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-card">
                        <h2 class="fw-5">
                          @if ($responseDecoded)
                            {!! $responseDecoded['data']['translations'][6]['translatedText'] !!}
                          @else
                            {!! $text[6] !!}
                          @endif
                        </h2>
                        <p class="fw-4">
                          @if ($responseDecoded)
                            {!! $responseDecoded['data']['translations'][7]['translatedText'] !!}
                          @else
                            {!! $text[7] !!}
                          @endif
                        </p>
                    </div><!-- /.feature-card -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4">
                    <div class="feature-card">
                        <h2 class="fw-5">
                          @if ($responseDecoded)
                            {!! $responseDecoded['data']['translations'][8]['translatedText'] !!}
                          @else
                            {!! $text[8] !!}
                          @endif
                        </h2>
                        <p class="fw-4">
                          @if ($responseDecoded)
                            {!! $responseDecoded['data']['translations'][9]['translatedText'] !!}
                          @else
                            {!! $text[9] !!}
                          @endif
                        </p>
                    </div><!-- /.feature-card -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4">
                    <div class="feature-card">
                        <h2 class="fw-5">
                          @if ($responseDecoded)
                            {!! $responseDecoded['data']['translations'][10]['translatedText'] !!}
                          @else
                            {!! $text[10] !!}
                          @endif
                        </h2>
                        <p class="fw-4">
                          @if ($responseDecoded)
                            {!! $responseDecoded['data']['translations'][11]['translatedText'] !!}
                          @else
                            {!! $text[11] !!}
                          @endif
                        </p>
                    </div><!-- /.feature-card -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.features -->
@endsection
