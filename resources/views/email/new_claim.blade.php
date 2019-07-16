<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color: white;">

	<h2>
		<b>Form : </b> {{$from}}
	</h2>
	<h2>
		<b>To : </b> {{$to}}
	</h2>
	<h2>
		<b>Client Email : </b> {{$client_email}}
	</h2>
	@if($is_eligible == 0)
	<h2>
		<b style="color: red">Eligibility: </b> Not Eligible
	</h2>
	@else
	<h2>
		<b style="color: green">Eligibility: </b> Eligible
	</h2>
	@endif
</body>
</html>