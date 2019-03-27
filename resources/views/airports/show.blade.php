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
                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
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
                                        <th> ICAO Code </th>
                                        <td> {{ $airport->icao_code }} </td>
                                    </tr>
                                    <tr>
                                        <th> Country </th>
                                        <td> {{ $country[$airport->country] }} </td>
                                    </tr>
                                    <tr>
                                        <th> Muncipility </th>
                                        <td> {{ $airport->municipality }} </td>
                                    </tr>
                                    <tr>
                                        <th> Type </th>
                                        <td> {{ $airport->type }} </td>
                                    </tr>
                                    <tr>
                                        <th> Longitude </th>
                                        <td> {{ $airport->longitude }} </td>
                                    </tr>
                                    <tr>
                                        <th> Latitude </th>
                                        <td> {{ $airport->latitude }} </td>
                                    </tr>
                                    <tr>
                                        <th> Home Link </th>
                                        <td> {{ $airport->home_link }} </td>
                                    </tr>
                                    <tr>
                                        <th> Wikipedia Link </th>
                                        <td> {{ $airport->wikipedia_link }} </td>
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
