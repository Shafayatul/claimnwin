@component('mail::message')
<div>
    Dear {{$user->name}},
    <br>
    <p>
        You are receiving this email as confirmation of receipt of your recent flight claim made online at www.claimnwin.com for flight {{$ittDetails->flight_number}} on {{Carbon\Carbon::parse($ittDetails->created_at)->format('d/m/Y')}}
    </p>
    <p>
        Thank you for submitting your flight claim with Bott and Co using our 100% no-win no-fee service. Your enquiry reference number is CLAIM/{{$ittDetails->claim_id}}.
    </p>
    <p>
        We'll now work on verifying the flight information you've provided and will confirm the status of your claim by email shortly.
    </p>
    <p>
        We can see you have submitted Claims for: <br>
        <strong>{{$user->name}}</strong>
    </p>
    <p>
        If you need to add any other passengers into this claim, please email us with their:
    </p>
    <ul>
        <li>full name</li>
        <li>postal address</li>
        <li>date of birth</li>
        <li>email address</li>
    </ul>
    <p>
        We've secured payments from Airlines in as little as a few hours and in others we've gone all the way to court. No other flight Claims company or law firm will do this in the; Claim’N Win are the industry leaders by a considerable distance.
    </p>
    Kind regrads,
    <br>
    Claim’N Win
</div>
<br><br><br><br>
<div>
    <div class="row">
        <div class="col-md-12">
            <img src="{{asset('front_asset/img/logo.png')}}" alt="Claimnwin">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 style="color: blue;">UK</h3>
            <h3 style="color: limegreen;">T: 020 3808 6632</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 style="color: blue;">USA</h3>
            <h3 style="color: limegreen;">T: 972 72-333-4835</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3><span style="color: limegreen;">F:</span> <span style="color: blue;">1-718- 228-9443</span> <span style="color: limegreen;">Email:</span> <span style="color: blue;">info@claimnwin.com</span> <span style="color: limegreen;">| Web:</span> <span style="color: blue;">www.claimnwin.com</span></h3>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <p style="font-size: 6px;">
                This e-mail and any attachments are confidential. They may contain privileged information and are intended for the named addressee(s) only. They must not be distributed without consent. If you are not the
                intended recipient, please notify us immediately and do not disclose, distribute, or retain this e-mail or any part of it. Unless expressly stated, opinions in this e-mail are those of the individual sender and not of
                Claim’N Win Ltd. We believe but do not warrant that this e-mail and any attachments are virus free. You must therefore take full responsibility for virus checking. If you have received this transmission in error,
                please telephone +44 20 3519 3063 immediately so that we can arrange for its return. This email does not form a legal offer. The execution of any contract or part thereof according to its published Terms &amp;
                Conditions is solely the responsibility of the supplier.
            </p>
        </div>
    </div>
</div>
@endcomponent