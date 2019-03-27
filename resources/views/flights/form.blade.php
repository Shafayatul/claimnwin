<div class="grids widget-shadow">
    <div class="row">
        <div class="col-md-6 grid-box1">
            <div class="form-group {{ $errors->has('flight_no') ? 'has-error' : ''}}">
                {!! Form::label('flight_no', 'Flight No', ['class' => 'control-label']) !!}
                {!! Form::text('flight_no', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                {!! $errors->first('flight_no', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                {!! Form::label('date', 'Date', ['class' => 'control-label']) !!}
                {!! Form::text('date', null, ('' == 'required') ? ['class' => 'form-control date', 'required' => 'required'] : ['class' => 'form-control','id' => 'date']) !!}
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
