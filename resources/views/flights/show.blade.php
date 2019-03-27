@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>List of Flights</h4>
        </div>

        <div class="form-body">
            <div class="card">

                <div class="card-body">

                    <a href="{{ url('/flights') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/flights/' . $flight->id . '/edit') }}" title="Edit Flight"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['flights', $flight->id],
                        'style' => 'display:inline'
                    ]) !!}
                        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-sm',
                                'title' => 'Delete Flight',
                                'onclick'=>'return confirm("Confirm delete?")'
                        ))!!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $flight->id }}</td>
                                </tr>
                                <tr>
                                    <th> Flight No </th>
                                    <td> {{ $flight->flight_no }} </td>
                                </tr>
                                <tr>
                                    <th> Date </th>
                                    <td> {{ $flight->date }} </td>
                                </tr>
                                <tr>
                                    <th> Scheduled Departure Time </th>
                                    <td> {{ $flight->scheduled_departure_time_and_date }} </td>
                                </tr>
                                <tr>
                                    <th> Scheduled Arrival Time And Date </th>
                                    <td> {{ $flight->scheduled_arrival_time_and_date }} </td>
                                </tr>
                                <tr>
                                    <th> Actual Departure Time And Date </th>
                                    <td> {{ $flight->actual_departure_time_and_date }} </td>
                                </tr>
                                <tr>
                                    <th> Actual Arrival Time And Date </th>
                                    <td> {{ $flight->actual_arrival_time_and_date }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
