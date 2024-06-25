@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Add Destination Section</h4>
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
                        <form method="POST" action="{{ url('admin/add-destination') }}" enctype="multipart/form-data"
                            id="addDestination">@csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="required">Destination Type</label>
                                        <select class="form-control select2bs4" name="type" id="type">
                                            <option value="Domestic">Domestic</option>
                                            <option value="International">International</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="required">Destination</label>
                                        <select class="form-control select2bs4" name="parent_id" id="parent_id">
                                            <option value="0">Main Category</option>
                                            @foreach(App\Models\Destination::where(['parent_id'=>0])->orderBy('name','ASC')->get() as $val)
                                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="required">Place to Visit</label>
                                        <input type="text" name="destination_name" class="form-control"
                                            placeholder="Enter Destination Name" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="">Cover Image <small>(Size: 450 X 600px)</small></label>
                                        <input type="file" name="image" class="form-control p-1" accept="image/*">
                                    </div>
                                    <div class="form-group col-md-12">
                                    <label class="">Overview</label>
                                        <textarea name="description" class="form-control" placeholder="Enter Overview" rows="8"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="isPopular" name="is_popular" value="1">
                                            <label class="form-check-label" for="isPopular">Popular Destination</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="destination_status" name="status" value="1">
                                            <label class="form-check-label" for="destination_status">Publish</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-warning text-white submit"><i class="fa fa-check-circle"></i> Add </button>
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
                image: {
                    accept: 'png|jpg|jpeg|webp',
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