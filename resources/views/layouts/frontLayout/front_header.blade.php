@php $url = url()->current(); @endphp

<section class="header-banner bg-dark-1 z-2">
    <div class="container">
        <div class="row items-center justify-between">
            <div class="col-auto">
                <div class="row x-gap-15 items-center jusify-between">
                    <div class="col-auto md:d-none pt-1">
                        <a href="https://instagram.com/roving_steps?igshid=OGQ5ZDc2ODk2ZA==" target="_blank" noreferrer noopener class="text-12 text-white"><i class="icon-instagram text-20"></i></a>
                    </div>
                    <div class="col-auto md:d-none">
                        <div class="w-1 h-20 bg-white-20"></div>
                    </div>
                    <div class="col-auto pt-1">
                        <a href="https://www.facebook.com/RovingStepsPvtLtd?mibextid=LQQJ4d" target="_blank" noreferrer noopener class="text-12 text-white"><i class="icon-facebook text-20"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <div class="row x-gap-15 y-gap-15 items-center">
                    <div class="col-auto md:d-none">
                        <a href="tel:+918600031545" class="text-12 text-white"><i class="fa fa-phone"></i> +91 8600031545</a>
                    </div>
                    <div class="col-auto md:d-none">
                        <div class="w-1 h-20 bg-white-20"></div>
                    </div>
                    <div class="col-auto">
                        <a href="mailto:info@iggloo.co.in" class="text-12 text-white"><i class="fa fa-envelope"></i> info@iggloo.co.in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="header-margin"></div>
<header data-add-bg="bg-dark-1_" class="header shadow-2 mt-40 -type-9 js-header" data-x="header" data-x-toggle="is-menu-opened">
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
                    <div class="header-menu" data-x="mobile-menu" data-x-toggle="is-menu-active">
                        <div class="mobile-overlay"></div>
                        <div class="header-menu__content">
                            <div class="mobile-bg js-mobile-bg"></div>
                            <div class="menu js-navList">
                                <ul class="menu__nav -is-active">
                                    <li class="menu-item-has-children">
                                        <a data-barba href="#">
                                            <span class="mr-10">Domestic Packages</span>
                                            <i class="icon icon-chevron-sm-down"></i>
                                        </a>
                                        <ul class="subnav h-400 overflow-scroll">
                                            <li class="subnav__backBtn js-nav-list-back">
                                                <a href="javascript:void"><i class="icon icon-chevron-sm-down"></i> Domestic Packages</a>
                                            </li>
                                            @foreach ($dests->filter(function($dest) {
                                                return $dest->type == 'Domestic';
                                            }) as $destination)
                                            <li><a href="{{ url('tours?&dest='.$destination->id) }}">{{$destination->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a data-barba href="#">
                                            <span class="mr-10">International Packages</span>
                                            <i class="icon icon-chevron-sm-down"></i>
                                        </a>
                                        <ul class="subnav h-400 overflow-scroll">
                                            <li class="subnav__backBtn js-nav-list-back">
                                                <a href="javascript:void"><i class="icon icon-chevron-sm-down"></i> International Packages</a>
                                            </li>
                                            @foreach ($dests->filter(function($dest) {
                                                return $dest->type == 'International';
                                            }) as $destination)
                                            <li><a href="{{ url('tours?&dest='.$destination->id) }}">{{$destination->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    {{-- <li><a href="{{url('/tours')}}"> Tours </a></li> --}}
                                    <li><a href="{{url('/contact-us')}}"> Corporate & Study Tours </a></li>
                                    <li><a href="{{url('/contact-us')}}"> Contact Us </a></li>
                                    <li><a href="{{url('/about-us')}}"> About Us </a></li>
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
                        @auth
                        <a href="{{url('/user/dashboard')}}" class="button px-20 fw-400 text-14 text-white bg-dark-1 h-50"><i class="fa fa-user-alt pr-10"></i> {{Auth::User()->name}}</a>
                        <a href="{{url('/user/logout')}}" class="button px-10 fw-400 text-14 text-white bg-dark-1 h-50 mx-1" type="Logout"><i class="fa fa-sign-out"></i></a>
                        @else
                        <a href="{{url('/sign-up')}}" class="button px-30 fw-400 text-14 text-white bg-dark-1 h-50">SIGN UP</a>
                        @endauth
                    </div>
                    <div class="d-none xl:d-flex x-gap-20 items-center pl-30" data-x="header-mobile-icons" data-x-toggle="text-white">
                        <div>
                            <a href="{{url('sign-in')}}" class="d-flex items-center icon-user text-inherit text-22"></a>
                        </div>
                        <div>
                            <button class="d-flex items-center icon-menu text-inherit text-20" data-x-click="html, header, header-logo, header-mobile-icons, mobile-menu"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>