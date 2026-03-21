@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Campaigns <span class="badge badge-dark">{{ $campaigns->total() }}</span></h4>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/newsletter-compose') }}" class="btn btn-dark btn-sm"><i class="fa fa-plus-circle"></i> New Campaign</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
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
                                        <a href="{{ url('admin/newsletter-campaigns') }}" class="btn btn-default btn-sm">Clear</a>
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
                                        <th>Recipients</th>
                                        <th>Sent</th>
                                        <th>Failed</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($campaigns) > 0)
                                    @foreach($campaigns as $key => $row)
                                    <tr>
                                        <td>{{ $campaigns->firstItem() + $key }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ Str::limit($row->subject, 40) }}</td>
                                        <td>{{ $row->total_recipients }}</td>
                                        <td><span class="badge badge-success">{{ $row->sent_count }}</span></td>
                                        <td><span class="badge badge-danger">{{ $row->failed_count }}</span></td>
                                        <td><span class="badge badge-info">{{ ucfirst($row->recipient_type) }}</span></td>
                                        <td>{{ date('d M Y H:iA', strtotime($row->created_at)) }}</td>
                                        <td>
                                            <a class="btn btn-outline-dark btn-sm" href="{{ url('admin/newsletter-campaign/'.$row->id) }}" title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="9">No campaigns found</td></tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="mt-2 d-flex justify-content-center">
                                {{ $campaigns->links("pagination::bootstrap-4") }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
