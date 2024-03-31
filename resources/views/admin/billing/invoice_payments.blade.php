@extends('layouts/adminLayout/admin_design')
@section('content')

@section('styles')
    <style>
        .table td {
            padding: .4rem !important;
        }
        .table th {
            padding: .3rem !important;
        }
        .bg-gradient-dark {
            background: #E1E4FF !important;
            color: #000 !important;
        }
    </style>
    {{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
@endsection('styles')


    <div class="content-wrapper">
        <div class="content-header pb-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="m-0 text-dark">Invoice Payments</h4>
                    </div>
                    <div class="col-sm-4">
                        <div class="row d-flex flex-row-reverse">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section id="DivIdToPrint">
            <div class="invoice p-3 mb-3 m-3 mt-auto">
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
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header p-1" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Invoice Details <i class="fa fa-angle-down"></i>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                @include('admin/billing/invoice_basic_info', ['invoice' => $invoice])
                            </div>
                        </div>
                    </div>
                </div>
                <hr />

                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-dark"><i class="fa fa-rupee-sign"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Amount</span>
                                <span class="info-box-number h5 mb-0">{{number_format($invoice->grand_total)}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="fa fa-rupee-sign"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Amount Received</span>
                                <span class="info-box-number h5 mb-0">{{number_format($invoice->payment_received)}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="fa fa-rupee-sign"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Balance Amount</span>
                                <span class="info-box-number h5 mb-0">{{number_format($invoice->balance) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-light mb-2">
                    <h3 class="card-title pt-2 pl-3">
                        New Payment
                    </h3><hr class="mb-0">
                    <div class="card-body pt-1">
                        <form method="POST" action="{{url('admin/add-invoice-payment/'.Request()->id)}}" enctype="multipart/form-data" id="addpayment">@csrf
                            <div class="row pt-2">
                                <div class="form-group col-md-2 mb-0">
                                    <label class="required">Date</label>
                                    <input type="date" name="payment_date" class="form-control" value="{{date('Y-m-d')}}" required>
                                </div>
                                <div class="form-group col-md-2 mb-0">
                                    <label class="required">Amount</label>
                                    <input type="number" name="amount" class="form-control" placeholder="₹" required>
                                </div>
                                <div class="form-group col-md-2 mb-0">
                                    <label class="required">Mode of Payment</label>
                                    <select class="form-control" name="payment_mode" required>
                                        <option value="" selected>Select One</option>
                                        <option value="Bank Transfer">Bank Transfer</option>
                                        <option value="Cash">Cash</option>
                                        <option value="UPI">UPI</option>
                                        <option value="Card">Card</option>
                                        <option value="Cheque">Cheque</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label class="required invisible d-block"></label>
                                    <button type="submit" class="btn btn-dark submit" @if($invoice->grand_total == $invoice->payment_received) disabled @endif><i class="fa fa-check-circle"></i> Save </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if(count($invoice->invoicePayments) > 0)
                <div class="card mb-0 mt-3">
                    <div class="card-body p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr class="bg-gradient-dark">
                                    <th class="text-center"> Sr.No. </th>
                                    <th class="text-center"> Date </th>
                                    <th class="text-center"> Amount </th>
                                    <th class="text-center"> Payment Mode </th>
                                    <th class="text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoice->invoicePayments->sortByDesc('payment_date') as $row)
                                <tr>
                                    <td class="align-middle text-center">{{$loop->index+1}}</td>
                                    <td class="align-middle">{{date('d M Y', strtotime($row->payment_date))}}</td>
                                    <td class="align-middle">₹{{$row->amount}}</td>
                                    <td class="align-middle">{{$row->payment_mode}}</td>
                                    <td class="align-middle">
                                        {{-- <a href="{{url('admin/update-payment-details/'.base64_encode($row->id))}}" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a> --}}
                                        <a href="{{url('admin/del-invoice-payment/'.base64_encode($row->id))}}" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger btn-sm ml-1"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @else
                <div class="alert alert-dark">
                    No payments available
                </div>
                @endif
            </div>
        </section>
    </div>
@endsection

@section('scripts')
{{-- form validations --}}
<script>
    $(document).ready(function() {
        $('#addpayment').validate({
            ignore: [],
            debug: false,
            rules: {
                payment_date: {
                    required: true,
                },
                amount: {
                    required: true,
                    number:true,
                    min:1,
                    minlength:1,
                },
                payment_mode: {
                    required: true,
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
@endsection('scripts')