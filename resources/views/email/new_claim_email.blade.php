<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color: white;">

	<h2>
		<b>Form : </b> {{$from_airport}}
	</h2>
	<h2>
		<b>To : </b> {{$to_airport}}
	</h2>
	<h2>
		<b>Ariline Name : </b> {{$airline->name}}<br>
		<b>Ariline Iata Code: </b> {{$airline->iata_code}}<br>
		<b>Ariline Icao Code: </b> {{$airline->icao_code}}
	</h2>
	<h2>
		<b>Client Email : </b> {{$client_email}}
	</h2>
	@if($is_eligible == '0')
	<h2>
		<b style="color: red">Eligibility: </b> Not Eligible
	</h2>
	@else
	<h2>
		<b style="color: green">Eligibility: </b> Eligible
	</h2>
	@endif
	{!! $a_html !!}
</body>
</html>