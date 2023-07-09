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
                            @if(count($tour_enquiry) > 0)
                            <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tour Name</th>
                                        <th>Customer Details</th>
                                        <th>Tourist No</th>
                                        <th>Current city</th>
                                        <th>Travel Date</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tour_enquiry as $row)
	                                <tr>
	                                    <td>{{ $row->id }}</td>
                                        <td><a href="{{url('tour-details/'.$row->tour_id.'/'.Str::slug($row->tour_name))}}" target="_blank" noreferrer noopener> {{ $row->tour_name }} </a></td>
	                                    <td class="text-left"><i class="fa fa-user"></i> {{ Str::limit($row->name, 30) }} <br> 
                                            <i class="fa fa-envelope"></i> {{ $row->email }} <br> 
                                            <i class="fa fa-phone"></i> {{ $row->contact }}
                                        </td>
	                                    <td>{{ $row->tourist_no }}</td>
	                                    <td>{{ $row->current_city }}</td>
	                                    <td>{{ date('d/m/Y', strtotime($row->from_date)) }} - <br>{{ date('d/m/Y', strtotime($row->end_date)) }}</td>
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
@endsection