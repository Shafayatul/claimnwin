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
				<h2 class="title1">Reset Password</h2>
				<div class="widget-shadow">
					<div class="login-body">
						<form action="#" method="post">
							<input type="email" class="user" name="email" placeholder="Enter Your Email" required="">

							<input type="submit" name="Send Password Reset Link" value="Send Password Reset Link">

						</form>
					</div>
          <div class="row" style="padding-bottom: 1.5em;">
            <div class="col-md-6 text-center">
              <a class="" href="{{ URL::to('/login') }}">
                Login
              </a>
            </div>
            <div class="col-md-6 text-center">
              <a class="" href="{{ URL::to('/register') }}">
                Sign In
              </a>
            </div>
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
