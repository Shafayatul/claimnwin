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
        <h3 class="omb_authTitle">Signup</h3>
        <div class="row omb_socialButtons">
            <div class="col-xs-6 col-sm-6">
            <a href="{{url('socialauth/facebook')}}" class="btn btn-lg btn-block omb_btn-facebook">
                    <i class="fab fa-facebook-f"></i>
                    <span class="hidden-sm  hidden-xs">Facebook</span>
                </a>
            </div>
            <div class="col-xs-6 col-sm-6">
                <a href="{{url('socialauth/google')}}" class="btn btn-lg btn-block omb_btn-google">
                    <i class="fab fa-google-plus-g"></i>
                    <span class="hidden-sm hidden-xs">Google+</span>
                </a>
            </div>
        </div>

        <div class="row omb_loginOr">
            <div class="col-xs-12 col-sm-12">
                <hr class="omb_hrOr">
                <span class="omb_spanOr">or</span>
            </div>
        </div>
    @include('layouts.includes.partial.alert')
    <form class="omb_loginForm" action="{{url('/user/signup')}}" autocomplete="off" method="post">
        @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>
                    <span class="help-block"></span>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" name="email" placeholder="Email address" required>
                    </div>
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <span class="help-block"></span>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
                    </div>
                    <span class="help-block"></span>
                </div>
            </div>
            <input type="hidden" name="encrypt_user_id" value="{{$encrypt_user_id}}"  autocomplete='off'>
            <div class="row text-center">
              <div class="col-xs-12 col-sm-12">
                  <button class="btn btn-lg btn-primary" type="submit">Signup</button>
              </div>
            </div>

        </form>

        <div class="row text-center">
            <div class="col-xs-12 col-sm-6">
                <label class="checkbox remember_me_media">
                    <input type="checkbox" value="remember-me">Remember Me
                </label>
            </div>
            <div class="col-xs-12 col-sm-6">
                <p class="omb_forgotPwd">
                    <a href="#">Forgot password?</a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection


@section('footer-script')

@endsection
