@extends('layouts.front_layout')

@section('header-script')
<title>claimnwin | Login</title>
<link rel="stylesheet" type="text/css" href="{{ asset('front_asset/signup_login_asset/') }}/css/front_signup_login.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!--===============================================================================================-->
@endsection

@section('content')
<div class="signup_login_form">

    <div class="omb_login">
        <h3 class="omb_authTitle">
            @if ($responseDecoded)
                {!! $responseDecoded['data']['translations'][0]['translatedText'] !!}
            @else
                {!! $text[0] !!}
            @endif
        </h3>
        <div class="row omb_socialButtons">
            <div class="col-xs-12 col-sm-12 facebook_login">
                <a href="{{url('socialauth/facebook')}}" class="btn btn-lg btn-block omb_btn-facebook">
                    <i class="fab fa-facebook-square pull-left"></i>
                    <span class="connect_with_facebook">
                        @if ($responseDecoded)
                            {!! $responseDecoded['data']['translations'][1]['translatedText'] !!}
                        @else
                            {!! $text[1] !!}
                        @endif
                    </span>
                    <!-- <span class="hidden-sm  hidden-xs">Facebook</span> -->
                </a>
            </div>
            <div class="col-xs-12 col-sm-12 google_login">
                <a href="{{url('socialauth/google')}}" class="btn btn-lg btn-block omb_btn-google">
                    <img class="google-icon" src="{{ asset('front_asset/signup_login_asset/img/google_logo_icon.png') }}" alt="google">
                    <span class="connect_with_google">
                        @if ($responseDecoded)
                            {!! $responseDecoded['data']['translations'][2]['translatedText'] !!}
                        @else
                            {!! $text[2] !!}
                        @endif
                    </span>
                </a>
            </div>
        </div>

        <div class="row omb_loginOr">
            <div class="col-xs-12 col-sm-12">
                <hr class="omb_hrOr">
                <span class="omb_spanOr">
                    @if ($responseDecoded)
                        {!! $responseDecoded['data']['translations'][3]['translatedText'] !!}
                    @else
                        {!! $text[3] !!}
                    @endif
                </span>
            </div>
        </div>


    <form class="omb_loginForm" action="{{route('login')}}" autocomplete="off" method="POST">
        @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                        <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="@if ($responseDecoded) {!! $responseDecoded['data']['translations'][4]['translatedText'] !!} @else {!! $text[4] !!} @endif" required>

                    </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                     <span class="help-block"></span>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="@if ($responseDecoded) {!! $responseDecoded['data']['translations'][5]['translatedText'] !!} @else {!! $text[5] !!} @endif" required>

                    </div>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="row text-center">
              <div class="col-xs-12 col-sm-12">
                  <button class="btn btn-lg btn-primary" type="submit">@if ($responseDecoded) {!! $responseDecoded['data']['translations'][0]['translatedText'] !!} @else {!! $text[0] !!} @endif</button>
              </div>
            </div>

        </form>

        <div class="row text-center">
            <div class="col-xs-12 col-sm-6">
                <label class="checkbox remember_me_media">
                    <input type="checkbox" value="remember-me">
                    @if ($responseDecoded) 
                        {!! $responseDecoded['data']['translations'][6]['translatedText'] !!} 
                    @else 
                        {!! $text[6] !!} 
                    @endif
                </label>
            </div>
            <div class="col-xs-12 col-sm-6">
                <p class="omb_forgotPwd">
                    <a href="{{url('password/reset')}}">@if ($responseDecoded) 
                        {!! $responseDecoded['data']['translations'][7]['translatedText'] !!} 
                    @else 
                        {!! $text[7] !!} 
                    @endif?</a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection


@section('footer-script')

@endsection
