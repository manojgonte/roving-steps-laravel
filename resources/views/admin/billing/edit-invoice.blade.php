@extends('layouts/adminLayout/admin_design')
@section('content')

@section('styles')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('backend_css/sumoselect.css')}}">
    <style>
        .SumoSelect>.CaptionCont>span.placeholder {
            color: #495057 !important;
        }
    </style>
@endsection('styles')

    <div class="content-wrapper">
        <div class="content-header pb-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="m-0 text-dark">Update Invoice</h4>
                        <hr class="mb-0">
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            @if(Session::has('flash_message_error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
            @endif
            @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
            @endif
            <form method="POST" action="" enctype="multipart/form-data" id="createInvoice" class="card">@csrf
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="javascript:void">Basic</a></li>
                        <li class="nav-item"><a class="nav-link border ml-1" href="{{url('admin/edit-invoice-details/'.Request()->id)}}">Details</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="required">Invoice date</label>
                            <input type="date" name="invoice_date" class="form-control" placeholder="Enter invoice date" value="{{$invoice->invoice_date}}" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="required">Bill To</label>
                            <input type="text" name="bill_to" class="form-control" placeholder="Enter bill to" required value="{{$invoice->bill_to}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter address"  value="{{$invoice->address}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label class=>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{$invoice->email}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="">Contact Number</label>
                            <input type="number" name="contact_no" class="form-control" placeholder="Enter contact number"  value="{{$invoice->contact_no}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="">Pan Number</label>
                            <input type="text" name="pan_no" class="form-control" placeholder="Pan Number"  value="{{$invoice->pan_no}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="">GST Number</label>
                            <input type="text" name="gst_no" class="form-control" placeholder="GST Number" value="{{$invoice->gst_no}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="">GST Address</label>
                            <input type="text" name="gst_address" class="form-control" placeholder="GST Address" value="{{$invoice->gst_address}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-1">
                            <label class="">Invoice For</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="tour" name="isTour" value="1" onclick="toggleTourNameField()" @if(!empty($invoice->tour_name)) checked @endif>
                                <label class="form-check-label" for="tour">Tour</label>
                            </div>
                        </div>
                        
                        <div class="form-group col-md-2" id="tourList" @if(!empty($invoice->tour_name)) style="display: block;" @else style="display: none;" @endif>
                            <label class="required">Tour Name</label>
                            <select name="tour_name" class="form-control" id="tourNameSelect">
                                <option value="">Select tour</option>
                                @foreach(App\Models\Tour::select('id','tour_name')->get() as $tour)
                                <option value="{{$tour->id}}" @if($tour->id == $invoice->tour_id) selected @endif>{{$tour->tour_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        @php 
                            $bookings = ["Hotel Booking","Bus Booking","Flight Booking","Train Booking","Cab Booking","Cruise Booking","Visa Service","Passport Service"];
                        @endphp
                        <div class="form-group col-md-2 d-none">
                            <label class="required">Services</label>
                            <select name="invoice_for[]" class="form-control sumoselect" multiple @if(count($invoice->invoice_for) == 0) required @endif>
                                @foreach($bookings as $booking)
                                <option value="{{$booking}}" @if(in_array($booking, $invoice->invoice_for)) selected @endif @if(count($invoice->invoiceItems) > 0) disabled @endif>{{$booking}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="">Tourist Count</label>
                            <input type="number" name="no_of_passengers" class="form-control" min="1" placeholder="Total tourist count" value="{{$invoice->no_of_passengers}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="">From Date</label>
                            <input type="date" name="from_date" id="from_date" class="form-control" placeholder="Enter from date" value="{{$invoice->from_date}}">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="">To Date</label>
                            <input type="date" name="to_date" class="form-control" placeholder="Enter to date" value="{{$invoice->to_date}}" >
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark font-weight-bold submit"><i class="fa fa-check-circle"></i> Update </button>
                        <a href="{{url('/admin/invoice-billing')}}" class="btn btn-light"> <i class="fa fa-refresh"></i> Cancel </a>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection

@section('scripts')
<script src="{{asset('backend_js/jquery.sumoselect.js')}}"></script>

<script>
    function toggleTourNameField() {
        var tourlist = document.getElementById('tourList');
        var isCustomCheckbox = document.getElementById('tour');
        var tourNameSelect = document.getElementById('tourNameSelect');

        if (isCustomCheckbox.checked) {
            tourlist.style.display = 'block';
            tourNameSelect.setAttribute('required', 'required');
        } else {
            tourlist.style.display = 'none';
            tourNameSelect.removeAttribute('required');
        }
    }
</script>

{{-- form validations --}}
<script>
    $(document).ready(function() {
        $.validator.addMethod("greaterThan", function (value, element, params) {
            var from_date_value = $(params).val();
            var end_date_value = value;
            if (!from_date_value && !end_date_value) {
                return true;
            }
            if (from_date_value && end_date_value) {
                return new Date(end_date_value) > new Date(from_date_value);
            }
            return false;
        }, "To Date must be greater than From Date.");
        $.validator.addMethod("panCard", function(value, element) {
            var panCardRegex = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
            return this.optional(element) || panCardRegex.test(value);
        }, "Please enter a valid PAN card number");
        $('#createInvoice').validate({
            ignore: [],
            debug: false,
            rules: {
                email: {
                    email: true,
                },
                contact_no: {
                    required: false,
                    number:true,
                    maxlength:10,
                    minlength:10,
                },
                pan_no: {
                    required: false,
                    maxlength:10,
                    minlength:10,
                    panCard: true,
                },
                gst_no: {
                    required: false,
                    maxlength:15,
                    minlength:15,
                },
                gst_address: {
                    required: false
                },
                no_of_passengers: {
                    required: false,
                    number:true,
                    min:1,
                },
                from_date: {
                    required: false,
                },
                to_date: {
                    required: false,
                    greaterThan: "#from_date"
                },         
            },
            messages: {},
            submitHandler: function(form) {
                $(".submit").attr("disabled", true);
                $(".submit").html("<span class='fa fa-spinner fa-spin'></span> Please wait...");
                form.submit();
            }
        });
    });
</script>

<script>
    $((function(){
        window.asd=$(".SlectBox").SumoSelect({csvDispCount:3,selectAll:!0,captionFormatAllSelected:"Yeah, OK, so everything."}),window.Search=$(".search-box").SumoSelect({csvDispCount:3,search:!0,searchText:"Enter here."}),window.sb=$(".SlectBox-grp-src").SumoSelect({csvDispCount:3,search:!0,searchText:"Enter here.",selectAll:!0}),$(".sumoselect").SumoSelect({placeholder: 'Select'}),$(".selectsum1").SumoSelect({okCancelInMulti:!0,selectAll:!0}),$(".selectsum2").SumoSelect({selectAll:!0})}));
</script>

@endsection('scripts')