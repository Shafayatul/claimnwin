<!DOCTYPE html>
<html>
<head>
	<title>Admin ticket reply</title>
</head>
<body>
	<p>
		<b>Related to Claim: </b> 
		@if(($ticket->claim_id == null) ||($ticket->claim_id == '')) 
			No
		@else
			Yes
		@endif
	</p>
	<p>
		<b>Claim id: </b> 
		@if(($ticket->claim_id == null) || ($ticket->claim_id == '')) 
			--
		@else
			<a href="{{ url('/claim-view/'.$ticket->claim_id) }}">{{ $ticket->claim_id }}</a>
		@endif
	</p>
	<p>
		<b>Ticket Note: </b> {{ $ticketnote->description }}
	</p>

</body>
</html>