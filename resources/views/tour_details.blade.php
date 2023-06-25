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
                        <div class="mainSearch bg-white px-10 py-10 lg:px-20 lg:pt-5 lg:pb-20 rounded-4">
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
        <div class="singleMenu__content">
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
                                <div class="text-14"> From <span class="text-22 text-dark-1 fw-500">₹50,000 <span class="text-14 text-right">/ Person</span></span>
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
                        <div class="">Dubai</div>
                    </div>
                    <div class="col-auto">
                        <div class="">></div>
                    </div>
                    <div class="col-auto">
                        <div class="text-dark-1">Mesmerizing Dubai with Abu Dhabi</div>
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
                                <h1 class="text-26 fw-600">Mesmerizing Dubai with Abu Dhabi</h1>
                            </div>
                        </div>
                        {{-- <div class="row x-gap-20 y-gap-20 items-center">
                            <div class="col-auto">
                                <div class="text-15 text-light-1">4 Stay | Meal | Siteseeing | Private Transport | Visa</div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-auto">
                        <div class="text-14 text-right"> From <span class="text-22 text-dark-1 fw-500">₹50,000 <span class="text-14 text-right">/ Person</span></span>
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
                                        <img class="col-12" src="img/banner/tour_slider1.jpg" alt="image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="col-12" src="img/banner/tour_slider1.jpg" alt="image">
                                    </div>
                                    <div class="swiper-slide">
                                        <img class="col-12" src="img/banner/tour_slider1.jpg" alt="image">
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
                        <p class="text-dark-1 text-15 mt-20"> You can directly book the best price if your travel dates are available, all discounts are already included. In the following house description you will find all information about our listing. <br>
                            <br> 2-room terraced house on 2 levels. Comfortable and cosy furnishings: 1 room with 1 french bed and radio. Shower, sep. WC. Upper floor: (steep stair) living/dining room with 1 sofabed (110 cm, length 180 cm), TV. Exit to the balcony. Small kitchen (2 hot plates, oven.
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
                                <div class="text-14 fw-500">4 Stay | Meal | Siteseeing | Private Transport | Visa</div>
                            </div>
                        </div>
                    </div>
                    <div class="border-top-light mt-15 mb-15"></div>
                    <div class="col-auto d-flex">
                        <a href="#" class="button h-50 px-24 -dark-1 bg-light-1 text-white mx-1" data-x-click="enquire"> ENQUIRE </a>
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
        <div class="border-bottom-light rounded-4 py-10 sm:px-20 sm:py-20">
            <div class="row y-gap-10">
                <h3 class="text-20 fw-500">Day 1: Arriving in Dubai</h3>
                <div class="col-xl-4">
                    <div class="col-12 col-md-4 col-xl-12">
                        <img src="img/backgrounds/1.png" alt="image" class="rounded-4 img-border-style">
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="bg-white rounded-4 px-30 py-30">
                        <div class="row y-gap-30">
                            <div class="col-lg col-md-6">
                                <p class="text-dark-1 text-15"> Welcome to Dubai!!! A land full of surprises and a complete destination. Dubai offers an extensive horizon of things to do, see, experience and learn. It is surrounded by mysterious deserts, sand dunes and within the city you will find amazing beach resorts, incredibly high tech buildings with old traditional houses and mosques. Upon arrival at the airport, you will be transferred to your hotel. And later in the evening will be proceed to Dhow cruise. Overnight at the hotel in Dubai</p>
                            </div>
                            <div class="col-lg-auto col-md-6 border-left-light lg:border-none text-right lg:text-left">
                                <div class="y-gap-5">
                                    <div class="d-flex justify-start align-items-center">
                                        <div class="flex-center size-50 rounded-full bg-black-20">
                                            <i class="icon-customer text-white text-30"></i>
                                        </div>
                                        <div class="text-left mt-10 pl-20">
                                            <h4 class="text-16 fw-500">Activity</h4>
                                            <p class="text-15">Hotel Name</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-start align-items-center">
                                        <div class="flex-center size-50 rounded-full bg-black-20">
                                            <i class="icon-bed text-white text-30"></i>
                                        </div>
                                        <div class="text-left mt-10 pl-20">
                                            <h4 class="text-16 fw-500">Stay</h4>
                                            <p class="text-15">Hotel Name</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-start align-items-center">
                                        <div class="flex-center size-50 rounded-full bg-black-20">
                                            <i class="icon-food text-white text-30"></i>
                                        </div>
                                        <div class="text-left mt-10 pl-20">
                                            <h4 class="text-16 fw-500">Food</h4>
                                            <p class="text-15">Breakfast | Lunch | Dinner</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom-light rounded-4 py-10 sm:px-20 sm:py-20 mt-10">
            <div class="row y-gap-10">
                <h3 class="text-20 fw-500">Day 2: Dubai City tour with Burj Khalifa</h3>
                <div class="col-xl-4">
                    <div class="col-12 col-md-4 col-xl-12">
                        <img src="img/backgrounds/1.png" alt="image" class="rounded-4 img-border-style">
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="bg-white rounded-4 px-30 py-30">
                        <div class="row y-gap-30">
                            <div class="col-lg col-md-6">
                                <p class="text-dark-1 text-15"> Today after breakfast enjoy the city tour of Dubai. Visit Palm Island, take a photo at the famous iconic Burj Al Arab, see Dubai Marina Skylines. Drive to Dubai Creek, Jumeirah Mosque, Burj Al Arab (Photo Stop), Atlantis the Palm, Burj Khalifa (No entrance), Dubai Mall, Jumeirah Beach, Shaikh Zayed Road. Later proceed to 124th Floor – At the Top Burj Khalifa. Overnight at the hotel in Dubai.</p>
                            </div>
                            <div class="col-lg-auto col-md-6 border-left-light lg:border-none text-right lg:text-left">
                                <div class="y-gap-5">
                                    <div class="d-flex justify-start align-items-center">
                                        <div class="flex-center size-50 rounded-full bg-black-20">
                                            <i class="icon-customer text-white text-30"></i>
                                        </div>
                                        <div class="text-left mt-10 pl-20">
                                            <h4 class="text-16 fw-500">Activity</h4>
                                            <p class="text-15">Hotel Name</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-start align-items-center">
                                        <div class="flex-center size-50 rounded-full bg-black-20">
                                            <i class="icon-bed text-white text-30"></i>
                                        </div>
                                        <div class="text-left mt-10 pl-20">
                                            <h4 class="text-16 fw-500">Stay</h4>
                                            <p class="text-15">Hotel Name</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-start align-items-center">
                                        <div class="flex-center size-50 rounded-full bg-black-20">
                                            <i class="icon-food text-white text-30"></i>
                                        </div>
                                        <div class="text-left mt-10 pl-20">
                                            <h4 class="text-16 fw-500">Food</h4>
                                            <p class="text-15">Breakfast | Lunch | Dinner</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom-light rounded-4 py-10 sm:px-20 sm:py-20 mt-10">
            <div class="row y-gap-10">
                <h3 class="text-20 fw-500">Day 3: Abu Dhabi - City tour with Ferrari World</h3>
                <div class="col-xl-4">
                    <div class="col-12 col-md-4 col-xl-12">
                        <img src="img/backgrounds/1.png" alt="image" class="rounded-4 img-border-style">
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="bg-white rounded-4 px-30 py-30">
                        <div class="row y-gap-30">
                            <div class="col-lg col-md-6">
                                <p class="text-dark-1 text-15">Today after breakfast proceed to Abu dhabi. Visit Sheikh Zayed Grand Mosque - This architectural work of art is one of the world largest mosques, with a capacity for an astonishing 41,000 worshipers. Later visit the world most famous Ferrari Park. Overnight at the hotel in Dubai.</p>
                            </div>
                            <div class="col-lg-auto col-md-6 border-left-light lg:border-none text-right lg:text-left">
                                <div class="y-gap-5">
                                    <div class="d-flex justify-start align-items-center">
                                        <div class="flex-center size-50 rounded-full bg-black-20">
                                            <i class="icon-customer text-white text-30"></i>
                                        </div>
                                        <div class="text-left mt-10 pl-20">
                                            <h4 class="text-16 fw-500">Activity</h4>
                                            <p class="text-15">Hotel Name</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-start align-items-center">
                                        <div class="flex-center size-50 rounded-full bg-black-20">
                                            <i class="icon-bed text-white text-30"></i>
                                        </div>
                                        <div class="text-left mt-10 pl-20">
                                            <h4 class="text-16 fw-500">Stay</h4>
                                            <p class="text-15">Hotel Name</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-start align-items-center">
                                        <div class="flex-center size-50 rounded-full bg-black-20">
                                            <i class="icon-food text-white text-30"></i>
                                        </div>
                                        <div class="text-left mt-10 pl-20">
                                            <h4 class="text-16 fw-500">Food</h4>
                                            <p class="text-15">Breakfast | Lunch | Dinner</p>
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

<section class="pt-40 layout-pb-md">
    <div class="container">
        <div class="pt-40 border-top-light">
            <div class="row x-gap-50 y-gap-30 pt-20">
                <div class="col-lg-6 col-md-6" id="inclusions">
                    <div class="">
                        <div class="d-flex items-center">
                            <h3 class="text-22 fw-500">Inclusions</h3>
                        </div>
                        <ul class="text-15 pt-10">
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>Ex-Mumbai Airfare
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>5 nights accommodation in 3+ property
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>5 Breakfast and 2 Dinner
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>Dhow Dinner Cruise
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>Dubai city tour
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>Burj Khalifa 124th Floor with Dubai Mall and Fountain Show
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>Abu Dhabi city tour with Ferrari World
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>Desert Safari with BBQ Dinner
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>Global Village and Miracle Garden
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>All tours and transfers on SIC basis
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>Airport Transfers on PVT Basis
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>Visa
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>Insurance upto 60 years
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6" id="exclusions">
                    <div class="">
                        <div class="d-flex items-center">
                            <h3 class="text-22 fw-500">Exclusions</h3>
                        </div>
                        <ul class="text-15 pt-10">
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>Tips and porter charges
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>Cost of any excursions not included in the package
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>Early check in and late check out will be as per hotel policy and availability. (Extra charges may be applicable)
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>Items of any personal nature such as phone calls, pay movies, room services, mini bars, laundries or other expenditures during the tour
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>Tours can be cancelled or postponed without prior notice in case of any natural calamities
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>SIC means seat in coach basis. Drivers would communicate with the guests if there is any change in assigned pick up time
                            </li>
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>If guests fails to reach within the time arranged , there will be no replacement given. Any other services not specified above
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6" id="note">
                    <div class="">
                        <div class="d-flex items-center">
                            <h3 class="text-22 fw-500">Note</h3>
                        </div>
                        <ul class="text-15 pt-10">
                            <li class="d-flex items-center">
                                <i class="icon-check text-10 mr-20"></i>Ø Please note that As per DTCM Rules, based on the Executive Council Resolution No 2 of 2014. With effective 31 March 2014, Every Guest has to pay Tourism Dirham that is AED 7/- per room per night for all 2* hotels, AED 10/- per room per night for all 3* Hotels, AED 15/- per room per night for all 4 * And AED 20/- per room per night for all 5* Hotels, at the time of check in.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="layout-pt-md layout-pb-md bg-dark-2">
    <div class="container">
        <div class="row y-gap-30 justify-between items-center">
            <div class="col-auto">
                <div class="row y-gap-20  flex-wrap items-center">
                    <div class="col-auto">
                        <div class="icon-newsletter text-60 sm:text-40 text-white"></div>
                    </div>
                    <div class="col-auto">
                        <h4 class="text-26 text-white fw-600">Your Travel Journey Starts Here</h4>
                        <div class="text-white">Sign up and we'll send the best deals to you</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="currencyMenu is-hidden js-currencyMenu" data-x="enquire" data-x-toggle="is-hidden">
    <div class="currencyMenu__bg" data-x-click="enquire"></div>
    <div class="currencyMenu__content bg-white rounded-4">
        <div class="row d-flex justify-between">
            <div class="col-lg-5 bg-blue-1 items-center d-flex">
                <div class="">
                    <img src="{{asset('img/elements/need_help.png')}}" style="height: 200px;" alt="">
                    <p class="text-white-50 text-center">Will help yoy to plan your dream holidays</p>
                </div>
            </div>
            <div class="col-lg-7 py-20">
                <div class="rounded-4 container">
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
                            <a href="#" class="button px-24 h-50 -dark-1 bg-warning-2 text-white mx-1"> ENQUIRE</a>
                            <button href="#" class="button px-24 h-50 -dark-1 bg-light-1 text-white pointer" data-x-click="enquire"> Cancel &nbsp; <i class="icon-close"></i></button>
                                
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')