<div class="row">
    <div class="col px-0">
        <div class="col-md-10">
            <label><b>Bill To:</b>@if(filter_var($invoice->bill_to, FILTER_VALIDATE_INT) == false) {{ $invoice->bill_to }} @else {{$invoice->customer->name}} @endif</label>
        </div>
        <div class="col-md-10">
            <label><b>Address:</b> {{ $invoice->customer->address ?? '-' }}</label>
        </div>
        <div class="col-md-10">
            <label><b>Contact No.:</b> {{ $invoice->customer->contact ?? '-' }} </label>
        </div>
        <div class="col-md-10">
            <label><b>Email:</b> {{ $invoice->customer->email ?? '-' }}</label>
        </div>
        <div class="col-md-10">
            <label><b>Invoice Date:</b> {{ date('d/m/Y', strtotime($invoice->invoice_date)) }} </label>
        </div>
        <div class="col-md-10">
            <label><b>Invoice For:</b> 
                @if(count($invoice->invoiceItems) > 0)
                @foreach($invoice->invoiceItems->unique('service_name')->groupBy('service_name') as $serviceNames)
                    @if(!$loop->first), @endif
                    @foreach($serviceNames as $serviceName)
                        {{ $serviceName->service_name }}
                    @endforeach
                @endforeach
                @else
                @if($invoice->invoice_for)
                @foreach($invoice->invoice_for as $row)
                {{ $row }}@if($loop->last) @else, @endif
                @endforeach
                @endif
                @endif
            </label>
        </div>
        @if($invoice->tour_id)
        <div class="col-md-10">
            <label><b>Tour:</b> {{ $invoice->tourName }} </label>
        </div>
        @endif
    </div>
    <hr />
    <div class="col">
        <div class="col-md-10">
            <label><b>Invoice Id:</b> {{ $invoice->id }} </label>
        </div>
        <div class="col-md-10">
            <label><b>Pan No.:</b> {{ $invoice->customer->pan_no ?? '-' }} </label>
        </div>
        <div class="col-md-10">
            <label><b>GST No.:</b> {{ $invoice->customer->gst_no ?? '-' }} </label>
        </div>
        <div class="col-md-10">
            <label><b>GST Address.:</b> {{ $invoice->customer->gst_address ?? '-' }} </label>
        </div>
        <div class="col-md-10">
            <label><b>Tourist Count:</b> {{ !empty($invoice->no_of_passengers) ? $invoice->no_of_passengers : '-' }} </label>
        </div>
        <div class="col-md-10">
            <label><b>Date:</b> {{ !empty($invoice->from_date) ? date('d/m/Y', strtotime($invoice->from_date)) : '-' }} - {{ !empty($invoice->to_date) ? date('d/m/Y', strtotime($invoice->to_date)) : '-' }} </label>
        </div>
    </div>
</div>