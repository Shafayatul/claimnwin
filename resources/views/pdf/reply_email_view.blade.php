<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
    <div style="height: auto!important; display: block; overflow: hidden;">
        <div class="row">
            <div class="col-md-12">
                @php
                    $date=Carbon\Carbon::parse($ticket_reply->created_at)->format("D, d M Y");
                    $time = Carbon\Carbon::parse($ticket_reply->created_at)->format("h:i A");
                @endphp
                <h6>
                    <strong>{{$ticket_reply->from_name}}</strong> reported via email ({{$date}} at {{$time}})
                    <br>
                    <strong>from: </strong> {{$ticket_reply->from_email}}
                    <br>
                    <strong>to: </strong> {{$ticket_reply->to_email}}
                </h6>
            </div>
        </div>
    </div>
    <div style="height: auto!important; display: block; overflow: hidden;">
        {!! $ticket_reply->ticket_reply_note !!}
        {{-- {{ $ticket_reply->ticket_reply_note }} --}}
    </div>
</body>
</html>



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reply Email View</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-group">
                            <div class="panel">
                                <div class="panel-heading" style="height: auto!important;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @php
                                                $date=Carbon\Carbon::parse($ticket_reply->created_at)->format("D, d M Y");
                                                $time = Carbon\Carbon::parse($ticket_reply->created_at)->format("h:i A");
                                            @endphp
                                            <h6><strong>{{$ticket_reply->from_name}}</strong> reported via email ({{$date}} at {{$time}})</h6>
                                            <h6><strong>from: </strong> {{$ticket_reply->from_email}}</h6>
                                            <h6><strong>to: </strong> {{$ticket_reply->to_email}}</h6>
                                        </div>
                                    </div>

                                </div>
                                <div class="panel-body">
                                    {!! $ticket_reply->ticket_reply_note !!}
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>


 --}}