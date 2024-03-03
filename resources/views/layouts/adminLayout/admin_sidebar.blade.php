@php 
    $url = url()->current();
    $role = Auth::guard('admin')->user()->roles;
@endphp

<aside class="main-sidebar elevation-4" style="background:#1B2C60;color:white;">
    <a href="{{ url('/admin/dashboard') }}" class="brand-link text-white p-2">
        <img src="{{asset('img/logo/logo_trans.png')}}" class="brand-image" style="width:80%;">
    </a>
    <div class="sidebar">
        <nav class="mt-1">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('dashboard') }}" class="nav-link text-white @if(preg_match('#/admin/dashboard#', $url)) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                {{-- custom tours --}}
                @if($role == 'Admin' || $role == 'Accountant')
                <li class="nav-item">
                    <a href="{{url('admin/tours')}}" class="nav-link text-white @if(preg_match('#/admin/tours#', $url)) active @endif">
                        <i class="nav-icon fas fa-campground"></i>
                        <p>Custom Tours</p>
                    </a>
                </li>
                @endif
                @if($role == 'Admin' || $role == 'Office User')
                <li class="nav-item">
                    <a href="{{url('admin/tour-planner/1')}}" class="nav-link text-white @if(preg_match('#/admin/tour-planner#', $url)) active @endif">
                        <i class="nav-icon fas fa-plane-departure"></i>
                        <p>Website Tours</p>
                    </a>
                </li>
                @endif
                @if($role == 'Admin' || $role == 'Office User')
                <li class="nav-item">
                    <a href="{{url('admin/tour-enquiries')}}" class="nav-link text-white @if(preg_match('#/admin/tour-enquiries#', $url)) active @endif">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>Tour Enquiries</p>
                    </a>
                </li>
                @endif
                @if($role == 'Admin' || $role == 'Office User')
                <li class="nav-item">
                    <a href="{{url('admin/enquiries')}}" class="nav-link text-white @if(preg_match('#/admin/enquiries#', $url)) active @endif">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>Enquiries</p>
                    </a>
                </li>
                @endif
                @if($role == 'Admin' || $role == 'Office User')
                <li class="nav-item">
                    <a href="{{url('admin/view-destinations')}}" class="nav-link text-white @if(preg_match('#/admin/view-destinations#', $url)) active @endif">
                        <i class="nav-icon fas fa-campground"></i>
                        <p>Destinations</p>
                    </a>
                </li>
                @endif
                @if($role == 'Admin')
                <li class="nav-item">
                    <a href="{{url('admin/registered-users')}}" class="nav-link text-white @if(preg_match('#/admin/registered-users#', $url)) active @endif">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>Registered Users</p>
                    </a>
                </li>
                @endif
                {{-- @if($role == 'Admin' || $role == 'Office User')
                <li class="nav-item">
                    <a href="{{url('admin/associated-users')}}" class="nav-link text-white @if(preg_match('#/admin/associated-users#', $url)) active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Associated Users</p>
                    </a>
                </li>
                @endif --}}
                @if($role == 'Admin' || $role == 'Office User')
                <li class="nav-item">
                    <a href="{{url('admin/gallery')}}" class="nav-link text-white @if(preg_match('#/admin/gallery#', $url)) active @endif">
                        <i class="nav-icon fas fa-photo-video"></i>
                        <p>Gallery</p>
                    </a>
                </li>
                @endif
                @if($role == 'Admin' || $role == 'Office User')
                <li class="nav-item">
                    <a href="{{url('admin/testimonials')}}" class="nav-link text-white @if(preg_match('#/admin/testimonials#', $url)) active @endif">
                        <i class="nav-icon fa fa-comments"></i>
                        <p>Testimonials</p>
                    </a>
                </li>
                @endif
                @if($role == 'Admin' || $role == 'Accountant')
                <li class="nav-item">
                    <a href="{{url('admin/invoice-dashboard')}}" class="nav-link text-white @if(preg_match('#/admin/invoice-dashboard#', $url)) active @endif">
                        <i class="nav-icon fa fa-file-invoice-dollar"></i>
                        <p>Billing & Invoices</p>
                    </a>
                </li>
                @endif
                @if($role == 'Admin' || $role == 'Accountant')
                <li class="nav-item">
                    <a href="{{url('admin/invoice-dashboard')}}" class="nav-link text-white @if(preg_match('#/admin/invoice-dashboard#', $url)) active @endif">
                        <i class="nav-icon fa fa-file-invoice-dollar"></i>
                        <p>Billing & Invoices NEW</p>
                    </a>
                </li>
                @endif
                @if($role == 'Admin')
                <li class="nav-item">
                    <a href="{{url('admin/view-staff')}}" class="nav-link text-white @if(preg_match('#/admin/view-staff#', $url)) active @endif">
                        <i class="nav-icon fa fa-users-cog"></i>
                        <p>Staff</p>
                    </a>
                </li>
                @endif
                
                {{-- Tour --}}
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link text-white @if(preg_match('#/admin/tours#', $url) || preg_match('#/admin/tour-planner#', $url)) active @endif">
                        <i class="nav-icon fas fa-plane-departure"></i>
                        <p>Tour <i class="fas fa-angle-right right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/tours/')}}" class="nav-link text-white @if(preg_match('/ppt/', $url)) active @endif">
                                <i class="nav-icon fas fa-arrow-right"></i> Tours
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/tour-planner/1')}}" class="nav-link text-white @if(preg_match('/testimonials/', $url)) active @endif">
                                <i class="nav-icon fas fa-arrow-right"></i> Tour Planner
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </nav>
    </div>
</aside>