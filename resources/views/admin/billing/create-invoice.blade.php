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
                        <h4 class="m-0 text-dark">Create Invoice</h4>
                        <hr class="mb-0">
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <form method="POST" action="{{ route('createInvoice') }}" enctype="multipart/form-data" id="createInvoice">@csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="required">Invoice date</label>
                            <input type="date" name="invoice_date" class="form-control" placeholder="Enter invoice date" value="{{date('Y-m-d')}}" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="required">Bill To</label>
                            @php
                                $users = App\Models\User::select('id','name','contact','email','address','pan_no','gst_no','gst_address')->orderBy('name','ASC')->get();
                            @endphp
                            {{-- <input type="text" name="bill_to" class="form-control" placeholder="Enter bill to" required> --}}
                            <select class="form-control select2bs4" name="bill_to" id="user_id" required>
                                <option value="" selected>Select One</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            <a href="#" id="updateUser" class="mt-1" style="display:none;" target="_blank">Update User</a>
                        </div>
                        <div class="form-group col-md-5">
                            <label class="">Address</label>
                            <input type="text" name="address" class="form-control" id="address" readonly disabled placeholder="Enter address" >
                        </div>
                        <div class="form-group col-md-3">
                            <label class=>Email</label>
                            <input type="email" name="email" class="form-control" id="email" readonly disabled placeholder="Enter email">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="">Contact Number</label>
                            <input type="number" name="contact_no" class="form-control" id="contact" readonly disabled placeholder="Enter contact number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="">PAN Number</label>
                            <input type="text" name="pan_no" class="form-control" id="pan_no" readonly disabled placeholder="Pan Number" >
                        </div>
                        <div class="form-group col-md-3">
                            <label class="">GST Number</label>
                            <input type="text" name="gst_no" class="form-control" id="gst_no" readonly disabled placeholder="GST Number">
                        </div>
                        <div class="form-group col-md-5">
                            <label class="">GST Address</label>
                            <input type="text" name="gst_address" class="form-control" id="gst_address" readonly disabled placeholder="GST Address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-1">
                            <label class="">Invoice For</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="tour" name="isTour" value="1" onclick="toggleTourNameField()">
                                <label class="form-check-label" for="tour">Tour</label>
                            </div>
                        </div>
                        <div class="form-group col-md-2" id="tourList" style="display: none;">
                            <label class="required">Tour Name</label>
                            <select name="tour_name" class="form-control" id="tourNameSelect">
                                <option value="">Select tour</option>
                                @foreach(App\Models\Tour::select('id','tour_name','days','nights')->orderBy('tour_name','ASC')->get() as $tour)
                                <option value="{{$tour->id}}">{{$tour->tour_name}} | {{$tour->nights}}N/{{$tour->days}}D</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="required">Services</label>
                            <select name="invoice_for[]" class="form-control sumoselect" multiple required>
                                <option value="Hotel Booking">Hotel Booking</option>
                                <option value="Bus Booking">Bus Booking</option>
                                <option value="Flight Booking">Flight Booking</option>
                                <option value="Train Booking">Train Booking</option>
                                <option value="Cab Booking">Cab Booking</option>
                                <option value="Cruise Booking">Cruise Booking</option>
                                <option value="Visa Service">Visa Service</option>
                                <option value="Passport Service">Passport Service</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="">Tourist Count</label>
                            <input type="number" name="no_of_passengers" class="form-control" min="1" placeholder="Total tourist count" >
                        </div>
                        <div class="form-group col-md-2">
                            <label class="">From Date</label>
                            <input type="date" name="from_date" id="from_date" class="form-control" placeholder="Enter from date" value="" >
                        </div>
                        <div class="form-group col-md-2">
                            <label class="">To Date</label>
                            <input type="date" name="to_date" class="form-control" placeholder="Enter to date" value="" >
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark font-weight-bold submit"><i class="fa fa-check-circle"></i> Save & Next </button>
                        <button type="reset" class="btn btn-light"> <i class="fa fa-refresh"></i> Reset </button>
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
                return new Date(end_date_value) >= new Date(from_date_value);
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
                bill_to: {
                    required: true,
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
                'invoice_for[]': {
                    required: true,
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

<script>
    $(document).ready(function () {
        const userData = @json($users->keyBy('id'));

        const $userSelect = $('#user_id');
        const $contactInput = $('#contact');
        const $emailInput = $('#email');
        const $addressInput = $('#address');
        const $pan_noInput = $('#pan_no');
        const $gst_noInput = $('#gst_no');
        const $gst_addressInput = $('#gst_address');
        const $updateLink = $('#updateUser');

        function updateFieldsAndLink(userId) {
            const user = userData[userId];

            if (user) {
                $contactInput.val(user.contact ?? '');
                $emailInput.val(user.email ?? '');
                $addressInput.val(user.address ?? '');
                $pan_noInput.val(user.pan_no ?? '');
                $gst_noInput.val(user.gst_no ?? '');
                $gst_addressInput.val(user.gst_address ?? '');
                $updateLink.attr('href', `/admin/edit-user/${userId}`).show();
            } else {
                $contactInput.val('');
                $emailInput.val('');
                $$addressInput.val('');
                $$pan_noInput.val('');
                $$gst_noInput.val('');
                $$gst_addressInput.val('');
                $updateLink.hide();
            }
        }

        // On change
        $userSelect.on('change', function () {
            updateFieldsAndLink($(this).val());
        });

        // On page load (if already selected)
        if ($userSelect.val()) {
            updateFieldsAndLink($userSelect.val());
        } else {
            $updateLink.hide(); // Hide link by default
        }
    });
</script>

@endsection('scripts')