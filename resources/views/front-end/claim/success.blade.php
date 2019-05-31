@extends('layouts.front_layout')

@section('header-script')
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('front_asset/') }}/claim/missed_connection/css/main.css">
<!--===============================================================================================-->
@endsection

@section('content')
<div class="wrapper">
	<div class="form_h2">
		<h2 class="text-center">Thank You !!!</h2>
	</div>
	<div class="common_row">
		<div class="parent_div">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						@if($amount!='0')
						<p>
							Your claim has been submitted successfully! Ready, set, go! Let’s start the process. Our experienced flight experts will verify the eligibility of your claim and to make sure that you can obtain your compensation of {{$amount}}. To check your claim status, simply visit your Dashboard. An email has been sent to you with your password to log-in.
						</p>
						@else
						<p>
							You are not eligible for the claim.
						</p>

						@endif
					</div>
				</div>
			</div>

		</div>
	</div>
	@if($amount!='0')
	<div class="common_row">
		<div class="parent_div">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="single_button_child_div">
							<a href="{{url('/user-home')}}"><button type="button" class="continue_button active_button" id="continue_1" name="button">Go To Dashboard</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif
</div>

@endsection




@section('footer-script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <script src="{{('front_asset/claim/missed_connection/js/custom.js')}}"></script>




@endsection
