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
        <div class="content-header pb-0">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Invoice & Billing</h4>
                    </div>
                </div>
            </div>
        </div>

        @if(Session::has('flash_message_error'))
        <div class="alert alert-danger alert-block mx-3">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('flash_message_error') !!}</strong>
        </div>
        @endif
        @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block mx-3">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('flash_message_success') !!}</strong>
        </div>
        @endif

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-gradient-danger">
                            <div class="inner">
                                <h3>₹{{number_format($invoices->sum('balance'), 1)}}</h3>
                                <p>Outstanding </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-rupee-sign"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-gradient-success">
                            <div class="inner">
                                <h3>₹{{number_format($invoices->sum('payment_received'), 1)}}</h3>
                                <p>Received </p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-rupee-sign"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-gradient-warning">
                            <div class="inner">
                                <h3>{{ App\Models\invoices::select('invoice_sent')->where('invoice_sent',0)->count() }}</h3>
                                <p>Invoice in Progress</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-spinner"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-gradient-olive">
                            <div class="inner">
                                <h3>{{ App\Models\invoices::select('invoice_sent')->where('invoice_sent',1)->count() }}</h3>
                                <p>Invoice Sent</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-6 align-self-end">
                        <h5>Invoice list ({{$invoices->total()}})</h5>
                    </div>
                    <div class="col-lg-6 col-6" style="text-align: right">
                        <a href="{{ url('/admin/create-invoice') }}" class="btn btn-dark"><i class="fa fa-file-alt"></i> Create Invoice</a>
                    </div>
                </div>
            </div>
            <hr class="my-2" />

            {{-- Filters --}}
            <div class="card">
                <div class="card-header">
                    <form action="" method="GET">
                        <div class="row d-flex justify-content-start">
                            <div class="col-auto">
                                <input class="form-control form-control-sm" type="search" name="q" placeholder="Search by Client, Tour Name" value="@if(!empty(Request()->q)) {{Request()->q}} @endif">
                            </div>
                            {{-- <div class="col-auto">
                                <select name="gem_id" class="form-control" onchange="this.form.submit()">
                                    <option value="">Select Identification</option>
                                    <option value="paid">PAID</option>
                                    <option value="not_paid">NOT PAID</option>
                                    <option value="partially_paid">PARTIALLY PAID</option>
                                    <option value="yet_to_send">YET TO SEND</option>
                                </select>
                            </div> --}}
                            <div class="col-auto">
                                <button type="submit" class="btn btn-default btn-sm"> Submit</button>
                            </div>
                            <div class="col-auto">
                                <a href="{{url('admin/invoice-dashboard')}}" class="btn btn-default btn-sm"> Clear</a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body invoicing-table p-0">
                    <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                        <thead>
                            <tr>
                                <th>Invoice ID</th>
                                <th>Bill To</th>
                                <th>Tour Name</th>
                                <th>Invoice Date</th>
                                <th>Total</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $row)
                                <tr>
                                    <td class="align-middle"><a class="btn btn-sm btn-link" href="{{ url('/admin/invoice-details/' . base64_encode($row->id)) }}"> {{ $row->id }}</a></td>
                                    <td class="align-middle">{{ $row->bill_to }}</td>
                                    <td class="align-middle">{{ $row->tourName ? Str::limit($row->tourName, 20) : '-' }}</td>
                                    <td class="align-middle">{{ date('d M Y', strtotime($row->invoice_date)) }}</td>
                                    <td class="align-middle">₹{{ number_format($row->grand_total,1) }}</td>
                                    <td class="align-middle">
                                        @if ($row->balance == 0)
                                            PAID
                                        @elseif ($row->payment_received > 0)
                                            PARTIALLY PAID
                                        @else
                                            UNPAID
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a class="btn btn-default" href="{{ url('/admin/invoice-details/'.base64_encode($row->id)) }}"><i class="fa fa-info-circle"></i></a>
                                        <a class="btn btn-default @if($row->grand_total == 0) disabled @endif" href="{{ url('/admin/invoice-payments/'.base64_encode($row->id)) }}"><i class="fa fa-money-bill-alt"></i></a>
                                        <button type="button" class="btn btn-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ url('/admin/invoice-actions/'.base64_encode($row->id).'?type=download') }}"><i class="fa fa-download"></i> &nbsp; Download</a>
                                            <a class="dropdown-item" onclick="getInvoiceId(this);" invoiceId="{{base64_encode($row->id)}}" data-toggle="modal" data-target="#invoice-share"><i class="fa fa-share"></i> &nbsp; Share</a>
                                            {{-- <a class="dropdown-item" href="{{ url('/admin/invoice-actions/'.base64_encode($row->id).'?type=share') }}"><i class="fa fa-share"></i> &nbsp; Share</a> --}}
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ url('/admin/edit-invoice/'.base64_encode($row->id)) }}"><i class="fa fa-edit"></i> &nbsp; Edit</a>
                                            <a class="dropdown-item" href="{{ url('/admin/delete-invoice/'.base64_encode($row->id)) }}" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash"></i> &nbsp; Delete </a>
                                        </div>
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

{{-- share invoice modal --}}
<div class="modal fade" id="invoice-share">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Share Invoice on Mail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="GET" id="shareInvoice">
                <input type="hidden" name="type" value="share">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputEmail" class="required">Email</label>
                        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Enter Email" value="" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-dark submit"><i class="fa fa-check-circle"></i> Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    function getInvoiceId(el){
        invoiceId = $(el).attr('invoiceId');
        temp = $('#shareInvoice').attr('action', '/admin/invoice-actions/'+invoiceId+'?type=share');
    }
</script>

<script>
    $(document).ready(function() {
        console.log('test');
        $('#shareInvoice').validate({
            ignore: [],
            debug: false,
            rules: {
                email: {
                    required: true,
                    email: true,
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
@endsection('scripts')

@endsection