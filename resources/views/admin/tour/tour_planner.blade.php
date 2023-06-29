@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Tour Planner</h4>
                </div>
                <div class="col-sm-6">
                    <a href="{{ url('/admin/add-tour') }}" style="float: right; margin: 3px 3px;" class="btn btn-warning text-white"><i class="fa fa-plus-circle"></i> Add Tour</a>
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
			                  	<li class="nav-item"><a class="nav-link active" href="{{url('admin/tours/ongoing')}}">Planned</a></li>
			                  	<li class="nav-item"><a class="nav-link" href="{{url('admin/tour-enquiries')}}">Tour Enquiries</a></li>
			                  	<li class="nav-item"><a class="nav-link" href="#">Draft</a></li>
			                </ul>
			            </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                                <thead>
                                    <tr>
                                        <th>Tour ID</th>
                                        <th>Tour Name</th>
                                        <th>Tour Type</th>
                                        <th>Status</th>
                                        <th>Likes</th>
                                        <th>Booked</th>
                                        <th>Updated On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tours as $row)
	                                <tr>
	                                    <td>{{ $row->id }}</td>
	                                    <td>{{ Str::limit($row->tour_name, 30) }}</td>
	                                    <td>{{ $row->type }}</td>
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
	                                    <td>NA</td>
	                                    <td>NA</td>
	                                    <td>{{date('d/m/Y', strtotime($row->updated_at))}}</td> 
	                                    <td>
	                                        <button class="btn btn-default disabled" disbaled href="{{ url('/admin/download-tour/'.$row->id) }}"><i class="fa fa-download" style="color: #000;"></i></button> &nbsp;
	                                        <button class="btn btn-default" onclick="getTourId(this);" tourId="{{$row->id}}" data-toggle="modal" data-target="#tour-share"><i class="fa fa-share"></i></button> &nbsp;
	                                        <a class="btn btn-default" href="{{ url('/admin/edit-tour/'.$row->id) }}"><i class="fa fa-edit" style="color: #000;"></i></a> &nbsp;
	                                        <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ url('/admin/delete-tour/'.$row->id) }}"><i class="fa fa-trash"></i></a> &nbsp;
	                                        <a class="btn btn-primary" href="{{ url('/admin/itinerary-builder/'.$row->id) }}"><i class="fa fa-th"></i></a>
	                                    </td>
	                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $tours->links("pagination::bootstrap-4") }}
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
            <form action="{{url('admin/share-tour/')}}" method="POST">@csrf
                <input type="hidden" id="tourId" name="tour_id" value="">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputEmail">Emails</label>
                        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Enter Email" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="inputSubject">Subject</label>
                        <input type="text" name="subject" id="inputSubject" class="form-control" placeholder="Enter Subject" value="" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info">Send</button>
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
@endsection

@endsection