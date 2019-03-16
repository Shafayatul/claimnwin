<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.includes.front.meta')
        <title>Claim'n Win</title>
        <link rel="shortcut icon" href="img/favicon.png">
        @include('layouts.includes.front.all-css')


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
    </body>

</html>
