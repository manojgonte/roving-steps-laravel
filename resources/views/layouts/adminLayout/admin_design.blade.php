<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, max-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{config('app.name')}} | Admin Panel</title>
    <link rel="shortcut icon" href="{{ asset('img/logo/favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link rel="stylesheet" href="{{ asset('plugins/backend_plugins/jquery-ui/jquery-ui.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('plugins/backend_plugins/jquery-ui/jquery-ui.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('backend_plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend_plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend_css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend_plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend_plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend_plugins/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('backend_plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- <link rel="stylesheet" href="{{ asset('backend_plugins/toastr/toastr.min.css') }}"> -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend_css/datepicker.css') }}">

    @yield('styles')
    
    <style>
        .error{
            color: #ff0000;
            font-size: 14px;
            font-weight: 500 !important;
        }
        .required::after{
            content: " *";
            color: red;
        }
        th,td{
            text-align: center;
        }
        @media screen and (max-width: 767px){
            div.dataTables_wrapper div.dataTables_length, div.dataTables_wrapper div.dataTables_filter, div.dataTables_wrapper div.dataTables_info, div.dataTables_wrapper div.dataTables_paginate {
                text-align: center;
                margin-top: 7px !important;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">

    @include('layouts/adminLayout/admin_header')
    @include('layouts/adminLayout/admin_sidebar')

    @yield('content')

    @include('layouts/adminLayout/admin_footer')

	<script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('backend_plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('backend_plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
	<script src="{{ asset('backend_js/adminlte.js') }}"></script>

	<script src="{{ asset('backend_js/demo.js') }}"></script>
	<script src="{{ asset('backend_js/bootstrap-datepicker.js') }}"></script>

    <script src="{{ asset('backend_plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script src="{{ asset('backend_js/jquery.validate.js') }}"></script>

    <script src="{{ asset('backend_js/main2.js') }}"></script> 
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                // "buttons": [ "csv", "excel", "pdf"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    
    {{-- Summernote --}}
    <script>
        $(function () {
            $('.textarea').summernote()
        })
      
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    @yield('scripts')

</body>
</html>