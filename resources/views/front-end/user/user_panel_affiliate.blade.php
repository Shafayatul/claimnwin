@extends('front-end.user.user_panel_layout')

@section('user_panel_main_section')

<div class="container">
  <div class="affiliate_mother_div ">

      {{-- <div id="orSeparator">
				<div id="socialSeparatorTop"></div>
				<div id="or">or</div>
				<div id="socialSeparatorBottom"></div>
			</div> --}}

			<div id="socialLogin">
				<div id="socialHead">
				  http://www.claimnwin.com
				</div>
				<button type="button" id="fblogin">
					f&nbsp;&nbsp;&nbsp;<em id="fbname"></em>
					<span id="fbtext">Sign In with Facebook</span>
				</button>

				<button type="button" id="gpluslogin">
					g+<em id="gpname"></em>
					<span id="gptext">Sign In with Google</span>
				</button>

				<button type="button" id="twtrlogin">
					t&nbsp;&nbsp;&nbsp;<em id="twtrname"></em>
					<span id="twtrtext">Sign In with Twitter</span>
				</button>
  				{{-- <div id="socialNote">
  				<b>Note:</b>
  				</div> --}}
			</div>

        </div>

</div>

@endsection
