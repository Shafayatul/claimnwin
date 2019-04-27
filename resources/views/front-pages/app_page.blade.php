@extends('layouts.front_layout')
@section('content')
<main class="mainBanner">
        <div class="container">
            <div class="banner-content text-center">
                <h1 class="fw-6">Get our free mobile app</h1>
                <h2 class="fw-5">Submit your claim from the airport. Download our app now!</h2>
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
                        <h2>Get our free mobile app</h2>
                        <p>Our team of Delayed Flight experts and solicitors will manage your claim from start to finish while keeping you updated along the way.</p>
                        <p>We are dedicated to ensuring the best possible outcome for your claim. You will  receive all of the money you are entitled to and we will save you the time and hassle of going it alone.</p>

                        <h3>Check for delays </h3>
                        <p>You need to download our app to do this. Thousands of customers have benefited from this app so far!</p>

                         <h3>Don’t forget to check on past flights! </h3>
                        <p>The latest regulations entitle you to claim compensation for delayed or cancelled flights dating back several years (as well as some denied boarding on domestic flights). Download the Claim’N Win app to check past flights!</p>
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
            <h1 class="fw-5">Get compensation when your travel plans don’t go as planned.</h1>
            <p class="fw-4">If you’ve been on a delayed, cancelled, or diverted flight in the last three years, the airlines might owe you money for your troubles. Check with Claim’N Win to see if your flight qualifies for compensation.</p>
            <a href="{{ url('/user-home') }}">Check your compensation</a>
        </div><!-- /.cnotainer -->
    </div><!-- /.inner-banner -->

    <div class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-card">
                        <h2 class="fw-5">Get our free mobile app</h2>
                        <p class="fw-4">You could receive up to €600 if your flight is delayed, canceled, or you were denied boarding. We handle your claim on a “No Win, No Fee” basis.</p>
                    </div><!-- /.feature-card -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4">
                    <div class="feature-card">
                        <h2 class="fw-5">Get our free mobile app</h2>
                        <p class="fw-4">You could receive up to €600 if your flight is delayed, canceled, or you were denied boarding. We handle your claim on a “No Win, No Fee” basis.</p>
                    </div><!-- /.feature-card -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4">
                    <div class="feature-card">
                        <h2 class="fw-5">Get our free mobile app</h2>
                        <p class="fw-4">You could receive up to €600 if your flight is delayed, canceled, or you were denied boarding. We handle your claim on a “No Win, No Fee” basis.</p>
                    </div><!-- /.feature-card -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.features -->
@endsection
