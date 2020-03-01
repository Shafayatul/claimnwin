<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.includes.front.meta')
  <title>Claim'n Win</title>
  <meta name="google-site-verification" content="xfSGwriENWiJRYePLxbrHZXGAzFlwmkAmMngqGXMkUU" />
  <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

  @yield('header-script')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @auth
  <style>

    #mainMenu a {
      font-size: smaller;
    }
  </style>
  @endauth

{{-- <script type="text/javascript">//<![CDATA[
var tlJsHost = ((window.location.protocol == "https:") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));
//]]>
</script> --}}

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
    @include('layouts.includes.front.header')

    @yield('content')

    @include('layouts.includes.front.footer')

  </div>
  <!-- page-wrapper end -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-migrate-3.1.0.min.js"
  integrity="sha256-ycJeXbll9m7dHKeaPbXBkZH8BuP99SmPm/8q5O+SbBc="
  crossorigin="anonymous"></script>
<script src="{{asset('front_asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front_asset/js/jquery.malihu.PageScroll2id.min.js')}}"></script>
{{-- <script src="{{asset('front_asset/js/SmoothScroll.js')}}"></script> --}}
<script src="{{asset('front_asset/js/main.js')}}"></script>
<script src="{{asset('front_asset/js/modal-loading.js')}}"></script>
<script src="{{asset('front_asset/front_pages_asset/js/slick.js')}}"></script>
<script src="{{asset('autocomplete/jquery.auto-complete.js')}}"></script>



  @yield('footer-script')


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

$(document).ready(function() {
  $(document).on('click', '.js-change-lang', function (e) {
      var lang = $(this).attr('lang');
      window.location.href = window.location.hostname+'/change-language/'+lang;
  });
});
</script>
<!--End of Tawk.to Script-->

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link href="{{asset('front_asset/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('front_asset/css/animate.css')}}" rel="stylesheet">
<link href="{{asset('front_asset/css/hamburgers.min.css')}}" rel="stylesheet">
<link href="{{asset('front_asset/style.css')}}" rel="stylesheet">
<link href="{{asset('front_asset/css/responsive.css')}}" rel="stylesheet">
{{-- <link href="{{asset('autocomplete/jquery.auto-complete.css')}}" rel="stylesheet"> --}}
<link href="{{asset('front_asset/css/modal-loading.css')}}" rel="stylesheet">
{{-- <link href="{{asset('front_asset/css/modal-loading-animate.css')}}" rel="stylesheet"> --}}
<link  href="{{asset('front_asset/front_pages_asset/css/slick.css')}}" rel="stylesheet">
<link  href="{{asset('front_asset/front_pages_asset/css/slick-theme.css')}}" rel="stylesheet">
{{-- <link href="{{asset('autocomplete/jquery.auto-complete.css')}}" rel="stylesheet"> --}}

<link  href="{{asset('front_asset/front_pages_asset/css/home.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">



</body>

</html>
