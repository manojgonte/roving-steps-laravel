@extends('layouts/adminLayout/admin_design')
@section('content')

@section('styles')
@endsection('styles')

<div class="content-wrapper">
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>New Blog</h4>
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
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card card-default">
                        <form method="POST" action="{{ url('admin/add-blog') }}" enctype="multipart/form-data" id="add">@csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="required">Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Blog Title" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="required">Author</label>
                                        <input type="text" name="author" id="author" class="form-control" placeholder="Author Name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="required">Blog Thumbnail (Dimension: 1000x650px)</label>
                                        <div class="form-group mb-0">
                                            <input type="file" name="thumbnail" class="form-control p-1" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="required">Blog Content</label>
                                        <textarea name="blog_content" id="address" class="form-control summernote" rows="5" required></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="">Status</label>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="status" name="status" value="1">
                                            <label class="form-check-label" for="status">Publish</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark submit"><i class="fa fa-check-circle"></i> Create </button>
                                <button type="reset" class="btn btn-default"> Reset </button>
                                <a href="{{url('admin/blogs')}}" class="btn btn-default"> Cancel </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend_js/summernote-bs4.min.js') }}"></script>
@section('scripts')
@endsection('scripts')
<script>
    $(function () {
        $('.summernote').summernote({
            lineHeights: ['0.5', '1.0'],
            fontNames: ['Jost'],
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                // ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                // ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
        });
    })
</script>
<script>
    $(document).ready(function() {
        $('#add').validate({
            ignore: [],
            debug: false,
            rules: {
                name: {
                    required: true,
                },
            },
            messages: {},
            submitHandler: function(form) {
                $(".submit").attr("disabled", true);
                $(".submit").html("<span class='fa fa-spinner fa-spin'></span> Please wait...");
                form.submit();
            }
        });
    });
</script>
@endsection