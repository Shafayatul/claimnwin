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

<script type="text/javascript">//<![CDATA[
var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
//]]>
</script>

</head>
<body class="cbp-spmenu-push">
	<div class="main-content">
    <div id="page-wrapper" style="margin: 0px;">
			<div class="main-page signup-page">
				<h2 class="title1">SignUp Here</h2>
				<div class="sign-up-row widget-shadow">
					<h5>Personal Information :</h5>
				<form action="{{ route('register') }}" method="post">
					@csrf
					<div class="sign-u">
								<input type="text" name="name" placeholder="Name" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="email" name="email" placeholder="Email Address" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="password" name="password" placeholder="Password" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="password" name="password_confirmation" placeholder="Confirm Password" required="">
						</div>
						<div class="clearfix"> </div>
					<div class="sub_home">
							<input type="submit" value="Submit">
						<div class="clearfix"> </div>
					</div>
					<div class="registration">
						Already Registered.
						<a class="" href="{{ URL::to('/login') }}">
							Login
						</a>
					</div>
				</form>
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
