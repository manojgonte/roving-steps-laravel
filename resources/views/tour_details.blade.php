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

{{-- <div class="row y-gap-30">
    <div class="col-lg-8">
        <div class="relative d-flex justify-center overflow-hidden js-section-slider" data-slider-cols="base-1" data-nav-prev="js-img-prev" data-nav-next="js-img-next">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{asset('img/lists/tour/single/1.png')}}" alt="image" class="rounded-4 col-12 h-full object-cover">
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('img/gallery/1/2.png')}}" alt="image" class="rounded-4 col-12 h-full object-cover">
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('img/gallery/1/3.png')}}" alt="image" class="rounded-4 col-12 h-full object-cover">
                </div>
                <div class="swiper-slide">
                    <img src="{{asset('img/gallery/1/4.png')}}" alt="image" class="rounded-4 col-12 h-full object-cover">
                </div>
            </div>
            <div class="absolute h-full col-11">
                <button class="section-slider-nav -prev flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-img-prev">
                    <i class="icon icon-chevron-left text-12"></i>
                </button>
                <button class="section-slider-nav -next flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-img-next">
                    <i class="icon icon-chevron-right text-12"></i>
                </button>
            </div>
        </div>
    </div>
</div> --}}

<div class="singleMenu js-singleMenu">
    <div class="col-12">
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