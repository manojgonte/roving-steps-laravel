@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Blogs <span class="badge badge-dark">{{$blogs->total()}}</span></h4>
                </div>
                <div class="col-sm-6 text-right">
                    <div class="d-flex justify-content-end">
                        <a href="{{ url('/admin/add-blog') }}" class="btn btn-dark"><i class="fa fa-plus-circle"></i> New Blog</a>
                    </div>
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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <form action="" method="GET">
                                <div class="row d-flex justify-content-start">
                                    <div class="col-auto">
                                        <input class="form-control form-control-sm" name="q" placeholder="Search..." value="@if(!empty(Request()->q)) {{Request()->q}} @endif">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-default btn-sm"> Submit</button>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{url('admin/blogs/')}}" class="btn btn-default btn-sm"> Clear</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th class="text-center">Thumbnail</th>
                                        <th class="text-left">Title</th>
                                        <th class="text-left">Likes</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($blogs) > 0)
                                @foreach($blogs as $key => $row)
	                                <tr>
                                        <td>{{ $blogs->firstItem() + $key }}</td>
                                        <td><img src="{{ asset('img/blogs/'.$row->thumbnail) }}" width="60"></td>
                                        <td class="text-left">{{ $row->title }}</td>
                                        <td class="text-center">{{count($row->likes)}}</td>
                                        <td>{{ $row->status==1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>{{ date('d M Y', strtotime($row->created_at)) }}</td>
                                        <td class="align-middle">
                                            <a class="btn btn-outline-dark btn-sm" href="{{ url('/admin/edit-blog/'.$row->id) }}"><i class="fa fa-pencil-alt"></i></a>
                                            <a class="btn btn-outline-dark btn-sm" onclick="return confirm('Are you sure?')" href="{{ url('/admin/delete-blog/'.$row->id) }}"><i class="fa fa-trash"></i></a>
                                        </td>
	                                </tr>
                                @endforeach
                                @else
                                <tr><td colspan="7">No data found</td></tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="mt-2 d-flex justify-content-center">
                                {{ $blogs->links("pagination::bootstrap-4") }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection