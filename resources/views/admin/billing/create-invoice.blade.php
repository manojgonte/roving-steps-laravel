@extends('layouts/adminLayout/admin_design')
@section('content')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <style>

    </style>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Create invoice</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-6">
                        <span style="font-size: 20px; font-weight: 800;">Invoice </span>
                    </div>
                    {{-- <div class="col-lg-6 col-6" style="text-align: right">
                        <button type="button" class="btn btn-outline-dark">
                            <a href="{{ url('/admin/invoice-preview') }}">Preview</a>
                        </button>
                    </div> --}}
                </div>
            </div>

            {{-- Filters --}}
            <form method="POST" action="{{ route('createInvoice') }}" enctype="multipart/form-data" id="createInvoice">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="required">Bill To</label>
                            <input type="text" name="bill_to" class="form-control" placeholder="Enter bill to" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="required">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter your address" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="required">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="required">Contact No</label>
                            <input type="number" name="contact_no" class="form-control" placeholder="Enter your contact" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="required">Tour name</label>
                            <select name="tour_name" class="form-control" required>
                                <option value="">Select tour</option>
                                @foreach(App\Models\Tour::select('id','tour_name')->get() as $tour)
                                <option value="{{$tour->id}}">{{$tour->tour_name}}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" name="tour_name" class="form-control" placeholder="Enter tour name" required> --}}
                        </div>
                        <div class="form-group col-md-4">
                            <label class="required">Number of passengers</label>
                            <input type="number" name="no_of_passengers" class="form-control" placeholder="Enter No." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="required">Tour date</label>
                            <input type="date" name="tour_date" class="form-control" placeholder="Enter tour date" value="{{date('Y-m-d')}}" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="required">Invoice date</label>
                            <input type="date" name="invoice_date" class="form-control" placeholder="Enter invoice date" value="{{date('Y-m-d')}}" required>
                        </div>
                    </div>


                    {{-- <div class="d-none1" id="dynamicAddRemove">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label>Costing</label>
                                <input type="number" name="costing[]" class="form-control costing" placeholder="Enter costing" required>
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
                            <div class="form-group col-md-2 d-flex justify-content-center align-items-end">
                                <button id="add-btn" type="button" class="btn btn-outline-success"
                                    onclick='clickAddBtn()'><i class="fa fa-plus-circle"></i> Add
                                    Item</button>
                            </div>
                        </div>
                    </div>
                    <hr />

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Grand total</label>
                            <input type="number" name="grand_total" id="totalCosting" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Amount paid</label>
                            <input type="number" name="amt_paid" id="totalAmountPaid" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Balance</label>
                            <input type="number" name="balance" id="balance" class="form-control" disabled>
                        </div>
                    </div> --}}





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



                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary font-weight-bold submit"><i class="fa fa-check-circle"></i>
                        SAVE </button>
                    <button type="reset" class="btn btn-light"> <i class="fa fa-refresh"></i>
                        RESET </button>
                </div>
            </form>
        </section>
    </div>
@endsection

<script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script>

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

{{-- form validations --}}
<script>
    $(document).ready(function() {
        $('#createInvoice').validate({
            ignore: [],
            debug: false,
            rules: {
                tour_name: {
                    required: true,
                    maxlength:120,
                },
                email: {
                    required: true,
                    email: true,
                },
                contact_no: {
                    required: true,
                    number:true,
                    maxlength:10,
                    minlength:10,
                },
                no_of_passengers: {
                    required: true,
                    number:true,
                    minlength:1,
                },
                'costing[]': {
                    required: true,
                    number:true,
                },
                'mode_of_payment[]': {
                    required: true,
                },
                'amount_paid[]': {
                    required: true,
                    number:true,
                },
                'details[]': {
                    required: true,
                },
                image: {
                    required: true,
                    accept: 'png|jpg|jpeg|webp',
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
