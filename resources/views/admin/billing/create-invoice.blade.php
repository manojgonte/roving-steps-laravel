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
                        <button type="button" class="btn btn-outline-danger">
                            <a href="{{ url('/admin/create-invoice') }}">Cancel</a>
                        </button>
                        <button type="button" class="btn btn-outline-info">
                            <a href="{{ url('/admin/create-invoice') }}">Reset</a>
                        </button>
                        <button type="button" class="btn btn-outline-dark">
                            <a href="{{ url('/admin/invoice-preview') }}">Preview</a>
                        </button>
                        <button type="button" class="btn btn-outline-success">
                            <a href="{{ url('/admin/create-invoice') }}">Save</a>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Filters --}}
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="required">Bill To</label>
                            <input type="text" name="bill_to" class="form-control" placeholder="Enter bill to Name"
                                required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="required">Address</label>
                            <input type="text" name="Address" class="form-control" placeholder="Enter your address">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="required">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter your email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="required">Contact No</label>
                            <input type="text" name="contact_no" class="form-control" placeholder="Enter your contact">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="required">Tour name</label>
                            <input type="text" name="tour_name" class="form-control" placeholder="Enter tour name"
                                required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="required">Number of passengers</label>
                            <input type="text" name="no_of_passengers" class="form-control" placeholder="Enter No."
                                required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="required">Tour date</label>
                            <input type="text" name="tour_date" class="form-control" placeholder="Enter tour date"
                                required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="required">Invoice date</label>
                            <input type="text" name="tinvoice_date" class="form-control"
                                placeholder="Enter invoice date">
                        </div>
                    </div>
                    <hr />
                </div>
                <div class="container">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Costing</label>
                            <input type="text" name="costing" class="form-control" placeholder="Enter costing" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Amount paid</label>
                            <input type="text" name="amt_paid" class="form-control" placeholder="Enter amount paid">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Mode of payment</label>
                            <select class="form-control select2bs4" name="type">
                                <option value="paid">-</option>
                                <option value="cash">CASH</option>
                                <option value="cheque">CHEQUE</option>
                                <option value="bank_transfer">BANK TRANSFER</option>
                                <option value="upi">UPI</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Details</label>
                            <input type="text" name="bill_to" class="form-control" placeholder="Enter details">
                        </div>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-outline-dark">+ Add Item</button>
                    </div>
                    <hr />
                </div>
                <div class="container">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Grand total</label>
                            <input type="text" name="grand_total" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Amount paid</label>
                            <input type="text" name="amt_paid" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Balance</label>
                            <input type="text" name="balance" class="form-control">
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
            </section>
        </section>
    </div>
@endsection
