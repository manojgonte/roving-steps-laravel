@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Gallery</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Tour Planner Section</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card bg-light m-3">
                            <h3 class="card-title text-muted pt-2 pl-3">
                                Add Photos
                            </h3><hr>
                            <div class="card-body pt-1">
                                <form method="POST" action="{{url('admin/add-photos/')}}" enctype="multipart/form-data" id="addPhotos">@csrf
                                    <div class="row pt-2">
                                        <div class="form-group col-md-4 mb-0">
                                            <input type="file" name="image[]" multiple class="form-control p-1" required>
                                            <small>Can add single or multiple images</small>
                                        </div>
                                        <div class="form-group col-md-4 mb-0">
                                            <input type="text" name="title" class="form-control p-1" placeholder="Image title">
                                        </div>
                                        <div class="form-group col-md-4 mb-0">
                                            <button type="submit" class="btn btn-dark submit"><i class="fa fa-check-circle"></i> Save </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card bg-light m-3">
                            <div class="d-flex justify-content-between align-items-center pt-2 pl-3 pr-3">
                                <h3 class="card-title text-muted mb-0">
                                    Gallery
                                </h3>
                                <div class="input-group input-group-sm" style="max-width: 300px;">
                                    <input type="text" id="search-image" class="form-control" placeholder="Search image by name..." value="{{ request('search') }}" autocomplete="off">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-2 mb-2">
                            <div class="card-body pt-1" id="gallery-list-container">
                                @include('admin.gallery.gallery_list_partial')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="editPhoto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Photo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{url('admin/edit-photo/')}}" enctype="multipart/form-data" id="editPhoto">@csrf
            <div class="modal-body">
                <input type="hidden" name="id" id="imgId">
                <div class="form-group col-md-12">
                    <input type="file" name="image" class="form-control p-1">
                </div>
                <div class="form-group col-md-12">
                    <label class="">Title</label>
                    <input type="text" name="title" class="form-control" id="imgTitle" placeholder="Image title">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark text-white edit"><i class="fa fa-check-circle"></i> Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script>
<script>
    function getId(id,title) {
        $("#imgId").val(id);
        $("#imgTitle").val(title);
    }

    $(document).ready(function() {        
        let searchTimer;
        function fetchGalleryPhotos(page = 1) {
            let search = $('#search-image').val();
            $.ajax({
                url: "{{ url('admin/gallery') }}",
                type: "GET",
                data: {
                    page: page,
                    search: search
                },
                success: function(data) {
                    $('#gallery-list-container').html(data);
                },
                error: function(xhr) {
                    console.error("Error fetching gallery images", xhr);
                }
            });
        }

        $(document).on('keyup input', '#search-image', function() {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(function() {
                fetchGalleryPhotos(1);
            }, 300);
        });

        $(document).on('click', '#gallery-list-container .pagination a', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            if (url) {
                let pageParam = new URLSearchParams(url.split('?')[1]).get('page') || 1;
                fetchGalleryPhotos(pageParam);
            }
        });

        $('#addPhotos').validate({
            ignore: [],
            debug: false,
            rules: {
                'image[]': {
                    required: true,
                    accept: 'png|jpg|jpeg|webp|svg',
                },
            },
            messages: {
                'image[]': {
                    required: "Please choose at least one image",
                    accept: 'Please select either one png|jpg|jpeg|webp|svg',
                }
            },
            submitHandler: function(form) {
                $(".submit").attr("disabled", true);
                $(".submit").html("<span class='fa fa-spinner fa-spin'></span> Please wait...");
                form.submit();
            }
        });

        $('#editPhoto').validate({
            ignore: [],
            debug: false,
            rules: {
                image: {
                    required: true,
                    accept: 'png|jpg|jpeg|webp|svg',
                },
            },
            messages: {
                image: {
                    required: "Please choose image",
                    accept: 'Please select either one png|jpg|jpeg|webp|svg',
                }
            },
            submitHandler: function(form) {
                $(".edit").attr("disabled", true);
                $(".edit").html("<span class='fa fa-spinner fa-spin'></span> Please wait...");
                form.submit();
            }
        });
    });
</script>

@endsection