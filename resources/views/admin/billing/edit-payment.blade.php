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
                        <h1 class="m-0 text-dark">Update pyament</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">

            {{-- Filters --}}
            <form method="POST" action="{{ url('admin/edit-invoice' . $payment->id) }}"
                enctype="multipart/form-data" id="editInvoice">
                @csrf
                <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        <h3>Payments </h3>
                    </div>
                    <div id="dynamicAddRemove">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label>Costing</label>
                                <input type="number" name="costing[]" class="form-control" value="{{ $payment->costing }}" placeholder="Enter costing"
                                    required>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Amount paid</label>
                                <input type="number" name="amount_paid[]" value="{{ $payment->amount_paid }}" class="form-control"
                                    placeholder="Enter amount paid">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Mode of payment</label>
                                <select class="form-control select2bs4" name="mode_of_payment[]" value="{{ $payment->mode_of_payment }}">
                                    <option value="paid">-</option>
                                    <option value="cash">CASH</option>
                                    <option value="cheque">CHEQUE</option>
                                    <option value="bank_transfer">BANK TRANSFER</option>
                                    <option value="upi">UPI</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Details</label>
                                <input type="text" name="details[]" value="{{ $payment->details }}" class="form-control" placeholder="Enter details">
                            </div>
                        </div>
                    </div>
                    <hr />
                </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-warning text-white submit"><i class="fa fa-check-circle"></i>
                        SAVE </button>
                    <button type="reset" class="btn btn-danger"> <i class="fa fa-refresh"></i>
                        DELETE </button>
                    <button type="cancel" class="btn btn-default"><i class="fa fa-times"></i> CANCEL </button>
                </div>
            </form>
        </section>
    </div>
@endsection

