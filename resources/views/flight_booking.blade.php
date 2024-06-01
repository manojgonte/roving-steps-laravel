@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
@endsection('styles')

<main class="main">
    <section data-anim-wrap class="masthead -type-10">
        <div class="container-1500">
            <div class="row">
                <div class="col-lg-auto">
                    <div class="masthead__content">
                        <h1 data-anim-child="slide-up delay-1" class="text-60 lg:text-40 sm:text-30">Where do You Want To Fly</h1>
                        <p data-anim-child="slide-up delay-2" class="mt-5">Discover amzaing places at exclusive deals</p>
                        <div data-anim-child="slide-up delay-3">
                            <div class="mainSearch -col-4 -w-1070 bg-white shadow-1 rounded-4 pr-20 py-20 lg:px-20 lg:pt-5 lg:pb-20 mt-15">
                                <div class="button-grid items-center">
                                    <div class="searchMenu-loc px-24 lg:py-20 lg:px-0 js-form-dd js-liverSearch">
                                        <div data-x-dd-click="searchMenu-loc">
                                            <h4 class="text-15 fw-500 ls-2 lh-16">Flying From</h4>
                                            <div class="text-15 text-light-1 ls-2 lh-16">
                                                <input autocomplete="off" type="search" placeholder="PNQ" class="js-search js-dd-focus" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="searchMenu-loc px-24 lg:py-20 lg:px-0 js-form-dd js-liverSearch">
                                        <div data-x-dd-click="searchMenu-loc">
                                            <h4 class="text-15 fw-500 ls-2 lh-16">Flying To</h4>
                                            <div class="text-15 text-light-1 ls-2 lh-16">
                                                <input autocomplete="off" type="search" placeholder="BOM" class="js-search js-dd-focus" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="searchMenu-date px-24 lg:py-20 lg:px-0 js-form-dd js-calendar">
                                        <div data-x-dd-click="searchMenu-date">
                                            <h4 class="text-15 fw-500 ls-2 lh-16">Depart</h4>
                                            <div class="text-15 text-light-1 ls-2 lh-16">
                                                <span class="js-first-date">Wed 2 Mar</span> - <span class="js-last-date">Fri 11 Apr</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="searchMenu-date px-24 lg:py-20 lg:px-0 js-form-dd js-calendar">
                                        <div data-x-dd-click="searchMenu-date">
                                            <h4 class="text-15 fw-500 ls-2 lh-16">Return</h4>
                                            <div class="text-15 text-light-1 ls-2 lh-16">
                                                <span class="js-first-date">Wed 2 Mar</span> - <span class="js-last-date">Fri 11 Apr</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button-item">
                                        <a href="{{url('flight-listing')}}" class="mainSearch__submit button -blue-1 py-15 px-35 h-60 col-12 rounded-4 bg-dark-1 text-white">
                                            <i class="icon-search text-20 mr-10"></i> Search </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-anim-child="slide-left delay-6" class="masthead__image">
                <div class="row y-gap-30">
                    <div class="col-auto">
                        <img src="img/masthead/10/1.png" alt="image" class="rounded-16">
                    </div>
                    <div class="col-auto">
                        <img src="img/masthead/10/2.png" alt="image" class="rounded-16">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-sm layout-pb-md">
        <div data-anim-wrap class="container">
            <div data-anim-child="slide-up" class="row justify-center text-center">
                <div class="col-auto">
                    <div class="sectionTitle -md">
                        <h2 class="sectionTitle__title">Why Choose Us</h2>
                        <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer</p>
                    </div>
                </div>
            </div>
            <div class="row y-gap-40 justify-between pt-50">
                <div data-anim-child="slide-up delay-1" class="col-lg-3 col-sm-6">
                    <div class="featureIcon -type-1 ">
                        <div class="d-flex justify-center">
                            <img src="#" data-src="img/featureIcons/1/1.svg" alt="image" class="js-lazy">
                        </div>
                        <div class="text-center mt-30">
                            <h4 class="text-18 fw-500">Best Price Guarantee</h4>
                            <p class="text-15 mt-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <div data-anim-child="slide-up delay-2" class="col-lg-3 col-sm-6">
                    <div class="featureIcon -type-1 ">
                        <div class="d-flex justify-center">
                            <img src="#" data-src="img/featureIcons/1/2.svg" alt="image" class="js-lazy">
                        </div>
                        <div class="text-center mt-30">
                            <h4 class="text-18 fw-500">Easy & Quick Booking</h4>
                            <p class="text-15 mt-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <div data-anim-child="slide-up delay-3" class="col-lg-3 col-sm-6">
                    <div class="featureIcon -type-1 ">
                        <div class="d-flex justify-center">
                            <img src="#" data-src="img/featureIcons/1/3.svg" alt="image" class="js-lazy">
                        </div>
                        <div class="text-center mt-30">
                            <h4 class="text-18 fw-500">Customer Care 24/7</h4>
                            <p class="text-15 mt-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection('content')