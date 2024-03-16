<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice: {{$invoice->bill_to}}</title>
    <style>
        
        body {
            margin: 0;
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
        }
        .invoice {
            background: #fff;
            border: 1px solid rgba(0, 0, 0, .125);
            position: relative;
        }
        .p-3{
            padding: 1rem !important;
        }
        .mt-auto, .my-auto {
            margin-top: auto !important;
        }
        .mb-3, .my-3 {
            margin-bottom: 1rem !important;
        }
        .mt-3, .my-3 {
            margin-top: 1rem !important;
        }
        .mb-2, .my-2 {
            margin-bottom: 0.5rem !important;
        }
        .pr-0, .px-0 {
            padding-right: 0 !important;
        }
        .pl-0, .px-0 {
            padding-left: 0 !important;
        }
        .text-sm {
            font-size: .875rem !important;
        }
        .text-left {
            text-align: left !important;
        }
        .text-center {
            text-align: center !important;
        }
        .text-right {
            text-align: right !important;
        }
        .align-middle {
            vertical-align: middle !important;
        }
        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -7.5px;
            margin-left: -7.5px;
        }
        .col {
            -ms-flex-preferred-size: 0;
            flex-basis: 0;
            -ms-flex-positive: 1;
            flex-grow: 1;
/*            max-width: 100%;*/
        }
        .col-md-10 {
            -ms-flex: 0 0 83.333333%;
            flex: 0 0 83.333333%;
            max-width: 83.333333%;
        }
        .col-md-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
        }
        .col-md-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%;
        }
        .col-md-5 {
            -ms-flex: 0 0 41.666667%;
            flex: 0 0 41.666667%;
            max-width: 41.666667%;
        }
        .col-md-4 {
            -ms-flex: 0 0 33.33%;
            flex: 0 0 33.33%;
            max-width: 33.33%;
        }
        .col-md-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%;
        }
        label:not(.form-check-label):not(.custom-file-label) {
            font-weight: 500;
        }
        label {
            display: inline-block;
            margin-bottom: 0.2rem;
        }
        .font-weight-bold {
            font-weight: 600;
        }
        .h6, h6 {
            font-size: 1rem;
        }
        .table:not(.table-dark) {
            color: inherit;
        }
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            background-color: transparent;
        }
        table {
            border-collapse: collapse;
        }
        thead {
            display: table-header-group;
            vertical-align: middle;
            border-color: inherit;
        }
        .bg-gradient-dark {
            background: #343a40 linear-gradient(180deg, #52585d, #343a40) repeat-x !important;
        }
        .bg-gradient-dark {
            color: #fff;
        }
        .table-bordered thead td, .table-bordered thead th {
            border-bottom-width: 2px;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table th {
            padding: 0.3rem !important;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        tbody {
            display: table-row-group;
            vertical-align: middle;
            border-color: inherit;
        }
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }
        .table td {
            padding: 0.4rem !important;
        }
        .justify-content-between {
            -ms-flex-pack: justify !important;
            justify-content: space-between !important;
        }
        .d-flex {
            display: -ms-flexbox !important;
            display: flex !important;
        }
        .border-0 {
            border: 0 !important;
        }
        .form-control:disabled, .form-control[readonly] {
            background-color: #e9ecef;
            opacity: 1;
        }
        .form-control-sm {
            height: calc(1.8125rem + 2px);
            padding: 0.25rem 0.5rem;
            font-size: .875rem;
            line-height: 1.5;
            border-radius: 0.2rem;
        }
        .form-control {
            display: block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            box-shadow: inset 0 0 0 transparent;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
        select {
            word-wrap: normal;
        }
        button, select {
            text-transform: none;
        }
        button, input, optgroup, select, textarea {
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
        }
        .bg-light-orange {
            background-color: #FFEBB8;
        }
        .w-full {
            width: 100%;
        }
        .w-half {
            width: 50%;
        }
    </style>
</head>
<body>
    <section>
        <div class="mt-auto">
            <div class="text-center">
                <img src="{{public_path('img/logo/logo_trans.png')}}" height="70">
            </div>
            <table class="w-full">
                <tr>
                    <td class="w-half">
                        <div><label><b>Bill To:</b> {{ $invoice->bill_to }}</label></div>
                        <div><label><b>Address:</b> {{ $invoice->address }}</label></div>
                        <div><label><b>Contact No.:</b> {{ $invoice->contact_no }} </label></div>
                        <div><label><b>Email:</b> {{ $invoice->email }}</label></div>
                        <div><label><b>Invoice Date:</b> {{ date('d/m/Y', strtotime($invoice->invoice_date)) }} </label></div>
                        <div>
                            <label><b>Invoice For:</b> 
                            @foreach($invoice->invoice_for as $row)
                            {{ $row }}@if($loop->last) @else, @endif
                            @endforeach
                            </label>
                        </div>
                        @if($invoice->tour_id)
                            <div><label><b>Tour:</b> {{ $invoice->tourName }} </label></div>
                        @endif
                    </td>
                    <td class="w-half">
                        <div><label><b>Invoice Id:</b> {{ $invoice->id }} </label></div>
                        <div><label><b>Pan No.:</b> {{ $invoice->pan_no }} </label></div>
                        <div><label><b>GST No.:</b> {{ $invoice->gst_no }} </label></div>
                        <div><label><b>GST Address.:</b> {{ $invoice->gst_address }} </label></div>
                        <div><label><b>Tourist Count:</b> {{ $invoice->no_of_passengers }} </label></div>
                        <div><label><b>Date:</b> {{ date('d/m/Y', strtotime($invoice->from_date)) }} - {{ date('d/m/Y', strtotime($invoice->to_date)) }} </label></div>
                    </td>
                </tr>
            </table>
            <hr />

            <div class="">
                <div class="font-weight-bold" style="font-size: 18px; margin-bottom: 8px">Payments</div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="bg-gradient-dark">
                            <th class="text-left"> Services </th>
                            <th class="text-center"> Date </th>
                            <th class="text-center"> Name </th>
                            <th class="text-center"> From </th>
                            <th class="text-center"> To </th>
                            <th class="text-center"> Class </th>
                            <th class="text-center"> Tourist Count </th>
                            <th class="text-center"> Cost per Person </th>
                            <th class="text-center"> Total Cost </th>
                            {{-- <th class="text-center"> # </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice->invoiceItems->filter(function($item) {
                            return $item->service_name != 'Hotel Booking';
                        }) as $item)
                        <tr>
                            <td class="align-middle text-left">
                                {{$item->service_name}}
                            </td>
                            <td class="align-middle text-center">
                                {{date('d/m/Y', strtotime($item->date))}}
                            </td>
                            <td class="align-middle text-center">
                                {{$item->name}}
                            </td>
                            <td class="align-middle text-center">
                                {{$item->from_dest}}
                            </td>
                            <td class="align-middle text-center">
                                {{$item->to_dest}}
                            </td>
                            <td class="align-middle text-center">
                                {{isset($item->class) ? $item->class : '-'}}
                            </td>
                            <td class="align-middle text-center">
                                {{$item->tourist_count}}
                            </td>
                            <td class="align-middle text-center">
                                Rs.{{$item->cost_person}}
                            </td>
                            <td class="align-middle text-center">
                                Rs.{{$item->total_cost}}
                            </td>
                            {{-- <td class="align-middle d-flex">
                                <button type="button" class="btn btn-default btn-sm add-row"><i class="fa fa-plus-circle"></i></button>
                                <button type="button" class="btn btn-default btn-sm ml-1 remove-row"><i class="fa fa-minus-circle"></i></button>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if (count($invoice->invoiceItems->filter(function($item) {
                    return $item->service_name == 'Hotel Booking';
                })) > 0)
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="bg-gradient-dark">
                            <th class="text-left"> Service </th>
                            <th class="text-center"> Date </th>
                            <th class="text-center"> Name </th>
                            <th class="text-center"> From </th>
                            <th class="text-center"> To </th>
                            <th class="text-center"> No. of Days </th>
                            <th class="text-center"> Tourist Count </th>
                            <th class="text-center"> Cost per Person </th>
                            <th class="text-center"> Total Cost </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice->invoiceItems->filter(function($item) {
                            return $item->service_name == 'Hotel Booking';
                        }) as $item)
                        <tr id='addr0'>
                            <td class="align-middle text-left">
                                {{$item->service_name}}
                            </td>
                            <td class="align-middle text-center">
                                {{date('d/m/Y', strtotime($item->date))}}
                            </td>
                            <td class="align-middle text-center">
                                {{$item->name}}
                            </td>
                            <td class="align-middle text-center">
                                {{date('d/m/Y', strtotime($item->from_dest))}}
                            </td>
                            <td class="align-middle text-center">
                                {{date('d/m/Y', strtotime($item->to_dest))}}
                            </td>
                            <td class="align-middle text-center">
                                {{$item->days}}
                            </td>
                            <td class="align-middle text-center">
                                {{$item->tourist_count}}
                            </td>
                            <td class="align-middle text-center">
                                Rs.{{$item->cost_person}}
                            </td>
                            <td class="align-middle text-center">
                                Rs.{{$item->total_cost}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>

            <table class="table table-bordered" style="overflow-x: auto;">
                <tbody>
                    <tr>
                        <td class="text-left text-sm">Visa</td>
                        <td class="text-left">{{isset($invoice->visa) ? $invoice->visa : '-'}}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-sm">Insurance</td>
                        <td class="text-left">{{isset($invoice->insurance) ? $invoice->insurance : '-'}}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-sm">Visa Appointment</td>
                        <td class="text-left">{{isset($invoice->visa_appointment) ? $invoice->visa_appointment : '-'}}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-sm">Swiss Pass</td>
                        <td class="text-left">{{isset($invoice->swiss_pass) ? $invoice->swiss_pass : '-'}}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-sm">Land Package</td>
                        <td class="text-left">{{isset($invoice->land_package) ? $invoice->land_package : '-'}}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-sm">Passport Services</td>
                        <td class="text-left">{{isset($invoice->passport_services) ? $invoice->passport_services : '-'}}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-sm font-weight-bold">Total</td>
                        <td class="text-left">Rs.{{$invoice->total}}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-sm font-weight-bold">Service Charges</td>
                        <td class="text-left">Rs.{{$invoice->service_charges}}</td>
                    </tr>
                    <tr>
                        <td class="text-left align-middle text-sm font-weight-bold d-flex justify-content-between border-0">
                            GST ({{$invoice->gst_per}}%)
                        </td>
                        <td class="text-left align-middle">Rs.{{$invoice->gst}}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-sm font-weight-bold">Grand Total</td>
                        <td class="text-left font-weight-bold">Rs.{{$invoice->grand_total}}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-sm font-weight-bold">In Word</td>
                        <td class="text-left font-weight-bold" id="">{{AmountInWords($invoice->grand_total)}}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-sm font-weight-bold">Payment Received</td>
                        <td class="text-left">Rs.{{$invoice->payment_received}}</td>
                    </tr>
                    <tr class="bg-light-orange">
                        <td class="text-left text-sm font-weight-bold">Balance</td>
                        <td class="text-left font-weight-bold">Rs.{{$invoice->balance}}</td>
                    </tr>
                    <tr class="bg-light-orange">
                        <td class="text-left text-sm font-weight-bold">In Word</td>
                        <td class="text-left font-weight-bold" id="">{{AmountInWords($invoice->balance)}}</td>
                    </tr>
                </tbody>
            </table>

            <hr />
            <table class="w-full">
                <tr>
                    <td class="w-half">
                        <strong>Bank Details:</strong>
                        <div>Bank: Kotak Mahindra Bank Ltd.</div>
                        <div>Name: Roving Steps Pvt. Ltd.</div>
                        <div>Account No: 7713096962</div>
                        <div>IFSC: KKBK0001770 (Bibwewadi Branch)</div>
                    </td>
                    <td class="w-half">
                        <strong>Contact Details:</strong>
                        <div>Address: Shop No. 31, Kundan Nagar Gosavi Building, Dhankawadi, Pune 43</div>
                        <div>Mobile: 8600031545</div>
                        <div>Email: info@rovingsteps.com</div>
                        <div>Website: www.rovingsteps.com</div>
                    </td>
                </tr>
            </table>
            <hr />
            <div style="text-align: left">
                <div><label>Note:</label></div>
                <span>{{isset($invoice->note) ? $invoice->note : '-'}}</span>
            </div>
        </div>
    </section>
</body>
</html>