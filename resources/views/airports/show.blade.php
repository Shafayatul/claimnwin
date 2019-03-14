@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>Name: {{ $airport->name }}</h4>
            </div>

            <div class="form-body">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">

                        <a href="{{ url('/airports') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/airports/' . $airport->id . '/edit') }}" title="Edit Airport"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['airports', $airport->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Airport',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $airport->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Iata Code </th>
                                        <td> {{ $airport->iata_code }} </td>
                                    </tr>
                                    <tr>
                                        <th> Country </th>
                                        <td> {{ $country[$airport->country] }} </td>
                                    </tr>
                                    <tr>
                                        <th> 3 Digit Code </th>
                                        <td> {{ $airport->three_digit_code }} </td>
                                    </tr>
                                    <tr>
                                        <th> Continents </th>
                                        <td> {{ $airport->continent }} </td>
                                    </tr>
                                    <tr>
                                        <th> Sub Continents </th>
                                        <td> {{ $airport->sub_continent }} </td>
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
