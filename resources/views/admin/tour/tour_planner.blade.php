@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Tour Planner</h4>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('/admin/add-tour') }}" class="btn btn-dark"><i class="fa fa-plus-circle"></i> Plan Tour</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                	@if(Session::has('flash_message_error'))
		            <div class="alert alert-alert alert-block">
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
                    <div class="card">
                        <div class="card-header p-2">
			                <ul class="nav nav-pills">
			                  	<li class="nav-item"><a class="nav-link @if(Request()->status == 1) active @endif" href="{{url('admin/tour-planner/1')}}">Planned</a></li>
			                  	<li class="nav-item"><a class="nav-link @if(Request()->status == 0) active @endif" href="{{url('admin/tour-planner/0')}}">Draft</a></li>
			                </ul>
			            </div>

                        <div class="card-header">
                            <form action="" method="GET">
                                <div class="row d-flex justify-content-start">
                                    <div class="col-auto">
                                        <select class="form-control select2bs4" name="dest_id" onchange="javascript:this.form.submit();">
                                            <option value="" selected>-- All Destinations --</option>
                                            @foreach($destinations as $dest)
                                            <option value="{{$dest->dest_id}}" @if(Request()->dest_id == $dest->dest_id) selected @endif>{{$dest->destination}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-control select2bs4" name="type" onchange="javascript:this.form.submit();">
                                            <option value="" selected>-- Tour Type --</option>
                                            <option value="Domestic" @if(Request()->type == 'Domestic') selected @endif>Domestic</option>
                                            <option value="International" @if(Request()->type == 'International') selected @endif>International</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <input class="form-control" name="q" placeholder="Search..." value="@if(!empty(Request()->q)) {{Request()->q}} @endif">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-default"> Submit</button>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{url('admin/tour-planner/'.Request()->status)}}" class="btn btn-default"> Clear</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card-body">
                            @if(count($tours) > 0)
                            <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                                <thead>
                                    <tr>
                                        <th>Tour ID</th>
                                        <th class="text-left">Tour Name</th>
                                        <th>Type</th>
                                        <th>Destination</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                        {{-- <th>Likes</th> --}}
                                        {{-- <th>Booked</th> --}}
                                        <th>Updated On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tours as $row)
	                                <tr>
	                                    <td>{{ $row->id }}</td>
	                                    <td class="text-left">{{ Str::limit($row->tour_name, 40) }}</td>
	                                    <td>{{ $row->type }}</td>
                                        <td>{{ Str::limit($row->destination, 20) }}</td>
                                        <td>{{ $row->days }}D | {{ $row->nights }}N</td>
	                                    <td>
                                            <form action="{{ url('admin/update-tour-status/'.$row->id) }}" method="post">@csrf
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="status" value="1" @if($row->status=="1") checked @endif class="custom-control-input" id="customSwitch1{{$row->id}}" onchange="javascript:this.form.submit();">
                                                    <label class="custom-control-label" for="customSwitch1{{$row->id}}"></label>
                                                </div>
                                            </div>
                                            </form>
                                        </td>
	                                    {{-- <td>NA</td> --}}
	                                    {{-- <td>NA</td> --}}
	                                    <td>{{date('d/m/Y', strtotime($row->updated_at))}}</td> 
	                                    <td>
                                            <div class="btn-group dropleft">
                                                <button type="button" class="btn btn-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{url('admin/download-tour/'.$row->id)}}"><i class="fa fa-download"></i> &nbsp; Download</a>
                                                    <a class="dropdown-item" style="cursor: pointer;" onclick="getTourId(this);" tourId="{{$row->id}}" data-toggle="modal" data-target="#tour-share"><i class="fa fa-share"></i> &nbsp; Share</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="{{ url('/admin/edit-tour/'.$row->id) }}"><i class="fa fa-edit"></i> &nbsp; Edit</a>
                                                    <a class="dropdown-item" href="{{ url('/admin/delete-tour/'.$row->id) }}" onclick="return confirm('Are you sure? All associated data with this tour will be get deleted.')"> <i class="fa fa-trash"></i> &nbsp; Delete </a>
                                                </div>
                                            </div>
	                                    </td>
	                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-2 d-flex justify-content-center">
                                {{ $tours->links("pagination::bootstrap-4") }}
                            </div>
                            @else
                            <div class="alert alert-dark">No tours found</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="tour-share">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Share Tour on Mail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/share-tour/')}}" method="POST" id="shareTour">@csrf
                <input type="hidden" id="tourId" name="tour_id" value="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Enter Email" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="inputSubject">Subject</label>
                        <input type="text" name="subject" id="inputSubject" class="form-control" placeholder="Enter Subject" value="" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info submit">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
    function getTourId(el){
        tourId = $(el).attr('tourId');
        $('#tourId').val(tourId);
    }
</script>
@endsection('scripts')

<script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#shareTour').validate({
            ignore: [],
            debug: false,
            rules: {
                email: {
                    required: true,
                    email:true,
                },
                subject: {
                    required: true,
                    maxlength:200,
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

@endsection