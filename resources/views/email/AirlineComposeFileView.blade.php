@component('mail::message')
<div style="background-color: white;">
Hello ,
<br>
<h4 style="font-weight: bolder;">{{$userName}}</h4>
<br>
<p>{!!$composeData!!}</p>
<br>
<br>
Regards,<br>
Claim'N Win
</div>
@endcomponent
