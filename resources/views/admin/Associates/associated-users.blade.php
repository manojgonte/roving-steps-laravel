@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Associated Users</h4>
                </div>
                <div class="col-sm-6">
                    <a href="{{ url('/admin/add-associate') }}" style="float: right; margin: 3px 3px;" class="btn btn-warning text-white"><i class="fa fa-plus-circle"></i> Add Associate</a>
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
		            <div class="alert alert-success alert-block">
		                <button type="button" class="close" data-dismiss="alert">×</button>
		                <strong>{!! session('flash_message_success') !!}</strong>
		            </div>
		            @endif

                    <div class="card">

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                                <thead>
                                    <tr>
                                        <th>Associate ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Tour name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($associates as $row)
	                                <tr>
	                                    <td>{{ $row->id }}</td>
	                                    <td>{{ Str::limit($row->name, 30) }}</td>
	                                    <td>{{ Str::limit($row->email, 30) }}</td>
	                                    <td>{{ $row->contact }}</td>
	                                    <td>{{ $row->tour_name }}</td>
	                                    <td>
                                            <a class="btn btn-default" href="{{ url('/admin/edit-associate/'.$row->id) }}"><i class="fa fa-edit" style="color: #000;"></i></a> &nbsp;
                                            <a class="btn btn-default" onclick="return confirm('Are you sure?')" href="{{ url('/admin/delete-associate/'.$row->id) }}"><i class="fa fa-trash"></i></a> &nbsp;
	                                    </td>
	                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-2 d-flex justify-content-center">
                                {{ $associates->links("pagination::bootstrap-4") }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection