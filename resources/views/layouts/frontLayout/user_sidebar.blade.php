<div class="dashboard__sidebar bg-white scroll-bar-1">
    <div class="sidebar -dashboard">
        <div class="sidebar__item">
            <div class="sidebar__button -is-active">
                <a href="db-dashboard.html" class="d-flex items-center text-15 lh-1 fw-500">
                    <i class="fa fa-home mr-15"></i> Dashboard </a>
            </div>
        </div>
        <div class="sidebar__item">
            <div class="sidebar__button ">
                <a href="{{url('user/dashboard#tour-enquiries')}}" class="d-flex items-center text-15 lh-1 fw-500">
                    <i class="fa fa-plane-departure mr-15"></i> Tour Enquiry </a>
            </div>
        </div>
        {{-- <div class="sidebar__item">
            <div class="sidebar__button ">
                <a href="db-booking.html" class="d-flex items-center text-15 lh-1 fw-500">
                    <i class="fa fa-sign mr-15"></i> Booking History </a>
            </div>
        </div> --}}
        {{-- <div class="sidebar__item">
            <div class="sidebar__button ">
                <a href="db-settings.html" class="d-flex items-center text-15 lh-1 fw-500">
                    <i class="fa fa-cog mr-15"></i> Settings </a>
            </div>
        </div> --}}
        <div class="sidebar__item">
            <div class="sidebar__button ">
                <a href="{{url('user/logout')}}" class="d-flex items-center text-15 lh-1 fw-500">
                    <i class="fa fa-sign-out fa-rotate-180 mr-15"></i> Logout </a>
            </div>
        </div>
    </div>
</div>