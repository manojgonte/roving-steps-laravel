@extends('layouts/adminLayout/admin_design')
@section('content')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="m-0 text-dark">Invoice & Billing</h1>
                    </div>
                </div>
            </div>
        </div>

        <section id="DivIdToPrint">
            <div class="card-body">
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
                <div class="row">
                    <div class="col-md-6">
                        <h5>Invoice details for <b>Invoice ID: {{ $invoice_details->id }}</b></h5>
                    </div>
                    <div class="col-md-6">
                        <div class="row d-flex flex-row-reverse">
                            <div>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ url('/admin/delete-invoice/' . $invoice_details->id) }}"><i class="fa fa-trash"></i> Delete</a>
                            </div>
                            <div class="mr-2">
                                <button type="button" class="btn btn-success" onclick="printDiv()"><i class="fa fa-print"></i> Print</button>
                            </div>
                            <div class="mr-2">
                                <button class="btn btn-warning" type="button" class="btn btn-default" onclick="editInvoice({{Request()->id}})" data-toggle="modal" data-target="#editInvoice"><i class="fa fa-pencil-alt"></i> Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="col-md-6 mb-2">
                            <label>Custmer Address: {{ $invoice_details->address }}</label>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Email: {{ $invoice_details->email }}</label>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Contact No.: {{ $invoice_details->contact_no }} </label>
                        </div>
                    </div>
                    <hr />
                    <div class="col">
                        <div class="col-md-6 mb-2">
                            <label>Tour Date: {{ date('d M Y', strtotime($invoice_details->tour_date)) }} </label>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>Invoice Date: {{ date('d M Y', strtotime($invoice_details->invoice_date)) }} </label>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label>No. of Passengers: {{ $invoice_details->no_of_passengers }} </label>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-10">
                        <label class="font-weight-bold">Grand Total:</label>&nbsp;&nbsp;
                        ₹{{ number_format($invoice_details->invoicePayments->sum('costing'), 2) }} <i>(In Words: {{AmountInWords($invoice_details->invoicePayments->sum('costing'))}})</i>
                    </div>
                    <div class="col-md-5">
                        <label class="font-weight-bold">Pending Amount/Balance:
                        </label>&nbsp;&nbsp;₹{{ number_format($invoice_details->invoicePayments->sum('costing') - $invoice_details->invoicePayments->sum('amount_paid'), 2) }}
                    </div>
                    <div class="col-md-5">
                        <label class="font-weight-bold">Payment Paid: </label> &nbsp;&nbsp;₹{{ number_format($invoice_details->invoicePayments->sum('amount_paid'), 2) }}
                    </div>
                </div>
                <hr />

                <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                    <thead>
                        <tr>
                            <th>Payment ID</th>
                            <th>Details</th>
                            <th>Costing</th>
                            <th>Paid</th>
                            <th>Balance</th>
                            <th>Payment Mode</th>
                            <th>Creation Date</th>
                            <th><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#createPayment"><i class="fa fa-plus"></i></button></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice_details->invoicePayments as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->details }}</td>
                                <td>₹{{ number_format($row->costing, 2) }}</td>
                                <td>₹{{ number_format($row->amount_paid, 2) }}</td>
                                <td>₹{{ number_format($row->costing - $row->amount_paid, 2) }}</td>
                                <td class="text-uppercase">{{ $row->mode_of_payment }}</td>
                                <td>{{ date('d M Y, h:iA', strtotime($row->created_at)) }}</td>
                                <td>
                                    <button type="button" class="btn btn-default" onclick="editPayment({{$row->id}})" data-toggle="modal" data-target="#editPayment"><i class="fa fa-pencil-alt"></i></button>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ url('/admin/del-invoice-payment/'.$row->id) }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="mt-2 d-flex justify-content-center">
                    {{ $invoice_details->invoicePayments->links('pagination::bootstrap-4') }}
                </div> --}}
            </div>
        </section>
    </div>

    {{-- modal: add new payment --}}
    <div class="modal fade" id="createPayment">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-pencil"></i><span> Add Invoice Payment</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="main-card card mb-0">
                    <div class="card-body pt-0">
                        <form id="addPayment" class="col-md-11 mx-auto" method="post" action="{{ url('/admin/add-invoice-payment/') }}">@csrf
                            <input type="hidden" name="invoice_id" value="{{Request()->id}}">
                            <div class="form-row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="field-required fw-500">Details</label>
                                        <input type="text" class="form-control" name="details" placeholder="Enter Details" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="field-required fw-500">Costing</label>
                                        <input type="number" min="1" class="form-control" name="costing" placeholder="Enter Costing" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="abbr" class="field-required fw-500">Amount Paid</label>
                                        <input type="number" min="1" class="form-control" name="amount_paid" placeholder="Enter Amoutn Paid" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="abbr" class="field-required fw-500">Mode of Payment</label>
                                        <select name="mode_of_payment" id="mode_of_payment" class="form-control" required>
                                            <option value="Cash">Cash</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="Bank Transfer">Bank Transfer</option>
                                            <option value="UPI">UPI</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark float-right btn-block"><b><i class="fa fa-check-circle"></i> Save</b></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal: edit & update payment --}}
    <div class="modal fade" id="editPayment">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Update Payment Details: Payment ID <span class="payId"></span></h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="main-card card mb-0">
                    <div class="card-body pt-0">
                        <form id="editPayment" class="col-md-11 mx-auto" method="post" action="{{ url('/admin/update-payment-details/') }}">@csrf
                            <input type="hidden" class="payId" name="payment_id">
                            <div class="form-row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="field-required fw-500">Details</label>
                                        <input type="text" class="form-control details" name="details" placeholder="Enter Details" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="field-required fw-500">Costing</label>
                                        <input type="number" min="1" class="form-control costing" name="costing" placeholder="Enter Costing" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="abbr" class="field-required fw-500">Amount Paid</label>
                                        <input type="number" min="1" class="form-control amount_paid" name="amount_paid" placeholder="Enter Amoutn Paid" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="abbr" class="field-required fw-500">Mode of Payment</label>
                                        <select name="mode_of_payment" id="mode_of_payment" class="form-control" required>
                                            <option value="Cash">Cash</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="Bank Transfer">Bank Transfer</option>
                                            <option value="UPI">UPI</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark float-right btn-block"><b><i class="fa fa-check-circle"></i> Update</b></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal: update invoice details --}}
    <div class="modal fade" id="editInvoice">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Update Invoice Details</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="main-card card mb-0">
                    <div class="card-body pt-0">
                        <form id="editInvoice" class="mx-auto" method="post" action="{{ url('/admin/edit-invoice') }}">@csrf
                            <input type="hidden" name="invoice_id" value="{{Request()->id}}">
                            <div class="form-row mt-3">
                                <div class="form-group col-md-4">
                                    <label class="required">Bill To</label>
                                    <input type="text" name="bill_to" class="form-control" id="bill_to" placeholder="Enter bill to" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="required">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Enter your address" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="required">Email</label>
                                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="required">Contact No</label>
                                    <input type="number" name="contact_no" class="form-control" id="contact_no" placeholder="Enter your contact" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="required">Tour name</label>
                                    <select name="tour_name" id="tour" class="form-control" required>
                                        <option value="">Select tour</option>
                                        @foreach(App\Models\Tour::select('id','tour_name')->get() as $tour)
                                        <option value="{{$tour->id}}">{{$tour->tour_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="required">Number of passengers</label>
                                    <input type="number" name="no_of_passengers" id="no_of_passengers" class="form-control" placeholder="Enter No." required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="required">Tour date</label>
                                    <input type="date" name="tour_date" id="tour_date" class="form-control" placeholder="Enter tour date" value="{{date('Y-m-d')}}" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="required">Invoice date</label>
                                    <input type="date" name="invoice_date" id="invoice_date" class="form-control" placeholder="Enter invoice date" value="{{date('Y-m-d')}}" required>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark float-right btn-block"><b><i class="fa fa-check-circle"></i> Update</b></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function editInvoice(id){
        $.ajax({
            type:"get",
            url:"{{url('admin/get-invoice-details')}}",
            data:{id:id},
            success:function(data){
                console.log(data);
                $('#bill_to').val(data['bill_to']);
                $('#address').val(data['address']);
                $('#email').val(data['email']);
                $('#contact_no').val(data['contact_no']);
                $('#no_of_passengers').val(data['no_of_passengers']);
                $('#tour_date').val(data['tour_date']);
                $('#invoice_date').val(data['invoice_date']);
                $('#tour').append('<option selected value="'+data['tour_id']+'">'+data['tourName']+'</option>');
            }
        });
    }
</script>

<script>
    function editPayment(id){
        $.ajax({
            type:"get",
            url:"{{url('admin/get-payment-details')}}",
            data:{id:id},
            success:function(data){
                $('.payId').text(data['id']);
                $('.payId').val(data['id']);
                $('.details').val(data['details']);
                $('.costing').val(data['costing']);
                $('.amount_paid').val(data['amount_paid']);
                $('#mode_of_payment').append('<option selected value="'+data['mode_of_payment']+'">'+data['mode_of_payment']+'</option>');
            }
        });
    }
</script>

<script>
    function printDiv(){
        var divToPrint=document.getElementById('DivIdToPrint');
        var newWin=window.open('','Print-Window');
        newWin.document.open();
        newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
        newWin.document.close();
        setTimeout(function(){newWin.close();},10);
    }
</script>
