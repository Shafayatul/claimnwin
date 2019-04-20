<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.includes.front.meta')
  <title>Claim'n Win</title>
  <link rel="shortcut icon" href="favicon.png">
  @include('layouts.includes.front.all-css')
  @yield('header-script')
  <meta name="csrf-token" content="{{ csrf_token() }}">
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

    $(document).ready(function() {
      $('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
    });



    $("#btnSaveSign").click(function(e){
      alert('hahah');
      // html2canvas([document.getElementById('sign-pad')], {
      //   onrendered: function (canvas) {
      //     var canvas_img_data = canvas.toDataURL('image/png');
      //     var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
      //     //ajax call to save image inside folder
      //     $.ajax({
      //       url: 'save_sign.php',
      //       data: { img_data:img_data },
      //       type: 'post',
      //       dataType: 'json',
      //       success: function (response) {
      //          // window.location.reload();
      //       }
      //     });
      //   }
      // });
    });

  });
  </script>
{{-- signature ends --}}

</body>

</html>
