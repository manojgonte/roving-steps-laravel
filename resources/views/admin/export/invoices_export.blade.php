<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoices List</title>
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Invoice ID</th>
                <th>Bill To</th>
                <th>Tour Name</th>
                <th>Invoice Date</th>
                <th>Total</th>
                <th>Payment Received</th>
                <th>Balance</th>
                <th>Payment Status</th>
                <th>Invoice Sent</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $row)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>INV-{{ $row->id }}</td>
                <td>@if(filter_var($row->bill_to, FILTER_VALIDATE_INT) == false){{ $row->bill_to }}@else{{ getUser($row->bill_to)?->name }}@endif</td>
                <td>{{ $row->tourName ?? '-' }}</td>
                <td>{{ $row->invoice_date ? date('d M Y', strtotime($row->invoice_date)) : '' }}</td>
                <td>{{ number_format($row->grand_total, 2) }}</td>
                <td>{{ number_format($row->payment_received, 2) }}</td>
                <td>{{ number_format($row->balance, 2) }}</td>
                <td>
                    @if ($row->balance == 0)
                        PAID
                    @elseif ($row->payment_received > 0)
                        PARTIALLY PAID
                    @else
                        UNPAID
                    @endif
                </td>
                <td>{{ $row->invoice_sent == 1 ? 'Yes' : 'No' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
