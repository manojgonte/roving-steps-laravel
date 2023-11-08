@extends('layouts/adminLayout/admin_design')
@section('content')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Invoice & Billing</h1>
                    </div>
                </div>
            </div>
        </div>

        <section>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Invoice details for invoice ID : {{ $invoice_details->id }}</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="row d-flex flex-row-reverse">
                            <div>
                                <button type="button" class="btn btn-danger">
                                    <a href="{{ url('/admin/delete-invoice/' . $invoice_details->id) }}">Delete invoice</a>
                                </button>
                            </div>
                            <div class="mr-2">
                                <button type="button" class="btn btn-success">Print invoice</button>
                            </div>
                            <div class="mr-2">
                                <button type="button" class="btn btn-warning">
                                    <a href="{{ url('/admin/edit-invoice/' . $invoice_details->id) }}">Edit invoice</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        {{-- <div class="col-md-6 mb-2">
                            <label>Tour Id: </label>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Tour name: </label>
                        </div> --}}
                        <div class="col-md-6 mb-2">
                            <label>Custmer address: {{ $invoice_details->Address }}</label>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Email: {{ $invoice_details->email }}</label>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Contact number: {{ $invoice_details->contact_no }} </label>
                        </div>
                    </div>
                    <hr />
                    <div class="col">
                        <div class="col-md-6 mb-2">
                            <label>Invoice date: {{ $invoice_details->invoice_date }} </label>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Number of passengers: {{ $invoice_details->no_of_passengers }} </label>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-3">
                        <label class="font-weight-bold">Total costing:
                        </label>&nbsp;&nbsp;{{ $invoice_details->grand_total }}
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">Pending amount / balance:
                        </label>&nbsp;&nbsp;{{ $invoice_details->balance }}
                    </div>
                    <div class="col-md-3">
                        <label class="font-weight-bold">Payment paid: </label> &nbsp;&nbsp;{{ $invoice_details->amt_paid }}
                    </div>
                </div>
                <hr />
            </div>
        </section>

        <section class="invoice-list">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                    <thead>
                        <tr>
                            <th>Paymnet ID</th>
                            <th>details</th>
                            <th>costing</th>
                            <th>paid</th>
                            <th>Balance</th>
                            <th>Mode of payment</th>
                            <th>Bill creation date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $row)
                            <tr>
                                <td>{{ $row->payment_id }}</td>
                                <td>{{ $row->details }}</td>
                                <td>{{ $row->costing }}</td>
                                <td>{{ $row->amtPaid }}</td>
                                <td>{{ $row->balance }}</td>
                                <td>{{ $row->mode_of_payment }}</td>
                                <td>{{ $row->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2 d-flex justify-content-center">
                    {{-- {{ $associates->links('pagination::bootstrap-4') }} --}}
                </div>
            </div>
        </section>
    </div>
@endsection
