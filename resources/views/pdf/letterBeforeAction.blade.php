<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Letter Before Action</title>
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
<form action="#" method="post">
        {{ csrf_field() }}
    <textarea  id="pdf">
            @php
                $claim_type = ucwords(str_replace("_"," ",$claim->claim_table_type));
            @endphp

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
                <h5>{{$airline->name}}</h5>
                <h5>{{$airline->address_line_1}}</h5>
                <h5>{{$airline->address_line_2}}</h5>
                <h5>{{$airline->country}}</h5>
            </div>
            <div class="col-md-6" style="text-align:right;">
                <h5>Date: {{Carbon\Carbon::now()->format("d-m-Y")}}</h5>
                <h5>Our Ref: CLAIM/000{{$claim->id}}</h5>
                <h5>Your Ref: {{$current_passenger->booking_refernece == null ? 'No Reference Found' : $current_passenger->booking_refernece}}</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Dear Sirs,</h4>
            <h4>Re: {{$claim_type}}</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <p>
                    We have been instructed to represent the passengers listed at {{$current_passenger->first_name.' '.$current_passenger->last_name}} of this letter (hereinafter "the
                    Claimants") to pursue a claim for compensation arising out of the {{$claim_type}}.
                </p>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <h4 style="text-decoration:underline;">Claim Details</h4>
                <p>
                    The claim relates to flight number {{$itt_details->flight_number}} {{$itt_details->departure_date}}, which was scheduled to depart from

                    {{$dept_and_arrival_airport[0]['name']}} ({{$dept_and_arrival_airport[0]['iata_code']}}) on {{$dept_and_arrival_airport[1]['name']}} ({{$dept_and_arrival_airport[1]['iata_code']}}) at {{$itt_details->departure_date}}

                    and arrive at {{(isset($connection_airport->name)) ? $connection_airport->name : ''}} ({{(isset($connection_airport->iata_code)) ? $connection_airport->iata_code : ''}}) on {{$itt_details->departure_date}}. Unfortunately,
                    @if($claim->claim_table_type == 'flight_cancellation')
                    the flight was cancelled.
                    @elseif($claim->claim_table_type == 'flight_delay' && $claim->is_contacted_airline == '0' && $claim->total_delay == 'less_than_3_hours')
                    the flight was delayed more than 3 hours.
                    @elseif($claim->claim_table_type == 'flight_delay' && $claim->is_contacted_airline == '1' && $claim->total_delay == 'less_than_3_hours')
                    the flight was delayed.
                    @elseif($claim->claim_table_type == 'denied_boarding')
                    the passengers listed at {{$current_passenger->first_name.' '.$current_passenger->last_name}} of this letter were denied boarding against their will
                    @endif
                </p>
                <p>
                    The distance between these 2 airports is {{$claim->distance}} Km and in accordance with the {{$claim_type}} we submit that each passenger is entitled to {{$claim->amount == '' ? '0' : $claim->amount}}.
                </p>
                <p>
                    Please note that we are instructed exclusively in relation to statutory compensation unless otherwise
                    specified. Any settlement achieved is strictly without prejudice to any other losses our client may have
                    incurred relating to this flight.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4 style="text-decoration:underline;">Expected Pre-Action Conduct</h4>
                <p>
                    This letter should be accepted as the requisite letter before claim, pursuant to the Practice Direction on Pre-Action Conduct (“Practice Direction”).
                    In accordance with the Practice Direction we anticipate receiving your acknowledgement within 14 days and then a full response within 30 days.
                </p>
                <p>
                        If we do not hear from you within the initial 30 days or alternatively if you do not respond within the timeframe you provide in accordance point 3 above then
                        we reserve the right to make an application to the Court for Pre-Action Disclosure and/or Issue Court Proceedings without further notice.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4 style="text-decoration:underline;">If Liability To Compensate Is Accepted</h4>
                <p>
                    If you are accepting a liability to compensate each of the passengers, then we look forward to
                    receiving payment within 21 days of that admission.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p>
                    Payment can be made by cheque or alternatively by bank transfer to: -
                </p>
            </div>
        </div>


        <div style="page-break-after:always; padding: 20px;"></div>
        <div class="row">
            <div class="col-md-12">
                <h4>Account Name: <span>{{isset(($bank_info->account_name)) ? $bank_info->account_name : ''}}</span></h4>
                <h4>Bank Name: <span>{{isset(($bank_info->bank_name)) ? $bank_info->bank_name : ''}}</span></h4>
                <h4>Iban Number: <span>{{isset(($bank_info->iban_no)) ? $bank_info->iban_no : ''}}</span></h4>
                <h4>Swift/Bic Code: <span>{{isset(($bank_info->swift_bic_code)) ? $bank_info->swift_bic_code : ''}}</span></h4>
            <h4>Currency Of Account: <span>{{isset(($currency->code)) ? $currency->code : ''}}</span></h4>
                <h4>Ref: <span>000{{$claim->id}}</span></h4>
            </div>
        </div>

    <h4>We will accept payment of {{$claim->amount == '' ? '0' : $claim->amount}}</h4>

        <div class="row">
            <div class="col-md-12">
                <h4 style="text-decoration:underline;">Information Required If Defence Raised</h4>
                <p>
                    If you intend on arguing that the statutory defence of extraordinary circumstances applies, then we
                    require you to clarify the exact nature of the circumstances and provide disclosure in support of the
                    same.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4>Yours faithfully</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
            <h4 class="text-center">{{$current_passenger->first_name.' '.$current_passenger->last_name}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <h4 class="text-center">Name</h4>
            </div>
            <div class="col-md-6">
                <h4 class="text-center">Ticket No.</h4>
            </div>
        </div>
        @if((($claim->claim_table_type == 'flight_cancellation') && ($claim->total_delay == 'less_than_3_hours') && ($claim->is_contacted_airline == '1'))||(($claim->claim_table_type == 'denied_boarding') && ($claim->total_delay == 'less_than_3_hours') && ($claim->is_contacted_airline == '1'))||(($claim->claim_table_type == 'flight_delay') && ($claim->total_delay == 'less_than_3_hours') && ($claim->is_contacted_airline == '1')))
        @foreach($all_passenger as $passenger_row)
        <div class="row">
            <div class="col-md-6">
            <h4 class="text-center">{{$passenger_row->first_name.' '.$passenger_row->last_name}}</h4>
            </div>
            <div class="col-md-6">
                <h4 class="text-center">656</h4>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</textarea>
<div class="col-md-4 col-md-offset-4">
    <button type="submit"  class="btn btn-lg btn-success btn-block"> <i class="fa fa-envelope"></i> Email</button>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
</form>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/js/froala_editor.pkgd.min.js"></script>
<script>
$(function() {
    $('#pdf').froalaEditor()
});
</script>
</body>

</html>
