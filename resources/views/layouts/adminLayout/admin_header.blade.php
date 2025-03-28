<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn btn-light" href="{{url('/')}}" target="_blank"><i class="fas fa-globe"></i> Go to Site</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item nav-link mb-clock">
            <h6 style="margin-top: 2px;"><i class="fa fa-clock"></i> {{date('D, d M Y') }}</h6>
        </li>

        <!-- User Account: style can be found in dropdown.less -->
        <li class="nav-item dropdown user user-menu">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="hidden-xs"> <i class="fa fa-user" aria-hidden="true"></i> Hello, {{Auth::guard('admin')->User()->name}} </span>
            </a>
            <ul class="dropdown-menu" style="width: 50px">
                <li class="user-body">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <a href="{{ url('admin/setting') }}"><i class="fa fa-user" aria-hidden="true"></i> Setting</a>
                        </div>                  
                        <div class="col-sm-12 text-left">
                            <a href="{{ url('/logout') }}"><i class="fa fa-sign-out-alt" aria-hidden="true"></i> Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</nav>