@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header pb-1">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                    <h4>Destinations List <span class="badge badge-dark">{{$destinations->total()}}</span></h4>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('/admin/add-destination') }}" class="btn btn-dark text-white"><i class="fa fa-plus-circle"></i> Add Destination</a>
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
                        <div class="card-header">
                            <form action="" method="GET">
                                <div class="row d-flex justify-content-start">
                                    <div class="col-auto">
                                        <select class="form-control select2bs4" name="type" onchange="javascript:this.form.submit();">
                                            <option value="" selected>-- Tour Type --</option>
                                            <option value="Domestic" @if(Request()->type == 'Domestic') selected @endif>Domestic</option>
                                            <option value="International" @if(Request()->type == 'International') selected @endif>International</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-control select2bs4" name="status" onchange="javascript:this.form.submit();">
                                            <option value="" selected>-- Status --</option>
                                            <option value="active" @if(Request()->status == 'active') selected @endif>Published</option>
                                            <option value="inactive" @if(Request()->status == 'inactive') selected @endif>Not Published</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <input class="form-control" name="q" placeholder="Search..." value="@if(!empty(Request()->q)) {{Request()->q}} @endif">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-default"> Submit</button>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{url('admin/view-destinations/')}}" class="btn btn-default"> Clear</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            @if(count($destinations) > 0)
                            <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Destination</th>
                                        <th>Overview</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($destinations as $key => $row)
	                                <tr>
                                        <td>{{ $destinations->firstItem() + $key }}</td>
	                                    <td>@if($row->image)<img src="{{asset('img/destinations/'.$row->image)}}" width="50"> @else - @endif</td>
	                                    <td><a class="btn btn-link" href="{{url('admin/destination/places/'.$row->id.'/'.Str::slug($row->name))}}" class="btn btn-default"> {{ Str::limit($row->name, 30) }}</a></td>
	                                    <td>@if($row->description){{ Str::limit($row->description, 30) }} @else NA @endif</td>
	                                    <td>{{ $row->type }}</td>
	                                    <td>{{ ($row->status == '1') ? 'Published' : 'Not Published' }}</td>
	                                    <td>
                                            <a class="btn btn-default" href="{{ url('/admin/edit-destination/'.$row->id) }}"><i class="fa fa-edit" style="color: #000;"></i></a> &nbsp;
                                            <a class="btn btn-default" onclick="return confirm('Are you sure? Associated Custom & Website Tours are going to be removed!')" href="{{ url('/admin/delete-destination/'.$row->id) }}"><i class="fa fa-trash"></i></a> &nbsp;
	                                    </td>
	                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-2 d-flex justify-content-center">
                                {{ $destinations->withQueryString()->links("pagination::bootstrap-4") }}
                            </div>
                            @else
                            <div class="alert alert-dark">No destinations found</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection