@extends('layouts/adminLayout/admin_design')
@section('content')

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

                <div class="card bg-light mb-0">
                    <h3 class="card-title pt-2 pl-3">
                        Update Payment Details
                    </h3><hr class="mb-0">
                    <div class="card-body pt-1">
                        <form method="POST" action="" enctype="multipart/form-data" id="addpayment">@csrf
                            <div class="row pt-2">
                                <div class="form-group col-md-2 mb-0">
                                    <label class="required">Date</label>
                                    <input type="date" name="payment_date" class="form-control" value="{{$payment->payment_date}}" required>
                                </div>
                                <div class="form-group col-md-2 mb-0">
                                    <label class="required">Amount</label>
                                    <input type="number" name="amount" class="form-control" placeholder="₹" value="{{$payment->amount}}" required>
                                </div>
                                <div class="form-group col-md-2 mb-0">
                                    <label class="required">Mode of Payment</label>
                                    <select class="form-control" name="payment_mode" required>
                                        <option value="" selected>Select One</option>
                                        <option value="Bank Transfer" @if($payment->payment_mode == 'Bank Transfer') selected @endif>Bank Transfer</option>
                                        <option value="Cash" @if($payment->payment_mode == 'Cash') selected @endif>Cash</option>
                                        <option value="UPI" @if($payment->payment_mode == 'UPI') selected @endif>UPI</option>
                                        <option value="Card" @if($payment->payment_mode == 'Card') selected @endif>Card</option>
                                        <option value="Cheque" @if($payment->payment_mode == 'Cheque') selected @endif>Cheque</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 mb-0">
                                    <label class="required invisible d-block"></label>
                                    <button type="submit" class="btn btn-dark submit"><i class="fa fa-check-circle"></i> Update </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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