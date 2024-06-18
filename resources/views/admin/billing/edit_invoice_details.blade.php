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
@endsection('styles')


    <div class="content-wrapper">
        <div class="content-header pb-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="m-0 text-dark">Update Invoice Details</h4>
                    </div>
                </div>
            </div>
        </div>

        <section>            
            <div class="card p-3 mb-3 m-3 mt-auto">
                <div class="card-header pt-0 px-0">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link border" href="{{url('admin/edit-invoice/'.Request()->id)}}">Basic</a></li>
                        <li class="nav-item"><a class="nav-link active ml-1" href="javascript:void">Details</a></li>
                    </ul>
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

                <div class="card-body px-0 pb-0">
                    @include('admin/billing/invoice_basic_info', ['invoice' => $invoice])
                </div>
                <hr />

                <form action="" method="POST">@csrf
                <div class="">
                    <div class="row clearfix mt-0">
                        <div class="col-md-12">
                            <div class="row mx-0 justify-content-between mb-1">
                                <h6 class="font-weight-bold">Payments</h6>
                                <div>
                                    <select id="addService" class="form-control form-control-sm">
                                        <option value="">New Service</option>
                                        <option value="Hotel">Hotel Booking</option>
                                        <option value="Bus">Bus Booking</option>
                                        <option value="Flight">Flight Booking</option>
                                        <option value="Train">Train Booking</option>
                                        <option value="Cab">Cab Booking</option>
                                        <option value="Cruise">Cruise Booking</option>
                                        <option value="Visa">Visa Service</option>
                                        <option value="Passport">Passport Service</option>
                                    </select>
                                </div>
                            </div>
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
                                        <th class="text-center"> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(in_array('Flight Booking', $invoice->invoice_for))
                                    @foreach ($invoice->invoiceItems->filter(function($item) {
                                        return $item->service_name == 'Flight Booking';
                                    }) as $item)
                                    <tr>
                                        <td class="align-middle text-left">
                                            Flight Booking
                                            <input type="hidden" name='service_name[]' value="Flight Booking" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="date" name='date[]' placeholder='' class="form-control form-control-sm" value="{{$item->date}}" required />
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='name[]' placeholder='Name' class="form-control form-control-sm" value="{{$item->name}}" required />
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='from[]' placeholder='From' class="form-control form-control-sm" value="{{$item->from_dest}}" required />
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='to[]' placeholder='To' class="form-control form-control-sm" value="{{$item->to_dest}}" required />
                                        </td>
                                        <td class="align-middle">
                                            <input type="hidden" name="days[]" value="">
                                            <select class="form-control form-control-sm" name="class[]" required>
                                                <option value="">Class</option>
                                                <option value="Economy" @if($item->class == 'Economy') selected @endif>Economy</option>
                                                <option value="Premium Economy" @if($item->class == 'Premium Economy') selected @endif>Premium Economy</option>
                                                <option value="Business" @if($item->class == 'Business') selected @endif>Business</option>
                                            </select>
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='tourist_count[]' placeholder='Enter count' class="form-control form-control-sm" min="1" value="{{$item->tourist_count}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='cost_person[]' placeholder='Enter cost' class="form-control form-control-sm" min="1" value="{{$item->cost_person}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='total_cost[]' readonly class="form-control form-control-sm" value="" />
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-default btn-xs add-row"><i class="fa fa-plus-circle"></i></button>&nbsp;
                                                <button type="button" class="btn btn-default btn-xs remove-row"><i class="fa fa-minus-circle"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    @if(in_array('Train Booking', $invoice->invoice_for))
                                    @foreach ($invoice->invoiceItems->filter(function($item) {
                                        return $item->service_name == 'Train Booking';
                                    }) as $item)
                                    <tr>
                                        <td class="align-middle text-left">
                                            Train Booking
                                            <input type="hidden" name='service_name[]' value="Train Booking" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="date" name='date[]' class="form-control form-control-sm" required value="{{$item->date}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='name[]' placeholder='Name' class="form-control form-control-sm" required value="{{$item->name}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='from[]' placeholder='From' class="form-control form-control-sm amount_paid" required value="{{$item->from_dest}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='to[]' placeholder='To' class="form-control form-control-sm" required value="{{$item->to_dest}}" />
                                        </td>
                                        @php 
                                            $train_class = ["Sleeper Class","Third AC","Second AC","First AC","Second Seating","Vistadome AC","AC chair cars","First Class"];
                                        @endphp
                                        <td class="align-middle">
                                            <input type="hidden" name="days[]" value="">
                                            <select class="form-control form-control-sm" name="class[]" required>
                                                <option value="">Class</option>
                                                @foreach($train_class as $class)
                                                <option value="{{$class}}" @if($class == $item->class) selected @endif>{{$class}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='tourist_count[]' placeholder='Enter count' class="form-control form-control-sm" min="1" required value="{{$item->tourist_count}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='cost_person[]' placeholder='Enter cost' class="form-control form-control-sm" min="1" required value="{{$item->cost_person}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='total_cost[]' readonly class="form-control form-control-sm" />
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-default btn-xs add-row"><i class="fa fa-plus-circle"></i></button>&nbsp;
                                                <button type="button" class="btn btn-default btn-xs remove-row"><i class="fa fa-minus-circle"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    @if(in_array('Bus Booking', $invoice->invoice_for))
                                    @foreach ($invoice->invoiceItems->filter(function($item) {
                                        return $item->service_name == 'Bus Booking';
                                    }) as $item)
                                    <tr>
                                        <td class="align-middle text-left">
                                            Bus Booking
                                            <input type="hidden" name='service_name[]' value="Bus Booking" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="date" name='date[]' class="form-control form-control-sm" required value="{{$item->date}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='name[]' placeholder='Name' class="form-control form-control-sm" required value="{{$item->name}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='from[]' placeholder='From' class="form-control form-control-sm" required value="{{$item->from_dest}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='to[]' placeholder='To' class="form-control form-control-sm" required value="{{$item->to_dest}}" />
                                        </td>
                                        <td class="align-middle">
                                            NA
                                            <input type="hidden" name="class[]" value="">
                                            <input type="hidden" name="days[]" value="">
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='tourist_count[]' placeholder='Enter count' class="form-control form-control-sm" min="1" required value="{{$item->tourist_count}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='cost_person[]' placeholder='Enter cost' class="form-control form-control-sm" min="1" required value="{{$item->cost_person}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='total_cost[]' readonly class="form-control form-control-sm" />
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-default btn-xs add-row"><i class="fa fa-plus-circle"></i></button>&nbsp;
                                                <button type="button" class="btn btn-default btn-xs remove-row"><i class="fa fa-minus-circle"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    @if(in_array('Cruise Booking', $invoice->invoice_for))
                                    @foreach ($invoice->invoiceItems->filter(function($item) {
                                        return $item->service_name == 'Cruise Booking';
                                    }) as $item)
                                    <tr>
                                        <td class="align-middle text-left">
                                            Cruise Booking
                                            <input type="hidden" name='service_name[]' value="Cruise Booking" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="date" name='date[]' class="form-control form-control-sm" required value="{{$item->date}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='name[]' placeholder='Name' class="form-control form-control-sm" required value="{{$item->name}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='from[]' placeholder='From' class="form-control form-control-sm" required value="{{$item->from_dest}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='to[]' placeholder='To' class="form-control form-control-sm" required value="{{$item->to_dest}}" />
                                        </td>
                                        <td class="align-middle">
                                            NA
                                            <input type="hidden" name="class[]" value="">
                                            <input type="hidden" name="days[]" value="">
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='tourist_count[]' placeholder='Enter count' class="form-control form-control-sm" min="1" required value="{{$item->tourist_count}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='cost_person[]' placeholder='Enter cost' class="form-control form-control-sm" min="1" required value="{{$item->cost_person}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='total_cost[]' readonly class="form-control form-control-sm" />
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-default btn-xs add-row"><i class="fa fa-plus-circle"></i></button>&nbsp;
                                                <button type="button" class="btn btn-default btn-xs remove-row"><i class="fa fa-minus-circle"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    @if(in_array('Cab Booking', $invoice->invoice_for))
                                    @foreach ($invoice->invoiceItems->filter(function($item) {
                                        return $item->service_name == 'Cab Booking';
                                    }) as $item)
                                    <tr>
                                        <td class="align-middle text-left">
                                            Cab Booking
                                            <input type="hidden" name='service_name[]' value="Cab Booking" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="date" name='date[]' class="form-control form-control-sm" required value="{{$item->date}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='name[]' placeholder='Name' class="form-control form-control-sm" required value="{{$item->name}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='from[]' placeholder='From' class="form-control form-control-sm" required value="{{$item->from_dest}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='to[]' placeholder='To' class="form-control form-control-sm" required value="{{$item->to_dest}}" />
                                        </td>
                                        @php 
                                            $cab_class = ["Sedan","SUV","Tempo Traveler - 12","Tempo Traveler - 17"];
                                        @endphp
                                        <td class="align-middle">
                                            <input type="hidden" name="days[]" value="">
                                            <select class="form-control form-control-sm" name="class[]" required>
                                                <option value="">Class</option>
                                                <option value="Bus">Bus</option>
                                                @foreach($cab_class as $class)
                                                <option value="{{$class}}" @if($class == $item->class) selected @endif>{{$class}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='tourist_count[]' placeholder='Enter count' class="form-control form-control-sm" min="1" required value="{{$item->tourist_count}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='cost_person[]' placeholder='Enter cost' class="form-control form-control-sm" min="1" required value="{{$item->cost_person}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='total_cost[]' class="form-control form-control-sm" readonly />
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-default btn-xs add-row"><i class="fa fa-plus-circle"></i></button>&nbsp;
                                                <button type="button" class="btn btn-default btn-xs remove-row"><i class="fa fa-minus-circle"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    @if(in_array('Visa Service', $invoice->invoice_for))
                                    @foreach ($invoice->invoiceItems->filter(function($item) {
                                        return $item->service_name == 'Visa Service';
                                    }) as $item)
                                    <tr>
                                        <td class="align-middle text-left">
                                            Visa Service
                                            <input type="hidden" name='service_name[]' value="Visa Service" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="date" name='date[]' class="form-control form-control-sm" required value="{{$item->date}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='name[]' placeholder='Name' class="form-control form-control-sm" required value="{{$item->name}}" />
                                        </td>
                                        <td class="align-middle">
                                            -
                                            <input type="hidden" name="from[]" value="">
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='to[]' placeholder='To' class="form-control form-control-sm" required value="{{$item->to_dest}}" />
                                        </td>
                                        <td class="align-middle">
                                            -
                                            <input type="hidden" name="class[]" value="">
                                            <input type="hidden" name="days[]" value="">
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='tourist_count[]' placeholder='Enter count' class="form-control form-control-sm" min="1" required value="{{$item->tourist_count}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='cost_person[]' placeholder='Enter cost' class="form-control form-control-sm" min="1" required value="{{$item->cost_person}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='total_cost[]' readonly class="form-control form-control-sm" />
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-default btn-xs add-row"><i class="fa fa-plus-circle"></i></button>&nbsp;
                                                <button type="button" class="btn btn-default btn-xs remove-row"><i class="fa fa-minus-circle"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    @if(in_array('Passport Service', $invoice->invoice_for))
                                    @foreach ($invoice->invoiceItems->filter(function($item) {
                                        return $item->service_name == 'Passport Service';
                                    }) as $item)
                                    <tr>
                                        <td class="align-middle text-left">
                                            Passport Service
                                            <input type="hidden" name='service_name[]' value="Passport Service" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="date" name='date[]' class="form-control form-control-sm" required value="{{$item->date}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='name[]' placeholder='Name' class="form-control form-control-sm" required value="{{$item->name}}" />
                                        </td>
                                        <td class="align-middle">
                                            -
                                            <input type="hidden" name="class[]" value="">
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='to[]' placeholder='To' class="form-control form-control-sm" required value="{{$item->to_dest}}" />
                                        </td>
                                        <td class="align-middle">
                                            -
                                            <input type="hidden" name="class[]" value="">
                                            <input type="hidden" name="days[]" value="">
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='tourist_count[]' placeholder='Enter count' class="form-control form-control-sm" min="1" required value="{{$item->tourist_count}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='cost_person[]' placeholder='Enter cost' class="form-control form-control-sm" min="1" required value="{{$item->cost_person}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='total_cost[]' readonly class="form-control form-control-sm" />
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-default btn-xs add-row"><i class="fa fa-plus-circle"></i></button>&nbsp;
                                                <button type="button" class="btn btn-default btn-xs remove-row"><i class="fa fa-minus-circle"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        @if(in_array('Hotel Booking', $invoice->invoice_for))
                        <div class="col-md-12">
                            <table class="table table-hover table-bordered" id="tab_logic">
                                <thead>
                                    <tr class="bg-gradient-dark">
                                        <th class="text-left"> Service </th>
                                        <th class="text-center"> Date </th>
                                        <th class="text-center"> Name </th>
                                        <th class="text-center"> From </th>
                                        <th class="text-center"> To </th>
                                        <th class="text-center"> No. of Days </th>
                                        <th class="text-center"> Tourist Count </th>
                                        <th class="text-center"> Cost per Person </th>
                                        <th class="text-center"> Total Cost </th>
                                        <th class="text-center"> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoice->invoiceItems->filter(function($item) {
                                        return $item->service_name == 'Hotel Booking';
                                    }) as $item)
                                    <tr>
                                        <td class="align-middle text-left">
                                            Hotel Booking
                                            <input type="hidden" name='service_name[]' value="Hotel Booking" />
                                        </td>
                                        <td class="align-middle">
                                            -
                                            <input type="hidden" name="date[]" value="">
                                        </td>
                                        <td class="align-middle">
                                            <input type="text" name='name[]' placeholder='Name' class="form-control form-control-sm" required value="{{$item->name}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="date" name='from[]' placeholder='From' class="form-control form-control-sm" required value="{{$item->from_dest}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="date" name='to[]' placeholder='To' class="form-control form-control-sm" required value="{{$item->to_dest}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="hidden" name="class[]" value="">
                                            <input type="number" name='days[]' placeholder='Enter days' class="form-control form-control-sm" required min="1" value="{{$item->days}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='tourist_count[]' placeholder='Enter count' class="form-control form-control-sm" required min="1" value="{{$item->tourist_count}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='cost_person[]' placeholder='Cost per person' class="form-control form-control-sm" required min="1" value="{{$item->cost_person}}" />
                                        </td>
                                        <td class="align-middle">
                                            <input type="number" name='total_cost[]' readonly class="form-control form-control-sm" required />
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-default btn-xs add-row"><i class="fa fa-plus-circle"></i></button>&nbsp;
                                                <button type="button" class="btn btn-default btn-xs remove-row"><i class="fa fa-minus-circle"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>

                <table id="example" class="table table-bordered table-striped" style="overflow-x: auto;">
                    <tbody>
                        {{-- <tr>
                            <td class="text-left text-sm">Visa</td>
                            <td class="text-right"><input type="number" name="visa" class="form-control form-control-sm w-25" min="1" value="{{$invoice->visa}}" /></td>
                        </tr> --}}
                        <tr>
                            <td class="text-left text-sm">Insurance</td>
                            <td class="text-right"><input type="number" name="insurance" class="form-control form-control-sm w-25" min="1" value="{{$invoice->insurance}}" /></td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm">Visa Appointment</td>
                            <td class="text-right"><input type="number" name="visa_appointment" class="form-control form-control-sm w-25" min="1" value="{{$invoice->visa_appointment}}" /></td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm">Swiss Pass</td>
                            <td class="text-right"><input type="number" name="swiss_pass" class="form-control form-control-sm w-25" min="1" value="{{$invoice->swiss_pass}}" /></td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm">Land Package</td>
                            <td class="text-right"><input type="number" name="land_package" class="form-control form-control-sm w-25" min="1" value="{{$invoice->land_package}}" /></td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm">Passport Services</td>
                            <td class="text-right"><input type="number" name="passport_services" class="form-control form-control-sm w-25" min="1" value="{{$invoice->passport_services}}" /></td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm font-weight-bold">Total</td>
                            <td class="text-right"><input type="number" name="total" class="form-control form-control-sm w-25" id="total" min="1" readonly /></td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm font-weight-bold">Service Charges</td>
                            <td class="text-right"><input type="number" name="service_charges" class="form-control form-control-sm w-25" min="0" value="{{$invoice->service_charges}}" /></td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm font-weight-bold d-flex justify-content-between border-0">
                                <span>GST </span>
                                <div>
                                    <select class="form-control form-control-sm" name="gst_per" required><option value="">Select GST %</option><option value="0" @if($invoice->gst_per == '0') selected @endif>0%</option><option value="18" @if($invoice->gst_per == '18') selected @endif>18%</option><option value="5" @if($invoice->gst_per == '5') selected @endif>5%</option></select>
                                </div>
                            </td>
                            <td class="text-right"><input type="number" name="gst" class="form-control form-control-sm w-25" readonly /></td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm font-weight-bold">Grand Total</td>
                            <td class="text-right"><input type="number" name="grand_total" class="form-control form-control-sm w-25" readonly /></td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm font-weight-bold">In Word</td>
                            <td class="text-left" id="grand_total_word"></td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm font-weight-bold">Payment Received</td>
                            <td class="text-right"><input type="number" name="payment_received" class="form-control form-control-sm w-25" min="1" value="{{$invoice->payment_received}}" /></td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm font-weight-bold">Balance</td>
                            <td class="text-right"><input type="number" name="balance" class="form-control form-control-sm w-25" readonly /></td>
                        </tr>
                        <tr>
                            <td class="text-left text-sm font-weight-bold">In Word</td>
                            <td class="text-left" id="balance_word"></td>
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
                    <input type="text" name="note" class="form-control form-control-sm" value="{{$invoice->note}}">
                </div>
                <div class="form-group">
                    <a href="{{url('admin/invoice-billing')}}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-dark"><i class="fa fa-check-circle"></i> Update</button>
                </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        // Function to add a new row
        $("table").on("click", ".add-row1", function() {
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
        var hotel = '<tr><td class="align-middle text-left">Hotel Booking <input type="hidden" name="service_name[]" value="Hotel Booking"></td><td class="align-middle">-<input type="hidden" name="date[]" value=""></td><td class="align-middle"><input type="text" name="name[]" placeholder="Name" class="form-control form-control-sm" required></td><td class="align-middle"><input type="date" name="from[]" placeholder="From" class="form-control form-control-sm" required></td><td class="align-middle"><input type="date" name="to[]" placeholder="To" class="form-control form-control-sm" required></td><td class="align-middle"><input type="hidden" name="class[]" value=""> <input type="number" name="days[]" placeholder="Enter days" class="form-control form-control-sm" required min="1"></td><td class="align-middle"><input type="number" name="tourist_count[]" placeholder="Enter count" class="form-control form-control-sm" required min="1"></td><td class="align-middle"><input type="number" name="cost_person[]" placeholder="Cost per person" class="form-control form-control-sm" required min="1"></td><td class="align-middle"><input type="number" name="total_cost[]" readonly="readonly" class="form-control form-control-sm" required></td><td class="align-middle"><div class="d-flex"><button type="button" class="btn btn-default btn-xs add-row"><i class="fa fa-plus-circle"></i></button>&nbsp;<button type="button" class="btn btn-default btn-xs remove-row"><i class="fa fa-minus-circle"></i></button></div></td></tr>';
        var flight = '<tr><td class="align-middle text-left">Flight Booking <input type="hidden" name="service_name[]" value="Flight Booking"></td><td class="align-middle"><input type="date" name="date[]" placeholder="" class="form-control form-control-sm" required></td><td class="align-middle"><input type="text" name="name[]" placeholder="Name" class="form-control form-control-sm" required></td><td class="align-middle"><input type="text" name="from[]" placeholder="From" class="form-control form-control-sm" required></td><td class="align-middle"><input type="text" name="to[]" placeholder="To" class="form-control form-control-sm" required></td><td class="align-middle"><input type="hidden" name="days[]" value=""><select class="form-control form-control-sm" name="class[]" required><option value="">Class</option><option value="Economy">Economy</option><option value="Premium Economy">Premium Economy</option><option value="Business">Business</option></select></td><td class="align-middle"><input type="number" name="tourist_count[]" placeholder="Enter count" class="form-control form-control-sm" min="1"></td><td class="align-middle"><input type="number" name="cost_person[]" placeholder="Enter cost" class="form-control form-control-sm" min="1"></td><td class="align-middle"><input type="number" name="total_cost[]" readonly="readonly" class="form-control form-control-sm"></td><td class="align-middle"><div class="d-flex"><button type="button" class="btn btn-default btn-xs add-row"><i class="fa fa-plus-circle"></i></button>&nbsp;<button type="button" class="btn btn-default btn-xs remove-row"><i class="fa fa-minus-circle"></i></button></div></td></tr>';
        var train = '<tr><td class="align-middle text-left">Train Booking <input type="hidden" name="service_name[]" value="Train Booking"></td><td class="align-middle"><input type="date" name="date[]" class="form-control form-control-sm" required></td><td class="align-middle"><input type="text" name="name[]" placeholder="Name" class="form-control form-control-sm" required></td><td class="align-middle"><input type="text" name="from[]" placeholder="From" class="form-control form-control-sm amount_paid" required></td><td class="align-middle"><input type="text" name="to[]" placeholder="To" class="form-control form-control-sm" required></td><td class="align-middle"><input type="hidden" name="days[]" value=""><select class="form-control form-control-sm" name="class[]" required><option value="">Class</option><option value="Sleeper Class">Sleeper Class</option><option value="Third AC">Third AC</option><option value="Second AC">Second AC</option><option value="First AC">First AC</option><option value="Second Seating">Second Seating</option><option value="Vistadome AC">Vistadome AC</option><option value="AC chair cars">AC chair cars</option><option value="First Class">First Class</option></select></td><td class="align-middle"><input type="number" name="tourist_count[]" placeholder="Enter count" class="form-control form-control-sm" min="1" required></td><td class="align-middle"><input type="number" name="cost_person[]" placeholder="Enter cost" class="form-control form-control-sm" min="1" required></td><td class="align-middle"><input type="number" name="total_cost[]" readonly="readonly" class="form-control form-control-sm"></td><td class="align-middle"><div class="d-flex"><button type="button" class="btn btn-default btn-xs add-row"><i class="fa fa-plus-circle"></i></button>&nbsp;<button type="button" class="btn btn-default btn-xs remove-row"><i class="fa fa-minus-circle"></i></button></div></td></tr>';
        var bus = '<tr><td class="align-middle text-left">Bus Booking <input type="hidden" name="service_name[]" value="Bus Booking"></td><td class="align-middle"><input type="date" name="date[]" class="form-control form-control-sm" required></td><td class="align-middle"><input type="text" name="name[]" placeholder="Name" class="form-control form-control-sm" required></td><td class="align-middle"><input type="text" name="from[]" placeholder="From" class="form-control form-control-sm" required></td><td class="align-middle"><input type="text" name="to[]" placeholder="To" class="form-control form-control-sm" required></td><td class="align-middle">- <input type="hidden" name="class[]" value=""> <input type="hidden" name="days[]" value=""></td><td class="align-middle"><input type="number" name="tourist_count[]" placeholder="Enter count" class="form-control form-control-sm" min="1" required></td><td class="align-middle"><input type="number" name="cost_person[]" placeholder="Enter cost" class="form-control form-control-sm" min="1" required></td><td class="align-middle"><input type="number" name="total_cost[]" readonly="readonly" class="form-control form-control-sm"></td><td class="align-middle"><div class="d-flex"><button type="button" class="btn btn-default btn-xs add-row"><i class="fa fa-plus-circle"></i></button>&nbsp;<button type="button" class="btn btn-default btn-xs remove-row"><i class="fa fa-minus-circle"></i></button></div></td></tr>';
        var cruise = '<tr><td class="align-middle text-left">Cruise Booking <input type="hidden" name="service_name[]" value="Cruise Booking"></td><td class="align-middle"><input type="date" name="date[]" class="form-control form-control-sm" required></td><td class="align-middle"><input type="text" name="name[]" placeholder="Name" class="form-control form-control-sm" required></td><td class="align-middle"><input type="text" name="from[]" placeholder="From" class="form-control form-control-sm" required></td><td class="align-middle"><input type="text" name="to[]" placeholder="To" class="form-control form-control-sm" required></td><td class="align-middle">- <input type="hidden" name="class[]" value=""> <input type="hidden" name="days[]" value=""></td><td class="align-middle"><input type="number" name="tourist_count[]" placeholder="Enter count" class="form-control form-control-sm" min="1" required></td><td class="align-middle"><input type="number" name="cost_person[]" placeholder="Enter cost" class="form-control form-control-sm" min="1" required></td><td class="align-middle"><input type="number" name="total_cost[]" readonly="readonly" class="form-control form-control-sm"></td><td class="align-middle"><div class="d-flex"><button type="button" class="btn btn-default btn-xs add-row"><i class="fa fa-plus-circle"></i></button>&nbsp;<button type="button" class="btn btn-default btn-xs remove-row"><i class="fa fa-minus-circle"></i></button></div></td></tr>';
        var cab = '<tr><td class="align-middle text-left">Cab Booking <input type="hidden" name="service_name[]" value="Cab Booking"></td><td class="align-middle"><input type="date" name="date[]" class="form-control form-control-sm" required></td><td class="align-middle"><input type="text" name="name[]" placeholder="Name" class="form-control form-control-sm" required></td><td class="align-middle"><input type="text" name="from[]" placeholder="From" class="form-control form-control-sm" required></td><td class="align-middle"><input type="text" name="to[]" placeholder="To" class="form-control form-control-sm" required></td><td class="align-middle"><input type="hidden" name="days[]" value=""><select class="form-control form-control-sm" name="class[]" required><option value="">Class</option><option value="Sedan">Sedan</option><option value="SUV">SUV</option><option value="Tempo Traveler - 12">Tempo Traveler - 12</option><option value="Tempo Traveler - 17">Tempo Traveler - 17</option><option value="Bus">Bus</option></select></td><td class="align-middle"><input type="number" name="tourist_count[]" placeholder="Enter count" class="form-control form-control-sm" min="1" required></td><td class="align-middle"><input type="number" name="cost_person[]" placeholder="Enter cost" class="form-control form-control-sm" min="1" required></td><td class="align-middle"><input type="number" name="total_cost[]" class="form-control form-control-sm" readonly="readonly"></td><td class="align-middle"><div class="d-flex"><button type="button" class="btn btn-default btn-xs add-row"><i class="fa fa-plus-circle"></i></button>&nbsp;<button type="button" class="btn btn-default btn-xs remove-row"><i class="fa fa-minus-circle"></i></button></div></td></tr>';
        var visa = '<tr><td class="align-middle text-left">Visa Service <input type="hidden" name="service_name[]" value="Visa Service"></td><td class="align-middle"><input type="date" name="date[]" class="form-control form-control-sm" required></td><td class="align-middle"><input type="text" name="name[]" placeholder="Name" class="form-control form-control-sm" required></td><td class="align-middle">- <input type="hidden" name="from[]" value=""></td><td class="align-middle"><input type="text" name="to[]" placeholder="To" class="form-control form-control-sm" required></td><td class="align-middle">- <input type="hidden" name="class[]" value=""> <input type="hidden" name="days[]" value=""></td><td class="align-middle"><input type="number" name="tourist_count[]" placeholder="Enter count" class="form-control form-control-sm" min="1" required></td><td class="align-middle"><input type="number" name="cost_person[]" placeholder="Enter cost" class="form-control form-control-sm" min="1" required></td><td class="align-middle"><input type="number" name="total_cost[]" readonly="readonly" class="form-control form-control-sm"></td><td class="align-middle"><div class="d-flex"><button type="button" class="btn btn-default btn-xs add-row"><i class="fa fa-plus-circle"></i></button>&nbsp;<button type="button" class="btn btn-default btn-xs remove-row"><i class="fa fa-minus-circle"></i></button></div></td></tr>';
        var passport = '<tr><td class="align-middle text-left">Passport Service <input type="hidden" name="service_name[]" value="Passport Service"></td><td class="align-middle"><input type="date" name="date[]" class="form-control form-control-sm" required></td><td class="align-middle"><input type="text" name="name[]" placeholder="Name" class="form-control form-control-sm" required></td><td class="align-middle">- <input type="hidden" name="from[]" value=""></td><td class="align-middle"><input type="text" name="to[]" placeholder="To" class="form-control form-control-sm" required></td><td class="align-middle">- <input type="hidden" name="class[]" value=""> <input type="hidden" name="days[]" value=""></td><td class="align-middle"><input type="number" name="tourist_count[]" placeholder="Enter count" class="form-control form-control-sm" min="1" required></td><td class="align-middle"><input type="number" name="cost_person[]" placeholder="Enter cost" class="form-control form-control-sm" min="1" required></td><td class="align-middle"><input type="number" name="total_cost[]" readonly="readonly" class="form-control form-control-sm"></td><td class="align-middle"><div class="d-flex"><button type="button" class="btn btn-default btn-xs add-row"><i class="fa fa-plus-circle"></i></button>&nbsp;<button type="button" class="btn btn-default btn-xs remove-row"><i class="fa fa-minus-circle"></i></button></div></td></tr>';

        // Function to append row based on selected service
        $('#addService').on('change', function() {
            var selectedService = $(this).val();

            // Initialize newRow variable to store the selected row string
            var newRow;

            // Determine which row string to use based on selectedService
            switch(selectedService) {
                case 'Hotel':
                    newRow = hotel;
                    break;
                case 'Flight':
                    newRow = flight;
                    break;
                case 'Train':
                    newRow = train;
                    break;
                case 'Bus':
                    newRow = bus;
                    break;
                case 'Cruise':
                    newRow = cruise;
                    break;
                case 'Cab':
                    newRow = cab;
                    break;
                case 'Visa':
                    newRow = visa;
                    break;
                case 'Passport':
                    newRow = passport;
                    break;
                default:
                    newRow = ''; // Default to an empty string if no matching service found
                    break;
            }

            // Append the new row to the appropriate table
            if (newRow) {
                if (selectedService === "Hotel") {
                    $('#tab_logic').append(newRow);
                } else {
                    $('#tab_logic1').append(newRow);
                }
            }
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

            // Add the values of additional fields to the subtotal
            subtotal += parseFloat($('[name="visa"]').val() || 0);
            subtotal += parseFloat($('[name="insurance"]').val() || 0);
            subtotal += parseFloat($('[name="visa_appointment"]').val() || 0);
            subtotal += parseFloat($('[name="swiss_pass"]').val() || 0);
            subtotal += parseFloat($('[name="land_package"]').val() || 0);
            subtotal += parseFloat($('[name="passport_services"]').val() || 0);

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

        // Calculate grand total when additional fields change
        $('input[name="visa"], input[name="insurance"], input[name="visa_appointment"], input[name="swiss_pass"], input[name="land_package"], input[name="passport_services"]').on('input', function() {
            calculateTotalCost();
        });

        // Update balance when payment received changes
        $('[name="payment_received"]').on('input', function() {
            updateBalance();
        });

        // Function to add a new row
        $("table").on("click", ".add-row", function() {
            var newRow = $(this).closest("tr").clone(true);
            newRow.find("input:not([name='service_name[]'])").val(""); // Clear input values in the new row
            newRow.find(".add-row").remove();
            // newRow.find("td:last").append('<button type="button" class="btn btn-default btn-sm ml-1 remove-row"><i class="fa fa-minus-circle"></i></button>');
            $(this).closest("tr").after(newRow);
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

@endsection('scripts')