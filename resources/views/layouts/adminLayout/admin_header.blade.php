@php $date = date('D, d M Y'); @endphp
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

        <li class="nav-item nav-link mb-clock">
            <h6 style="color: #4C4C4C; padding: 0px 12px 0px 12px; margin-top: 5px;"><i class="fa fa-clock"></i> <?php echo $date; ?> 
            <!-- <span id="clock"></span> -->
          </h6>
        </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="nav-item dropdown user user-menu">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <span class="hidden-xs"> <i class="fa fa-user" aria-hidden="true"></i> Admin </span>
            </a>
            <ul class="dropdown-menu" style="width: 50px;">
              <!-- User image -->
             
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">

                  <div class="col-sm-12 text-left">
                    <a href="{{ url('admin/admin-setting') }}"><i class="fa fa-user" aria-hidden="true"></i> Setting</a>
                  </div>                  
                  <div class="col-sm-12 text-left">
                    <a href="{{ url('/logout') }}"><i class="fa fa-sign-out-alt" aria-hidden="true"></i> Logout</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
    </ul>
  </nav>
  <!-- /.navbar -->
<style>
  @media screen and (max-width: 667px){
    .respo{
      margin-left: -80px !important;
    }
      @media only screen and (max-width: 767px){
    .mb-clock{
      display: none;
    }
  }
  }
  
</style>

