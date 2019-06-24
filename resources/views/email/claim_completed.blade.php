<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
      * {
        text-align: left;
        background-color: #fff !important;
      }
      .lh-28 {
        line-height: 28px;
      }

      .lower-part p {
        line-height: 20px;
        margin-bottom: 0px;
        font-size: 12px;
      }
    </style>
</head>
<body>


{{-- @component('mail::message') --}}


    <div>

    <p> Dear {{$user->name}},</p>

    <p class="lh-28">
        You are receiving this email as confirmation of receipt of your recent flight claim made online at <a href="www.claimnwin.com">www.claimnwin.com</a> for flight {{$ittDetails->flight_number}} on {{Carbon\Carbon::parse($ittDetails->created_at)->format('d/m/Y')}}
    </p>

    <p class="lh-28">
        Thank you for submitting your flight claim with Bott and Co using our 100% no-win no-fee service. Your enquiry reference number is CLAIM/{{$ittDetails->claim_id}}.
    </p>

    <p>
        We'll now work on verifying the flight information you've provided and will confirm the status of your claim by email shortly.
    </p>

    <p class="lh-28">
        We can see you have submitted Claims for: <br>
        @foreach($passengers as $passenger)
            {{$passenger->first_name}} {{$passenger->last_name}}<br>
        @endforeach

    </p>

    <p>
        If you need to add any other passengers into this claim, please email us with their:
    </p>

    <ul>
        <li><p>full name</p></li>
        <li><p>ostal address</p></li>
        <li><p>date of birth</p></li>
        <li><p>email address</p></li>
    </ul>

    <p class="lh-28">
        We've secured payments from Airlines in as little as a few hours and in others we've gone all the way to court. No other flight Claims company or law firm will do this in the; Claim’N Win are the industry leaders by a considerable distance.
    </p>

    <p>
      Kind regrads,
    </p>
    <p>
      Claim’N Win
    </p>

    <br><br><br><br>
    <div class="lower-part">
        <div class="row">
            <div class="col-md-12">
                <img src="{{asset('front_asset/img/logo.png')}}" alt="Claimnwin">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p style="color: #114479;">UK</p>
                <p style="color: #91AF2D;">T: 020 3808 6632</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p style="color: #114479;">USA</p>
                <p style="color: #91AF2D;">T: 972 72-333-4835</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p><span style="color: #91AF2D;">F:</span> <span style="color: #114479;">1-718- 228-9443</span> <span style="color: #91AF2D;">| Email:</span> <span style="color: #114479;">info@claimnwin.com</span> <span style="color: #91AF2D;">| Web:</span> <span style="color: #114479;">www.claimnwin.com</span></p>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
                <p>
                    This e-mail and any attachments are confidential. They may contain privileged information and are intended for the named addressee(s) only. They must not be distributed without consent. If you are not the
                    intended recipient, please notify us immediately and do not disclose, distribute, or retain this e-mail or any part of it. Unless expressly stated, opinions in this e-mail are those of the individual sender and not of
                    Claim’N Win Ltd. We believe but do not warrant that this e-mail and any attachments are virus free. You must therefore take full responsibility for virus checking. If you have received this transmission in error,
                    please telephone +44 20 3519 3063 immediately so that we can arrange for its return. This email does not form a legal offer. The execution of any contract or part thereof according to its published Terms &amp;
                    Conditions is solely the responsibility of the supplier.
                </p>
            </div>
        </div>
    </div>
      </div>
    {{-- @endcomponent --}}
</body>
</html>
