@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Edit Passenger</h4>
        </div>
        <div class="form-body">
            <div class="card">
                <div class="card-body">


                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                {!! Form::open(['url' => '/passengers', 'class' => 'form-horizontal', 'files' => true]) !!}

                @include ('passengers.form-create', ['formMode' => 'create'])

                {!! Form::close() !!}

                </div>
            </div>
        </div>
  </div>
</div>
@endsection


@section('footer-script')

<script type="text/javascript">

// $('.datepicker').on(
//         'dp.show',
//         function(e) {
//         $(".bootstrap-datetimepicker-widget").css(
//         "background-color", "#3c3e43");
//         });


    $('.datepicker').datetimepicker({
        format: 'DD/MM/YYYY',
    });

    $('#date').datepicker();

    $('.scheduled_departure_time').datetimepicker({
        format: 'HH:mm A',
    });

</script>
@endsection



{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create New Passenger</div>
                    <div class="card-body">
                        <a href="{{ url('/passengers') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/passengers', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('passengers.form', ['formMode' => 'create'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
