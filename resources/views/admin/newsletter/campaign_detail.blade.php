@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Campaign: {{ $campaign->name }}</h4>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/newsletter-campaigns') }}" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"><strong>Campaign Details</strong></div>
                        <div class="card-body">
                            <table class="table table-sm table-borderless">
                                <tr><th>Name</th><td>{{ $campaign->name }}</td></tr>
                                <tr><th>Subject</th><td>{{ $campaign->subject }}</td></tr>
                                <tr><th>Recipients</th><td><span class="badge badge-info">{{ ucfirst($campaign->recipient_type) }}</span></td></tr>
                                <tr><th>Total</th><td>{{ $campaign->total_recipients }}</td></tr>
                                <tr>
                                    <th>Sent</th>
                                    <td><span class="badge badge-success">{{ $campaign->sent_count }}</span></td>
                                </tr>
                                <tr>
                                    <th>Failed</th>
                                    <td><span class="badge badge-danger">{{ $campaign->failed_count }}</span></td>
                                </tr>
                                <tr>
                                    <th>Pending</th>
                                    <td><span class="badge badge-warning">{{ $campaign->total_recipients - $campaign->sent_count - $campaign->failed_count }}</span></td>
                                </tr>
                                <tr><th>Date</th><td>{{ date('d M Y H:i', strtotime($campaign->created_at)) }}</td></tr>
                            </table>

                            @php
                                $progress = $campaign->total_recipients > 0
                                    ? round(($campaign->sent_count + $campaign->failed_count) / $campaign->total_recipients * 100)
                                    : 0;
                            @endphp
                            <div class="progress mt-2">
                                <div class="progress-bar bg-success" style="width: {{ $progress }}%">{{ $progress }}%</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><strong>Email Preview</strong></div>
                        <div class="card-body p-0">
                            <iframe srcdoc="{!! htmlspecialchars($campaign->body, ENT_QUOTES) !!}" style="width:100%;min-height:500px;border:none;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
