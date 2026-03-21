@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>{{ $template ? 'Edit' : 'Create' }} Template</h4>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('admin/newsletter-templates') }}" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card">
                <form method="POST" action="{{ $template ? url('admin/newsletter-template/update/'.$template->id) : url('admin/newsletter-template/store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label class="required">Template Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $template->name ?? '') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="required">Email Subject</label>
                            <input type="text" name="subject" class="form-control" value="{{ old('subject', $template->subject ?? '') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="required">Email Body (HTML)</label>
                            <div class="mb-2">
                                <small class="text-muted">
                                    Available placeholders:
                                    <code>@{{name}}</code>,
                                    <code>@{{email}}</code>,
                                    <code>@{{unsubscribe_url}}</code>
                                </small>
                            </div>
                            <textarea name="body" class="summernote" rows="15">{!! old('body', $template->body ?? '') !!}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark"><i class="fa fa-save"></i> {{ $template ? 'Update' : 'Create' }} Template</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection
