@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Tour - Enquiries</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Tour enquiry list </li>
                    </ol>
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
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#form-modal"> <i class="fa fa-plus-circle"></i> Add Enquiry</button>
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
                                        <th>Tour Name</th>
                                        <th>Customer Details</th>
                                        <th>Tourist No</th>
                                        <th>Travel Date</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tour_enquiry as $row)
	                                <tr>
	                                    <td>{{ $row->id }}</td>
                                        <td>
                                            @if($row->tour_id)
                                            <a href="{{url('tour-details/'.$row->tour_id.'/'.Str::slug($row->tour_name))}}" target="_blank" noreferrer noopener> {{ $row->tour_name }} </a>
                                            @else
                                            -
                                            @endif
                                        </td>
	                                    <td class="text-left"><i class="fa fa-user"></i> {{ Str::limit($row->name, 30) }} <br> 
                                            <i class="fa fa-envelope"></i> {{ $row->email }} <br> 
                                            <i class="fa fa-phone"></i> {{ $row->contact }}<br> 
                                            <i class="fa fa-city"></i> {{ $row->current_city ? $row->current_city : 'NA' }}
                                        </td>
	                                    <td>{{ $row->tourist_no ? $row->tourist_no : 'NA' }}</td>
	                                    <td>{{ $row->from_date ? date('d/m/Y', strtotime($row->from_date)) : 'NA' }} - <br>{{ $row->end_date ? date('d/m/Y', strtotime($row->end_date)) : 'NA' }}</td>
	                                    <td>{{ $row->message }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a class="btn btn-light btn-sm mr-1" title="Create Custom Tour" href="{{ url('/admin/plan-tour?tour_id='.$row->tour_id.'&name='.$row->name.'&tourist_count='.$row->tourist_no.'&from_date='.$row->from_date.'&end_date='.$row->end_date) }}"><i class="fa fa-campground"></i></a>
                                                <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure')" href="{{ url('/admin/delete-tour-enquiry/'.$row->id) }}"><i class="fa fa-trash"></i></a>
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

<div class="modal fade" id="form-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Enquiry</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('admin/add-enquiry') }}" enctype="multipart/form-data" id="tourEnq">@csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="required">Customer Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Customer Contact No.</label>
                                <input type="text" name="contact" class="form-control" placeholder="Enter phone">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required">Customer Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Tour</label>
                                <select class="form-control select2bs4" name="tour_id" >
                                    <option value="" selected>Select One</option>
                                    @foreach(App\Models\Tour::select('id','tour_name','days','nights')->orderBy('custom_tour','DESC')->orderBy('tour_name','ASC')->get() as $row)
                                    <option value="{{$row->id}}" @if(Request()->tour_id == $row->id) selected @endif>{{$row->tour_name}} | {{$row->nights}}N/{{$row->days}}D</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required">Tourist Count</label>
                                <input type="number" min="1" name="tourist_no" class="form-control" placeholder="Enter count" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="required">Current City</label>
                                <input type="text" name="current_city" class="form-control" placeholder="Enter city" required>
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
                                <label class="required">Message</label>
                                <textarea name="message" class="form-control" placeholder="Enter message" rows="3" required></textarea>
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
@endsection('scripts')

@endsection