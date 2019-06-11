@component('mail::message')
Hello ,
<h4 style="font-weight: bolder;">{{$toEmail}}</h4>
{!! $composeData !!}
Regards,<br>
FreeflightClaim
@endcomponent
