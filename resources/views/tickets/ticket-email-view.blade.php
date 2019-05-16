@extends('layouts.admin_layout')

@section('main_content')
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
            background-color: white;
            padding: 15px 10px;
        }
    </style>
    <!-- Include Editor style. -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection
@include('layouts.includes.partial.alert')
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <h4><i class="fa fa-envelope"></i>&nbsp;&nbsp; {{$ticket->subject}}</h4>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <h6><strong>{{$from_name}}</strong> reported via email</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @if($ticket->ticket_status != null)
                            <span style="background-color: #00E6DE; font-weight: bold;" class="btn btn-default btn-sm">{{$ticket->ticket_status}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-group">
                                <div class="panel panel-success">
                                    <div class="panel-heading" style="height: auto!important;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6><strong>{{$from_name}}</strong> reported via email ({{$date}} at {{$time}})</h6><br>

                                                <h6><strong>to: </strong> {{$to}}</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="reply pull-right">
                                                <li><a href="{{URL::to('/ticket-reply-view/'.$ticket->id)}}"><i class="fa fa-share"></i></a></li>
                                                    <li><a href=""><i class="fa fa-pencil-square-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel-body" style="background-color: #d6e9c6;">
                                        {!! $ticket_note->description !!}
                                    </div>
                                    <div class="panel-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!-------------------------------Start Reply Email--------------------------->
                    @foreach($ticket_reply as $row)
                    <div class="row">
                            <div class="col-md-12">
                                <div class="panel-group">
                                    <div class="panel panel-success">
                                        <div class="panel-heading" style="height: auto!important;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    @php
                                                        $date=Carbon\Carbon::parse($row->created_at)->format("D, d M Y");
                                                        $time = Carbon\Carbon::parse($row->created_at)->format("h:i A");
                                                    @endphp
                                                    <h6><strong>{{$row->from_name}}</strong> reported via email ({{$date}} at {{$time}})</h6><br>

                                                    <h6><strong>to: </strong> {{$row->to_email}}</h6>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul class="reply pull-right">
                                                    <li><a href="{{URL::to('/ticket-reply-view/'.$row->ticket_id)}}"><i class="fa fa-share"></i></a></li>
                                                        <li><a href=""><i class="fa fa-pencil-square-o"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="panel-body" style="background-color: #d6e9c6;">
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
@endsection
