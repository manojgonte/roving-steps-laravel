@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>
    .cardImage__content {
        height: auto;
    }
</style>
@endsection('styles')

<section class="section-bg layout-pt-lg layout-pb-lg">
    <div class="section-bg__item col-12">
        <img src="{{asset('img/backgrounds/contact_bg.jpg')}}" alt="image">
    </div>
    <div class="container">
        <div class="row justify-center text-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <h1 class="text-40 md:text-25 fw-600 text-white">Tours</h1>
                <div class="text-white mt-15">Your trusted trip companion</div>
            </div>
        </div>
    </div>
</section>

<div class="singleMenu js-singleMenu">
    <div class="col-12">
        <div class="py-10 bg-dark-2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mainSearch bg-white px-10 py-10 lg:px-20 lg:pt-5 lg:pb-20 rounded-4 sm:d-none">
                            <div class="button-grid items-center">
                                <div class="searchMenu-loc pl-10 pr-30 lg:py-20 lg:px-0 js-form-dd js-liverSearch">
                                    <div data-x-dd-click="searchMenu-loc">
                                        <h4 class="text-15 fw-500 ls-2 lh-16">Location</h4>
                                        <div class="text-15 text-light-1 ls-2 lh-16">
                                            <input autocomplete="off" type="search" placeholder="Warwick Allerton Hotel Chicago" class="js-search js-dd-focus" />
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
                                        <h4 class="text-15 fw-500 ls-2 lh-16">Check in - Check out</h4>
                                        <div class="text-15 text-light-1 ls-2 lh-16">
                                            <span class="js-first-date">Wed 2 Mar</span> - <span class="js-last-date">Fri 11 Apr</span>
                                        </div>
                                    </div>
                                    <div class="searchMenu-date__field shadow-2" data-x-dd="searchMenu-date" data-x-dd-toggle="-is-active">
                                        <div class="bg-white px-30 py-30 rounded-4">
                                            <div class="overflow-hidden js-calendar-slider">
                                                <button class="calendar-icon -left js-calendar-prev z-2">
                                                    <i class="icon-arrow-left text-24"></i>
                                                </button>
                                                <button class="calendar-icon -right js-calendar-next z-2">
                                                    <i class="icon-arrow-right text-24"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="searchMenu-guests px-30 lg:py-20 lg:px-0 js-form-dd js-form-counters">
                                    <div data-x-dd-click="searchMenu-guests">
                                        <h4 class="text-15 fw-500 ls-2 lh-16">Guest</h4>
                                        <div class="text-15 text-light-1 ls-2 lh-16">
                                            <span class="js-count-adult">2</span> adults - <span class="js-count-child">1</span> childeren - <span class="js-count-room">1</span> room
                                        </div>
                                    </div>
                                    <div class="searchMenu-guests__field shadow-2" data-x-dd="searchMenu-guests" data-x-dd-toggle="-is-active">
                                        <div class="bg-white px-30 py-30 rounded-4">
                                            <div class="row y-gap-10 justify-between items-center">
                                                <div class="col-auto">
                                                    <div class="text-15 fw-500">Adults</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="d-flex items-center js-counter" data-value-change=".js-count-adult">
                                                        <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                                            <i class="icon-minus text-12"></i>
                                                        </button>
                                                        <div class="flex-center size-20 ml-15 mr-15">
                                                            <div class="text-15 js-count">2</div>
                                                        </div>
                                                        <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                                            <i class="icon-plus text-12"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-top-light mt-24 mb-24"></div>
                                            <div class="row y-gap-10 justify-between items-center">
                                                <div class="col-auto">
                                                    <div class="text-15 lh-12 fw-500">Children</div>
                                                    <div class="text-14 lh-12 text-light-1 mt-5">Ages 0 - 17</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="d-flex items-center js-counter" data-value-change=".js-count-child">
                                                        <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                                            <i class="icon-minus text-12"></i>
                                                        </button>
                                                        <div class="flex-center size-20 ml-15 mr-15">
                                                            <div class="text-15 js-count">1</div>
                                                        </div>
                                                        <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                                            <i class="icon-plus text-12"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border-top-light mt-24 mb-24"></div>
                                            <div class="row y-gap-10 justify-between items-center">
                                                <div class="col-auto">
                                                    <div class="text-15 fw-500">Rooms</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="d-flex items-center js-counter" data-value-change=".js-count-room">
                                                        <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                                            <i class="icon-minus text-12"></i>
                                                        </button>
                                                        <div class="flex-center size-20 ml-15 mr-15">
                                                            <div class="text-15 js-count">1</div>
                                                        </div>
                                                        <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                                            <i class="icon-plus text-12"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="button-item">
                                    <button class="mainSearch__submit button -dark-1 py-15 px-40 col-12 rounded-4 bg-blue-1 text-white">
                                        <i class="icon-search text-20 mr-10"></i> Check availability </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="singleMenu__content sm:d-none">
            <div class="container">
                <div class="row y-gap-20 justify-between items-center">
                    <div class="col-auto">
                        <div class="singleMenu__links row x-gap-30 y-gap-10">
                            <div class="col-auto">
                                <a href="#overview">Overview</a>
                            </div>
                            <div class="col-auto">
                                <a href="#itinerary">Itinerary</a>
                            </div>
                            <div class="col-auto">
                                <a href="#inclusions">Inclusions</a>
                            </div>
                            <div class="col-auto">
                                <a href="#exclusions">Exclusions</a>
                            </div>
                            <div class="col-auto">
                                <a href="#note">Note</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="row x-gap-15 y-gap-15 items-center">
                            <div class="col-auto">
                                <div class="text-14"> From <span class="text-22 text-dark-1 fw-500">₹{{$tour->adult_price}} <span class="text-14 text-right">/ Person</span></span>
                                </div>
                            </div>
                            <div class="col-auto d-flex">
                                <a href="#" class="button h-50 px-24 -dark-1 bg-light-1 text-white mx-1" data-x-click="enquire"> ENQUIRE </a>
                                {{-- <a href="#" class="button h-50 px-24 -dark-1 bg-warning-2 text-white"> BOOK NOW </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="py-10 d-flex items-center bg-light-2">
    <div class="container">
        <div class="row y-gap-10 items-center justify-between">
            <div class="col-auto">
                <div class="row x-gap-10 y-gap-5 items-center text-14 text-light-1">
                    <div class="col-auto">
                        <div class="">Home</div>
                    </div>
                    <div class="col-auto">
                        <div class="">></div>
                    </div>
                    <div class="col-auto">
                        <div class="">Tour</div>
                    </div>
                    <div class="col-auto">
                        <div class="">></div>
                    </div>
                    <div class="col-auto">
                        <div class="">{{$tour->dest_name}}</div>
                    </div>
                    <div class="col-auto">
                        <div class="">></div>
                    </div>
                    <div class="col-auto">
                        <div class="text-dark-1">{{$tour->tour_name}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-40">
    <div class="container">
        <div class="hotelSingleGrid">
            <div>                
                <div class="row justify-between items-end pb-20">
                    <div class="col-auto">
                        <div class="row x-gap-20 y-gap-20 items-center">
                            <div class="col-auto">
                                <h1 class="text-26 fw-600">{{$tour->tour_name}}</h1>
                            </div>
                        </div>
                        {{-- <div class="row x-gap-20 y-gap-20 items-center">
                            <div class="col-auto">
                                <div class="text-15 text-light-1">4 Stay | Meal | Siteseeing | Private Transport | Visa</div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-auto">
                        <div class="text-14 text-right"> From <span class="text-22 text-dark-1 fw-500">₹{{$tour->adult_price}} <span class="text-14 text-right">/ Person</span></span>
                        </div>
                        {{-- <div class="button h-50 px-24 -dark-1 bg-black-20 text-black mt-5"> 5N/6D</div> --}}
                    </div>
                </div>
                <div class="cruiseCard__image">
                    <div class="cardImage ratio ratio-16:9">
                        <div class="cardImage__content">
                            <div class="cardImage-slider rounded-4 overflow-hidden js-cardImage-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="col-12" src="{{asset('img/banner/tour_slider1.jpg')}}" alt="image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="col-12" src="{{asset('img/banner/tour_slider1.jpg')}}" alt="image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="col-12" src="{{asset('img/banner/tour_slider1.jpg')}}" alt="image">
                                    </div>
                                </div>
                                <div class="cardImage-slider__pagination js-pagination"></div>
                                <div class="cardImage-slider__nav -prev">
                                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2 js-prev">
                                        <i class="icon-chevron-left text-10"></i>
                                    </button>
                                </div>
                                <div class="cardImage-slider__nav -next">
                                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2 js-next">
                                        <i class="icon-chevron-right text-10"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="overview" class="row y-gap-40">
                    <div class="col-12">
                        <h3 class="text-22 fw-500 pt-40 border-top-light">Overview</h3>
                        <p class="text-dark-1 text-15 mt-20"> {!! $tour->description !!}
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="px-30 py-30 border-light rounded-4">
                    <div class="row y-gap-10">
                        <div class="col-12">
                            <i class="icon-star text-18 text-yellow-1"></i>
                            <i class="icon-star text-18 text-yellow-1"></i>
                            <i class="icon-star text-18 text-yellow-1"></i>
                            <i class="icon-star text-18 text-yellow-1"></i>
                            <i class="icon-star text-18 text-yellow-1"></i>
                        </div>
                        <div class="col-12">
                            <div class="d-flex items-center">
                                <div class="text-14 fw-500">{!! $tour->amenities !!}</div>
                            </div>
                        </div>
                    </div>
                    <div class="border-top-light mt-15 mb-15"></div>
                    <div class="col-auto d-flex">
                        <button class="button h-50 px-24 -dark-1 bg-light-1 text-white mx-1" data-x-click="enquire"> ENQUIRE </button>
                        {{-- <a href="#" class="button h-50 px-24 -dark-1 bg-warning-2 text-white"> BOOK NOW </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="itinerary" class="pt-30">
    <div class="container">
        <div class="row pb-20">
            <div class="col-auto">
                <h3 class="text-22 fw-500 slanted d-flex">Itinerary</h3>
            </div>
        </div>

        @foreach($tour->itinerary as $day)
        <div class="border-bottom-light rounded-4 py-10 sm:px-20 sm:py-20">
            <div class="row y-gap-10">
                <h3 class="text-18 fw-600">Day {{$day->day}}: {{$day->visit_place}}</h3>
                <div class="col-xl-3">
                    <img src="{{asset('img/tours/tour_itinerary/'.$day->image)}}" alt="" class="rounded-4 img-border-style img-repso">
                </div>
                <div class="col-xl-9">
                    <div class="bg-white rounded-4 px-30 py-30">
                        <div class="row y-gap-30">
                            <div class="col-md-9">
                                <p class="text-dark-1 text-15"> {{$day->description}}</p>
                            </div>
                            <div class="col-md-3 border-left-light lg:border-none text-right lg:text-left py-0">
                                <div class="y-gap-5">
                                    <div class="d-flex justify-start align-items-center">
                                        <div class="flex-center size-50 rounded-full bg-black-20">
                                            <i class="icon-customer text-white text-30"></i>
                                        </div>
                                        <div class="text-left mt-10 pl-20">
                                            <h4 class="text-16 fw-500">Activity</h4>
                                            <p class="text-15">{{$day->activity}}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-start align-items-center">
                                        <div class="flex-center size-50 rounded-full bg-black-20">
                                            <i class="icon-bed text-white text-30"></i>
                                        </div>
                                        <div class="text-left mt-10 pl-20">
                                            <h4 class="text-16 fw-500">Stay</h4>
                                            <p class="text-15">{{$day->stay}}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-start align-items-center">
                                        <div class="flex-center size-50 rounded-full bg-black-20">
                                            <i class="icon-food text-white text-30"></i>
                                        </div>
                                        <div class="text-left mt-10 pl-20">
                                            <h4 class="text-16 fw-500">Food</h4>
                                            <p class="text-15">{{$day->food}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section class="pt-40 layout-pb-md">
    <div class="container">
        <div class="pt-40 border-top-light">
            <div class="row x-gap-50 y-gap-30 pt-20">
                <div class="col-lg-6 col-md-6" id="inclusions">
                    <div class="">
                        <div class="d-flex items-center d-block">
                            <h3 class="text-22 fw-500 border-bottom-light">Inclusions</h3>
                        </div>
                        <div class="text-15 pt-10">
                            {!! $tour->inclusions !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6" id="exclusions">
                    <div class="">
                        <div class="d-flex items-center d-block">
                            <h3 class="text-22 fw-500 border-bottom-light">Exclusions</h3>
                        </div>
                        <div class="text-15 pt-10">
                            {!! $tour->exclusions !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6" id="note">
                    <div class="">
                        <div class="d-flex items-center d-block">
                            <h3 class="text-22 fw-500 border-bottom-light">Note</h3>
                        </div>
                        <div class="text-15 pt-10">
                            {!! $tour->note !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="layout-pt-md layout-pb-md bg-blue-1">
    <div class="container">
        <div class="row d-flex justify-between">
            <div class="col-lg-5 bg-blue-1 items-center d-flex">
                <div class="">
                    <img src="{{asset('img/elements/need_help.png')}}" style="height: 200px;" alt="">
                    <p class="text-white-50 text-center">Will help yoy to plan your dream holidays</p>
                </div>
            </div>
            <div class="col-lg-7 py-20">
                <div class="rounded-4 container">
                    <form action="{{url('tour-enquiry')}}" method="POST">@csrf
                        <div class="row y-gap-20 x-gap-20">
                            <div class="col-12">
                                <div class="form-input ">
                                    <input type="text" required>
                                    <label class="lh-1 text-16 text-light-1">Full Name</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-input ">
                                    <input type="text" required>
                                    <label class="lh-1 text-16 text-light-1">Contact</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-input ">
                                    <input type="text" required>
                                    <label class="lh-1 text-16 text-light-1">Email</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-input ">
                                    <input type="text" required>
                                    <label class="lh-1 text-16 text-light-1">No. of Tourist</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-input ">
                                    <input type="text" required>
                                    <label class="lh-1 text-16 text-light-1">Current City</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-input ">
                                    <textarea required rows="4"></textarea>
                                    <label class="lh-1 text-16 text-light-1">Your Messages</label>
                                </div>
                            </div>
                            <div class="col-auto d-flex">
                                <button type="submit" class="button px-24 h-50 -dark-1 bg-warning-2 text-white mx-1"> ENQUIRE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection('content')