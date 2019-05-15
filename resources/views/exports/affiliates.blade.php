<table>
        <thead>
        <tr>
            <th>DateTime</th>
            <th>User Id</th>
            <th>Claim Id</th>
            <th>Additional Description</th>
            <th>Commision Amount</th>
            <th>Percentage</th>
            <th>Received Amount</th>
            <th>Payment Method</th>
            <th>Approved</th>
        </tr>
        </thead>
        <tbody>
        @foreach($affiliates as $row)
            <tr>
                <td>{{ $row->created_at }}</td>
                <td>{{ $row->affiliate_user_id }}</td>
                <td>{{ $row->claim_id }}</td>
                <td>{{ $row->addition_description }}</td>
                <td>{{ $row->commision_amount }}</td>
                <td>{{ $row->percentage }}</td>
                <td>{{ $row->received_amount }}</td>
                <td>{{ $row->payment_method }}</td>
                <td>{{ $row->approved }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
