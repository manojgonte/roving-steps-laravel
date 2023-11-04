@extends('layouts/adminLayout/admin_design')
@section('content')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <style>
        .label-styling {
            font-size: 18px;
            font-weight: bold;
        }
    </style>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Invoice & Billing preview</h1>
                    </div>
                </div>
            </div>
        </div>

        <section>
            <div class="container">
                <div class="row">
                    <div class="form-group col-md-3 ">
                        <label class="label-styling">Bill to:</label>
                        <br /> Ishwar Sathe
                    </div>
                    <div class="form-group col-md-3">
                        <label class="label-styling">Address:</label>
                        <br /> Kothrud, hvvjhac, wdbabdasubcjkcbdkc sdichsd, jhvvashjcbjasbc,
                    </div>
                    <div class="form-group col-md-3">
                        <label class="label-styling">Email:</label>
                        <br /> Ishwarsathe67@gmail.com
                    </div>
                    <div class="form-group col-md-3">
                        <label class="label-styling">Contact No.:</label>
                        <br /> 88667799000
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="label-styling">Tour name:</label>
                        <br />
                    </div>
                    <div class="form-group col-md-3">
                        <label class="label-styling">Number of passengers</label>
                        <br />
                    </div>
                    <div class="form-group col-md-3">
                        <label class="label-styling">Start date</label>
                        <br />
                    </div>
                    <div class="form-group col-md-3">
                        <label class="label-styling">End date</label>
                        <br />
                    </div>
                </div>
            </div>
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
                                <th>Service given</th>
                                <th>details</th>
                                <th>costing</th>
                                <th>Amount paid</th>
                                <th>Mode of payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($associates as $row)
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
                            @endforeach --}}
                        </tbody>
                    </table>
                    <div class="mt-2 d-flex justify-content-center">
                        {{-- {{ $associates->links('pagination::bootstrap-4') }} --}}
                    </div>

                    {{-- Pricing end --}}
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div>Grand total</div>
                            <div>95000 /-</div>
                        </div>
                        <hr />
                        <div class="row d-flex justify-content-between">
                            <div>Amount paid</div>
                            <div>70000 /-</div>
                        </div>
                        <hr />
                        <div class="row d-flex justify-content-between">
                            <div>Balance</div>
                            <div>25000 /-</div>
                        </div>
                        <hr />
                        <div class="row d-flex justify-content-between">
                            <div>In word</div>
                            <div>Tweny Five Thousand Rupees Only/-</div>
                        </div>
                        <hr />
                    </div>

                    <div class="container">
                        <span>Note: </span>
                        <ol>
                            <li>Payment instruction 1</li>
                            <li>Payment instruction 2</li>
                            <li>Payment instruction 3</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
