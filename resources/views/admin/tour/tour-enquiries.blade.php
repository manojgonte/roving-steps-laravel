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
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#enquiry-modal"> <i class="fa fa-plus-circle"></i> New Enquiry</button>
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
                                        <th>Tour Name</th>
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
                                            <i class="fa fa-user"></i> @if(filter_var($row->name, FILTER_VALIDATE_INT) == false) {{ $row->name }} @else {{getUser($row->name)->name}} @endif <br> 
                                            <i class="fa fa-envelope"></i> {{ $row->email ? $row->email : 'NA' }} <br> 
                                            <i class="fa fa-phone"></i> {{ $row->contact ? $row->contact : 'NA' }}<br> 
                                            <i class="fa fa-city"></i> {{ $row->current_city ? $row->current_city : 'NA' }}
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
                                                    <button type="button" class="btn btn-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                        <a href="{{ url('/admin/create-estimation/'.base64_encode($row->id))}}" class="dropdown-item"><i class="fa fa-file-invoice-dollar mr-2"></i> Create Estimation</a>
                                                        <a href="{{ url('/admin/plan-tour?tour_id='.$row->tour_id.'&name='.$row->name.'&tourist_count='.$row->tourist_no.'&from_date='.$row->from_date.'&end_date='.$row->end_date) }}" class="dropdown-item"><i class="fa fa-campground"></i> Create Custom Tour</a>
                                                        <a class="dropdown-divider"></a>
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

<div class="modal fade" id="enquiry-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Enquiry</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('admin/add-enquiry') }}" enctype="multipart/form-data" id="tourEnq">@csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="">Customer Name * <a href="{{ url('admin/add-user') }}" target="_blank">Create New User</a></label>
                                <!-- <input type="text" name="name" class="form-control" placeholder="Enter name" required> -->
                                <select class="form-control select2" id="name" name="name" required>
                                    <option value="" selected>Select One</option>
                                    @foreach(App\Models\User::select('id','name')->orderBy('name','ASC')->get() as $user)
                                    <option value="{{$user->id}}" @if(Request()->user_id == $user->id) selected @endif>{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Customer Contact No.</label>
                                <input type="text" name="contact" class="form-control" placeholder="Enter phone">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Customer Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Tour</label>
                                <select class="form-control select2" name="tour_id" >
                                    <option value="" selected>Select One</option>
                                    @foreach(App\Models\Tour::select('id','tour_name','days','nights')->orderBy('custom_tour','DESC')->orderBy('tour_name','ASC')->get() as $row)
                                    <option value="{{$row->id}}" @if(Request()->tour_id == $row->id) selected @endif>{{$row->tour_name}} | {{$row->nights}}N/{{$row->days}}D</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Services</label>
                                <select name="services[]" class="form-control sumoselect" multiple>
                                    <option value="Hotel Booking">Hotel Booking</option>
                                    <option value="Bus Booking">Bus Booking</option>
                                    <option value="Flight Booking">Flight Booking</option>
                                    <option value="Train Booking">Train Booking</option>
                                    <option value="Cab Booking">Cab Booking</option>
                                    <option value="Cruise Booking">Cruise Booking</option>
                                    <option value="Visa Service">Visa Service</option>
                                    <option value="Passport Service">Passport Service</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Tourist Count</label>
                                <input type="number" min="1" name="tourist_no" class="form-control" placeholder="Enter count" >
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Current City</label>
                                <input type="text" name="current_city" class="form-control" placeholder="Enter city" >
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">From Date</label>
                                <input type="date" name="from_date" id="from_date" class="form-control" placeholder="Enter Date">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">To Date</label>
                                <input type="date" name="end_date" class="form-control" placeholder="Enter Date">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="">Message</label>
                                <textarea name="message" class="form-control" placeholder="Enter message" rows="3" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-dark submit"><i class="fa fa-check-circle"></i> Create </button>
                        <button type="reset" class="btn btn-default"> Reset </button>
                        <button class="btn btn-default" data-dismiss="modal" aria-label="Close"> Cancel </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script src="{{asset('backend_js/jquery.sumoselect.js')}}"></script>
<script src="{{asset('backend_plugins/select2/js/select2.full.min.js')}}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const url = new URL(window.location.href);
        const userId = url.searchParams.get("user_id");

        // Check if current path is exactly /admin/tour-enquiries and user_id is present
        if (window.location.pathname === "/admin/tour-enquiries" && userId) {
            $('#enquiry-modal').modal('show');
        }
    });
</script>

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