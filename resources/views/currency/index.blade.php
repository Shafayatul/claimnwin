@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
        <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>List of Currency</h4>
            </div>

            <div class="form-body">
                    <div class="card">

                            <div class="card-body">

                                        {!! Form::open(['method' => 'GET', 'url' => '/currency', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                                        <div class="form-group mb-n">
                                        <div class="row">

                                            <div class="col-md-10 grid_box1">
                                            <label class="control-label">Name</label>
                                            <input type="text" name="search" class="form-control1" value="{{ request('search') }}">
                                            </div>
                                            {{-- <div class="col-md-2 grid_box1">
                                                <label class="control-label">Iata Code</label>
                                                <input type="text" name="search" class="form-control1" value="{{ $request('search') }}">
                                            </div>
                                            <div class="col-md-2 grid_box1">
                                                <label class="control-label">3 Digit Code</label>
                                                <input type="text" name="search" class="form-control1" value="{{ $request('search') }}">
                                            </div>
                                            <div class="col-md-2 grid_box1">
                                                <label class="control-label">Continents</label>
                                                <input type="text" name="search" class="form-control1" value="{{ $request('search') }}">
                                            </div>
                                            <div class="col-md-2 grid_box1">
                                                <label class="control-label">Country</label>
                                                <input type="text" name="search" class="form-control1" value="{{ $request('search') }}">
                                            </div> --}}
                                            <div class="col-md-1">
                                                <label class="control-label"></label>
                                                <input type="submit" class="btn btn-success">
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                    </div>

                                        {!! Form::close() !!}

                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>TITLE</th>
                                                <th>CODE</th>
                                                <th>VALUE</th>
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($currency as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->code }}</td>
                                                <td>{{ $item->value }}</td>
                                                @if($item->status == 1)
                                                <td><span style="color: green;">Enabled</span></td>
                                                @else
                                                <td><span style="color: red;">Disabled</span></td>
                                                @endif
                                                <td>
                                                    <a href="{{ url('/currency/' . $item->id) }}" title="View Currency"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                    <a href="{{ url('/currency/' . $item->id . '/edit') }}" title="Edit Currency"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                    {!! Form::open([
                                                        'method'=>'DELETE',
                                                        'url' => ['/currency', $item->id],
                                                        'style' => 'display:inline'
                                                    ]) !!}
                                                        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                                                'type' => 'submit',
                                                                'class' => 'btn btn-danger btn-sm',
                                                                'title' => 'Delete Currency',
                                                                'onclick'=>'return confirm("Confirm delete?")'
                                                        )) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pagination-wrapper"> {!! $currency->appends(['search' => Request::get('search')])->render() !!} </div>

                        </div>
                        </div>
            </div>
        </div>
    </div>
@endsection
