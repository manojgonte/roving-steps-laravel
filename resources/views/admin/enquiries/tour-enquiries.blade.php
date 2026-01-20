@extends('layouts/adminLayout/admin_design')
@section('content')

@section('styles')
    <link rel="stylesheet" href="{{asset('backend_plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend_plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend_css/sumoselect.css')}}">
    <style>
        .SumoSelect>.CaptionCont>span.placeholder {
            color: #495057 !important;
        }
    </style>
@endsection('styles')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Tour Enquiries <span class="badge badge-dark">{{$tour_enquiry->total()}}</span></h4>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <form action="" method="GET">
                                <div class="row d-flex justify-content-start">
                                    <div class="col-auto">
                                        <select class="form-control select2bs4" name="tour_id" onchange="javascript:this.form.submit();">
                                            <option value="" selected>-- All Tours --</option>
                                            @foreach($tours as $tour)
                                            @if($tour->tour_name)
                                            <option value="{{$tour->tour_id}}" @if(Request()->tour_id == $tour->tour_id) selected @endif>{{Str::limit($tour->tour_name, 30)}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <input class="form-control" name="q" placeholder="Search..." value="@if(!empty(Request()->q)) {{Request()->q}} @endif">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-default"> Submit</button>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{url('admin/tour-enquiries/')}}" class="btn btn-default"> Clear</a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ url('admin/new-enquiry') }}" class="btn btn-dark"> <i class="fa fa-plus-circle"></i> New Enquiry</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            @if(count($tour_enquiry) > 0)
                            <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer Details</th>
                                        <th>Tour</th>
                                        <th>Services</th>
                                        <th>Tourist No</th>
                                        <th>Travel Date</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tour_enquiry as $key => $row)
	                                <tr>
	                                    <td>{{ $tour_enquiry->firstItem() + $key }}</td>
                                        <td class="text-left">
                                            <i class="fa fa-user"></i> @if(filter_var($row->name, FILTER_VALIDATE_INT) == false) {{ $row->name }} @else {{$row->user->name}} @endif <br> 
                                            <i class="fa fa-envelope"></i> {{ !empty($row->email) ? $row->email : $row->user?->email }} <br> 
                                            <i class="fa fa-phone"></i> {{ !empty($row->contact) ? $row->contact : $row->user?->contact }}<br> 
                                            @if($row->current_city)<i class="fa fa-city"></i> {{ $row->current_city }}@endif
                                        </td>
                                        <td>
                                            @if($row->tour_id)
                                            <a href="{{url('tour-details/'.$row->tour_id.'/'.Str::slug($row->tour_name))}}" target="_blank" noreferrer noopener> {{ $row->tour_name }} </a>
                                            @else
                                            NA
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->services)
                                            @foreach($row->services as $service)
                                            <span class="badge badge-dark">{{ $service }}</span>@if($loop->last) @else <br> @endif
                                            @endforeach
                                            @else
                                            NA
                                            @endif
                                        </td>
	                                    <td>{{ $row->tourist_no ? $row->tourist_no : 'NA' }}</td>
	                                    <td>{{ $row->from_date ? date('d/m/Y', strtotime($row->from_date)) : 'NA' }} - <br>{{ $row->end_date ? date('d/m/Y', strtotime($row->end_date)) : 'NA' }}</td>
	                                    <td>{{ $row->message ? $row->message : 'NA' }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                        <a href="{{ url('/admin/create-estimation/'.base64_encode($row->id))}}" class="dropdown-item"><i class="fa fa-file-invoice-dollar mr-2"></i> Create Estimation</a>
                                                        <a href="{{ url('/admin/plan-tour?tour_id='.$row->tour_id.'&name='.$row->name.'&tourist_count='.$row->tourist_no.'&from_date='.$row->from_date.'&end_date='.$row->end_date) }}" class="dropdown-item"><i class="fa fa-campground"></i> Create Custom Tour</a>
                                                        <a class="dropdown-divider"></a>
                                                        <a href="{{ url('/admin/edit-tour-enquiry/'.$row->id) }}" class="dropdown-item"><i class="fa fa-pencil-alt mr-2"></i> Edit</a>
                                                        <a onclick="return confirm('Are you sure')" href="{{ url('/admin/delete-tour-enquiry/'.$row->id) }}" class="dropdown-item"><i class="fa fa-trash mr-2"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
	                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-2 d-flex justify-content-center">
                                {{ $tour_enquiry->links("pagination::bootstrap-4") }}
                            </div>
                            @else
                            <div class="alert alert-dark">No tour enquiries found</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@section('scripts')
<script src="{{asset('backend_js/jquery.sumoselect.js')}}"></script>
<script src="{{asset('backend_plugins/select2/js/select2.full.min.js')}}"></script>

<script>
    $(function () {
        $('.select2').select2()
    });
</script>

<script>
    $(document).ready(function() {
        $.validator.addMethod("greaterThan", function (value, element, params) {
            var from_date_value = $(params).val();
            var end_date_value = value;

            if (from_date_value && end_date_value) {
                from_date_value = new Date(from_date_value);
                end_date_value = new Date(end_date_value);

                return end_date_value > from_date_value;
            }

            return true;
        }, "End Date must be greater than From Date.");
        $('#tourEnq').validate({
            ignore: [],
            debug: false,
            rules: {
                contact: {
                    required: false,
                    minlength: 10,
                    maxlength: 10
                },
                from_date: {
                    required: false,
                },
                end_date: {
                    required: false,
                    greaterThan: "#from_date" // Custom rule for greater than from_date
                }
            },
            messages: {
                from_date: {
                    required: "Please select a From Date."
                },
                end_date: {
                    required: "Please select an End Date.",
                    greaterThan: "End Date must be greater than From Date."
                }
            },
            submitHandler: function(form) {
                $(".submit").attr("disabled", true);
                $(".submit").html("<span class='fa fa-spinner fa-spin'></span> Please wait...");
                form.submit();
            }
        });
    });
</script>

<script>
    $((function(){
        window.asd=$(".SlectBox").SumoSelect({csvDispCount:3,selectAll:!0,captionFormatAllSelected:"Yeah, OK, so everything."}),window.Search=$(".search-box").SumoSelect({csvDispCount:3,search:!0,searchText:"Enter here."}),window.sb=$(".SlectBox-grp-src").SumoSelect({csvDispCount:3,search:!0,searchText:"Enter here.",selectAll:!0}),$(".sumoselect").SumoSelect({placeholder: 'Select'}),$(".selectsum1").SumoSelect({okCancelInMulti:!0,selectAll:!0}),$(".selectsum2").SumoSelect({selectAll:!0})}));
</script>
@endsection('scripts')

@endsection