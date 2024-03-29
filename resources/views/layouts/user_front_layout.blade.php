<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.includes.front.meta')
  <title>Claim'n Win</title>
  <link rel="shortcut icon" href="{{asset('favicon.png')}}">
  @include('layouts.includes.front.all-css')
  <link rel="stylesheet" href="{{asset('front_asset/user_panel/css/style.css')}}">
  @yield('header-script')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @auth
  <style>
    #mainMenu a {
      font-size: smaller;
    }
    .country .dropdown-menu {
      top: calc(100% - 10px);
      left: calc(50% - 5px);
    }
  </style>
  @endauth

<script type="text/javascript">//<![CDATA[
var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
//]]>
</script>

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
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158784107-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-158784107-1');
</script>
</head>

<body>
	<!-- page-wrapper start -->
	<div class="page-wrapper">
		@include('layouts.includes.front.user_header')

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
    $(".dropdown-toggle").dropdown();
    $(window).scroll(function(){
        if($(window).scrollTop() > 1){
            $(".sticky").css({"background-color":"#fff"});
        }
        else{
            $(".sticky").css({"background-color":"transparent"});
        }

    });
  });
  </script>
{{-- signature ends --}}

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5cd1b2772846b90c57ad5976/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
      document.querySelector("html").classList.add('js');
      var fileInput  = document.querySelector( ".input-file" ),
        button     = document.querySelector( ".input-file-trigger" ),
        the_return = document.querySelector(".file-return");
      button.addEventListener( "keydown", function( event ) {
        if ( event.keyCode == 13 || event.keyCode == 32 ) {
            fileInput.focus();
        }
      });
      button.addEventListener( "click", function( event ) {
       fileInput.focus();
       return false;
      });
      fileInput.addEventListener( "change", function( event ) {
        the_return.innerHTML = this.value;
      });
    $(function(){
        // $('.single-submit').trigger('submit');
        // $('.disable-after-first-click').click(function(){
        //     $('.single-submit').submit();
        //     $(this).attr("disabled", true);
        // });
        $('.disable-after-first-click').click(function (e) {
            // console.log('ssssssssssss');
            //stop submitting the form to see the disabled button effect
            e.preventDefault();
            //disable the submit button
            $('.disable-after-first-click').attr("disabled", "disabled");
            $('.single-submit').trigger('submit');
        });
    });
</script>
<!--End of Tawk.to Script-->


</body>

</html>
