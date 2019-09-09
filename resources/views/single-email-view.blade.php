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
<div class="forms">
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="form-body">
            <div class="card">
                <div class="card-body">
                    <div class="row" style="background-color: #337AB7; padding: 10px; color: white;">
                        <div class="col-md-12">

                            <h4 style="color: white;"><i class="fa fa-envelope" ></i>&nbsp;&nbsp; {{$sub}}</h4>

                        </div>
                        <br>
                        <div class="col-md-12">
                            <h6><strong>{{$from_name}}</strong> reported via email</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-group">
                                <div class="panel">
                                    <div class="panel-heading" style="height: auto!important;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6><strong>{{$from_name}}</strong> reported via email ({{$date}} at {{$time}})</h6>
                                                <h6><strong>Email: </strong> {{$from_email}}</h6>
                                                <h6><strong>to: </strong> {{$to}}</h6>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="panel-body">
                                        {!! $longMsg !!}
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

});
</script>
@endsection
