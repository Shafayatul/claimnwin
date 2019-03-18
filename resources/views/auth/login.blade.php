<!DOCTYPE HTML>
<html>
<head>
<title>Glance Design Dashboard an Admin Panel Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="{{ asset('admin_asset/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="{{ asset('admin_asset/css/style.css')}}" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="{{ asset('admin_asset/css/font-awesome.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='{{ asset('admin_asset/css/SidebarNav.min.css')}}' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->

 <!-- js-->
<script src="{{ asset('admin_asset/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{ asset('admin_asset/js/modernizr.custom.js')}}"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts-->

<!-- Metis Menu -->
<script src="{{ asset('admin_asset/js/metisMenu.min.js')}}"></script>
<script src="{{ asset('admin_asset/js/custom.js')}}"></script>
<link href="{{ asset('admin_asset/css/custom.css')}}" rel="stylesheet">

</head>
<body class="cbp-spmenu-push">
	<div class="main-content">
    <div id="page-wrapper" style="margin:0px;">
			<div class="main-page login-page ">
				<h2 class="title1">Login</h2>
				<div class="widget-shadow">
					<div class="login-body">
						<form action="{{url('/login')}}" method="post">
							{{ csrf_field() }}
                            <input type="email" class="user{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Enter Your Email" required="">
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red;">{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            <input type="password" name="password" class="lock{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required="">
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: red;">{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
							<div class="forgot-grid">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Remember me</label>
								<div class="forgot">
									<a href="{{ URL::to('password/reset') }}">forgot password?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<input type="submit" name="Sign In" value="Sign In">
							<div class="registration">
								Don't have an account ?
								<a class="" href="{{ URL::to('/register') }}">
									Create an account
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
  </div>

  <script src="{{ asset('admin_asset/js/scripts.js')}}"></script>
  <!--//scrolling js-->
  <!-- for index page weekly sales java script -->
  <script src="{{ asset('admin_asset/js/SimpleChart.js')}}"></script>
  <!-- Bootstrap Core JavaScript -->
   <script src="{{ asset('admin_asset/js/bootstrap.js')}}"> </script>
  <!-- //Bootstrap Core JavaScript -->

</body>
</html>
