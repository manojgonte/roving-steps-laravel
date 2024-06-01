@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
@endsection('styles')

<main class="main">
    <section class="pt-40 pb-40">
        <div class="container">
            <div class="mainSearch -col-5 border-light rounded-4 pr-20 py-20 lg:px-20 lg:pt-5 lg:pb-20 mt-15">
                <div class="button-grid items-center">
                    <div class="searchMenu-loc px-30 lg:py-20 lg:px-0 js-form-dd js-liverSearch">
                        <div data-x-dd-click="searchMenu-loc">
                            <h4 class="text-15 fw-500 ls-2 lh-16">Flying From</h4>
                            <div class="text-15 text-light-1 ls-2 lh-16">
                                <input autocomplete="off" type="search" placeholder="PNQ" class="js-search js-dd-focus" />
                            </div>
                        </div>
                    </div>
                    <div class="searchMenu-loc px-30 lg:py-20 lg:px-0 js-form-dd js-liverSearch">
                        <div data-x-dd-click="searchMenu-loc">
                            <h4 class="text-15 fw-500 ls-2 lh-16">Flying To</h4>
                            <div class="text-15 text-light-1 ls-2 lh-16">
                                <input autocomplete="off" type="search" placeholder="BOM" class="js-search js-dd-focus" />
                            </div>
                        </div>
                        <div class="searchMenu-loc__field shadow-2 js-popup-window" data-x-dd="searchMenu-loc" data-x-dd-toggle="-is-active">
                            <div class="bg-white px-30 py-30 sm:px-0 sm:py-15 rounded-4">
                                <div class="y-gap-5 js-results">
                                    <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                            <div class="d-flex">
                                                <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                                <div class="ml-10">
                                                    <div class="text-15 lh-12 fw-500 js-search-option-target">London</div>
                                                    <div class="text-14 lh-12 text-light-1 mt-5">Greater London, United Kingdom</div>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                            <div class="d-flex">
                                                <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                                <div class="ml-10">
                                                    <div class="text-15 lh-12 fw-500 js-search-option-target">New York</div>
                                                    <div class="text-14 lh-12 text-light-1 mt-5">New York State, United States</div>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                            <div class="d-flex">
                                                <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                                <div class="ml-10">
                                                    <div class="text-15 lh-12 fw-500 js-search-option-target">Paris</div>
                                                    <div class="text-14 lh-12 text-light-1 mt-5">France</div>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                            <div class="d-flex">
                                                <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                                <div class="ml-10">
                                                    <div class="text-15 lh-12 fw-500 js-search-option-target">Madrid</div>
                                                    <div class="text-14 lh-12 text-light-1 mt-5">Spain</div>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div>
                                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                                            <div class="d-flex">
                                                <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                                                <div class="ml-10">
                                                    <div class="text-15 lh-12 fw-500 js-search-option-target">Santorini</div>
                                                    <div class="text-14 lh-12 text-light-1 mt-5">Greece</div>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="searchMenu-date px-30 lg:py-20 lg:px-0 js-form-dd js-calendar">
                        <div data-x-dd-click="searchMenu-date">
                            <h4 class="text-15 fw-500 ls-2 lh-16">Depart</h4>
                            <div class="text-15 text-light-1 ls-2 lh-16">
                                <span class="js-first-date">Wed 2 Mar</span> - <span class="js-last-date">Fri 11 Apr</span>
                            </div>
                        </div>
                    </div>
                    <div class="searchMenu-date px-30 lg:py-20 lg:px-0 js-form-dd js-calendar">
                        <div data-x-dd-click="searchMenu-date">
                            <h4 class="text-15 fw-500 ls-2 lh-16">Return</h4>
                            <div class="text-15 text-light-1 ls-2 lh-16">
                                <span class="js-first-date">Wed 2 Mar</span> - <span class="js-last-date">Fri 11 Apr</span>
                            </div>
                        </div>
                    </div>
                    <div class="button-item">
                        <button class="mainSearch__submit button -blue-1 py-15 px-35 h-60 col-12 rounded-4 bg-dark-3 text-white">
                            <i class="icon-search text-20 mr-10"></i> Search </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md bg-light-2">
        <div class="container">
            <div class="row y-gap-30 justify-content-center">
                <div class="col-xl-3 col-lg-4 d-none">
                    <aside class="sidebar py-20 px-20 rounded-4 bg-white">
                        <div class="row y-gap-40">
                            <div class="sidebar__item -no-border">
                                <h5 class="text-18 fw-500 mb-10">Stops</h5>
                                <div class="sidebar-checkbox">
                                    <div class="row y-gap-10 items-center justify-between">
                                        <div class="col-auto">
                                            <div class="d-flex items-center">
                                                <div class="form-checkbox ">
                                                    <input type="checkbox" name="name">
                                                    <div class="form-checkbox__mark">
                                                        <div class="form-checkbox__icon icon-check"></div>
                                                    </div>
                                                </div>
                                                <div class="text-15 ml-10">Nonstop</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 text-light-1">$92</div>
                                        </div>
                                    </div>
                                    <div class="row y-gap-10 items-center justify-between">
                                        <div class="col-auto">
                                            <div class="d-flex items-center">
                                                <div class="form-checkbox ">
                                                    <input type="checkbox" name="name">
                                                    <div class="form-checkbox__mark">
                                                        <div class="form-checkbox__icon icon-check"></div>
                                                    </div>
                                                </div>
                                                <div class="text-15 ml-10">1 Stop</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 text-light-1">$92</div>
                                        </div>
                                    </div>
                                    <div class="row y-gap-10 items-center justify-between">
                                        <div class="col-auto">
                                            <div class="d-flex items-center">
                                                <div class="form-checkbox ">
                                                    <input type="checkbox" name="name">
                                                    <div class="form-checkbox__mark">
                                                        <div class="form-checkbox__icon icon-check"></div>
                                                    </div>
                                                </div>
                                                <div class="text-15 ml-10">2+ Stops</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 text-light-1">$92</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar__item">
                                <h5 class="text-18 fw-500 mb-10">Cabin</h5>
                                <div class="sidebar-checkbox">
                                    <div class="row y-gap-10 items-center justify-between">
                                        <div class="col-auto">
                                            <div class="d-flex items-center">
                                                <div class="form-checkbox ">
                                                    <input type="checkbox" name="name">
                                                    <div class="form-checkbox__mark">
                                                        <div class="form-checkbox__icon icon-check"></div>
                                                    </div>
                                                </div>
                                                <div class="text-15 ml-10">Basic Economy</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 text-light-1">$92</div>
                                        </div>
                                    </div>
                                    <div class="row y-gap-10 items-center justify-between">
                                        <div class="col-auto">
                                            <div class="d-flex items-center">
                                                <div class="form-checkbox ">
                                                    <input type="checkbox" name="name">
                                                    <div class="form-checkbox__mark">
                                                        <div class="form-checkbox__icon icon-check"></div>
                                                    </div>
                                                </div>
                                                <div class="text-15 ml-10">Economy</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 text-light-1">$92</div>
                                        </div>
                                    </div>
                                    <div class="row y-gap-10 items-center justify-between">
                                        <div class="col-auto">
                                            <div class="d-flex items-center">
                                                <div class="form-checkbox ">
                                                    <input type="checkbox" name="name">
                                                    <div class="form-checkbox__mark">
                                                        <div class="form-checkbox__icon icon-check"></div>
                                                    </div>
                                                </div>
                                                <div class="text-15 ml-10">Mixed</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 text-light-1">$92</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar__item">
                                <h5 class="text-18 fw-500 mb-10">Airlines</h5>
                                <div class="sidebar-checkbox">
                                    <div class="row y-gap-10 items-center justify-between">
                                        <div class="col-auto">
                                            <div class="d-flex items-center">
                                                <div class="form-checkbox ">
                                                    <input type="checkbox" name="name">
                                                    <div class="form-checkbox__mark">
                                                        <div class="form-checkbox__icon icon-check"></div>
                                                    </div>
                                                </div>
                                                <div class="text-15 ml-10">Air France</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 text-light-1">$92</div>
                                        </div>
                                    </div>
                                    <div class="row y-gap-10 items-center justify-between">
                                        <div class="col-auto">
                                            <div class="d-flex items-center">
                                                <div class="form-checkbox ">
                                                    <input type="checkbox" name="name">
                                                    <div class="form-checkbox__mark">
                                                        <div class="form-checkbox__icon icon-check"></div>
                                                    </div>
                                                </div>
                                                <div class="text-15 ml-10">Aer Lingus</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 text-light-1">$45</div>
                                        </div>
                                    </div>
                                    <div class="row y-gap-10 items-center justify-between">
                                        <div class="col-auto">
                                            <div class="d-flex items-center">
                                                <div class="form-checkbox ">
                                                    <input type="checkbox" name="name">
                                                    <div class="form-checkbox__mark">
                                                        <div class="form-checkbox__icon icon-check"></div>
                                                    </div>
                                                </div>
                                                <div class="text-15 ml-10">Air Canada</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 text-light-1">$21</div>
                                        </div>
                                    </div>
                                    <div class="row y-gap-10 items-center justify-between">
                                        <div class="col-auto">
                                            <div class="d-flex items-center">
                                                <div class="form-checkbox ">
                                                    <input type="checkbox" name="name">
                                                    <div class="form-checkbox__mark">
                                                        <div class="form-checkbox__icon icon-check"></div>
                                                    </div>
                                                </div>
                                                <div class="text-15 ml-10">Air Europa</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 text-light-1">$79</div>
                                        </div>
                                    </div>
                                    <div class="row y-gap-10 items-center justify-between">
                                        <div class="col-auto">
                                            <div class="d-flex items-center">
                                                <div class="form-checkbox ">
                                                    <input type="checkbox" name="name">
                                                    <div class="form-checkbox__mark">
                                                        <div class="form-checkbox__icon icon-check"></div>
                                                    </div>
                                                </div>
                                                <div class="text-15 ml-10">Turkish Airlines</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 text-light-1">$900</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar__item">
                                <h5 class="text-18 fw-500 mb-10">Departing from</h5>
                                <div class="sidebar-checkbox">
                                    <div class="row y-gap-10 items-center justify-between">
                                        <div class="col-auto">
                                            <div class="d-flex items-center">
                                                <div class="form-checkbox ">
                                                    <input type="checkbox" name="name">
                                                    <div class="form-checkbox__mark">
                                                        <div class="form-checkbox__icon icon-check"></div>
                                                    </div>
                                                </div>
                                                <div class="text-15 ml-10">BOS Boston</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 text-light-1">$92</div>
                                        </div>
                                    </div>
                                    <div class="row y-gap-10 items-center justify-between">
                                        <div class="col-auto">
                                            <div class="d-flex items-center">
                                                <div class="form-checkbox ">
                                                    <input type="checkbox" name="name">
                                                    <div class="form-checkbox__mark">
                                                        <div class="form-checkbox__icon icon-check"></div>
                                                    </div>
                                                </div>
                                                <div class="text-15 ml-10">PVD Providence</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 text-light-1">$45</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar__item">
                                <h5 class="text-18 fw-500 mb-10">Arriving at</h5>
                                <div class="sidebar-checkbox">
                                    <div class="row y-gap-10 items-center justify-between">
                                        <div class="col-auto">
                                            <div class="d-flex items-center">
                                                <div class="form-checkbox ">
                                                    <input type="checkbox" name="name">
                                                    <div class="form-checkbox__mark">
                                                        <div class="form-checkbox__icon icon-check"></div>
                                                    </div>
                                                </div>
                                                <div class="text-15 ml-10">LCY London</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 text-light-1">$92</div>
                                        </div>
                                    </div>
                                    <div class="row y-gap-10 items-center justify-between">
                                        <div class="col-auto">
                                            <div class="d-flex items-center">
                                                <div class="form-checkbox ">
                                                    <input type="checkbox" name="name">
                                                    <div class="form-checkbox__mark">
                                                        <div class="form-checkbox__icon icon-check"></div>
                                                    </div>
                                                </div>
                                                <div class="text-15 ml-10">LGW London</div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="text-15 text-light-1">$45</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar__item pb-30">
                                <h5 class="text-18 fw-500 mb-10">Price</h5>
                                <div class="row x-gap-10 y-gap-30">
                                    <div class="col-12">
                                        <div class="js-price-rangeSlider">
                                            <div class="text-14 fw-500"></div>
                                            <div class="d-flex justify-between mb-20">
                                                <div class="text-15 text-dark-1">
                                                    <span class="js-lower"></span> - <span class="js-upper"></span>
                                                </div>
                                            </div>
                                            <div class="px-5">
                                                <div class="js-slider"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="row y-gap-10 justify-between items-center">
                        <div class="col-auto">
                            <div class="text-18">
                                <span class="fw-500">3 flights</span> found.
                            </div>
                        </div>
                    </div>
                    <div class="js-accordion">
                        <div class="accordion__item py-30 px-30 bg-white rounded-4 base-tr mt-30" data-x="flight-item-1" data-x-toggle="shadow-2">
                            <div class="row y-gap-30 justify-between">
                                <div class="col">
                                    <div class="row y-gap-10 items-center">
                                        <div class="col-sm-auto">
                                            <img class="size-40" src="https://creativelayers.net/themes/gotrip-html/img/flightIcons/1.png" alt="image">
                                        </div>
                                        <div class="col">
                                            <div class="row x-gap-20 items-end">
                                                <div class="col-auto">
                                                    <div class="lh-15 fw-500">14:00</div>
                                                    <div class="text-15 lh-15 text-light-1">SAW</div>
                                                </div>
                                                <div class="col text-center">
                                                    <div class="flightLine">
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                    <div class="text-15 lh-15 text-light-1 mt-10">Nonstop</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="lh-15 fw-500">22:00</div>
                                                    <div class="text-15 lh-15 text-light-1">STN</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="text-15 text-light-1 px-20 md:px-0">4h 05m</div>
                                        </div>
                                    </div>
                                    <div class="row y-gap-10 items-center pt-30">
                                        <div class="col-sm-auto">
                                            <img class="size-40" src="https://creativelayers.net/themes/gotrip-html/img/flightIcons/2.png" alt="image">
                                        </div>
                                        <div class="col">
                                            <div class="row x-gap-20 items-end">
                                                <div class="col-auto">
                                                    <div class="lh-15 fw-500">14:00</div>
                                                    <div class="text-15 lh-15 text-light-1">SAW</div>
                                                </div>
                                                <div class="col text-center">
                                                    <div class="flightLine">
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                    <div class="text-15 lh-15 text-light-1 mt-10">Nonstop</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="lh-15 fw-500">22:00</div>
                                                    <div class="text-15 lh-15 text-light-1">STN</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="text-15 text-light-1 px-20 md:px-0">4h 05m</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-auto">
                                    <div class="d-flex items-center h-full">
                                        <div class="pl-30 border-left-light h-full md:d-none"></div>
                                        <div>
                                            <div class="text-left md:text-left mb-10">
                                                <div class="text-18 lh-16 fw-500">₹4752</div>
                                            </div>
                                            <div class="accordion__button">
                                                <button class="button -dark-1 px-30 h-50 bg-blue-1 text-white" data-x-click="flight-item-1"> View Deal <div class="icon-arrow-top-right ml-15"></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-accordion">
                        <div class="accordion__item py-30 px-30 bg-white rounded-4 base-tr mt-30" data-x="flight-item-2" data-x-toggle="shadow-2">
                            <div class="row y-gap-30 justify-between">
                                <div class="col">
                                    <div class="row y-gap-10 items-center">
                                        <div class="col-sm-auto">
                                            <img class="size-40" src="https://creativelayers.net/themes/gotrip-html/img/flightIcons/1.png" alt="image">
                                        </div>
                                        <div class="col">
                                            <div class="row x-gap-20 items-end">
                                                <div class="col-auto">
                                                    <div class="lh-15 fw-500">14:00</div>
                                                    <div class="text-15 lh-15 text-light-1">SAW</div>
                                                </div>
                                                <div class="col text-center">
                                                    <div class="flightLine">
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                    <div class="text-15 lh-15 text-light-1 mt-10">Nonstop</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="lh-15 fw-500">22:00</div>
                                                    <div class="text-15 lh-15 text-light-1">STN</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="text-15 text-light-1 px-20 md:px-0">4h 05m</div>
                                        </div>
                                    </div>
                                    <div class="row y-gap-10 items-center pt-30">
                                        <div class="col-sm-auto">
                                            <img class="size-40" src="https://creativelayers.net/themes/gotrip-html/img/flightIcons/2.png" alt="image">
                                        </div>
                                        <div class="col">
                                            <div class="row x-gap-20 items-end">
                                                <div class="col-auto">
                                                    <div class="lh-15 fw-500">14:00</div>
                                                    <div class="text-15 lh-15 text-light-1">SAW</div>
                                                </div>
                                                <div class="col text-center">
                                                    <div class="flightLine">
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                    <div class="text-15 lh-15 text-light-1 mt-10">Nonstop</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="lh-15 fw-500">22:00</div>
                                                    <div class="text-15 lh-15 text-light-1">STN</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="text-15 text-light-1 px-20 md:px-0">4h 05m</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-auto">
                                    <div class="d-flex items-center h-full">
                                        <div class="pl-30 border-left-light h-full md:d-none"></div>
                                        <div>
                                            <div class="text-left md:text-left mb-10">
                                                <div class="text-18 lh-16 fw-500">₹4752</div>
                                            </div>
                                            <div class="accordion__button">
                                                <button class="button -dark-1 px-30 h-50 bg-blue-1 text-white" data-x-click="flight-item-2"> View Deal <div class="icon-arrow-top-right ml-15"></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="js-accordion">
                        <div class="accordion__item py-30 px-30 bg-white rounded-4 base-tr mt-30" data-x="flight-item-3" data-x-toggle="shadow-2">
                            <div class="row y-gap-30 justify-between">
                                <div class="col">
                                    <div class="row y-gap-10 items-center">
                                        <div class="col-sm-auto">
                                            <img class="size-40" src="https://creativelayers.net/themes/gotrip-html/img/flightIcons/1.png" alt="image">
                                        </div>
                                        <div class="col">
                                            <div class="row x-gap-20 items-end">
                                                <div class="col-auto">
                                                    <div class="lh-15 fw-500">14:00</div>
                                                    <div class="text-15 lh-15 text-light-1">SAW</div>
                                                </div>
                                                <div class="col text-center">
                                                    <div class="flightLine">
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                    <div class="text-15 lh-15 text-light-1 mt-10">Nonstop</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="lh-15 fw-500">22:00</div>
                                                    <div class="text-15 lh-15 text-light-1">STN</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="text-15 text-light-1 px-20 md:px-0">4h 05m</div>
                                        </div>
                                    </div>
                                    <div class="row y-gap-10 items-center pt-30">
                                        <div class="col-sm-auto">
                                            <img class="size-40" src="https://creativelayers.net/themes/gotrip-html/img/flightIcons/2.png" alt="image">
                                        </div>
                                        <div class="col">
                                            <div class="row x-gap-20 items-end">
                                                <div class="col-auto">
                                                    <div class="lh-15 fw-500">14:00</div>
                                                    <div class="text-15 lh-15 text-light-1">SAW</div>
                                                </div>
                                                <div class="col text-center">
                                                    <div class="flightLine">
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                    <div class="text-15 lh-15 text-light-1 mt-10">Nonstop</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="lh-15 fw-500">22:00</div>
                                                    <div class="text-15 lh-15 text-light-1">STN</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="text-15 text-light-1 px-20 md:px-0">4h 05m</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-auto">
                                    <div class="d-flex items-center h-full">
                                        <div class="pl-30 border-left-light h-full md:d-none"></div>
                                        <div>
                                            <div class="text-left md:text-left mb-10">
                                                <div class="text-18 lh-16 fw-500">₹4752</div>
                                            </div>
                                            <div class="accordion__button">
                                                <button class="button -dark-1 px-30 h-50 bg-blue-1 text-white" data-x-click="flight-item-3"> View Deal <div class="icon-arrow-top-right ml-15"></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection('content')