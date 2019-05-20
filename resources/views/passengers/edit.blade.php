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

        {!! Form::model($passenger, [
            'method' => 'PATCH',
            'url' => ['/passengers', $passenger->id],
            'class' => 'form-horizontal',
            'files' => true
        ]) !!}

        @include ('passengers.form', ['formMode' => 'edit'])

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
