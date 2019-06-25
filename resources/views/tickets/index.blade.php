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
                    </a>--}}

                    {{-- {!! Form::open(['method' => 'GET', 'url' => '/tickets', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                                    <th>Is Assigned</th>
                                    <th>Assigned Email</th>
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
                                        @if($item->assign_user_id == null)
                                        <span style="color: #F44336;">Not Assigned</span>
                                        @else
                                        <span style="color: #00CC3D;">Assigned</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->assign_user_id != null)
                                            {{$assign_users[$item->assign_user_id]}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/tickets/' . $item->id) }}" title="View Ticket"><button class="btn btn-info btn-sm"><i class="fa fa-comment" aria-hidden="true"></i> Reply</button></a>

                                        @if($item->status != 3)
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/tickets', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Close', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Ticket',
                                                        'onclick'=>'return confirm("Confirm close?")'
                                            )) !!}
                                            {!! Form::close() !!}
                                        @else
                                            {!! Form::open([
                                                'method'=>'POST',
                                                'url' => url('/tickets/reopen/'.$item->id),
                                                'style' => 'display:inline'
                                            ]) !!}
                                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Re-open', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Re-open Ticket',
                                                        'onclick'=>'return confirm("Confirm re-open?")'
                                            )) !!}
                                            {!! Form::close() !!}
                                        @endif




                                        <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#assignModal-{{$item->id}}"><i class="fa fa-tasks"></i></a>
                                         <!-- Modal -->
                                        <div class="modal fade" id="assignModal-{{$item->id}}" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                            <form action="{{route('ticket.user.assign')}}" method="post" class="form-horizontal">
                                                    @csrf
                                                <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Assign Specialist</h4>
                                                </div>

                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label for="user" class="control-label col-md-3">Select User:</label>
                                                        <div class="col-md-9">
                                                            <select name="assign_user_id" id="user" class="form-control">
                                                                <option value="">---Select User---</option>
                                                                @foreach($users as $key=>$value)
                                                                <option value="{{$key}}">{{$value}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                            <input type="hidden" name="ticket_id" value="{{$item->id}}" />
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                            </div>

                                            </div>
                                        </div>
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
