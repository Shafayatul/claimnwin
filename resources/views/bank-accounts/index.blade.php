@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>List Of Bank Account</h4>
        </div>
        <div class="form-body">
                <div class="card">

                    <div class="card-body">


                            {!! Form::open(['method' => 'GET', 'url' => '/bank-accounts', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ACCOUNT NAME</th>
                                        <th>BANK NAME</th>
                                        <th>IBAN NO</th>
                                        <th>SWIFT/BIC CODE</th>
                                        <th>CURRENCY OF ACCOUNT</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($bankaccounts as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->account_name }}</td>
                                        <td>{{ $item->bank_name }}</td>
                                        <td>{{ $item->iban_no }}</td>
                                        <td>{{ $item->swift_bic_code }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>
                                            <a href="{{ url('/bank-accounts/' . $item->id) }}" title="View BankAccount"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/bank-accounts/' . $item->id . '/edit') }}" title="Edit BankAccount"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/bank-accounts', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete BankAccount',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $bankaccounts->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
