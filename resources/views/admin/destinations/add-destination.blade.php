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
                                            <option value="{{ $val->id }}" @if(Request()->slug == $val->name) selected @endif>{{ $val->name }}</option>
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
                                        {{-- <input type="file" name="image" class="form-control p-1" accept="image/*"> --}}
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text mr-1 bg-dark" style="cursor: pointer;" data-toggle="modal" data-target="#gallery-modal" onclick="checkGallerySelection()"> Gallery &nbsp;<i class="fa fa-images"></i></span>
                                            </div>
                                            <input type="hidden" name="gallery_image" id="gallery_image">
                                            <input type="file" name="image" class="form-control p-1" id="image_file" onchange="checkFileInput()">
                                        </div>

                                        {{-- gallery modal --}}
                                        <div class="modal fade" id="gallery-modal">
                                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Photo Gallery</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card-body p-0">
                                                            <div id="gallery-content"></div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Select</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                    <label class="">Overview</label>
                                        <textarea name="description" class="form-control" placeholder="Enter Overview" rows="3"></textarea>
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

<script>
    function selectGalleryImage(image) {
        document.getElementById('gallery_image').value = image;
        document.getElementById('image_file').disabled = true;
    }

    function checkFileInput() {
        const fileInput = document.getElementById('image_file');
        if (fileInput.files.length > 0) {
            document.getElementById('gallery_image').value = '';
            const galleryRadios = document.getElementsByName('gallery_image_option');
            for (let i = 0; i < galleryRadios.length; i++) {
                galleryRadios[i].checked = false;
            }
        }
    }

    function checkGallerySelection() {
        const galleryRadios = document.getElementsByName('gallery_image_option');
        let isChecked = false;
        for (let i = 0; i < galleryRadios.length; i++) {
            if (galleryRadios[i].checked) {
                isChecked = true;
                break;
            }
        }

        if (isChecked) {
            document.getElementById('image_file').disabled = true;
        } else {
            document.getElementById('image_file').disabled = false;
        }
    }
</script>

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