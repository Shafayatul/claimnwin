<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.includes.front.meta')
  <title>Claim'n Win</title>
  <link rel="shortcut icon" href="favicon.png">
  @include('layouts.includes.front.all-css')
  @yield('header-script')
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <style>
    @auth
    #mainMenu a {
      font-size: smaller;
    }
    @endauth
  </style>
</head>

<body>
	<!-- page-wrapper start -->
	<div class="page-wrapper">
		@include('layouts.includes.front.header')

		@yield('content')

		@include('layouts.includes.front.footer')

	</div>
	<!-- page-wrapper end -->
	@include('layouts.includes.front.all-js')
  @yield('footer-script')


{{-- signature --}}
  <link  href="{{asset('front_asset/signature/css/jquery.signaturepad.css')}}" rel="stylesheet">
  <script src="{{asset('front_asset/signature/js/numeric-1.2.6.min.js')}}"></script>
  <script src="{{asset('front_asset/signature/js/bezier.js')}}"></script>
  <script src="{{asset('front_asset/signature/js/jquery.signaturepad.js')}}"></script>

  <script type='text/javascript' src="{{asset('front_asset/signature/js/html2canvas.js')}}"></script>
  <script src="{{asset('front_asset/signature/js/json2.min.js')}}"></script>
  <script>

  $(document).ready(function(e){
    $('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
  });
  </script>
{{-- signature ends --}}

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5cbd7ed3c1fe2560f3ffe8c8/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


</body>

</html>
