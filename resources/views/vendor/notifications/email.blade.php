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
      .button-a {
        display: inline-block !important;
        cursor: pointer !important;
        margin-bottom: 10px !important;
      }
      .button {
        text-transform: uppercase !important;
        background-color: #114479 !important;
        border: none !important;
        color: white !important;
        padding: 15px 32px !important;
        text-align: center !important;
        text-decoration: none !important;
        display: inline-block !important;
        font-size: 16px !important;
        cursor: pointer !important;
      }
    </style>
</head>
<body>
<p>Dear {{ Session::get('flash_username') }} , </p>
<p>You are receiving this email because we received a password reset request for your account.</p>

@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>

<a class="button-a" href="{{ URL::to($actionUrl) }}"> <button class="button" type="button" name="button">{{ $actionText }}</button></a>

@endisset
<br>
<p>This password reset link will expire in 15 minutes.</p>
<p>If you did not request a password reset, no further action is required.</p>
<p>If you’re having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:</p>

<a href="{{ URL::to($actionUrl) }}">
<p>{{ URL::to($actionUrl) }}</p>
</a>
</br>
</br>
<p>Kind regrads,</p>
<p>Claim’N Win</p>

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

</body>
</html>
