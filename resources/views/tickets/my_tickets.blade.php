@extends('layouts.admin_layout')

@section('main_content')
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>List of Tickets</h4>
        </div>

        <div class="form-body">
            <div class="card">
                <div class="card-body">
                    {{-- <a href="{{ url('/tickets/create') }}" class="btn btn-success btn-sm" title="Add New Ticket">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    {!! Form::open(['method' => 'GET', 'url' => '/tickets', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                        <span class="input-group-append">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    {!! Form::close() !!}

                    <br/>
                    <br/> --}}
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($tickets as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucfirst(str_replace('_', ' ', $item->subject)) }}</td>
                                    <td>
                                        @if($item->status == 1)
                                        <span style="color: #FF9800;">Action Required</span>
                                        @elseif($item->status == 2)
                                        <span style="color: #00CC3D;">Waiting For Reply</span>
                                        @else
                                        <span class="text-danger">Closed</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/tickets/' . $item->id) }}" title="View Ticket"><button class="btn btn-info btn-sm"><i class="fa fa-comment" aria-hidden="true"></i> Reply</button></a>
                                        <a href="{{ url('/claim-view/' . $item->claim_id) }}" title="View Claim"><button class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Claim View</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $tickets->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
