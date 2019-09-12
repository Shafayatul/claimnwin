@extends('layouts.admin_layout')
@section('header-css')
    <style>
        #reply-icon{
            border-radius: 5%;
            float: right;
        }

        .reply{
            padding: 0px;
            margin: 0px;

        }
        .reply li{
            list-style-type: none;
            float: left;
        }

        .reply li a i{
            text-align: center;
            display: block;
            width: 40px;
            background-color: #337AB7;
            padding: 15px 10px;
            color: white;
        }
    </style>

@endsection
@section('main_content')

@include('layouts.includes.partial.alert')
<link href='{{ asset('admin_asset/css/SidebarNav.min.css')}}' media='all' rel='stylesheet' type='text/css'/>

<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-body">
            <div class="card">
                <div class="card-body">
                    <div class="row" style="background-color: #337AB7; padding: 10px; color: white;">
                        <div class="col-md-12">

                            <h4 style="color: white;"><i class="fa fa-envelope" ></i>&nbsp;&nbsp; {{$ticket->subject}}</h4>

                        </div>
                        <br>
                        <div class="col-md-12">
                            <h6><strong>{{$from_name}}</strong> reported via email</h6>
                        </div>
                        <div class="col-md-12">
                            @if($ticket->ticket_status != null)
                            <span style="background-color: #00E6DE; font-weight: bold;" class="btn btn-default btn-sm">{{$ticket->ticket_status}}</span>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-12">
                            <h6><strong>{{$from_name}}</strong> reported via email</h6>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-borderd table-striped">
                                    <thead>
                                        <tr>
                                            <th>Agent</th>
                                            <th>Priority</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <td>
                                            <select name="assign_user_id" id="user" class="form-control select_assigned_user" ticket-id="{{$ticket->id}}">
                                                    <option> Please select </option>
                                                    @foreach($users as $key=>$value)
                                                    <option value="{{$key}}" @if($key == $ticket->assign_user_id) selected @endif>{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="priority" id="priority" class="form-control select_priority" ticket-id="{{$ticket->id}}">
                                                    <option> Please select </option>
                                                    <option value="Low" @if("Low" == $ticket->priority) selected @endif>Low</option>
                                                    <option value="Medium" @if("Medium" == $ticket->priority) selected @endif>Medium</option>
                                                    <option value="High" @if("High" == $ticket->priority) selected @endif>High</option>
                                                    <option value="Urgent" @if("Urgent" == $ticket->priority) selected @endif>Urgent</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="ticket_status" id="" class=" form-control select_ticket_status" ticket-id="{{$ticket->id}}">
                                                    <option> Please select </option>
                                                    <option value="Open"  @if("Open" == $ticket->ticket_status) selected @endif>Open</option>
                                                    <option value="Pending"  @if("Pending" == $ticket->ticket_status) selected @endif>Pending</option>
                                                    <option value="Resolved"  @if("Resolved" == $ticket->ticket_status) selected @endif>Resolved</option>
                                                    <option value="Closed"  @if("Closed" == $ticket->ticket_status) selected @endif>Closed</option>
                                                </select>
                                            </td>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-group">
                                <div class="panel">
                                    <div class="panel-heading" style="height: auto!important;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6><strong>{{$from_name}}</strong> reported via email ({{$date}} at {{$time}})</h6>
                                                <h6><strong>Email: </strong> {{$ticket->from_email}}</h6>
                                                <h6><strong>to: </strong> {{$to}}</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="reply pull-right">
                                                    <li><a href="{{URL::to('/ticket-reply-view/'.$ticket->id)}}"><i class="fa fa-share"></i></a></li>
                                                    <li><a href="{{URL::to('/from-email-view-pdf/'.$ticket->id)}}"><i class="fa fa-file-pdf-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel-body">
                                        {!! $ticket_note->description !!}
                                    </div>
                                    <div class="panel-footer">
                                        @foreach($attachments as $attachment)
                                            <a class="btn btn-success btn-xs" href='{{ 'data:'.$attachment->content_type.';base64,'.base64_encode($attachment->content) }}' download='{{$attachment->name}}'>
                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                <b>Attachment - {{$loop->iteration}}</b>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
<!-------------------------------Start Reply Email--------------------------->
                    <h1 class="text-center">Reply Email Start Here</h1><br>
                    @foreach($ticket_reply as $row)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-group">
                                <div class="panel">
                                    <div class="panel-heading" style="height: auto!important;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                @php
                                                    $date=Carbon\Carbon::parse($row->created_at)->format("D, d M Y");
                                                    $time = Carbon\Carbon::parse($row->created_at)->format("h:i A");
                                                @endphp
                                                <h6><strong>{{$row->from_name}}</strong> reported via email ({{$date}} at {{$time}})</h6><br>


                                                <h6><strong>To: </strong> {{$row->to_email}}</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="reply pull-right">
                                                <li><a href="{{URL::to('/ticket-reply-view/'.$row->ticket_id)}}"><i class="fa fa-share"></i></a></li>
                                                <li><a href="{{URL::to('/reply-email-view-pdf/'.$row->ticket_id)}}"><i class="fa fa-file-pdf-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel-body">
                                        {!! $row->ticket_reply_note !!}
                                    </div>
                                    <div class="panel-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
<!-------------------------------End Reply Email--------------------------->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- side nav css file -->
<link href='{{ asset('admin_asset/css/SidebarNav.min.css')}}' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->
@endsection



@section('footer-script')
<script>
$(function() {


    $(".sidebar-menu a").css('color','#b8c7ce');
    $(".sidebar-menu a").hover(function() {
      $(this).css("color",'#b8c7ce')
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
<style type="text/css">
a, a:link, a:visited, a:hover, a:active
{
  color: #b8c7ce !important;
  text-decoration: none !important;
}
</style>
@endsection
