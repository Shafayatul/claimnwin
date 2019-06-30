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
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 108%; font-size: 11pt;"><span style="font-family: Calibri;">Hello </span><span style="font-family: Calibri; ">{{ Session::get('flash_username') }}</span><span style="font-family: Calibri;">,</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 108%; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 108%; font-size: 11pt;"><span style="font-family: Calibri;">You are receiving this email because we received a password reset request for your account.</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 108%; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 108%; font-size: 11pt;"><span style="background-color: #124479; color: #124479;">
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
    </span>&nbsp;</p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 108%; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 108%; font-size: 11pt;"><span style="font-family: Calibri;">This password reset link will expire in 15 minutes.</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 108%; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 108%; font-size: 11pt;"><span style="font-family: Calibri;">If you did not request a password reset, no further action is required.</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 108%; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 108%; font-size: 11pt;"><span style="font-family: Calibri;">If you&rsquo;re having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 108%; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 108%; font-size: 11pt;"><span style="font-family: Calibri; "><a href="{{ URL::to($actionUrl) }}">
    <p>{{ URL::to($actionUrl) }}</p>
    </a></span></p>
    <p style="margin-top: 0pt; margin-bottom: 8pt; line-height: 108%; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 107%; font-size: 11pt; background-color: #ffffff;"><span style="font-family: Calibri; color: #222222;">Kind regards,</span><br /><span style="font-family: 'Lucida Handwriting'; color: #222222;">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 107%; font-size: 11pt; background-color: #ffffff;"><span style="font-family: 'Lucida Handwriting'; color: #222222;">Claim&rsquo;N Win</span></p>
    <p style="margin-top: 0pt; margin-bottom: 8pt; line-height: 107%; font-size: 11pt; background-color: #ffffff;"><img src="https://myfiles.space/user_files/31870_cbc05cdaea37bc66/1561656284_password-reset-claimnwin/1561656284_password-reset-claimnwin.001.png" alt="https://myfiles.space/user_files/31870_cbc05cdaea37bc66/1561656008_email-template-new-account-claimnwin/1561656008_email-template-new-account-claimnwin.001.png" width="218" height="69" /></p>
    <p style="margin-top: 0pt; margin-bottom: 8pt; line-height: 107%; font-size: 11pt; background-color: #ffffff;"><span style="font-family: Calibri;">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 107%; font-size: 9pt; background-color: #ffffff;"><span style="font-family: Arial; color: #124479;">UK</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 107%; font-size: 9pt; background-color: #ffffff;"><span style="font-family: Arial; color: #94b134;">T: 020 3808 6632 </span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 107%; font-size: 9pt; background-color: #ffffff;"><span style="font-family: Arial; color: #124479;">USA</span><span style="font-family: Arial; color: #548dd4;">:</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 107%; font-size: 9pt; background-color: #ffffff;"><span style="font-family: Arial; color: #94b134;">T: 718-475-1181 | M: 845-459-2741 </span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 107%; font-size: 9pt; background-color: #ffffff;"><span style="font-family: Arial; color: #124479;">Israel:</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 107%; font-size: 9pt; background-color: #ffffff;"><span style="font-family: Arial; color: #94b134;">T: 972 72-333-4835</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 107%; font-size: 12pt; background-color: #ffffff;"><span style="font-family: Arial; font-size: 9pt; color: #94b134;">F: </span><span style="font-family: Arial; font-size: 9pt; color: #124479;">1-718-</span> <span style="font-family: Arial; font-size: 9pt; color: #124479;">228-9443 </span><span style="font-family: Arial; font-size: 9pt; color: #94b134;">Email:</span><span style="font-family: Arial; font-size: 9pt; color: #94b134;">&nbsp;</span><a style="text-decoration: none;" href="mailto:info@claimnwin.com"><u><span style="font-family: Arial; font-size: 9pt; color: #124479;">info@claimnwin.com</span></u></a><span style="font-family: Arial; font-size: 9pt; color: #1f497d;">&nbsp;</span><span style="font-family: Arial; font-size: 9pt; color: #94b134;">| Web:</span><span style="font-family: Arial; font-size: 9pt; color: #94b134;">&nbsp;</span><a style="text-decoration: none;" href="http://www.claimnwin.com"><u><span style="font-family: Arial; font-size: 9pt; color: #124479;">www.claimnwin.com</span></u></a><span style="font-family: Arial; font-size: 9pt; color: #124479;">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 107%; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 107%; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 107%; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 0pt; line-height: 115%; font-size: 8pt;"><span style="font-family: Calibri;">This e-mail and any attachments are confidential. They may contain privileged information and are intended for the named addressee(s) only. They must not be distributed without consent. If you are not the intended recipient, please notify us immediately and do not disclose, distribute, or retain this e-mail or any part of it. Unless expressly stated, opinions in this e-mail are those of the individual sender and not of Claim&rsquo;N Win Ltd. We believe but do not warrant that this e-mail and any attachments are virus free. You must therefore take full responsibility for virus checking. If you have received this transmission in error, please telephone +44 20 3519 3063 immediately so that we can arrange for its return. This email does not form a legal offer. The execution of any contract or part thereof according to its published Terms &amp; Conditions is solely the responsibility of the supplier.</span></p>
    <p style="margin-top: 0pt; margin-bottom: 8pt; line-height: 107%; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p>
    <p style="margin-top: 0pt; margin-bottom: 8pt; line-height: 108%; font-size: 11pt;"><span style="font-family: Calibri;">&nbsp;</span></p>
</body>
</html>