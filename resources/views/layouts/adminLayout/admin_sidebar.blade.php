<?php $url = url()->current(); ?>

<aside class="main-sidebar elevation-4" style="background:#000000;color:white;">
    <a href="{{ url('/admin-dashboard') }}" class="brand-link text-white p-2"><img src="{{asset('images/chemdisthrlogo.png')}}" class="brand-image" style="width:80%;"></a>
    <div class="sidebar">        
        <nav class="mt-1">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                  <a href="{{ url('/admin-dashboard') }}" class="nav-link text-white @if(preg_match('/admin-dashboard/',$url)) active @endif">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p> Dashboard </p>
                  </a>
                </li>
                {{-- Projects --}}
                <li class="nav-item">
                    <a href="#" class="nav-link text-white ">
                        <i class="nav-icon fas fa-user-cog"></i>
                            <p>Projects
                        <i class="fas fa-angle-left right"></i>
                           </p>
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

                {{-- Event --}}
                <li class="nav-item">
                    <a href="#" class="nav-link text-white ">
                        <i class="nav-icon fas fa-user-cog"></i>
                            <p>Event
                        <i class="fas fa-angle-left right"></i>
                           </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/add-event/')}}" class="nav-link text-white @if(preg_match('/add-event/', $url)) active @endif">
                                <i class="nav-icon fas fa-arrow-right" style="color: #7c7c7c;"></i> <p style="color: #7c7c7c;"> Add Event</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/view-event/')}}" class="nav-link text-white @if(preg_match('/view-event/', $url)) active @endif">
                                <i class="nav-icon fas fa-arrow-right" style="color: #7c7c7c;"></i> <p style="color: #7c7c7c;"> View Events </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/add-expo/')}}" class="nav-link text-white @if(preg_match('/add-expo/', $url)) active @endif">
                                <i class="nav-icon fas fa-arrow-right" style="color: #7c7c7c;"></i> <p style="color: #7c7c7c;"> Add Expo Event </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/view-expo/')}}" class="nav-link text-white @if(preg_match('/view-expo/', $url)) active @endif">
                                <i class="nav-icon fas fa-arrow-right" style="color: #7c7c7c;"></i> <p style="color: #7c7c7c;"> View Expo Events </p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Contact --}}
                <li class="nav-item">
                    <a href="#" class="nav-link text-white ">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>Contact Enquiry</p>
                    </a>
                </li> 

                {{-- Career --}}
                <li class="nav-item">
                    <a href="#" class="nav-link text-white ">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>Career Enquiry</p>
                    </a>
                </li>  
            </ul>
        </nav>  
    </div>
</aside>

















