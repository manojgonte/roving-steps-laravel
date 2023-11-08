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

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ App\Models\Tour::count() }}</h3>
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
                                <p>Invoice in progress</p>
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
                                <p>Invoice sent</p>
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
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <input type="text" name="client name" class="form-control" placeholder="Search client name">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="Tour ID" class="form-control" placeholder="Search tour id">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="Tour name" class="form-control" placeholder="Search tour name">
                        </div>
                        <div class="form-group col-md-4">
                            <div class="form-group col-md-3">
                                <select class="form-control select2bs4" name="type">
                                    <option value="paid">PAID</option>
                                    <option value="not_paid">NOT PAID</option>
                                    <option value="partially_paid">PARTIALLY PAID</option>
                                    <option value="yet_to_send">YET TO SEND</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="invoicing-table">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                        <thead>
                            <tr>
                                <th>Invoice ID</th>
                                <th>Invoice to</th>
                                <th>Tour ID</th>
                                <th>Tour name</th>
                                <th>Tour date</th>
                                <th>Payment status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->bill_to }}</td>
                                    <td>{{ $row->tour_name }}</td>
                                    <td>{{ $row->tour_name }}</td>
                                    <td>{{ $row->tour_date }}</td>
                                    <td>
                                        @if ($row->grand_total == $row->amt_paid)
                                            PAID
                                        @elseif ($row->amt_paid > 0 && $row->amt_paid > $row->grand_total)
                                            PARTIALLY PAID
                                        @else
                                            UNPAID
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-default"
                                            href="{{ url('/admin/invoice-details/' . $row->id) }}"><i class="fa fa-info"
                                                aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-2 d-flex justify-content-center">
                        {{-- {{ $invoices->links('pagination::bootstrap-4') }} --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
