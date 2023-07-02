@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Add destination Section</h4>
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
                        <li class="breadcrumb-item active">Destination Section</li>
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
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active"
                                        href="{{url('admin/add-destination')}}">Destination</a></li>
                                <li class="nav-item"><a class="nav-link disabled" disabled>Destination List</a></li>
                            </ul>
                        </div>
                        <form method="POST" action="{{ url('admin/add-destination') }}" enctype="multipart/form-data"
                            id="addDestination">@csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="required">Destination Name</label>
                                        <input type="text" name="destination_name" class="form-control"
                                            placeholder="Enter destination Name" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="required">Destination desciption</label>
                                        <input type="text" name="destination_desc" class="form-control"
                                            placeholder="Enter destination desciption" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="required">Cover Image <small>(Size: 600 X 500px)</small></label>
                                        <input type="file" name="image" class="form-control p-1" accept="image/*">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="required">Destination Type</label>
                                        <select class="form-control select2bs4" name="type" name="type">
                                            <option value="Domestic">Domestic</option>
                                            <option value="International">International</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="required">Destination status</label>
                                        <input type="text" name="destination_status" class="form-control"
                                            placeholder="Enter destination status" value="1">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-warning text-white submit"><i
                                        class="fa fa-check-circle"></i> Add </button>
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
        $('#addDestination').validate({
            ignore: [],
            debug: false,
            rules: {
                destination_name: {
                    required: true,
                    maxlength:120,
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