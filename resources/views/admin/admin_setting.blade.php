@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admin Setting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Admin Setting</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
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

                    <div class="card card-default mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Change Password</h3>
                        </div> 
                        <form method="post" action="{{ url('admin/setting/') }}" id="changePw" enctype="multipart/form-data" role="form">@csrf
                            <div class="card-body">
                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">Name: {{ $admin->name }}</label><br>
                                        <label for="exampleInputEmail1">Email: {{ $admin->email }}</label>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">Current Password <span style="color:red;">*</span></label>
                                        <input type="password" id="current_pwd" name="current_pwd" class="form-control" id="current_pwd" placeholder="Enter Current Password" required>
                                    </div>
                                  
                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">New Password  <span style="color:red;">*</span></label>
                                        <input type="password" id="new_pwd" name="new_pwd" class="form-control" id="new_pwd"  placeholder="Enter new Password" required>
                                    </div> 

                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">Confirm New Password  <span style="color:red;">*</span></label>
                                        <input type="password" name="confirm_pwd" class="form-control" id="confirm_pwd"  placeholder="Confirm new Password" required>
                                    </div>
                                </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-dark">Update</button>
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
    $("#changePw").validate({
      ignore: [],
      debug: false,
        rules: {
          current_pwd: {
                required: true,
                minlength: 5,
                maxlength: 20,
            },
            new_pwd: {
                required: true,
                minlength: 5,
                maxlength: 20,
            },
            confirm_pwd: {
                required: true,
                minlength: 5,
                maxlength: 20,
                equalTo:"#new_pwd"
            },    
        },
        messages: {    
            answer: {
                required: "Enter enter current password"
            }
        }
    });
});
</script>
@endsection