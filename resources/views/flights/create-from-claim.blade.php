@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Create Flights</h4>
        </div>
        <div class="form-body">
            <div class="card">

                <div class="card-body">
                    {{-- <a href="{{ url('/flights') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br /> --}}

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::open(['url' => '/flights', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('flights.form', ['formMode' => 'create'])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
<input id="hidden_claim_id" type="hidden" value="{{ $claim_id }}">
<input id="hidden_airline_id" type="hidden" value="{{ $airline_id }}">
<input id="hidden_flight_number" type="hidden" value="{{ $flight_number }}">
<input id="hidden_date" type="hidden" value="{{ $date }}">
<script type="text/javascript">
	$(document).ready(function(){
		var hidden_claim_id = $("#hidden_claim_id").val();
		var hidden_airline_id = $("#hidden_airline_id").val();
		var hidden_flight_number = $("#hidden_flight_number").val();
		var hidden_date = $("#hidden_date").val().replace(/-/gi, "/");
		$(".airline_id").val(hidden_airline_id);
		$(".flight_no").val(hidden_flight_number);
		$(".date").val(hidden_date);
		$(".claim_id").val(hidden_claim_id);
	});
</script>
@endsection