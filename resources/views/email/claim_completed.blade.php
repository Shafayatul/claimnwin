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
<body style="background-color: white;">

<div><p style="margin-top: 0pt; margin-bottom: 14pt; font-size: 11pt;"><span style="font-family: Calibri;">Dear </span><span style="font-family: Calibri; ">{{$user->name}},</span></p><p style="margin-top: 14pt; margin-bottom: 14pt; font-size: 11pt;"><span style="font-family: Calibri;">You are receiving this email as confirmation of receipt of your recent flight claim made online at </span><a style="text-decoration: none;" href="http://www.claimnwin.com"><u><span style="font-family: Calibri; color: #0563c1;">www.claimnwin.com</span></u></a><span style="font-family: Calibri;">&nbsp; </span><span style="font-family: Calibri;">for flight </span><span style="font-family: Calibri; ">{{$ittDetails->flight_number}} </span><span style="font-family: Calibri;">on </span><span style="font-family: Calibri; ">{{Carbon\Carbon::parse($ittDetails->created_at)->format('d/m/Y')}}</span></p><p style="margin-top: 14pt; margin-bottom: 14pt; font-size: 11pt;"><span style="font-family: Calibri;">Thank you for submitting your flight claim with Claim&rsquo;N Win using our 100% no-win no-fee service. Your enquiry reference number is </span><span style="font-family: Calibri; ">CLAIM/{{$ittDetails->claim_id}}</span></p><p style="margin-top: 14pt; margin-bottom: 14pt; font-size: 11pt;"><span style="font-family: Calibri;">We'll now work on verifying the flight information you've provided and will confirm the status of your claim by email shortly.</span></p><p style="margin-top: 14pt; margin-bottom: 14pt; font-size: 11pt;"><span style="font-family: Calibri;">We can see you have submitted Claims for:</span></p>
        @foreach($passengers as $passenger)
        <p style="margin-top: 14pt; margin-bottom: 14pt; font-size: 11pt;"><span style="font-family: Calibri; ">{{$passenger->first_name}} {{$passenger->last_name}}</span></p>
        @endforeach

    <p style="margin-top: 14pt; margin-bottom: 14pt; font-size: 11pt;"><span style="font-family: Calibri;">If you need to add any other passengers into this claim, please email us with their; </span></p><ul style="margin: 0pt; padding-left: 0pt;" type="disc"><li style="margin-top: 14pt; margin-left: 27.6pt; padding-left: 8.4pt; font-family: serif; font-size: 10pt;"><span style="font-family: Calibri; font-size: 11pt;">Full name </span></li><li style="margin-left: 27.6pt; padding-left: 8.4pt; font-family: serif; font-size: 10pt;"><span style="font-family: Calibri; font-size: 11pt;">Postal address </span></li><li style="margin-left: 27.6pt; padding-left: 8.4pt; font-family: serif; font-size: 10pt;"><span style="font-family: Calibri; font-size: 11pt;">Date of birth </span></li><li style="margin-left: 27.6pt; margin-bottom: 14pt; padding-left: 8.4pt; font-family: serif; font-size: 10pt;"><span style="font-family: Calibri; font-size: 11pt;">Email address </span></li></ul><p style="margin-top: 14pt; margin-bottom: 14pt; font-size: 11pt;"><span style="font-family: Calibri;">We've secured payments from Airlines in as little as a few hours and in others we've gone all the way to court. No other flight Claims company or law firm will do this in the; Claim&rsquo;N Win are the industry leaders by a considerable distance.</span><span style="font-family: Arial; color: #222222;">&nbsp;</span></p><p style="margin-top: 14pt; margin-bottom: 14pt; font-size: 11pt;">&nbsp;</p><p style="margin-top: 14pt; margin-bottom: 14pt; font-size: 11pt;"><span style="font-family: Calibri; color: #222222;">Kind regrads,</span></p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 11pt; background-color: #ffffff;"><span style="font-family: 'Lucida Handwriting'; color: #222222;">Claim&rsquo;N Win</span></p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 9pt; background-color: #ffffff;"><img src="{{ asset('front_asset/img/logo.png') }}" alt="" width="217" height="69" /></p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 9pt; background-color: #ffffff;"><span style="font-family: Arial; color: #222222;">&nbsp;</span></p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 9pt; background-color: #ffffff;"><strong><span style="font-family: Arial; color: #1f497d;">&nbsp;</span></strong></p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 9pt; background-color: #ffffff;"><span style="font-family: Arial; color: #124479;">UK</span></p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 9pt; background-color: #ffffff;"><span style="font-family: Arial; color: #94b134;">T: 020 3808 6632 </span></p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 9pt; background-color: #ffffff;"><span style="font-family: Arial; color: #124479;">USA</span><span style="font-family: Arial; color: #548dd4;">:</span></p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 9pt; background-color: #ffffff;"><span style="font-family: Arial; color: #94b134;">T: 718-475-1181 | M: 845-459-2741 </span></p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 9pt; background-color: #ffffff;"><span style="font-family: Arial; color: #124479;">Israel:</span></p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 9pt; background-color: #ffffff;"><span style="font-family: Arial; color: #94b134;">T: 972 72-333-4835</span></p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 11pt; background-color: #ffffff;"><span style="font-family: Arial; font-size: 9pt; color: #94b134;">F: </span><span style="font-family: Arial; font-size: 9pt; color: #124479;">1-718-</span> <span style="font-family: Arial; font-size: 9pt; color: #124479;">228-9443 </span><span style="font-family: Arial; font-size: 9pt; color: #94b134;">Email:</span><span style="font-family: Arial; font-size: 9pt; color: #94b134;">&nbsp;</span><a style="text-decoration: none;" href="mailto:info@claimnwin.com"><u><span style="font-family: Arial; font-size: 9pt; color: #124479;">info@claimnwin.com</span></u></a><span style="font-family: Arial; font-size: 9pt; color: #1f497d;">&nbsp;</span><span style="font-family: Arial; font-size: 9pt; color: #94b134;">| Web:</span><span style="font-family: Arial; font-size: 9pt; color: #94b134;">&nbsp;</span><a style="text-decoration: none;" href="http://www.claimnwin.com"><u><span style="font-family: Arial; font-size: 9pt; color: #124479;">www.claimnwin.com</span></u></a><span style="font-family: Arial; font-size: 9pt; color: #124479;">&nbsp;</span></p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 11pt; background-color: #ffffff;">&nbsp;</p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p><p style="margin-top: 0pt; margin-bottom: 10pt; line-height: 115%; font-size: 8pt;"><span style="font-family: Calibri;">This e-mail and any attachments are confidential. They may contain privileged information and are intended for the named addressee(s) only. They must not be distributed without consent. If you are not the intended recipient, please notify us immediately and do not disclose, distribute, or retain this e-mail or any part of it. Unless expressly stated, opinions in this e-mail are those of the individual sender and not of Claim&rsquo;N Win Ltd. We believe but do not warrant that this e-mail and any attachments are virus free. You must therefore take full responsibility for virus checking. If you have received this transmission in error, please telephone +44 20 3519 3063 immediately so that we can arrange for its return. This email does not form a legal offer. The execution of any contract or part thereof according to its published Terms &amp; Conditions is solely the responsibility of the supplier.</span></p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p><p style="margin-top: 0pt; margin-bottom: 0pt; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p></div>


{{--     <div>

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
    </p> --}}

{{--     <br><br><br><br>
    <div class="lower-part">
        <div class="row">
            <div class="col-md-12">
                <img src="{{public_path('front_asset/img/logo.png')}}" alt="Claimnwin">
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
      </div> --}}
    {{-- @endcomponent --}}
</body>
</html>
