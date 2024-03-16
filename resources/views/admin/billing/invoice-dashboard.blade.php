@extends('layouts/adminLayout/admin_design')
@section('content')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <style>
        .table-labels {
            display: flex;
            justify-content: space-between;
            border: 1px solid black;
        }
    </style>
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

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>₹{{ number_format($outstanding_amt->sum('costing') - $outstanding_amt->sum('amount_paid'), 1) }}</h3>
                                <p>Outstanding</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-map"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ App\Models\Destination::count() }}</h3>
                                <p>Overdue</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-location"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ App\Models\Enquiry::count() }}</h3>
                                <p>Invoice in Progress</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-social-twitch"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ App\Models\TourEnquiry::count() }}</h3>
                                <p>Invoice Sent</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-6">
                        <span style="font-size: 20px; font-weight: 800;">Invoice list</span>
                    </div>
                    <div class="col-lg-6 col-6" style="text-align: right">
                        <a href="{{ url('/admin/create-invoice') }}" class="btn btn-dark"><i class="fa fa-file-alt"></i> Create invoice</a>
                    </div>
                </div>
            </div>
            <hr />

            {{-- Filters --}}
            <div class="card">
                <div class="card-header">
                    <form action="" method="GET">
                        <div class="row d-flex justify-content-start">
                            <div class="col-auto">
                                <input class="form-control" type="search" name="q" placeholder="Search by Client, Tour Name" value="@if(!empty(Request()->q)) {{Request()->q}} @endif">
                            </div>
                            <div class="col-auto">
                                <select name="gem_id" class="form-control" onchange="this.form.submit()">
                                    <option value="">Select Identification</option>
                                    <option value="paid">PAID</option>
                                    <option value="not_paid">NOT PAID</option>
                                    <option value="partially_paid">PARTIALLY PAID</option>
                                    <option value="yet_to_send">YET TO SEND</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-default"> Submit</button>
                            </div>
                            <div class="col-auto">
                                <a href="{{url('admin/invoice-dashboard')}}" class="btn btn-default"> Clear</a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body invoicing-table">
                    <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                        <thead>
                            <tr>
                                <th>Invoice ID</th>
                                <th>Bill To</th>
                                <th>Tour Name</th>
                                <th>Invoice Date</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $row)
                                <tr>
                                    <td><a href="{{ url('/admin/invoice-details/' . $row->id) }}"> {{ $row->id }}</a></td>
                                    <td>{{ $row->bill_to }}</td>
                                    <td>{{ $row->tourName ? Str::limit($row->tourName, 20) : 'NA' }}</td>
                                    <td>{{ date('d M Y', strtotime($row->invoice_date)) }}</td>
                                    <td>
                                        @if ($row->invoicePayments->sum('costing') == $row->invoicePayments->sum('amount_paid'))
                                            PAID
                                        @elseif ($row->invoicePayments->sum('amount_paid') > 0)
                                            PARTIALLY PAID
                                        @else
                                            UNPAID
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-default" href="{{ url('/admin/invoice-details/'.$row->id) }}"><i class="fa fa-info-circle"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-2 d-flex justify-content-center">
                        {{ $invoices->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
