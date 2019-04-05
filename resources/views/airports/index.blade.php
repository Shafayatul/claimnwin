@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>List of Airport</h4>
            </div>

            <div class="form-body">
                <div class="card">

                    <div class="card-body">

                                {!! Form::open(['method' => 'GET', 'url' => '/airports', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                                <div class="form-group mb-n">
                                <div class="row">

                                    <div class="col-md-2 grid_box1">
                                        <label class="control-label">NAME</label>
                                        <input type="text" name="name" class="form-control1" value="{{ request('name') }}">
                                    </div>
                                    <div class="col-md-2 grid_box1">
                                        <label class="control-label">COUNTRY</label>
                                        <input type="text" name="country" class="form-control1" value="{{ request('country') }}">
                                    </div>
                                    <div class="col-md-2 grid_box1">
                                        <label class="control-label">IATA-CODE</label>
                                        <input type="text" name="iata_code" class="form-control1" value="{{ request('iata_code') }}">
                                    </div>
                                    <div class="col-md-2 grid_box1">
                                        <label class="control-label">ICAO CODE</label>
                                        <input type="text" name="icao_code" class="form-control1" value="{{ request('icao_code') }}">
                                    </div>
                                    <div class="col-md-2 grid_box1">
                                        <label class="control-label">MUNCIPILITY </label>
                                        <input type="text" name="municipality" class="form-control1" value="{{ request('municipality') }}">
                                    </div>
                                    <div class="col-md-2 grid_box1">
                                        <label class="control-label">TYPE</label>
                                        <input type="text" name="type" class="form-control1" value="{{ request('type') }}">
                                    </div>
                                    <div class="col-md-1">
                                        <label class="control-label"></label>
                                        <input type="submit" class="btn btn-success" value="Search">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>

                                {!! Form::close() !!}

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAME</th>
                                        <th>COUNTRY</th>
                                        <th>IATA-CODE</th>
                                        <th>ICAO CODE</th>
                                        <th>MUNCIPILITY</th>
                                        <th>TYPE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($airports as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        {{-- <td>{{ $country[$item->country] }}</td> --}}
                                        <td>{{ $item->country }}</td>
                                        <td>{{ $item->iata_code }}</td>
                                        <td>{{ $item->icao_code }}</td>
                                        <td>{{ $item->municipality }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>
                                            <a href="{{ url('/airports/' . $item->id) }}" title="View Airport"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/airports/' . $item->id . '/edit') }}" title="Edit Airport"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/airports', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Airport',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $airports->appends(['search' => Request::get('search')])->render() !!} </div>

                </div>
                </div>
            </div>
            </div>
        </div>
@endsection
