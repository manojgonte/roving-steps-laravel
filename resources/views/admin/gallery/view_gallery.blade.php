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
                                            <small>Can add single or muliple images</small>
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
                            <h3 class="card-title text-muted pt-2 pl-3">
                                Gallery
                            </h3><hr>
                            <div class="card-body pt-1">
                                <div class="row">
                                    @foreach($photos as $row)
                                    <div class="col-4 col-md-3 col-lg-2 col-xl-2 mt-4">
                                        <a href="{{asset('img/gallery/'.$row->image)}}" target="_blank">
                                        <img src="{{asset('img/gallery/'.$row->image)}}" class="img-fluid mb-2" style="height: 150px; width:200px; object-fit: cover;" alt="img"/>
                                        </a>
                                        <span>{{$row->title ?? ''}}</span>
                                        <div class="d-flex justify-content-center">
                                            <a class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editPhoto" onclick="getId({{$row->id}},'{{$row->title}}')"><i class="fa fa-edit"></i></a> &nbsp;
                                            <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')" href="{{url('admin/delete-photo/'.$row->id)}}"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mt-2 d-flex justify-content-center">
                                    {{ $photos->links("pagination::bootstrap-4") }}
                                </div>
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