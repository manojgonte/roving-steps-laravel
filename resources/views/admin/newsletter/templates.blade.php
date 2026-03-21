@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Newsletter Templates <span class="badge badge-dark">{{ $templates->total() }}</span></h4>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/newsletter-template/create') }}" class="btn btn-dark btn-sm"><i class="fa fa-plus-circle"></i> New Template</a>
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
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{!! session('flash_message_error') !!}</strong>
                    </div>
                    @endif
                    @if(Session::has('flash_message_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{!! session('flash_message_success') !!}</strong>
                    </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <form action="" method="GET">
                                <div class="row d-flex justify-content-start">
                                    <div class="col-auto">
                                        <input class="form-control form-control-sm" name="q" placeholder="Search..." value="{{ Request()->q }}">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-default btn-sm">Submit</button>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ url('admin/newsletter-templates') }}" class="btn btn-default btn-sm">Clear</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sr.</th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($templates) > 0)
                                    @foreach($templates as $key => $row)
                                    <tr>
                                        <td>{{ $templates->firstItem() + $key }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->subject }}</td>
                                        <td>{{ date('d M Y', strtotime($row->created_at)) }}</td>
                                        <td>
                                            <a class="btn btn-outline-dark btn-sm" href="{{ url('admin/newsletter-template/edit/'.$row->id) }}" title="Edit"><i class="fa fa-pencil-alt"></i></a>
                                            <a class="btn btn-outline-info btn-sm" href="{{ url('admin/newsletter-template/preview/'.$row->id) }}" target="_blank" title="Preview"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')" href="{{ url('admin/newsletter-template/delete/'.$row->id) }}" title="Delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="5">No templates found</td></tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="mt-2 d-flex justify-content-center">
                                {{ $templates->links("pagination::bootstrap-4") }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
