<table>
        <thead>
        <tr>
            <th>DateTime</th>
            <th>Claim Id</th>
            <th>Commision Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($affiliate as $user)
            <tr>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->claim_id }}</td>
                <td>{{ $user->commision_amount }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
