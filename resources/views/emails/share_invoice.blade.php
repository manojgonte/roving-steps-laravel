<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice: {{$invoice->bill_to}}</title>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Roboto+Mono:ital@1&family=Roboto+Serif:opsz@8..144&family=Roboto+Slab&display=swap" rel="stylesheet"> --}}
    <style>
        body {
            margin: 0;
            font-size: 0.65rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
            /*font-family: 'Poppins', sans-serif;*/
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
            font-size: .65rem !important;
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
            font-size: 0.7rem;
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
            background: #E1E4FF !important;
            color: #000 !important;
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
            font-size: .75rem;
            line-height: 1.5;
            border-radius: 0.2rem;
        }
        .form-control {
            display: block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 0.7rem;
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
        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1cm;

            /** Extra personal styles **/
            /* background-color: #eaeaea; */
            color: black;
            text-align: center;
            /* line-height: 1.5cm; */
        }

        footer .pagenum:before {
            content: counter(page);
        }
    </style>
</head>
<body>
    <section>
        <div class="mt-auto">
            <div class="text-left" style="margin-bottom: 10px;">
                <img style="margin-bottom: 2px" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/logo/logo_trans.png'))) }}" height="50">
                <h1 style="margin-bottom: 2px">{{config('app.name')}} Pvt. Ltd.</h1>
                <h3 style="margin-top: 2px">PAN No.: AAJCR8494B | GST No.: 27AAJCR8494B1Z0</h3>
            </div>
            <hr/>
            <table class="w-full">
                <tr>
                    <td class="w-half">
                        <div><label><b>Bill To:</b> @if(filter_var($invoice->bill_to, FILTER_VALIDATE_INT) == false) {{ $invoice->bill_to }} @else {{$invoice->customer->name}} @endif</label></div>
                        <div><label><b>Address:</b> {{ $invoice->customer->address ?? '-' }}</label></div>
                        <div><label><b>Contact No.:</b> {{ $invoice->customer->contact ?? '-' }}</label></div>
                        <div><label><b>Email:</b> {{ $invoice->customer->email ?? '-' }}</label></div>
                        <div><label><b>Invoice Date:</b> {{ date('d/m/Y', strtotime($invoice->invoice_date)) }} </label></div>
                        <div>
                            <label><b>Invoice For:</b> 
                            @if(count($invoice->invoiceItems) > 0)
                            @foreach($invoice->invoiceItems->unique('service_name')->groupBy('service_name') as $serviceNames)
                                @if(!$loop->first), @endif
                                @foreach($serviceNames as $serviceName)
                                    {{ $serviceName->service_name }}
                                @endforeach
                            @endforeach
                            @else
                            @foreach($invoice->invoice_for as $row)
                            {{ $row }}@if($loop->last) @else, @endif
                            @endforeach
                            @endif
                            </label>
                        </div>
                        @if($invoice->tour_id)
                            <div><label><b>Tour:</b> {{ $invoice->tourName }} </label></div>
                        @endif
                    </td>
                    <td class="w-half">
                        <div><label><b>Invoice Id:</b> {{ $invoice->id }} </label></div>
                        <div><label><b>Pan No.:</b> {{ $invoice->customer->pan_no ?? '-' }} </label></div>
                        <div><label><b>GST No.:</b> {{ $invoice->customer->gst_no ?? '-' }} </label></div>
                        <div><label><b>GST Address.:</b> {{ $invoice->customer->gst_address ?? '-' }} </label></div>
                        <div><label><b>Tourist Count:</b> {{ !empty($invoice->no_of_passengers) ? $invoice->no_of_passengers : '-' }} </label></div>
                        <div><label><b>Date:</b> {{ !empty($invoice->from_date) ? date('d/m/Y', strtotime($invoice->from_date)) : '-' }} - {{ !empty($invoice->to_date) ? date('d/m/Y', strtotime($invoice->to_date)) : '-' }} </label></div>
                    </td>
                </tr>
            </table>
            <hr />

            <div class="">
                <div class="font-weight-bold" style="font-size: 13px; margin-bottom: 8px">Payments</div>
                @if(count($invoice->invoiceItems) > 0)
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

                @if (count($invoice->invoiceItems->filter(function($item) {
                    return $item->service_name == 'Hotel Booking';
                })) > 0)
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="bg-gradient-dark">
                            <th class="text-left"> Service </th>
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
                        <tr>
                            <td class="align-middle text-left">
                                {{$item->service_name}}
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
                    {{-- @if(!empty($invoice->visa))
                    <tr>
                        <td class="text-left text-sm">Visa</td>
                        <td class="text-right">{{isset($invoice->visa) ? $invoice->visa : '-'}}</td>
                    </tr>
                    @endif --}}
                    @if(!empty($invoice->insurance))
                    <tr>
                        <td class="text-left text-sm">Insurance</td>
                        <td class="text-right">{{isset($invoice->insurance) ? $invoice->insurance : '-'}}</td>
                    </tr>
                    @endif
                    @if(!empty($invoice->visa_appointment))
                    <tr>
                        <td class="text-left text-sm">Visa Appointment</td>
                        <td class="text-right">{{isset($invoice->visa_appointment) ? $invoice->visa_appointment : '-'}}</td>
                    </tr>
                    @endif
                    @if(!empty($invoice->swiss_pass))
                    <tr>
                        <td class="text-left text-sm">Swiss Pass</td>
                        <td class="text-right">{{isset($invoice->swiss_pass) ? $invoice->swiss_pass : '-'}}</td>
                    </tr>
                    @endif
                    @if(!empty($invoice->land_package))
                    <tr>
                        <td class="text-left text-sm">Land Package</td>
                        <td class="text-right">{{isset($invoice->land_package) ? $invoice->land_package : '-'}}</td>
                    </tr>
                    @endif
                    @if(!empty($invoice->passport_services))
                    <tr>
                        <td class="text-left text-sm">Passport Services</td>
                        <td class="text-right">{{isset($invoice->passport_services) ? $invoice->passport_services : '-'}}</td>
                    </tr>
                    @endif
                    <tr>
                        <td class="text-left text-sm font-weight-bold">Total</td>
                        <td class="text-right">Rs.{{$invoice->total}}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-sm font-weight-bold">Service Charges</td>
                        <td class="text-right">Rs.{{$invoice->service_charges}}</td>
                    </tr>
                    <tr>
                        <td class="text-left align-middle text-sm font-weight-bold d-flex justify-content-between border-0">
                            GST ({{$invoice->gst_per}}%)
                        </td>
                        <td class="text-right align-middle">Rs.{{$invoice->gst}}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-sm font-weight-bold">Grand Total</td>
                        <td class="text-right font-weight-bold">Rs.{{number_format($invoice->grand_total, 1)}}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-sm font-weight-bold">In Word</td>
                        <td class="text-right font-weight-bold" id="">{{ ($invoice->grand_total != null || $invoice->grand_total != 0.0) ? AmountInWords($invoice->grand_total) : '-'}}</td>
                    </tr>
                    @if($invoice->estimation != 1)
                    <tr>
                        <td class="text-left text-sm font-weight-bold">Payment Received</td>
                        <td class="text-right">Rs.{{$invoice->payment_received}}</td>
                    </tr>
                    <tr class="bg-light-orange">
                        <td class="text-left text-sm font-weight-bold">Balance</td>
                        <td class="text-right font-weight-bold">Rs.{{number_format($invoice->balance, 1)}}</td>
                    </tr>
                    <tr class="bg-light-orange">
                        <td class="text-left text-sm font-weight-bold">In Word</td>
                        <td class="text-right font-weight-bold" id="">{{ ($invoice->balance != null || $invoice->balance != 0.0) ? AmountInWords($invoice->balance) : '-'}}</td>
                    </tr>
                    @endif
                </tbody>
            </table>

            @if(count($invoice->invoicePayments) > 0)
            <div class="font-weight-bold" style="font-size: 13px; margin-bottom: 8px">Payment History</div>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="bg-gradient-dark">
                        <th class="text-left"> Date </th>
                        <th class="text-center"> Amount </th>
                        <th class="text-center"> Payment Mode </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice->invoicePayments->sortByDesc('payment_date') as $payment)
                    <tr>
                        <td class="align-middle text-left">
                            {{date('d/m/Y', strtotime($payment->payment_date))}}
                        </td>
                        <td class="align-middle text-center">
                            Rs.{{$payment->amount}}
                        </td>
                        <td class="align-middle text-center">
                            {{$payment->payment_mode}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

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
                <div><label>Note: <span>{{isset($invoice->note) ? $invoice->note : '-'}}</span></label></div>
                
            </div>
        </div>
    </section>
    <footer>
        <div class="pagenum-container">
            <div style="background: #2786BD; padding: 5px; border-radius: 5px; color: #fff !important;margin-top: 1cm">Call/WhatsApp: +91 8600031545 | Email: info@rovingsteps.com | Website: www.rovingsteps.com</div>
        </div>
    </footer>
</body>
</html>