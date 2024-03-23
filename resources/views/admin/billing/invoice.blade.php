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
        .bg-light-orange {
            background-color: #FFEBB8;
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
                        <h4 class="m-0 text-dark">Invoice Details</h4>
                    </div>
                    <div class="col-sm-4">
                        <div class="row d-flex flex-row-reverse">
                            <div class="mr-2">
                                <a href="{{ url('/admin/edit-invoice/'.Request()->id) }}" class="btn btn-light btn-sm"><i class="fa fa-pencil-alt"></i> Edit</a>
                                <a href="{{ url('/admin/invoice-actions/'.Request()->id.'?type=download') }}" class="btn btn-light btn-sm"><i class="fa fa-download"></i> Download</a>
                                <a href="{{ url('/admin/invoice-actions/'.Request()->id.'?type=share') }}" class="btn btn-light btn-sm"><i class="fa fa-share-alt"></i> Share</a>
                            </div>
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
                <div class="row">
                    <div class="col px-0">
                        <div class="col-md-10">
                            <label><b>Invoice Date:</b> {{ date('d/m/Y', strtotime($invoice->invoice_date)) }} </label>
                        </div>
                        <div class="col-md-10">
                            <label><b>Bill To:</b> {{ $invoice->bill_to }}</label>
                        </div>
                        <div class="col-md-10">
                            <label><b>Address:</b> {{ !empty($invoice->address) ? $invoice->address : '-' }}</label>
                        </div>
                        <div class="col-md-10">
                            <label><b>Contact No.:</b> {{ !empty($invoice->contact_no) ? $invoice->contact_no : '-' }}</label>
                        </div>
                        <div class="col-md-10">
                            <label><b>Email:</b> {{ !empty($invoice->email) ? $invoice->email : '-' }}</label>
                        </div>
                        <div class="col-md-10">
                            <label><b>Invoice For:</b> 
                                @foreach($invoice->invoice_for as $row)
                                {{ $row }}@if($loop->last) @else, @endif
                                @endforeach
                            </label>
                        </div>
                        @if($invoice->tour_id)
                        <div class="col-md-10">
                            <label><b>Tour:</b> {{ $invoice->tourName }} </label>
                        </div>
                        @endif
                    </div>
                    <hr />
                    <div class="col">
                        <div class="col-md-10">
                            <label><b>Invoice Id:</b> {{ $invoice->id }} </label>
                        </div>
                        <div class="col-md-10">
                            <label><b>Pan No.:</b> {{ !empty($invoice->pan_no) ? $invoice->pan_no : '-' }} </label>
                        </div>
                        <div class="col-md-10">
                            <label><b>GST No.:</b> {{ !empty($invoice->gst_no) ? $invoice->gst_no : '-' }} </label>
                        </div>
                        <div class="col-md-10">
                            <label><b>GST Address:</b> {{ !empty($invoice->gst_address) ? $invoice->gst_address : '-' }} </label>
                        </div>
                        <div class="col-md-10">
                            <label><b>Tourist Count:</b> {{ !empty($invoice->no_of_passengers) ? $invoice->no_of_passengers : '-' }} </label>
                        </div>
                        <div class="col-md-10">
                            <label><b>Date:</b> {{ !empty($invoice->from_date) ? date('d/m/Y', strtotime($invoice->from_date)) : '-' }} - {{ !empty($invoice->to_date) ? date('d/m/Y', strtotime($invoice->to_date)) : '-' }} </label>
                        </div>
                    </div>
                </div>
                <hr />

                <div class="">
                    <div class="row clearfix mt-3">
                        @if(in_array('Bus Booking', $invoice->invoice_for) || 
                            in_array('Flight Booking', $invoice->invoice_for) || 
                            in_array('Train Booking', $invoice->invoice_for) || 
                            in_array('Cab Booking', $invoice->invoice_for) || 
                            in_array('Cruise Booking', $invoice->invoice_for))
                        <div class="col-md-12">
                            <h6 class="font-weight-bold">Payments</h6>
                            <table class="table table-hover table-bordered" id="tab_logic1">
                                <thead>
                                    <tr class="bg-gradient-dark">
                                        <th class="text-left"> Services </th>
                                        <th class="text-center"> Date </th>
                                        <th class="text-center"> Name </th>
                                        <th class="text-center"> From </th>
                                        <th class="text-center"> To </th>
                                        <th class="text-center"> Class </th>
                                        <th class="text-center"> Tourist Count </th>
                                        <th class="text-center"> Cost per Person </th>
                                        <th class="text-center"> Total Cost </th>
                                        {{-- <th class="text-center"> # </th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoice->invoiceItems->filter(function($item) {
                                        return $item->service_name != 'Hotel Booking';
                                    }) as $item)
                                    <tr>
                                        <td class="align-middle text-left">
                                            {{$item->service_name}}
                                        </td>
                                        <td class="align-middle">
                                            {{date('d/m/Y', strtotime($item->date))}}
                                        </td>
                                        <td class="align-middle">
                                            {{$item->name}}
                                        </td>
                                        <td class="align-middle">
                                            {{$item->from_dest}}
                                        </td>
                                        <td class="align-middle">
                                            {{$item->to_dest}}
                                        </td>
                                        <td class="align-middle">
                                            {{isset($item->class) ? $item->class : '-'}}
                                        </td>
                                        <td class="align-middle">
                                            {{$item->tourist_count}}
                                        </td>
                                        <td class="align-middle">
                                            ₹{{$item->cost_person}}
                                        </td>
                                        <td class="align-middle">
                                            ₹{{$item->total_cost}}
                                        </td>
                                        {{-- <td class="align-middle d-flex">
                                            <button type="button" class="btn btn-default btn-sm add-row"><i class="fa fa-plus-circle"></i></button>
                                            <button type="button" class="btn btn-default btn-sm ml-1 remove-row"><i class="fa fa-minus-circle"></i></button>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif

                        @if (count($invoice->invoiceItems->filter(function($item) {
                            return $item->service_name == 'Hotel Booking';
                        })) > 0)
                        <div class="col-md-12">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr class="bg-gradient-dark">
                                        <th class="text-left"> Service </th>
                                        <th class="text-center"> Name </th>
                                        <th class="text-center"> From </th>
                                        <th class="text-center"> To </th>
                                        <th class="text-center"> No. of Days </th>
                                        <th class="text-center"> Tourist Count </th>
                                        <th class="text-center"> Cost per Person </th>
                                        <th class="text-center"> Total Cost </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoice->invoiceItems->filter(function($item) {
                                        return $item->service_name == 'Hotel Booking';
                                    }) as $item)
                                    <tr id='addr0'>
                                        <td class="align-middle text-left">
                                            {{$item->service_name}}
                                        </td>
                                        <td class="align-middle">
                                            {{$item->name}}
                                        </td>
                                        <td class="align-middle">
                                            {{date('d/m/Y', strtotime($item->from_dest))}}
                                        </td>
                                        <td class="align-middle">
                                            {{date('d/m/Y', strtotime($item->to_dest))}}
                                        </td>
                                        <td class="align-middle">
                                            {{$item->days}}
                                        </td>
                                        <td class="align-middle">
                                            {{$item->tourist_count}}
                                        </td>
                                        <td class="align-middle">
                                            ₹{{$item->cost_person}}
                                        </td>
                                        <td class="align-middle">
                                            ₹{{$item->total_cost}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>

                <table id="example" class="table table-bordered" style="overflow-x: auto;">
                    <tbody>
                        <tr>
                            <td class="text-left text-sm">Visa</td>
                            <td class="text-right">{{isset($invoice->visa) ? $invoice->visa : '-'}}</td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm">Insurance</td>
                            <td class="text-right">{{isset($invoice->insurance) ? $invoice->insurance : '-'}}</td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm">Visa Appointment</td>
                            <td class="text-right">{{isset($invoice->visa_appointment) ? $invoice->visa_appointment : '-'}}</td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm">Swiss Pass</td>
                            <td class="text-right">{{isset($invoice->swiss_pass) ? $invoice->swiss_pass : '-'}}</td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm">Land Package</td>
                            <td class="text-right">{{isset($invoice->land_package) ? $invoice->land_package : '-'}}</td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm">Passport Services</td>
                            <td class="text-right">{{isset($invoice->passport_services) ? $invoice->passport_services : '-'}}</td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm font-weight-bold">Total</td>
                            <td class="text-right">₹{{$invoice->total}}</td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm font-weight-bold">Service Charges</td>
                            <td class="text-right">₹{{$invoice->service_charges}}</td>
                        </tr>
                        <tr>
                            <td class="text-left align-middle text-sm font-weight-bold d-flex justify-content-between border-0">
                                GST
                                <div>
                                    <select class="form-control form-control-sm border-0" disabled><option>{{$invoice->gst_per}}%</option></select>
                                </div>
                            </td>
                            <td class="text-right align-middle">₹{{$invoice->gst}}</td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm font-weight-bold">Grand Total</td>
                            <td class="text-right font-weight-bold">₹{{number_format($invoice->grand_total, 1)}}</td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm font-weight-bold">In Word</td>
                            <td class="text-right font-weight-bold" id="">{{AmountInWords($invoice->grand_total)}}</td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm font-weight-bold">Payment Received</td>
                            <td class="text-right">₹{{$invoice->payment_received}}</td>
                        </tr>
                        <tr class="bg-light-orange">
                            <td class="text-left text-sm font-weight-bold">Balance</td>
                            <td class="text-right font-weight-bold">₹{{number_format($invoice->balance, 1)}}</td>
                        </tr>
                        <tr class="bg-light-orange">
                            <td class="text-left text-sm font-weight-bold">In Word</td>
                            <td class="text-right font-weight-bold" id="">{{AmountInWords($invoice->balance)}}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="row invoice-info mb-2">
                    <div class="col-md-5">
                        <strong>Bank Details:</strong>
                        <div>Bank: Kotak Mahindra Bank Ltd.</div>
                        <div>Name: Roving Steps Pvt. Ltd.</div>
                        <div>Account No: 7713096962</div>
                        <div>IFSC: KKBK0001770 (Bibwewadi Branch)</div>
                    </div>
                    <div class="col-md-6 border-left">
                        <strong>Contact Details:</strong>
                        <div>Address: Shop No. 31, Kundan Nagar Gosavi Building, Dhankawadi, Pune 43</div>
                        <div>Mobile: 8600031545</div>
                        <div>Email: info@rovingsteps.com</div>
                        <div>Website: www.rovingsteps.com</div>
                    </div>
                </div>
                <hr />
                <div class="form-group">
                    <label>Note</label>
                    <h6>{{isset($invoice->note) ? $invoice->note : '-'}}</h6>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        // Function to add a new row
        $("table").on("click", ".add-row", function() {
            var newRow = $(this).closest("tr").clone();
            newRow.find("input").val(""); // Clear input values in the new row
            $(this).closest("tr").after(newRow);
        });

        // Function to remove a row
        $("table").on("click", ".remove-row", function() {
            $(this).closest("tr").remove();
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Function to convert number to words
        function numberToWords(number) {
            // Array of units
            var units = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];

            // Array of tens
            var tens = ['', 'Ten', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

            // Array of teens
            var teens = ['Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];

            // Array of scales in Indian numbering system
            var scales = ['', 'Thousand', 'Lac', 'Crore'];

            // Convert a three-digit number into words
            function convertThreeDigits(num) {
                var word = '';
                if (num >= 100) {
                    word += units[Math.floor(num / 100)] + ' Hundred ';
                    num %= 100;
                }
                if (num >= 20) {
                    word += tens[Math.floor(num / 10)] + ' ';
                    num %= 10;
                }
                if (num > 0) {
                    if (num < 10) {
                        word += units[num] + ' ';
                    } else {
                        word += teens[num - 10] + ' ';
                    }
                }
                return word;
            }

            // Convert a number into words
            function convertToWords(num) {
                if (num === 0) return 'Zero';
                var word = '';
                var scaleIndex = 0; // Index for selecting the appropriate scale
                while (num > 0) {
                    var remainder = num % 1000;
                    if (remainder > 0) {
                        word = convertThreeDigits(remainder) + scales[scaleIndex] + ' ' + word;
                    }
                    num = Math.floor(num / 1000);
                    scaleIndex++;
                }
                return word.trim();
            }

            return convertToWords(number);
        }

        // Function to calculate total cost for each row and update subtotal
        function calculateTotalCost() {
            var subtotal = 0;
            $('#tab_logic1 tbody tr, #tab_logic tbody tr').each(function() {
                var touristCount = parseInt($(this).find('input[name="tourist_count[]"]').val());
                var costPerPerson = parseInt($(this).find('input[name="cost_person[]"]').val());
                var totalCost = touristCount * costPerPerson;
                $(this).find('input[name="total_cost[]"]').val(totalCost);
                subtotal += isNaN(totalCost) ? 0 : totalCost;
            });
            $('#total').val(subtotal);
            calculateGrandTotal();
        }

        // Function to calculate grand total including service charges and GST
        function calculateGrandTotal() {
            var serviceCharges = parseFloat($('[name="service_charges"]').val());
            var gstSlab = parseFloat($('[name="gst_per"]').val());
            var gst = 0;
            var subtotal = parseFloat($('#total').val());

            if (gstSlab === 18) {
                gst = (serviceCharges * 18) / 100;
            } else if (gstSlab === 5) {
                gst = (serviceCharges * 5) / 100;
            }
            $('[name="gst"]').val(gst.toFixed(2));
            var grandTotal = subtotal + serviceCharges + gst;
            $('[name="grand_total"]').val(grandTotal.toFixed(2));
            
            updateBalance(); // Update balance after calculating grand total
            updateGrandTotalWord(); // Update grand total word
        }

        // Function to update balance based on payment received
        function updateBalance() {
            var paymentReceived = parseFloat($('[name="payment_received"]').val());
            var grandTotal = parseFloat($('[name="grand_total"]').val());

            if (!isNaN(paymentReceived) && !isNaN(grandTotal)) {
                var balance = grandTotal - paymentReceived;
                $('[name="balance"]').val(balance.toFixed(2));

                // Convert balance to words
                $('#balance_word').text(numberToWords(balance) + ' Rupees Only');
            } else {
                $('[name="balance"]').val('');
                $('#balance_word').text('');
            }
        }

        // Function to update grand total word
        function updateGrandTotalWord() {
            var grandTotal = parseFloat($('[name="grand_total"]').val());

            if (!isNaN(grandTotal)) {
                $('#grand_total_word').text(numberToWords(grandTotal) + ' Rupees Only');
            } else {
                $('#grand_total_word').text('');
            }
        }

        // Calculate total cost when inputs change
        $('#tab_logic1, #tab_logic').on('input', 'input[name="tourist_count[]"], input[name="cost_person[]"]', function() {
            calculateTotalCost();
        });

        // Calculate grand total when service charges or GST slab change
        $('[name="service_charges"], [name="gst_per"]').on('change input', function() {
            calculateGrandTotal();
        });

        // Update balance when payment received changes
        $('[name="payment_received"]').on('input', function() {
            updateBalance();
        });

        // Function to add a new row
        $("table").on("click", ".add-row", function() {
            var newRow = $(this).closest("tr").clone(true); // Set true to clone with event handlers
            newRow.find("input").val(""); // Clear input values in the new row
            newRow.find(".add-row").remove(); // Remove the "Add Row" button from the new row
            // $(this).closest("tr").after(newRow);
        });

        // Function to remove a row
        $("table").on("click", ".remove-row", function() {
            $(this).closest("tr").remove();
            calculateTotalCost(); // Recalculate subtotal after removing row
        });

        // Initial calculation when the page loads
        calculateTotalCost();
    });
</script>


{{-- onclick add more set of fields and balance, costing & amount paid calculations --}}
<script>
    $(document).ready(function(){
        var i=1;
        $("#add_row").click(function(){
            b=i-1;
            $('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
            $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
            i++; 
        });
        $("#delete_row").click(function(){
            if(i>1){
                $("#addr"+(i-1)).html('');
                i--;
            }
            calc();
        });
        
        $('#tab_logic tbody').on('keyup change',function(){
            calc();
        });
        $('#tax').on('keyup change',function(){
            calc_total();
        });
    });

    function calc() {
        $('#tab_logic tbody tr').each(function(i, element) {
            var html = $(this).html();
            if(html!='') {
                var costing = parseFloat($(this).find('.costing').val()) || 0; // Parse as float, default to 0 if NaN
                var amount_paid = parseFloat($(this).find('.amount_paid').val()) || 0; // Parse as float, default to 0 if NaN
                $(this).find('.total').val((costing - amount_paid).toFixed(2)); // Use toFixed(2) to limit decimals to 2 places
                
                calc_total();
            }
        });
    }

    function calc_total() {
        var total = 0;
        var costing = 0;
        var amount_paid = 0;

        $('.total').each(function() {
            var value = parseFloat($(this).val()) || 0;
            total += value;
        });

        $('.costing').each(function() {
            var value = parseFloat($(this).val()) || 0;
            costing += value;
        });

        $('.amount_paid').each(function() {
            var value = parseFloat($(this).val()) || 0;
            amount_paid += value;
        });

        $('#totalCosting').val(costing.toFixed(2));
        $('#totalAmountPaid').val(amount_paid.toFixed(2));
        $('#balance').val((costing - amount_paid).toFixed(2));
    }
</script>

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

@endsection('scripts')