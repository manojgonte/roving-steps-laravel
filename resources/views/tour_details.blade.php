@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>
    .cardImage__content {
        height: auto;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
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
        @if(Session::has('success_message'))
        <div class="p-2 mb-2 bg-info-2 rounded-4">
            <span class="text-white">{!! session('success_message') !!}</span>
        </div>
        @endif
        @if(Session::has('error_message'))
        <div class="p-2 mb-2 bg-red-1 rounded-4">
            <span class="text-white">{!! session('error_message') !!}</span>
        </div>
        @endif
        <div class="row y-gap-15 justify-between items-end">
            <div class="col-auto">
                <h1 class="text-30 fw-600">{{$tour->tour_name}}</h1>
                <div class="row x-gap-20 y-gap-20 items-center pt-10">
                    <div class="col-auto">
                        <div class="d-flex items-center">
                            <div class="d-flex x-gap-5 items-center">
                                <i class="icon-star text-10 text-yellow-1"></i>
                                <i class="icon-star text-10 text-yellow-1"></i>
                                <i class="icon-star text-10 text-yellow-1"></i>
                                <i class="icon-star text-10 text-yellow-1"></i>
                                <i class="icon-star text-10 text-yellow-1"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt-40 js-pin-container">
    <div class="container">
        <div class="row y-gap-30">
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

                <div class="border-top-light mt-40 mb-40"></div>
                <div class="row x-gap-40 y-gap-40">
                    <div class="col-12">
                        <h3 class="text-22 fw-500">Overview</h3>
                        <p class="text-dark-1 text-15 mt-20"> {!! $tour->description !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex justify-end js-pin-content">
                    <div class="w-360 lg:w-full d-flex flex-column items-center">
                        <div class="px-30 py-30 rounded-4 border-light bg-white shadow-4">
                            <div class="text-20 fw-500 text-dark-1 mr-5"> ₹{{number_format($tour->adult_price)}} <span class="text-14 text-light-1">Per Person</span></div>

                            <div class="row y-gap-30 justify-between pt-20">
                                <div class="col-md-auto col-6">
                                    <div class="d-flex">
                                        <i class="icon-nature text-22 text-blue-1 mr-10"></i>
                                        <div class="text-15 lh-15"> Days: <br><span class="text-25 fw-600"> {{ $tour->days }}</span> </div>
                                    </div>
                                </div>
                                <div class="col-md-auto col-6">
                                    <div class="d-flex">
                                        <i class="icon-fire text-22 text-blue-1 mr-10"></i>
                                        <div class="text-15 lh-15"> Nights: <br> <span class="text-25 fw-600"> {{ $tour->nights }}</span> </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row y-gap-20 pt-30">
                                <div class="col-12">
                                    <button class="button -dark-1 py-15 px-35 h-60 col-12 rounded-4 bg-blue-1 text-white" id="openModal"> ENQUIRE </button>
                                </div>
                            </div>
                            <div class="d-flex items-center pt-20">
                                <div class="size-40 flex-center bg-light-2 rounded-full">
                                    <i class="icon-heart text-16 text-green-2"></i>
                                </div>
                                <div class="text-14 lh-16 ml-10">{{mt_rand(75, 98)}}% of travelers recommend this experience</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container mt-40 mb-40">
    <div class="border-top-light"></div>
</div>


<section>
    <div class="container">
        <h3 class="text-22 fw-500 slanted d-flex my-10">Itinerary</h3>
        <div class="row y-gap-30 mt-20">
            
            @foreach($tour->itinerary as $day)
                <div class="border-bottom-light rounded-4 py-10 sm:px-20 sm:py-20">
                    <div class="row y-gap-10">
                        <h3 class="text-18 fw-600">Day {{$day->day}}: {{$day->visit_place}}</h3>
                        <div class="col-xl-3">
                            <img src="{{asset('img/tours/tour_itinerary/'.$day->image)}}" alt="" class="rounded-4 img-border-style img-repso">
                        </div>
                        <div class="col-xl-9">
                            <div class="bg-white rounded-4 px-10 py-10">
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
                                                <div class="text-left mt-5 pl-20">
                                                    <h4 class="text-16 fw-500">Activity</h4>
                                                    <p class="text-15">{{$day->activity}}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-start align-items-center">
                                                <div class="flex-center size-50 rounded-full bg-black-20">
                                                    <i class="icon-bed text-white text-30"></i>
                                                </div>
                                                <div class="text-left mt-5 pl-20">
                                                    <h4 class="text-16 fw-500">Stay</h4>
                                                    <p class="text-15">{{$day->stay}}</p>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-start align-items-center">
                                                <div class="flex-center size-50 rounded-full bg-black-20">
                                                    <i class="icon-food text-white text-30"></i>
                                                </div>
                                                <div class="text-left mt-5 pl-20">
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
    </div>
</section>
<div class="container mt-40 mb-40">
    <div class="border-top-light"></div>
</div>

<section class="pt-20">
    <div class="container">
        <div class="row x-gap-10 y-gap-10">
            <div class="col-auto">
                <h3 class="text-22 fw-500">Important information</h3>
            </div>
        </div>
        <div class="row x-gap-10 y-gap-10 justify-between pt-10">
            <div class="col-lg-6 col-md-6">
                <div class="fw-500 mb-10 border-bottom-light">Inclusions</div>
                <div class="text-15">
                    {!! $tour->inclusions !!}
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="fw-500 mb-10 border-bottom-light">Exclusions</div>
                <div class="text-15">{!! $tour->exclusions !!}</div>
            </div>
            <div class="col-12">
                <div class="fw-500 mb-10 border-bottom-light">Note</div>
                <div class="text-15">
                    {!! $tour->note !!}
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container mt-40 mb-40">
    <div class="border-top-light"></div>
</div>

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


<div id="modal" class="modal">
    <div class="modal-content p-0">
        <div class="container">
            <div class="row d-flex justify-between">
                <div class="col-lg-5 bg-blue-1 justify-center items-center d-flex bg-blue-1">
                    <div class="">
                        <img src="{{asset('img/elements/need_help.png')}}" style="height: 100px;" alt="">
                        <p class="text-white-50 text-center">Will help yoy to plan your dream holidays</p>
                    </div>
                </div>
                <div class="col-lg-7 py-20">
                    <div class="rounded-4 container">
                        <form action="{{url('tour-enquiry')}}" method="POST">@csrf
                            <div class="row y-gap-20 x-gap-20">
                                <div class="col-12">
                                    <div class="form-input ">
                                        <input type="text" name="name" required>
                                        <label class="lh-1 text-16 text-light-1">Full Name</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input ">
                                        <input type="text" name="contact" required>
                                        <label class="lh-1 text-16 text-light-1">Contact</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input ">
                                        <input type="email" name="email" required>
                                        <label class="lh-1 text-16 text-light-1">Email</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input ">
                                        <input type="text" name="tourist_no" required>
                                        <label class="lh-1 text-16 text-light-1">No. of Tourist</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input ">
                                        <input type="text" name="current_city" required>
                                        <label class="lh-1 text-16 text-light-1">Current City</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input ">
                                        <input type="date" name="from_date" required>
                                        <label class="lh-1 text-16 text-light-1">Travel: From Date</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input ">
                                        <input type="date" name="end_date" required>
                                        <label class="lh-1 text-16 text-light-1">Travel: To Date</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-input ">
                                        <textarea name="message" placeholder="" required rows="2"></textarea>
                                        <label class="lh-1 text-16 text-light-1">Your Messages</label>
                                    </div>
                                </div>
                                <div class="col-auto d-flex">
                                    <button type="submit" class="button px-24 h-50 -dark-1 bg-warning-2 text-white mx-1"> ENQUIRE</button>
                                    <button class="button bg-light-2 text-black px-24 close">&times;</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    const modal = document.getElementById("modal");
    const openModalBtn = document.getElementById("openModal");
    const closeModalBtn = document.getElementsByClassName("close")[0];

    openModalBtn.addEventListener("click", function() {
        modal.style.display = "block";
    });

    closeModalBtn.addEventListener("click", function() {
        modal.style.display = "none";
    });

    window.addEventListener("click", function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
</script>
@endsection('scripts')

@endsection('content')