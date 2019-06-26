@extends('layouts.front_layout')
@section('header-script')
<link  href="{{asset('front_asset/front_pages_asset/css/press_blog.css')}}" rel="stylesheet">
@endsection

@section('page-title')
  <div class="page_title">
    <h1 class="text-center">
      Trouble 403
    </h1>
  </div>
@endsection

@section('content')
<!-- Custom Theme files -->
<link href="{{asset('error/')}}/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('error/')}}/css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'><!--web font-->
<div class="container">
    <div class="first_row">
        <div class="row">
            <div class="col-md-12">
				<div {{-- class="banner-dott banner-bg" --}}>
					<div class="agileits-main">
						<div class="agileinfo-row">
							{{-- <div class="w3top-nav">
								<div class="w3top-nav-left">
								<h1><a href="{{URL::to('/')}}">Trouble 404</a></h1>
								</div>
								<div class="clear"></div>
							</div> --}}

							<div class="w3layouts-errortext">
								<h2><span>4</span> <span><i class="fa fa-circle-o-notch" aria-hidden="true"></i></span> <span>3</span></h2>
								<h3>Sorry! Page not found. <br><a href="{{URL::to('/')}}">Go to Home Page</a></h3>

							</div>
							<br>
							<br>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection