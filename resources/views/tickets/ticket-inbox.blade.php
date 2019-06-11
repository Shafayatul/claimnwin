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
                    {!! Form::open(['method' => 'GET', 'url' => url('/tickets'), 'class' => 'form-inline', 'role' => 'search']) !!}
                    <div class="row">
                    {{-- <div class="col-md-2">
                        <div class="input-group">
                            <input type="text" class="form-control" name="alias" placeholder="Alias" value="{{ request('alias') }}">
                        </div>
                    </div> --}}
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="contact" placeholder="Contact" value="{{ request('contact') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" value="{{ request('subject') }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="group" placeholder="Group/Agent" value="{{ request('group') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="state" placeholder="State" value="{{ request('state') }}">
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="priority" placeholder="Priority" value="{{ request('priority') }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="status" placeholder="Status" value="{{ request('status') }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit" name="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    {!! Form::close() !!}

                    <br>
                    <br>
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
                                    <select name="assign_user_id" id="user" class="form-control select_assigned_user" ticket-id="{{$item->id}}">
                                            <option> Please select </option>
                                            @foreach($users as $key=>$value)
                                            <option value="{{$key}}" @if($key == $item->assign_user_id) selected @endif>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="priority" id="priority" class="form-control select_priority" ticket-id="{{$item->id}}">
                                            <option> Please select </option>
                                            <option value="Low" @if("Low" == $item->priority) selected @endif>Low</option>
                                            <option value="Medium" @if("Medium" == $item->priority) selected @endif>Medium</option>
                                            <option value="High" @if("High" == $item->priority) selected @endif>High</option>
                                            <option value="Urgent" @if("Urgent" == $item->priority) selected @endif>Urgent</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="ticket_status" id="" class=" form-control select_ticket_status" ticket-id="{{$item->id}}">
                                            <option> Please select </option>
                                            <option value="Open"  @if("Open" == $item->ticket_status) selected @endif>Open</option>
                                            <option value="Pending"  @if("Pending" == $item->ticket_status) selected @endif>Pending</option>
                                            <option value="Resolved"  @if("Resolved" == $item->ticket_status) selected @endif>Resolved</option>
                                            <option value="Closed"  @if("Closed" == $item->ticket_status) selected @endif>Closed</option>
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




                                        {{-- <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#assignModal-{{$item->id}}"><i class="fa fa-tasks"></i></a>
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
                                        </div> --}}
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


    $(document).on('change', '.select_assigned_user', function(){
        var ticket_id           = $(this).attr('ticket-id');
        var assign_user_id      = $(this).val();
        $.ajax({
                type:'POST',
                url:'{{ url("/ajax/ticket/assign") }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                'ticket_id'          : ticket_id,
                'assign_user_id'     : assign_user_id
                },
                success:function(data){
                console.log(data);
                }
        });
    });

    $(document).on('change', '.select_priority', function(){
        var ticket_id     = $(this).attr('ticket-id');
        var priority      = $(this).val();
        $.ajax({
                type:'POST',
                url:'{{ url("/ajax/ticket/priority") }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                'ticket_id'    : ticket_id,
                'priority'     : priority
                },
                success:function(data){
                console.log(data);
                }
        });
    });

    $(document).on('change', '.select_ticket_status', function(){
        var ticket_id           = $(this).attr('ticket-id');
        var ticket_status      = $(this).val();
        $.ajax({
                type:'POST',
                url:'{{ url("/ajax/ticket/ticket_status") }}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{
                'ticket_id'          : ticket_id,
                'ticket_status'      : ticket_status
                },
                success:function(data){
                console.log(data);
                }
        });
    });



});
</script>
@endsection
