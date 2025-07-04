<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users List</title>
    <style>
        .text-danger {
            color: #dc3545 !important;
        }
        .text-orange {
            color: #fd7e14 !important;
        }
        .text-success {
            color: #28a745! !important;
        }
    </style>
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>User ID</th>
                <th>Customer Name</th>
                <th>Contact No.</th>
                <th>Alt Contact No.</th>
                <th>Email</th>
                <th>Address</th>
                <th>DOB</th>
                <th>Anniversary</th>
                <th>Passport No.</th>
                <th>Passport Expiry</th>
                <th>Visa Type</th>
                <th>Visa Expiry</th>
                <th>PAN No.</th>
                <th>Aadhar No.</th>
                <th>GST No.</th>
                <th>GST Address</th>
                <th>Registered On</th>
                <th>Last Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->contact ?? '' }}</td>
                <td>{{ $user->contact_alt ?? '' }}</td>
                <td>{{ $user->email ?? '' }}</td>
                <td>{{ $user->address ?? '' }}</td>
                <td>{{ $user->dob ? date('d M Y', strtotime($user->dob)) : '' }}</td>
                <td>{{ $user->anniversary_date ? date('d M Y', strtotime($user->anniversary_date)) : '' }}</td>
                <td>{{ $user->passport_no ??  '' }}</td>
                <td style="{{expiryColor($user->passport_expiry)}}">{{ $user->passport_expiry ? date('d M Y', strtotime($user->passport_expiry)) : '' }}</td>
                <td>{{ $user->visa_type ??  '' }}</td>
                <td style="{{expiryColor($user->visa_expiry)}}">{{ $user->visa_expiry ? date('d M Y', strtotime($user->visa_expiry)) : '' }}</td>
                <td>{{ $user->pan_no ??  '' }}</td>
                <td>{{ $user->aadhar_no ??  '' }}</td>
                <td>{{ $user->gst_no ??  '' }}</td>
                <td>{{ $user->gst_address ??  '' }}</td>
                <td>{{ date('d M Y', strtotime($user->created_at)) }}</td>
                <td>{{ date('d M Y', strtotime($user->updated_at)) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>