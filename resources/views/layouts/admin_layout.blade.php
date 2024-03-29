<!DOCTYPE HTML>
<html>
<head>
<title>Admin</title>
<link rel="shortcut icon" href="favicon.png">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="robots" content="noindex">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="{{ asset('admin_asset/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

<!-- Custom CSS -->
<link href="{{ asset('admin_asset/css/style.css')}}" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="{{ asset('admin_asset/css/font-awesome.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- Include CSS for icons. -->
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> --}}

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

<link href="{{ asset('front_asset/user_panel/style.css')}}" rel="stylesheet">
<link href="{{ asset('admin_asset/css/custom.css')}}" rel="stylesheet">
@yield('header-css')
<!-- Begin Inspectlet Asynchronous Code -->
<script type="text/javascript">
(function() {
window.__insp = window.__insp || [];
__insp.push(['wid', 327549546]);
var ldinsp = function(){
if(typeof window.__inspld != "undefined") return; window.__inspld = 1; var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js?wid=327549546&r=' + Math.floor(new Date().getTime()/3600000); var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); };
setTimeout(ldinsp, 0);
})();
</script>
<!-- End Inspectlet Asynchronous Code -->

</head>
<body class="cbp-spmenu-push">
	<div class="main-content">

		<!--side_menu starts-->
			@include('layouts.includes.admin.admin_sidebar')
		<!--side_menu ends-->

		<!-- header-starts -->
			@include('layouts.includes.admin.admin_topbar')
		<!-- //header-ends -->

		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				@yield('main_content')
			</div>
		</div>
		<!-- main content ends-->

		<!--footer-->
			@include('layouts.includes.admin.admin_footer')
    <!--//footer-->

	</div>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    @yield('footer-script')


    {{-- Tinymce with file upload option --}}
    <script src="https://cdn.tiny.cloud/1/zypu80sdwwqzoj1l5kkrd9f1azfyw1ragau1dly9cyqhbbbv/tinymce/5/tinymce.min.js"></script>
    <script>

        var editor_config = {
          path_absolute : "{{url('/').'/'}}",
          selector: ".tinymce-editor",
          plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern print",

          ],
          toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor | print",
          // relative_urls: false,

relative_urls : false,
remove_script_host : false,
convert_urls : true,

          
          paste_data_images : true,
		    file_picker_callback: function (callback, value, meta) {
		        let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
		        let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

		        let type = 'image' === meta.filetype ? 'Images' : 'Files',
		            url  = editor_config.path_absolute + 'laravel-filemanager?editor=tinymce5&type=' + type;

		        tinymce.activeEditor.windowManager.openUrl({
		            url : url,
		            title : 'Filemanager',
		            width : x * 0.8,
		            height : y * 0.8,
		            onMessage: (api, message) => {
		                callback(message.content);
		            }
		        });
		    }
        };

        tinymce.init(editor_config);
	</script>


	

</body>
</html>
