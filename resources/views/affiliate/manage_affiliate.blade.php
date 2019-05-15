@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>List of Affliate</h4>
            </div>

            <div class="form-body">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Claim Id</th>
                                    <th>Commision Amount</th>
                                    <th>Percentage</th>
                                    <th>Received Amount</th>
                                    <th>Payment Method</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($affliates as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->claim_id }}</td>
                                    <td>{{ $item->commision_amount }}</td>
                                    <td>{{ $item->percentage }}</td>
                                    <td>{{ $item->received_amount }}</td>
                                    <td>{{ $item->payment_method }}</td>
                                    @if($item->approved == 1)
                                    <td><span style="color: green;">Yes</span></td>
                                    @else
                                    <td><span style="color: red;">No</span></td>
                                    @endif
                                    <td>
                                        <a href="{{ url('/affliate/' . $item->id) }}" title="View Currency"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/affliate/' . $item->id . '/edit') }}" title="Edit Currency"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/affiliate', $item->id],
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
                        <div class="pagination-wrapper">  </div>
                        @if(count($affliates) > 0)
                        <div class="row">
                            <div class="col-md-12 col-md-offset-5">
                            <a href="{{URL::to('/export-affliate-all')}}" class="btn btn-lg btn-success text-center"><i class="fa fa-file-excel-o"></i> Export All</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
