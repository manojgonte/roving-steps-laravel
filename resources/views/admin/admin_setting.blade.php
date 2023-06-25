<?php $email = session('adminSession'); ?>
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
                        <li class="breadcrumb-item"><a href="{{ url('/admin-dashboard') }}">Home</a></li>
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
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Settings</h3><br>
                        </div> 
                        <form method="post" action="{{ url('admin/save-settings/') }}" id="settings" enctype="multipart/form-data" role="form">@csrf
                            <div class="card-body">
                                <div class="row d-flex">
                                    <div class="form-group col-md-5">
                                        <label>Admin Email</label>
                                        <input type="email" name="admin_email" class="form-control" value="{{settings('admin_email')}}" placeholder="₹">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Zillion Club Card Price(₹)</label>
                                        <input type="number" name="zillioncard" class="form-control" value="{{settings('zillioncard')}}" placeholder="₹">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Zillion Club Card Dicount(%)</label>
                                        <input type="number" name="zcard_disc" class="form-control" value="{{settings('zcard_disc')}}" placeholder="Dicount %">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Zillion Club Card Dicount Categories</label>
                                        <select class="form-control w-100" name="zcard_category[]" multiple="multiple" data-placeholder="Select a category" required>
                                            <option value="">Select a category</option>
                                            @php $categories = App\Models\Category::get(); @endphp
                                            @foreach($categories as $cat)
                                            <option value="{{$cat->id}}" @if(in_array($cat->id, json_decode(settings('zcard_category')))) selected @endif>{{$cat->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Exam Questions</label>
                                        <input type="text" name="questions" class="form-control" placeholder="Total Questions to be Asked" value="{{settings('questions')}}" required>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Exam Time (Mins)</label>
                                        <input type="text" name="examtime" class="form-control" placeholder="Exam time in Mins" value="{{settings('examtime')}}" required>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Total Exam Attempts</label>
                                        <input type="text" name="examattempts" class="form-control" placeholder="Exam attempts" value="{{settings('examattempts')}}" required>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>Exam out of Marks</label>
                                        <input type="text" name="exammarks" class="form-control" placeholder="Exam out of Marks" value="{{settings('exammarks')}}" required>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card card-default mt-2">
                        <div class="card-header">
                            <h3 class="card-title">Change Password</h3>
                        </div> 
                        <form method="post" action="{{ url('admin/admin-setting/') }}" id="changePw" enctype="multipart/form-data" role="form">@csrf
                            <div class="card-body">
                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">Email <span style="font-size: 14px;">(Not Changeable)</span></label>
                                        <input type="email" readonly name="email" class="form-control" id="email" value="{{ $email }}" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="exampleInputEmail1">Current Password  <span style="color:red;">*</span></label>
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
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="{{ asset('plugins/backend_plugins/jquery/jquery.min.js') }}"></script>
<script>
$(document).ready(function() {
    $("#settings").validate({
        rules: {
            zillioncard: {
                required: true,
                number: true,
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
            zillioncard: {
                required: "Please enter price"
            }
        }
    });
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