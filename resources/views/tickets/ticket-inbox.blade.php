@extends('layouts.admin_layout')

@section('main_content')
@section('header-css')

    <!-- Include Editor style. -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
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
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Contact</th>
                                    <th>Subject</th>
                                    <th>State</th>
                                    <th>Group/Agent</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($tickets as $item)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="" id="" class="cutom-checkbox">
                                    </td>
                                <td><a href="{{URL::to('/ticket-single-email/'.$item->id)}}">{{$item->from_email}}</a></td>
                                    <td>{{ ucfirst(str_replace('_', ' ', $item->subject)) }}</td>
                                    <td>
                                        @if($item->status == 1)
                                        <span style="background-color: #00E6DE; font-weight: bold;" class="btn btn-default btn-sm">New</span>
                                        @elseif($item->status == 2)
                                        <span style="color: #00CC3D;">Waiting For Reply</span>
                                        @else
                                        <span class="text-danger">Closed</span>
                                        @endif
                                    </td>
                                    <td>
                                        <select name="assign_user_id" id="user" class="form-control">
                                            <option> Please select </option>
                                            @foreach($users as $key=>$value)
                                            <option value="{{$key}}" @if($key == $item->assign_user_id) selected @endif>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="priority" id="priority" class="form-control">
                                            <option>Low</option>
                                            <option>Medium</option>
                                            <option>High</option>
                                            <option>Urgent</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="ticket_status" id="" class=" form-control">
                                            <option value="1">Open</option>
                                            <option value="2">Pending</option>
                                            <option value="3">Resolved</option>
                                            <option value="4">Closed</option>
                                        </select>
                                    </td>
                                    <td>
                                        @if($item->claim_id !="")
                                            <a href="{{ url('/claim-view/' . $item->claim_id) }}" title="View Claim"><button class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Claim View</button></a>
                                        @endif
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
                                                    {{ csrf_field() }}
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
@section('footer-script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/js/froala_editor.pkgd.min.js"></script>
<script>
// $(function() {

// });

$(function() {
    $('.ticket_textarea').froalaEditor({
        heightMin: 200,
        heightMax: 800,
    });
});
</script>
@endsection
