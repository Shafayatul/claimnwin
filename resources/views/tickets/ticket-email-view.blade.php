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
                            <h6><strong>Sajal Kundu</strong> reported via email</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @if($ticket->status == 1)
                            <span style="background-color: #00E6DE; font-weight: bold;" class="btn btn-default btn-sm">New</span>
                            @elseif($ticket->status == 2)
                            <span style="color: #00CC3D;">Waiting For Reply</span>
                            @else
                            <span class="text-danger">Closed</span>
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
                                                <h6><strong>Sajal Kundu</strong> reported via email, 5 minutes ago(Tue, 14 May 2019 at 12:38 PM)</h6><br>

                                                <h6><strong>to: </strong> info@freeflight.com</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="reply pull-right">
                                                    <li><a href=""><i class="fa fa-share"></i></a></li>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
