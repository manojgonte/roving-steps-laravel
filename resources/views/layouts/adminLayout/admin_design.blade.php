<?php $email = session('adminSession'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, max-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin Panel</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link rel="stylesheet" href="{{ asset('plugins/backend_plugins/jquery-ui/jquery-ui.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('plugins/backend_plugins/jquery-ui/jquery-ui.min.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('backend_plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend_plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend_css/adminlte.min.css') }}">
  <link rel="shortcut icon" href="{{ asset('images/frontend_images/logo/footer-logo.png') }}">
  <link rel="stylesheet" href="{{ asset('backend_plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend_plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend_plugins/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('backend_plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="shortcut icon" type="image/x-icon" @if(empty($favicon)) href="{{asset('favicon.png')}}" @else href="{{asset('favicon-green.png')}}" @endif>
  <!-- <link rel="stylesheet" href="{{ asset('backend_plugins/toastr/toastr.min.css') }}"> -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend_css/datepicker.css') }}">
  <style>
    .red{
      color: red;
    } 
    .error{
      color: red;
      font-size: 14px;
      font-weight: 600!important;
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
  <!-- Navbar -->

        @include('layouts/adminLayout/admin_header')
        @include('layouts/adminLayout/admin_sidebar')

        @yield('content')

        @include('layouts/adminLayout/admin_footer')

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->

<script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('backend_plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('backend_plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend_js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('backend_js/demo.js') }}"></script>

<script src="{{ asset('backend_js/bootstrap-datepicker.js') }}"></script>
{{-- <script src="{{asset('plugins/backend_plugins/jquery-ui/jquery-ui.js')}}"></script> --}}
{{-- <script src="{{asset('plugins/backend_plugins/jquery-ui/jquery-ui.min.js')}}"></script> --}}

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('backend_plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('backend_plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('backend_plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('backend_plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('backend_plugins/chart.js/Chart.min.js') }}"></script>
<!-- PAGE SCRIPTS -->
{{-- <script src="{{ asset('js/backend_js/pages/dashboard2.js') }}"></script> --}}
</body>
</html>

<!-- Bootstrap 4 -->
<!-- bs-custom-file-input -->
<script src="{{ asset('backend_plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

<script src="{{ asset('backend_plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend_plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend_plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend_plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend_plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('backend_plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('backend_plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<!-- <script src="{{ asset('plugins/backend_plugins/toastr/toastr.min.js') }}"></script> -->



{{-- datatable buttons --}}

<script src="{{ asset('backend_plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend_plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend_plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('backend_plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend_plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend_plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend_plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('backend_plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script src="{{ asset('backend_js/jquery.validate.js') }}"></script>
{{-- <script src="{{ asset('js/frontend_js/main.js') }}"></script>
 --}}
{{-- <script src="{{ asset('js/frontend_js/main1.js') }}"></script> --}}

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
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
  
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>


<!-- <script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,ssss
      timer: 3000
    });

  $('.toastrDefaultSuccess').click(function() {
    toastr.success('{!! session('flash_message_success') !!}')
  });

    $('.toastrDefaultError').click(function() {
    toastr.error('{!! session('flash_message_error') !!}')
  });

  });

</script> -->
<script>
  var env ='production';
  if (env === 'production') {
    console.log = function () {};
}
  </script>
{{-- <script>
  window.onload = function(){
    document.getElementById('.btn').click();
    var scriptTag = document.createElement("script");
    scriptTag.src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js') }}";
    document.getElementsByTagName("head")[0].appendChild(scriptTag);
    }
</script> --}}
</body>
</html>


