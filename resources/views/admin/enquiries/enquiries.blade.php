@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Contact Us - Enquiries</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Enquiry List </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                	@if(Session::has('flash_message_error'))
		            <div class="alert alert-danger alert-block">
		                <button type="button" class="close" data-dismiss="alert">×</button>
		                <strong>{!! session('flash_message_error') !!}</strong>
		            </div>
		            @endif
		            @if(Session::has('flash_message_success'))
		            <div class="alert alert-success alert-block w-50">
		                <button type="button" class="close" data-dismiss="alert">×</button>
		                <strong>{!! session('flash_message_success') !!}</strong>
		            </div>
		            @endif
                    <div class="card">
                        {{-- <div class="card-header p-2">
			                <ul class="nav nav-pills">
			                  	<li class="nav-item"><a class="nav-link @if(empty(Request()->status) || Request()->status == 'ongoing') active @endif" href="{{url('admin/tours/ongoing')}}">Ongoing</a></li>
			                  	<li class="nav-item"><a class="nav-link @if(Request()->status == 'upcoming') active @endif" href="{{url('admin/tours/upcoming')}}">Upcoming</a></li>
			                  	<li class="nav-item"><a class="nav-link @if(Request()->status == 'completed') active @endif" href="{{url('admin/tours/completed')}}">Completed</a></li>
			                </ul>
			            </div> --}}

                        <div class="card-body">

                            @if(count($enquiry) > 0)
                            <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                                <thead>
                                    <tr>
                                        <th>Enquiry ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Message</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($enquiry as $row)
	                                <tr>
	                                    <td>{{ $row->id }}</td>
	                                    <td>{{ Str::limit($row->name, 30) }}</td>
	                                    <td>{{ $row->email }}</td>
	                                    <td>{{ $row->contact }}</td>
	                                    <td>{{ $row->address }}</td>
	                                    <td>{{ $row->message }}</td>
	                                    {{-- <td>
                                            <button class="btn btn-default disabled" disbaled href="{{ url('/admin/download-tour/'.$row->id) }}"><i class="fa fa-download" style="color: #000;"></i></button> &nbsp;
                                            <a class="btn btn-default" href="{{ url('/admin/share-tour/'.$row->id) }}"><i class="fa fa-share"></i></a>
	                                    </td> --}}
	                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-2 d-flex justify-content-center">
                                {{ $enquiry->links("pagination::bootstrap-4") }}
                            </div>

                            @else
                            <div class="alert alert-dark">No enquiries found</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection