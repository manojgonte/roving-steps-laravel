@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Update User Details</h4>
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
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Users Section</li>
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
                        <form method="POST" action="{{ url('admin/edit-staff/'.$user->id) }}" enctype="multipart/form-data" id="addUser">@csrf
                            <div class="card-body">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label class="required">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{$user->name}}" required>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label class="required">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{$user->email}}" required>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label class="required">Role</label>
                                        <select name="roles" class="form-control" id="role">
                                            <option value="Accountant" @if($user->roles == 'Accountant') selected @endif>Accountant</option>
                                            <option value="Office User" @if($user->roles == 'Office User') selected @endif>Office User</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label class="">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter password" minlength="6">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="status" name="status" value="1" @if($user->status == 1) checked @endif>
                                            <label class="form-check-label" for="status">Enable</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-dark submit"><i class="fa fa-check-circle"></i> Update </button>
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
        $('#addUser').validate({
            ignore: [],
            debug: false,
            rules: {},
            messages: {},
            submitHandler: function(form) {
                $(".submit").attr("disabled", true);
                $(".submit").html("<span class='fa fa-spinner fa-spin'></span> Please wait...");
                form.submit();
            }
        });
    });
</script>

@endsection('content')