<div class="row">
    <div class="col px-0">
        <div class="col-md-10">
            <label><b>Bill To:</b>@if(filter_var($invoice->bill_to, FILTER_VALIDATE_INT) == false) {{ $invoice->bill_to }} @else {{getUser($invoice->bill_to)->name}} @endif</label>
        </div>
        <div class="col-md-10">
            <label><b>Address:</b> {{ !empty($invoice->address) ? $invoice->address : '-' }}</label>
        </div>
        <div class="col-md-10">
            <label><b>Contact No.:</b> {{ !empty($invoice->contact_no) ? $invoice->contact_no : '-' }} </label>
        </div>
        <div class="col-md-10">
            <label><b>Email:</b> {{ !empty($invoice->email) ? $invoice->email : '-' }}</label>
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
            <label><b>Pan No.:</b> {{ !empty($invoice->pan_no) ? $invoice->pan_no : '-' }} </label>
        </div>
        <div class="col-md-10">
            <label><b>GST No.:</b> {{ !empty($invoice->gst_no) ? $invoice->gst_no : '-' }} </label>
        </div>
        <div class="col-md-10">
            <label><b>GST Address.:</b> {{ !empty($invoice->gst_address) ? $invoice->gst_address : '-' }} </label>
        </div>
        <div class="col-md-10">
            <label><b>Tourist Count:</b> {{ !empty($invoice->no_of_passengers) ? $invoice->no_of_passengers : '-' }} </label>
        </div>
        <div class="col-md-10">
            <label><b>Date:</b> {{ !empty($invoice->from_date) ? date('d/m/Y', strtotime($invoice->from_date)) : '-' }} - {{ !empty($invoice->to_date) ? date('d/m/Y', strtotime($invoice->to_date)) : '-' }} </label>
        </div>
    </div>
</div>