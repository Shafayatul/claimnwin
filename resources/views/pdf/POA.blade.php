<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> --}}
    <!-- Include Editor style. -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <textarea  id="pdf">
    <div class="container" style="margin:20px auto;">
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('front_asset/img/logo.png')}}" alt="" >
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4" style="text-align: right;">
                <h4 style="color: #76A154;">Claim'n Win Ltd</h4>
                <h4 style="color: #76A154;">T: <span style="color: #000000;font-size: 15px; font-weight:bold;">020 3808 6632</span></h4>
                <h4 style="color: #76A154;">E: <span style="color: #000000;font-size: 15px; font-weight:bold;">info@claimnwin@co.uk</span></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5 style="font-size: 15px; font-weight:bold;">Private and Confidential</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="text-align:left;">
                <h5 style="width: 150px; line-height: 30px;">{{$passenger->address}}</h5>
            </div>
            <div class="col-md-6" style="text-align:right;">
                <h5>Date: {{Carbon\Carbon::today()}}</h5>
                <h5>Our Ref: CLAIM/{{$claim->id}}</h5>
                <h5>Your Ref:

                @if ($passenger->booking_refernece != "")
                  {{$passenger->booking_refernece." - ".$passenger->created_at}}</h5>
                @else
                  {{"No Reference Found"}}</h5>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Dear Sir/Madam,</h4>
                <h4>Flight: {{$itinerary_details->flight_number." ".$itinerary_details->created_at}}</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4>Power of attorney</h4>
                <h4>I {{$passenger->first_name." ".$passenger->last_name}}</h4>
                <p>
                    hereby authorize Claim'N Win Ltd, to act on my behalf in all manners relating to flight {{$passenger->booking_refernece}} with a
                    planned departure on {{ $itinerary_details->departure_date }}, and to receive the compensation on my
                    behalf. Any and all acts carried out by Claim'N Win Ltd on my behalf shall have the same affects as
                    acts of my own.
                </p>
            </div>
        </div>

    </div>
</textarea>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/js/froala_editor.pkgd.min.js"></script>
<script>
$(function() {
    $('#pdf').froalaEditor()
});
</script>
</body>
</html>
