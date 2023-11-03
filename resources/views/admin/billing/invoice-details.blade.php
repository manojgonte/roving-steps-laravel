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
            Invoice details

            Invoice number:
            Invoice date:
            Tour ID:
            Tour name:
            Tour date:

            Address:
            Email:
            contact number:

            Number of passengers:

        </section>
        <section class="invoice-list">
            <div class="labels"></div>
            {{-- Filters --}}
            <div class="filters"></div>
            <div class="invoicing-table">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                        <thead>
                            <tr>
                                <th>Invoice ID</th>
                                <th>Payment status</th>
                                <th>details</th>
                                <th>costing</th>
                                <th>paid</th>
                                <th>Mode of payment</th>
                                <th>Grand total</th>
                                <th>Balance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($associates as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>{{ $row->details }}</td>
                                    <td>{{ $row->costing }}</td>
                                    <td>{{ $row->amtPaid }}</td>
                                    <td>{{ $row->paymentMode }}</td>
                                    <td>{{ $row->grandTotal }}</td>
                                    <td>{{ $row->balance }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>
                                        <a class="btn btn-default" href="{{ url('/admin/edit-associate/' . $row->id) }}"><i
                                                class="fa fa-edit" style="color: #000;"></i></a> &nbsp;
                                        <a class="btn btn-default" onclick="return confirm('Are you sure?')"
                                            href="{{ url('/admin/delete-associate/' . $row->id) }}"><i
                                                class="fa fa-trash"></i></a> &nbsp;
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-2 d-flex justify-content-center">
                        {{ $associates->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
