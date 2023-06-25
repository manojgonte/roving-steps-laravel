@php
    $email = session('adminSession');
  
    use App\Models\Admin;
  
@endphp

@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection