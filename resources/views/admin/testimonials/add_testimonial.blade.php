@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Add Testimonial Section</h4>
                    @if(Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block">
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
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Testimonial Section</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <form method="POST" action="{{ url('admin/add-testimonial') }}" enctype="multipart/form-data"
                            id="addTestimonial">@csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="required">Customer Name</label>
                                        <input type="text" name="user_name" class="form-control" placeholder="Enter Customer Name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="">Thumbnail <small>(Dimensions: 200x200px)</small></label>
                                        <input type="file" name="thumbnail_img" class="form-control p-1" >
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="">Testimonial</label>
                                        <textarea name="testimonial" class="form-control" placeholder="Enter Testimonial" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-dark text-white submit"><i class="fa fa-check-circle"></i> Save </button>
                                <button type="reset" class="btn btn-default"> Reset </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#addTestimonial').validate({
            ignore: [],
            debug: false,
            rules: {
                user_name: {
                    required: true,
                    maxlength:30,
                },
                testimonial: {
                    required: true,
                    maxlength:280,
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