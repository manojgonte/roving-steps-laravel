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
                    <a href="{{url('admin/tour-planner')}}" class="nav-link text-white @if(preg_match('#/admin/tour-planner#', $url)) active @endif">
                        <i class="nav-icon fas fa-plane-departure"></i>
                        <p>Tour Planner</p>
                    </a>
                </li> 
                {{-- Projects --}}
                <li class="nav-item">
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
                </li>

                {{-- clients --}}
                <li class="nav-item">
                    <a href="#" class="nav-link text-white ">
                        <i class="nav-icon fas fa-user-cog"></i>
                            <p>Clients
                        <i class="fas fa-angle-left right"></i>
                           </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/add-client/')}}" class="nav-link text-white @if(preg_match('/add-client/', $url)) active @endif">
                                <i class="nav-icon fas fa-arrow-right" style="color: #7c7c7c;"></i> <p style="color: #7c7c7c;"> Add Client</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/view-client/')}}" class="nav-link text-white @if(preg_match('/view-client/', $url)) active @endif">
                                <i class="nav-icon fas fa-arrow-right" style="color: #7c7c7c;"></i> <p style="color: #7c7c7c;"> View Clients </p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- News --}}
                <li class="nav-item">
                    <a href="#" class="nav-link text-white ">
                        <i class="nav-icon fas fa-user-cog"></i>
                            <p>Media
                        <i class="fas fa-angle-left right"></i>
                           </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/add-news/')}}" class="nav-link text-white @if(preg_match('/add-news/', $url)) active @endif">
                                <i class="nav-icon fas fa-arrow-right" style="color: #7c7c7c;"></i> <p style="color: #7c7c7c;"> Add News</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/view-news/')}}" class="nav-link text-white @if(preg_match('/view-news/', $url)) active @endif">
                                <i class="nav-icon fas fa-arrow-right" style="color: #7c7c7c;"></i> <p style="color: #7c7c7c;"> View News </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>  
    </div>
</aside>

















