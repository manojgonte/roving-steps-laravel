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
                        <h1 class="m-0 text-dark">Create Invoice</h1>
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
                            <input type="text" name="bill_to" class="form-control" placeholder="Enter bill to" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="required">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter address" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label class=>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="required">Contact Number</label>
                            <input type="number" name="contact_no" class="form-control" placeholder="Enter contact number" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="required">Pan Number</label>
                            <input type="text" name="pan_no" class="form-control" placeholder="Pan Number" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="required">GST Number</label>
                            <input type="text" name="gst_no" class="form-control" placeholder="GST Number" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="required">GST Address</label>
                            <input type="text" name="gst_address" class="form-control" placeholder="GST Address" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-1">
                            <label class="required">Invoice For</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="tour" name="isTour" value="1" onclick="toggleTourNameField()">
                                <label class="form-check-label" for="tour">Tour</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3" id="tourList" style="display: none;">
                            <label class="required">Tour Name</label>
                            <select name="tour_name" class="form-control" id="tourNameSelect">
                                <option value="">Select tour</option>
                                @foreach(App\Models\Tour::select('id','tour_name')->get() as $tour)
                                <option value="{{$tour->id}}">{{$tour->tour_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="required">Invoice For</label>
                            <select name="invoice_for[]" class="form-control sumoselect" multiple required>
                                <option value="Hotel Booking">Hotel Booking</option>
                                <option value="Bus Booking">Bus Booking</option>
                                <option value="Flight Booking">Flight Booking</option>
                                <option value="Train Booking">Train Booking</option>
                                <option value="Cab Booking">Cab Booking</option>
                                <option value="Cruise Booking">Cruise Booking</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="required">Tourist Count</label>
                            <input type="number" name="no_of_passengers" class="form-control" min="1" placeholder="Total tourist count" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="required">From Date</label>
                            <input type="date" name="from_date" id="from_date" class="form-control" placeholder="Enter from date" value="{{date('Y-m-d')}}" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="required">To Date</label>
                            <input type="date" name="to_date" class="form-control" placeholder="Enter to date" value="" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark font-weight-bold submit"><i class="fa fa-check-circle"></i> SAVE </button>
                        <button type="reset" class="btn btn-light"> <i class="fa fa-refresh"></i> RESET </button>
                    </div>
                </form>


                {{-- billing --}}
                <!--<div class="d-none">
                    <div class="row clearfix mt-3">
                        <div class="col-md-12">
                            <h6>Payments</h6>
                            <table class="table table-hover" id="tab_logic">
                                <thead>
                                    <tr>
                                        <th class="text-left"> # </th>
                                        <th class="text-left"> Details </th>
                                        <th class="text-center"> Costing </th>
                                        <th class="text-center"> Amount Paid </th>
                                        <th class="text-center"> Mode of payment </th>
                                        <th class="text-center d-none"> Total </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id='addr0'>
                                        <td class="align-middle">1</td>
                                        <td>
                                            <input type="text" name='details[]' placeholder='Enter details' class="form-control" />
                                        </td>
                                        <td>
                                            <input type="number" name='costing[]' placeholder='Enter costing' class="form-control costing" step="0" min="0" />
                                        </td>
                                        <td>
                                            <input type="number" name='amount_paid[]' placeholder='Enter amount' class="form-control amount_paid" step="0.00" min="0" />
                                        </td>
                                        <td>
                                            <select class="form-control" name="mode_of_payment[]" required>
                                                <option value="">Select</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Bank Transfer">Bank Transfer</option>
                                                <option value="UPI">UPI</option>
                                            </select>
                                        </td>
                                        <td class="d-none">
                                            <input type="number" name='' placeholder='0.00' class="form-control total" readonly />
                                        </td>
                                    </tr>
                                    <tr id='addr1'></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row clearfix mb-3">
                        <div class="col-md-12">
                            <button type="button" id="add_row" class="btn btn-default pull-left">Add Item</button>
                            <button type="button" id='delete_row' class="pull-right btn btn-default">Delete Item</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Grand Total</label>
                            <input type="number" name="grand_total" id="totalCosting" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Amount Paid</label>
                            <input type="number" name="amt_paid" id="totalAmountPaid" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Balance Amount</label>
                            <input type="number" name="balance" id="balance" class="form-control" readonly>
                        </div>
                    </div>
                </div>-->
        </section>
    </div>

@endsection

@section('scripts')
<script src="{{asset('backend_js/jquery.sumoselect.js')}}"></script>

{{-- onclick add more set of fields and balance, costing & amount paid calculations --}}
<script>
    $(document).ready(function(){
        var i=1;
        $("#add_row").click(function(){b=i-1;
            $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
            $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
            i++; 
        });
        $("#delete_row").click(function(){
            if(i>1){
            $("#addr"+(i-1)).html('');
            i--;
            }
            calc();
        });
        
        $('#tab_logic tbody').on('keyup change',function(){
            calc();
        });
        $('#tax').on('keyup change',function(){
            calc_total();
        });
    });

    function calc() {
        $('#tab_logic tbody tr').each(function(i, element) {
            var html = $(this).html();
            if(html!='') {
                var costing = $(this).find('.costing').val();
                var amount_paid = $(this).find('.amount_paid').val();
                $(this).find('.total').val(costing - amount_paid);
                
                calc_total();
            }
        });
    }

    function calc_total() {
        total=0;
        $('.total').each(function() {
            total += parseInt($(this).val());
        });

        costing=0;
        $('.costing').each(function() {
            costing += parseInt($(this).val());
        });
        $('#totalCosting').val(costing.toFixed(2));

        amount_paid=0;
        $('.amount_paid').each(function() {
            amount_paid += parseInt($(this).val());
        });
        $('#totalAmountPaid').val(amount_paid.toFixed(2));

        $('#balance').val((costing-amount_paid).toFixed(2));
    }
</script>

{{-- onclick add more set of fields --}}
<script type="text/javascript">
    var i = 0;

    // alert("real button click");
    function clickAddBtn() {
        // ++i;
        $("#dynamicAddRemove").append(`
            <div class="new-row">
                <hr />
                <div class="row">
                    <div class="form-group col-md-2">
                        <label>Costing</label>
                        <input type="number" name="costing[]" class="form-control costing" placeholder="Enter costing"required>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Amount paid</label>
                        <input type="number" name="amount_paid[]" class="form-control amount_paid" placeholder="Enter amount paid" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Mode of payment</label>
                        <select class="form-control select2bs4" name="mode_of_payment[]" required>
                            <option value="">Select</option>
                            <option value="cash">CASH</option>
                            <option value="cheque">CHEQUE</option>
                            <option value="bank_transfer">BANK TRANSFER</option>
                            <option value="upi">UPI</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Details</label>
                        <input type="text" name="details[]" class="form-control" placeholder="Enter details" required>
                    </div>
                    <div class="form-group col-md-2 d-flex justify-content-center align-items-end remove">
                        <button id="add-btn" type="button" class="btn btn-outline-danger"><i
                                class="fa fa-trash"></i> Remove</button>
                    </div>
                </div>
            </div>
        `);
        calculateSum();
    };

    $(document).on('click', '.remove', function() {
        $(this).closest('.new-row').remove();
    });
</script>

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
            var from_date_value = new Date($(params).val());
            var end_date_value = new Date(value);
            return end_date_value > from_date_value;
        }, "To Date must be greater than From Date.");
        $('#createInvoice').validate({
            ignore: [],
            debug: false,
            rules: {
                email: {
                    email: true,
                },
                contact_no: {
                    required: true,
                    number:true,
                    maxlength:10,
                    minlength:10,
                },
                pan_card: {
                    required: true,
                    maxlength:10,
                    minlength:10,
                },
                gst_no: {
                    required: true,
                    maxlength:15,
                    minlength:15,
                },
                gst_address: {
                    required: true
                },
                no_of_passengers: {
                    required: true,
                    number:true,
                    min:1,
                },
                from_date: {
                    required: true,
                },
                to_date: {
                    required: true,
                    greaterThan: "#from_date"
                },
                'invoice_for[]': {
                    required: true,
                },
                // 'costing[]': {
                //     required: true,
                //     number:true,
                // },
                // 'mode_of_payment[]': {
                //     required: true,
                // },
                // 'amount_paid[]': {
                //     required: true,
                //     number:true,
                // },
                // 'details[]': {
                //     required: true,
                // },
                // image: {
                //     required: true,
                //     accept: 'png|jpg|jpeg|webp',
                // },                
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