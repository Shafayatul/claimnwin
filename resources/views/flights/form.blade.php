<div class="grids widget-shadow">
    <div class="row">
        <div class="col-md-6 grid-box1">
            <div class="form-group {{ $errors->has('airline_id') ? 'has-error' : ''}}">
                {!! Form::label('airline_id', 'Airline', ['class' => 'control-label']) !!}
                {!! Form::select('airline_id', $airline, null, ('' == 'required') ? ['class' => 'form-control airline_id', 'required' => 'required'] : ['class' => 'form-control airline_id']) !!}
                {!! $errors->first('airline_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-box1">
            <div class="form-group {{ $errors->has('flight_no') ? 'has-error' : ''}}">
                {!! Form::label('flight_no', 'Flight No', ['class' => 'control-label']) !!}
                {!! Form::text('flight_no', null, ('' == 'required') ? ['class' => 'form-control flight_no', 'required' => 'required'] : ['class' => 'form-control flight_no']) !!}
                {!! $errors->first('flight_no', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                {!! Form::label('date', 'Date', ['class' => 'control-label']) !!}
                {!! Form::text('date', null, ('' == 'required') ? ['class' => 'form-control date', 'required' => 'required'] : ['class' => 'form-control date','id' => 'date']) !!}
                {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-box1">
            <div class="form-group {{ $errors->has('scheduled_departure_time_and_date') ? 'has-error' : ''}}">
                {!! Form::label('scheduled_departure_time_and_date', 'Scheduled Departure Time', ['class' => 'control-label']) !!}
                {!! Form::text('scheduled_departure_time_and_date', null, ('' == 'required') ? ['class' => 'form-control datepicker', 'required' => 'required'] : ['class' => 'form-control datepicker']) !!}
                {!! $errors->first('scheduled_departure_time_and_date', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('actual_departure_time_and_date') ? 'has-error' : ''}}">
                {!! Form::label('actual_departure_time_and_date', 'Actual Departure Time And Date', ['class' => 'control-label']) !!}
                {!! Form::text('actual_departure_time_and_date', null, ('' == 'required') ? ['class' => 'form-control datepicker', 'required' => 'required'] : ['class' => 'form-control datepicker']) !!}
                {!! $errors->first('actual_departure_time_and_date', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 grid-box1">
            <div class="form-group {{ $errors->has('scheduled_arrival_time_and_date') ? 'has-error' : ''}}">
                {!! Form::label('scheduled_arrival_time_and_date', 'Scheduled Arrival Time And Date', ['class' => 'control-label']) !!}
                {!! Form::text('scheduled_arrival_time_and_date', null, ('' == 'required') ? ['class' => 'form-control datepicker', 'required' => 'required'] : ['class' => 'form-control datepicker']) !!}
                {!! $errors->first('scheduled_arrival_time_and_date', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('actual_arrival_time_and_date') ? 'has-error' : ''}}">
                {!! Form::label('actual_arrival_time_and_date', 'Actual Arrival Time And Date', ['class' => 'control-label']) !!}
                {!! Form::text('actual_arrival_time_and_date', null, ('' == 'required') ? ['class' => 'form-control datepicker time_date)', 'id'=>'date', 'required' => 'required'] : ['class' => 'form-control datepicker time_date','id'=>'date']) !!}
                {!! $errors->first('actual_arrival_time_and_date', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>

    <input class="claim_id" type="hidden" value="" name="claim_id">

</div>
@section('footer-script')

<script type="text/javascript">

$('.datepicker').on(
        'dp.show',
        function(e) {
        $(".bootstrap-datetimepicker-widget").css(
        "background-color", "#3c3e43");
        });


    $('.datepicker').datetimepicker({
        format: 'DD/MM/YYYY HH:mm A',
    });

    $('#date').datepicker();

    $('.scheduled_departure_time').datetimepicker({
        format: 'HH:mm A',
    });

</script>
@endsection
