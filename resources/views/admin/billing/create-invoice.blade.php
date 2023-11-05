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
                    <div class="col-lg-6 col-6" style="text-align: right">
                        <button type="button" class="btn btn-outline-dark">
                            <a href="{{ url('/admin/invoice-preview') }}">Preview</a>
                        </button>
                    </div>
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
                            <input type="text" name="address" class="form-control" placeholder="Enter your address">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="required">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter your email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="required">Contact No</label>
                            <input type="number" name="contact_no" class="form-control" placeholder="Enter your contact">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="required">Tour name</label>
                            <input type="text" name="tour_name" class="form-control" placeholder="Enter tour name"
                                required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="required">Number of passengers</label>
                            <input type="number" name="no_of_passengers" class="form-control" placeholder="Enter No."
                                required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="required">Tour date</label>
                            <input type="date" name="tour_date" class="form-control" placeholder="Enter tour date"
                                required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="required">Invoice date</label>
                            <input type="date" name="invoice_date" class="form-control" placeholder="Enter invoice date">
                        </div>
                    </div>
                    <hr />
                </div>
                <div class="card-body">
                    <div class="row">
                        <h3>Payments </h3>
                    </div>
                    <div id="dynamicAddRemove">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label>Costing</label>
                                <input type="number" name="costing[]" class="form-control" placeholder="Enter costing"
                                    required>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Amount paid</label>
                                <input type="number" name="amount_paid[]" class="form-control"
                                    placeholder="Enter amount paid">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Mode of payment</label>
                                <select class="form-control select2bs4" name="mode_of_payment[]">
                                    <option value="paid">-</option>
                                    <option value="cash">CASH</option>
                                    <option value="cheque">CHEQUE</option>
                                    <option value="bank_transfer">BANK TRANSFER</option>
                                    <option value="upi">UPI</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Details</label>
                                <input type="text" name="details[]" class="form-control" placeholder="Enter details">
                            </div>
                            <div class="form-group col-md-2 d-flex justify-content-center align-items-end">
                                <button id="add-btn" type="button" class="btn btn-outline-success"
                                    onclick='clickAddBtn()'><i class="fa fa-plus-circle"></i> Add
                                    Item</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <hr />
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Grand total</label>
                            <input type="number" name="grand_total" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Amount paid</label>
                            <input type="number" name="amt_paid" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Balance</label>
                            <input type="number" name="balance" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Amount in words</label>
                            <input type="text" name="amt_in_words" class="form-control">
                        </div>
                    </div>
                    <hr />
                </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-warning text-white submit"><i class="fa fa-check-circle"></i>
                        SAVE </button>
                    <button type="reset" class="btn btn-default"> <i class="fa fa-refresh"></i>
                        RESET </button>
                    <button type="cancel" class="btn btn-danger"><i class="fa fa-times"></i> CANCEL </button>
                </div>
            </form>
        </section>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
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
                                <input type="number" name="costing[]" class="form-control" placeholder="Enter costing"
                                    required>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Amount paid</label>
                                <input type="number" name="amt_paid[]" class="form-control" placeholder="Enter amount paid">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Mode of payment</label>
                                <select class="form-control select2bs4" name="mode_of_payment[]">
                                    <option value="paid">-</option>
                                    <option value="cash">CASH</option>
                                    <option value="cheque">CHEQUE</option>
                                    <option value="bank_transfer">BANK TRANSFER</option>
                                    <option value="upi">UPI</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Details</label>
                                <input type="text" name="details[]" class="form-control" placeholder="Enter details">
                            </div>
                            <div class="form-group col-md-2 d-flex justify-content-center align-items-end remove">
                                <button id="add-btn" type="button" class="btn btn-outline-danger"><i
                                        class="fa fa-trash"></i> Remove</button>
                            </div>
                        </div>
                    </div>
                `);
    };

    $(document).on('click', '.remove', function() {
        $(this).closest('.new-row').remove();
    });
</script>
