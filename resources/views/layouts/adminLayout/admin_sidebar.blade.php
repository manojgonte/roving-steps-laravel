<?php $url = url()->current(); ?>

<aside class="main-sidebar elevation-4" style="background:#1B2C60;color:white;">
    <a href="{{ url('/admin/dashboard') }}" class="brand-link text-white p-2">
        <img src="{{asset('img/logo/logo_trans.png')}}" class="brand-image" style="width:80%;">
    </a>
    <div class="sidebar">        
        <nav class="mt-1">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('addTour') }}" class="nav-link text-white @if(preg_match('#/admin/dashboard#', $url)) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                {{-- tours --}}
                <li class="nav-item">
                    <a href="{{url('admin/tours')}}" class="nav-link text-white @if(preg_match('#/admin/tours#', $url)) active @endif">
                        <i class="nav-icon fas fa-plane-departure"></i>
                        <p>Tours</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{url('admin/tour-planner/1')}}" class="nav-link text-white @if(preg_match('#/admin/tour-planner#', $url)) active @endif">
                        <i class="nav-icon fas fa-user-ninja"></i>
                        <p>Tour Planner</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{url('admin/tour-enquiries')}}" class="nav-link text-white @if(preg_match('#/admin/tour-enquiries#', $url)) active @endif">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>Tour Enquiries</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{url('admin/enquiries')}}" class="nav-link text-white @if(preg_match('#/admin/enquiries#', $url)) active @endif">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>Enquiries</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{url('admin/view-destinations')}}" class="nav-link text-white @if(preg_match('#/admin/view-destinations#', $url)) active @endif">
                        <i class="nav-icon fas fa-campground"></i>
                        <p>Destinations</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{url('admin/registered-users')}}" class="nav-link text-white @if(preg_match('#/admin/registered-users#', $url)) active @endif">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>Registered Users</p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{url('admin/associated-users')}}" class="nav-link text-white @if(preg_match('#/admin/associated-users#', $url)) active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Associated Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/gallery')}}" class="nav-link text-white @if(preg_match('#/admin/gallery#', $url)) active @endif">
                        <i class="nav-icon fas fa-photo-video"></i>
                        <p>Gallery</p>
                    </a>
                </li> 
                {{-- Projects --}}
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link text-white ">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>Projects <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/view-ppt/')}}" class="nav-link text-white @if(preg_match('/ppt/', $url)) active @endif">
                                <i class="nav-icon fas fa-arrow-right" style="color: #7c7c7c;"></i> <p style="color: #7c7c7c;"> Add Project</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/view-testimonials/')}}" class="nav-link text-white @if(preg_match('/testimonials/', $url)) active @endif">
                                <i class="nav-icon fas fa-arrow-right" style="color: #7c7c7c;"></i> <p style="color: #7c7c7c;"> View Projects </p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </nav>  
    </div>
</aside>

















