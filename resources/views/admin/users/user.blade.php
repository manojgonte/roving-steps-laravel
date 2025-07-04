@extends('layouts/adminLayout/admin_design')
@section('content')

@section('styles')
<style>
    .bg-gray-100 {
        background-color: #e9ecef;
        opacity: 1;
    }
</style>
@endsection('styles')

<div class="content-wrapper">
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Customer: <b>{{$user->name}}</b></h4>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/edit-user/'.$user->id) }}" class="btn btn-default"> <i class="fa fa-pencil-alt"></i> Update Details </a>
                    <a href="{{url('admin/registered-users')}}" class="btn btn-default"> Go Back </a>
                </div>
            </div>
            @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
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
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Customer Name</label>
                            <input class="form-control" disabled readonly value="{{$user->name}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Email</label>
                            <input class="form-control" readonly value="{{$user->email ?? 'NA'}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Primary Contact No.</label>
                            <input class="form-control" readonly value="{{$user->contact ?? 'NA'}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Secondary Contact No.</label>
                            <input class="form-control" readonly value="{{$user->contact_alt ?? 'NA'}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Address</label>
                            <input class="form-control" readonly value="{{$user->address ?? 'NA'}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label>GST No.</label>
                            <input class="form-control" readonly value="{{$user->gst_no ?? 'NA'}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label>GST Address</label>
                            <input class="form-control" readonly value="{{$user->gst_address ?? 'NA'}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Birth Date</label>
                            <span class="form-control bg-gray-100">{{ $user->dob ? date('d M Y', strtotime($user->dob)) : 'NA' }}</span>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Anniversary Date</label>
                            <span class="form-control bg-gray-100">{{ $user->anniversary_date ? date('d M Y', strtotime($user->anniversary_date)) : 'NA' }}</span>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Visa Type</label>
                            <input class="form-control" readonly value="{{$user->visa_type ?? 'NA'}}">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Visa Expiry</label>
                            <span class="form-control bg-gray-100">{{$user->visa_expiry ? date('d M Y', strtotime($user->visa_expiry)) : 'NA'}}</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- documents -->
            <div class="card card-default">
                <div class="card-body">
                    <h6>Documents</h6>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Document Name</th>
                                <th>Document Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PAN Card</td>
                                <td>{{$user->pan_no ?? 'NA'}}</td>
                                <td>
                                    @if($user->pan_card_file)
                                    <a class="btn btn-dark btn-sm" href="{{ asset('img/user/'.$user->pan_card_file) }}">View Document</a>
                                    <a class="btn btn-dark btn-sm" href="{{ asset('img/user/'.$user->pan_card_file) }}" download><i class="fa fa-download"></i> Download</a>
                                    @else
                                    -
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Aadhar Card</td>
                                <td>{{$user->aadhar_no  ?? 'NA'}}</td>
                                <td>
                                    @if($user->aadhar_card_file)
                                    <a class="btn btn-dark btn-sm" href="{{ asset('img/user/'.$user->aadhar_card_file) }}">View Document</a>
                                    <a class="btn btn-dark btn-sm" href="{{ asset('img/user/'.$user->aadhar_card_file) }}" download><i class="fa fa-download"></i> Download</a>
                                    @else
                                    -
                                    @endif                                    
                                </td>
                            </tr>
                            <tr>
                                <td>Passport</td>
                                <td>{{$user->passport_no ?? 'NA'}} @if($user->passport_expiry)<div class="badge badge-dark">Exp Date: {{ date('d M Y', strtotime($user->passport_expiry)) }}</div> @endif</td>
                                <td>
                                    @if($user->passport_file)
                                    <a class="btn btn-dark btn-sm" href="{{ asset('img/user/'.$user->passport_file) }}">View Document</a>
                                    <a class="btn btn-dark btn-sm" href="{{ asset('img/user/'.$user->passport_file) }}" download><i class="fa fa-download"></i> Download</a>
                                    @else
                                    -
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card card-default">
                <div class="card-body">
                    <h6>Tours</h6>
                    @if(count($user->planned_tours) > 0)
                    <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                        <thead>
                            <tr>
                                <th>Sr.No.</th>
                                <th class="text-left">Tour Name</th>
                                <th>Destination</th>
                                <th>Tourist Count</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Final</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user->planned_tours as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td class="text-left">@if($row->tour)<a href="{{url('admin/edit-tour/'.$row->tour_id)}}">{{ Str::limit($row->tour->tour_name, 40) }}</a> @else Tour not found @endif</td>
                                {{-- <td>{{ $row->tour->type }}</td> --}}
                                <td>@if($row->tour) {{ Str::limit($row->tour->destination->name, 20) }} @else Tour not found @endif</td>
                                <td>{{ $row->tourist_count }}</td>
                                <td>{{ $row->from_date ? date('d/m/Y', strtotime($row->from_date)) : '-' }}</td> 
                                <td>{{ $row->end_date ? date('d/m/Y', strtotime($row->end_date)) : '-' }}</td>
                                <td>
                                    <form action="{{ url('admin/update-custom-tour-status/'.$row->id) }}" method="post">@csrf
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="status" value="1" @if($row->status=="1") checked @endif class="custom-control-input" id="customSwitch1{{$row->id}}" onchange="javascript:this.form.submit();">
                                            <label class="custom-control-label" for="customSwitch1{{$row->id}}"></label>
                                        </div>
                                    </div>
                                    </form>
                                </td> 
                                <td>
                                    <a class="btn btn-default" href="{{ url('/admin/edit-plan-tour/'.$row->id) }}"><i class="fa fa-pencil-alt"></i></a> &nbsp;
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ url('/admin/delete-plan-tour/'.$row->id) }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-dark">
                        No tours found
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

@endsection