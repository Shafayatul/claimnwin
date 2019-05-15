<table>
        <thead>
        <tr>
            <th>DateTime</th>
            <th>Claim Id</th>
            <th>Commision Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($payment as $row)
            <tr>
                <td>{{ $row->created_at }}</td>
                <td>{{ $row->claim_id }}</td>
                <td>{{ $row->commision_amount }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
