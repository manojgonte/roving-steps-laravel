@php $url = url()->current(); @endphp

<div class="header-margin"></div>
<header data-add-bg="bg-dark-1" class="header js-header" data-x="header" data-x-toggle="is-menu-opened">
    <div data-anim="fade" class="header__container px-30 sm:px-20">
        <div class="row justify-between items-center">
            <div class="col-auto">
                <div class="d-flex items-center">
                    <a href="{{url('/')}}" class="header-logo mr-20" data-x="header-logo" data-x-toggle="is-logo-dark">
                        <img src="{{asset('img/logo/logo_trans.png')}}" alt="logo">
                        <img src="{{asset('img/logo/logo_trans.png')}}" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-auto">
                <div class="d-flex items-center">
                    <div class="header-menu " data-x="mobile-menu" data-x-toggle="is-menu-active">
                        <div class="mobile-overlay"></div>
                        <div class="header-menu__content">
                            <div class="mobile-bg js-mobile-bg"></div>
                            <div class="menu js-navList">
                                <ul class="menu__nav text-white -is-active">
                                    <li>
                                        <a href="{{url('/about-us')}}"> About Us </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/tours')}}"> Tours </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/gallery')}}"> Gallery </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/flight-booking')}}"> Flight Booking </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/cruise-booking')}}"> Cruise Booking </a>
                                    </li>
                                    <li>
                                        {{-- <a href="{{url('/other-services')}}"> Other Services </a> --}}
                                        <a href="#"> Other Services </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/contact-us')}}"> Contact Us </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="d-flex items-center">
                    <div class="d-flex items-center ml-20 is-menu-opened-hide md:d-none">
                        <a href="{{url('/sign-up')}}"
                            class="button px-30 fw-400 text-14 text-white bg-warning-2 h-50">SIGN UP</a>
                    </div>
                    <div class="d-none xl:d-flex x-gap-20 items-center pl-30 text-white" data-x="header-mobile-icons"
                        data-x-toggle="text-white">
                        {{-- <div>
                            <a href="login.html" class="d-flex items-center icon-user text-inherit text-22"></a>
                        </div> --}}
                        <div>
                            <button class="d-flex items-center icon-menu text-inherit text-20" data-x-click=""></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>