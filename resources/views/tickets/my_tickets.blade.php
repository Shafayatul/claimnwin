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
                    <div class="table-responsive">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Contact</th>
                                    <th>Subject</th>
                                    <th>State</th>
                                    {{-- <th>Agent</th> --}}
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
                                    {{-- <td>
                                    <select name="assign_user_id" id="user" class="form-control select_assigned_user" ticket-id="{{$item->id}}">
                                            <option> Please select </option>
                                            @foreach($users as $key=>$value)
                                            <option value="{{$key}}" @if($key == $item->assign_user_id) selected @endif>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </td> --}}
                                    <td>
                                        {{$item->priority}}
                                        {{-- <select name="priority" id="priority" class="form-control select_priority" ticket-id="{{$item->id}}">
                                            <option> Please select </option>
                                            <option value="Low" @if("Low" == $item->priority) selected @endif>Low</option>
                                            <option value="Medium" @if("Medium" == $item->priority) selected @endif>Medium</option>
                                            <option value="High" @if("High" == $item->priority) selected @endif>High</option>
                                            <option value="Urgent" @if("Urgent" == $item->priority) selected @endif>Urgent</option>
                                        </select> --}}
                                    </td>
                                    <td>
                                        {{$item->ticket_status}}

                                        {{-- <select name="ticket_status" id="" class=" form-control select_ticket_status" ticket-id="{{$item->id}}">
                                            <option> Please select </option>
                                            <option value="Open"  @if("Open" == $item->ticket_status) selected @endif>Open</option>
                                            <option value="Pending"  @if("Pending" == $item->ticket_status) selected @endif>Pending</option>
                                            <option value="Resolved"  @if("Resolved" == $item->ticket_status) selected @endif>Resolved</option>
                                            <option value="Closed"  @if("Closed" == $item->ticket_status) selected @endif>Closed</option>
                                        </select> --}}
                                    </td>
                                    <td>
                                        @if($item->claim_id !="")
                                            <a href="{{ url('/claim-view/' . $item->claim_id) }}" title="View Claim"><button class="btn btn-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Claim View</button></a>
                                        @endif
                                        {{-- <a href="{{ url('/tickets/' . $item->id) }}" title="View Ticket"><button class="btn btn-info btn-sm"><i class="fa fa-comment" aria-hidden="true"></i> Reply</button></a> --}}


                                        @if($item->status != 3)
                                            {!! Form::open([
                                                'method'=>'POST',
                                                'url' => ['/close-ticket', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                            {!! Form::button('<i class="fa fa-window-close" aria-hidden="true"></i> Close', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-warning btn-sm',
                                                        'title' => 'Close Ticket',
                                                        'onclick'=>'return confirm("Confirm close?")'
                                            )) !!}
                                            {!! Form::close() !!}
                                        @else
                                            {!! Form::open([
                                                'method'=>'POST',
                                                'url' => url('/tickets/reopen/'.$item->id),
                                                'style' => 'display:inline'
                                            ]) !!}
                                            {!! Form::button('<i class="fa fa-folder-open" aria-hidden="true"></i> Re-open', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-success btn-sm',
                                                        'title' => 'Re-open Ticket',
                                                        'onclick'=>'return confirm("Confirm re-open?")'
                                            )) !!}
                                            {!! Form::close() !!}
                                        @endif

                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/tickets',$item->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> Delete', array(
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-sm',
                                                    'title' => 'Delete Ticket',
                                                    'onclick'=>'return confirm("Confirm Delete?")'
                                        )) !!}
                                        {!! Form::close() !!}
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
