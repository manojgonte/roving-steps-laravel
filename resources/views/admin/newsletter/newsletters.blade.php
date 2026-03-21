{{-- This view is no longer used. Campaigns are at admin/newsletter-campaigns --}}
@extends('layouts/adminLayout/admin_design')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-info mt-3">
                This page has been moved. <a href="{{ url('admin/newsletter-campaigns') }}">Go to Campaigns</a>
            </div>
        </div>
    </section>
</div>
@endsection
