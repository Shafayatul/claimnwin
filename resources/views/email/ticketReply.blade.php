@component('mail::message')
Hello ,
<br>
<h4 style="font-weight: bolder;">{{$toEmail}}</h4>
{!! $composeData !!}
Regards,<br>
FreeflightClaim
@endcomponent
