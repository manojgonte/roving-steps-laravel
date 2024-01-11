@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users <span class="badge badge-secondary text-md">{{ $users->total() }}</span></h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ url('/admin/add-staff') }}" class="btn btn-dark"><i class="fa fa-plus-circle"></i> Add User</a>
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
                    <div class="card">
                        <div class="card-header">
                            <form action="" method="GET">
                                <div class="row d-flex justify-content-start">
                                    <div class="col-auto">
                                        <select name="status" id="status" class="form-control select2" onchange="this.form.submit()">
                                            <option value="">-- All Users --</option>
                                            <option value="1" @if(Request()->status == '1') selected @endif>Active</option>
                                            <option value="0" @if(Request()->status == '0') selected @endif>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <input class="form-control" name="name" placeholder="Search..." value="{{Request()->name}}">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-default"> Submit</button>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{url('admin/view-users')}}" class="btn btn-default"> Clear</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                                <thead>
                                    <tr>
                                        <th class="border-bottom-0 text-center">Sr.No.</th>
                                        <th class="border-bottom-0 text-left">Name</th>
                                        <th class="border-bottom-0 text-center">Email</th>
                                        <th class="border-bottom-0 text-center">Role</th>
                                        <th class="border-bottom-0 text-center">Status</th>
                                        <th class="border-bottom-0 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key => $user)
                                    <tr>
                                    <td class="text-center align-middle">{{ $users->firstItem() + $key }}</td>
                                    <td class="text-left">
                                        <div class="align-middle d-flex">
                                            <div class="avatar"> {{mb_substr(ucfirst($user->name) , 0, 1)}} </div>
                                            <div class="align-self-center">&nbsp;&nbsp;{{ $user->name }}</div>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">{{ $user->email }}</td>
                                    <td class="text-center align-middle">{{ $user->roles }}</td>
                                    <td class="text-center align-middle">{{ $user->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td class="text-center align-middle">
                                        <a href="{{url('admin/edit-staff/'.$user->id)}}" class="btn mr-1 mb-1 btn-outline-info btn-shadow btn-sm"><i class="fa fa-pencil-alt"></i></a>
                                        <a onclick="return confirm('Are you sure?');" href="{{url('admin/delete-staff/'.$user->id)}}"class="btn mr-1 mb-1 btn-outline-danger btn-shadow btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="mt-2 d-flex justify-content-center">
                                {{ $users->withQueryString()->links("pagination::bootstrap-4") }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection