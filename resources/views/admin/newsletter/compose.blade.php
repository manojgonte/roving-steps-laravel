@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Compose Newsletter</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
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
                <form method="POST" action="{{ url('admin/newsletter-send') }}" id="compose-form">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="required">Campaign Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required placeholder="e.g. March 2026 Newsletter">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Load from Template</label>
                                    <select id="template-select" class="form-control">
                                        <option value="">-- Select Template --</option>
                                        @foreach($templates as $t)
                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="required">Send To</label>
                            <select name="recipient_type" class="form-control" required>
                                <option value="both" {{ old('recipient_type') == 'both' ? 'selected' : '' }}>Both Users & Subscribers ({{ $counts['users'] + $counts['subscribers'] }} max)</option>
                                <option value="users" {{ old('recipient_type') == 'users' ? 'selected' : '' }}>Users Only ({{ $counts['users'] }})</option>
                                <option value="subscribers" {{ old('recipient_type') == 'subscribers' ? 'selected' : '' }}>Subscribers Only ({{ $counts['subscribers'] }})</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="required">Email Subject</label>
                            <input type="text" name="subject" id="compose-subject" class="form-control" value="{{ old('subject') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="required">Email Body</label>
                            <div class="mb-2">
                                <small class="text-muted">
                                    Placeholders:
                                    <code>@{{name}}</code>,
                                    <code>@{{email}}</code>,
                                    <code>@{{unsubscribe_url}}</code>
                                </small>
                            </div>
                            <textarea name="body" id="compose-body" class="summernote" rows="15">{!! old('body') !!}</textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark" onclick="return confirm('Are you sure you want to send this campaign?')">
                            <i class="fa fa-paper-plane"></i> Send Campaign
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection

@section('scripts')
<script>
$(function(){
    $('#template-select').on('change', function(){
        var id = $(this).val();
        if(!id) return;
        $.ajax({
            url: '{{ url("admin/newsletter-load-template") }}',
            type: 'GET',
            data: { id: id },
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(res){
                if(res.status){
                    $('#compose-subject').val(res.subject);
                    $('#compose-body').summernote('code', res.body);
                }
            }
        });
    });
});
</script>
@endsection
