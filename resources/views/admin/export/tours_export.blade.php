<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tours List</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Customer Name</th>
                <th>Tour Name</th>
                <th>Destination</th>
                <th>Tour Type</th>
                <th>Tourist Count</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tours as $row)
            @php
                $now = date('Y-m-d');
                if ($row->status == 0) {
                    $statusLabel = 'Draft';
                } else {
                    if (!empty($row->from_date) && !empty($row->end_date) && $now >= $row->from_date && $now <= $row->end_date) {
                        $statusLabel = 'Ongoing';
                    } elseif (!empty($row->from_date) && $row->from_date > $now) {
                        $statusLabel = 'Upcoming';
                    } elseif (!empty($row->end_date) && $row->end_date < $now) {
                        $statusLabel = 'Completed';
                    } else {
                        $statusLabel = 'Draft';
                    }
                }
            @endphp
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>@if(filter_var($row->customer_name, FILTER_VALIDATE_INT) == false){{ $row->customer_name }}@else{{ getUser($row->customer_name)?->name }}@endif</td>
                <td>{{ $row->tour ? $row->tour->tour_name : 'NA' }}</td>
                <td>{{ $row->tour && $row->tour->destination ? $row->tour->destination->name : 'NA' }}</td>
                <td>{{ $row->tour ? $row->tour->type : 'NA' }}</td>
                <td>{{ $row->tourist_count }}</td>
                <td>{{ $row->from_date ? date('d/m/Y', strtotime($row->from_date)) : '-' }}</td>
                <td>{{ $row->end_date ? date('d/m/Y', strtotime($row->end_date)) : '-' }}</td>
                <td>{{ $statusLabel }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
