@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Edit Flights</h4>
        </div>
        <div class="form-body">
            <div class="card">
                <div class="card-body">
                    <a href="{{ url('/flights') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    {!! Form::model($flight, [
                        'method' => 'PATCH',
                        'url' => ['/flights', $flight->id],
                        'class' => 'form-horizontal',
                        'files' => true
                    ]) !!}
                    @include ('flights.form', ['formMode' => 'edit'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
