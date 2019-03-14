<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
		<!--side_menu starts-->
		@include('layouts.includes.admin_sidebar')
		<!--side_menu ends-->

		<!-- header-starts -->
		@include('layouts.includes.admin_topbar')
		<!-- //header-ends -->
		<!-- main content start-->

	<!--footer-->
	<div class="footer">
	   <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
	</div>
    <!--//footer-->
	</div>

	<!-- new added graphs chart js-->

    <script src="{{ asset('admin_asset/js/Chart.bundle.js')}}"></script>
    <script src="{{ asset('admin_asset/js/utils.js')}}"></script>


	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="{{ asset('admin_asset/js/classie.js')}}"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;

			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};


			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->

	<!--scrolling js-->
	<script src="{{ asset('admin_asset/js/jquery.nicescroll.js')}}"></script>
	<script src="{{ asset('admin_asset/js/scripts.js')}}"></script>
	<!--//scrolling js-->

	<!-- side nav js -->
	<script src='{{ asset('admin_asset/js/SidebarNav.min.js')}}' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->

	<!-- for index page weekly sales java script -->
	<script src="{{ asset('admin_asset/js/SimpleChart.js')}}"></script>



	<!-- Bootstrap Core JavaScript -->
   <script src="{{ asset('admin_asset/js/bootstrap.js')}}"> </script>
	<!-- //Bootstrap Core JavaScript -->

</body>
</html>
