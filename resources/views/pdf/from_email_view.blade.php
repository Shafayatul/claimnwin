<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>From Email View</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-group">
                            <div class="panel panel-success">
                                <div class="panel-heading" style="height: auto!important;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6><strong>{{$from_name}}</strong> reported via email ({{$date}} at {{$time}})</h6>
                                            <h6><strong>from: </strong> {{$from}}</h6>
                                            <h6><strong>to: </strong> {{$to}}</h6>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                    </div>

                                </div>
                                <div class="panel-body">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>


