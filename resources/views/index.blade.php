@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>
    .bg-triangle {
        background-image: url('img/elements/app_bg.jpeg');
        background-size: cover;
    }
</style>
@endsection('styles')

<section class="masthead -type-9">
    <div class="masthead-slider js-masthead-slider-9">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="masthead__bg bg-dark-3">
                    <img src="img/banner/banner1.webp" alt="image">
                </div>
                <div class="container">
                    <div class="row justify-center">
                        <div class="col-xl-9">
                            <div class="text-center">
                                <h2 class="text-60 lg:text-60 sm:text-40 text-white">Explore the Huge World and Enjoy it's Beauty</h2>
                                <div class="text-white fw-500 mb-10">Let's experience moments which leave us stunned and gives us goosebumps and so much more that we cannot express when we travel to places we always wished for.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="masthead__bg bg-dark-3">
                    <img src="img/banner/banner1.webp" alt="image">
                </div>
                <div class="container">
                    <div class="row justify-center">
                        <div class="col-xl-9">
                            <div class="text-center">
                                <h2 class="text-60 lg:text-60 sm:text-40 text-white">Explore the Huge World and Enjoy it's Beauty</h2>
                                <div class="text-white fw-500 mb-10">Let's experience moments which leave us stunned and gives us goosebumps and so much more that we cannot express when we travel to places we always wished for.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="masthead__bg bg-dark-3">
                    <img src="img/banner/banner1.webp" alt="image">
                </div>
                <div class="container">
                    <div class="row justify-center">
                        <div class="col-xl-9">
                            <div class="text-center">
                                <h2 class="text-60 lg:text-60 sm:text-40 text-white">Explore the Huge World and Enjoy it's Beauty</h2>
                                <div class="text-white fw-500 mb-10">Let's experience moments which leave us stunned and gives us goosebumps and so much more that we cannot express when we travel to places we always wished for.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="masthead-slider__nav -prev">
            <button class="button py-10 js-prev">
                <span class="h-1 w-48 bg-white"></span>
            </button>
        </div>
        <div class="masthead-slider__nav -next">
            <button class="button py-10 js-next">
                <span class="h-1 w-48 bg-white"></span>
            </button>
        </div>
    </div>
    <a href="#secondSection" class="masthead__scroll">
        <div class="d-flex items-center">
            <div class="text-white lh-15 text-right mr-10">
                <div class="fw-500">Scroll Down</div>
                <div class="text-15">to discover more</div>
            </div>
            <div class="-icon">
                <div></div>
                <div></div>
            </div>
        </div>
    </a>
</section>

<section class="layout-pt-md layout-pb-md">
    <div data-anim-wrap class="container">
        <div data-anim-child="slide-up delay-1" class="row y-gap-30">
            <div class="col-xl-6 offset-xl-1 col-lg-7">
                <div class="row y-gap-60">
                    <img src="{{asset('img/home/hexagone-about.png')}}" />
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 text-center">
                <h2 class="text-30 fw-600">About Us</h2>
                <p class="mt-5">Roving steps is formed with a strong passion of exploring different destinations. This is not just a company but a family which we are looking forward to create. We are here to Use our expert knowledge and a personalized touch to make sure reality exceeds your expectations. We get immense pleasure to see our guest satisfied and smiling because of our services.</p>
                <p class="mt-20">We all experience moments which leave us stunned and which gives us Goosebumps and so much more that we cannot express when we travel to places we always wished for… Roving Steps takes the responsibility for fulfilling your desired dreams of Traveling!!</p>
                <div class="d-inline-block mt-40 sm:mt-20">
                    <a href="{{url('about-us')}}" class="button -md -blue-1 bg-yellow-1 text-dark-1"> KNOW MORE <div class="icon-arrow-top-right ml-15"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="layout-pt-md layout-pb-md">
    <div class="container">
        <div data-anim="slide-up delay-1" class="row y-gap-20 justify-between items-end">
            <div class="col-auto">
                <div class="sectionTitle -md">
                    <h2 class="sectionTitle__title">Popular Destinations</h2>
                    <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer</p>
                </div>
            </div>
            <div class="col-auto md:d-none">
                <a href="#" class="button -md -blue-1 bg-blue-1-05 text-blue-1"> View All Destinations <div class="icon-arrow-top-right ml-15"></div>
                </a>
            </div>
        </div>
        <div class="relative pt-40 sm:pt-20 js-section-slider" data-gap="30" data-scrollbar data-slider-cols="base-2 xl-4 lg-3 md-2 sm-2 base-1" data-anim="slide-up delay-2">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#" class="citiesCard -type-1 d-block rounded-4 ">
                        <div class="citiesCard__image ratio ratio-3:4">
                            <img src="#" data-src="{{asset('img/destinations/1.webp')}}" alt="image" class="js-lazy">
                        </div>
                        <div class="citiesCard__content d-flex flex-column justify-between text-center pt-30 pb-20 px-20">
                            <div class="citiesCard__bg"></div>
                            <div class="citiesCard__top">
                                {{-- <div class="text-14 text-white">14 Hotel - 22 Cars - 18 Tours - 95 Activity</div> --}}
                            </div>
                            <div class="citiesCard__bottom">
                                <h4 class="text-26 md:text-20 lh-13 text-white mb-20">New York</h4>
                                <button class="button col-12 h-60 -blue-1 bg-white text-dark-1">Discover</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="citiesCard -type-1 d-block rounded-4 ">
                        <div class="citiesCard__image ratio ratio-3:4">
                            <img src="#" data-src="{{asset('img/destinations/2.webp')}}" alt="image" class="js-lazy">
                        </div>
                        <div class="citiesCard__content d-flex flex-column justify-between text-center pt-30 pb-20 px-20">
                            <div class="citiesCard__bg"></div>
                            <div class="citiesCard__top">
                                {{-- <div class="text-14 text-white">14 Hotel - 22 Cars - 18 Tours - 95 Activity</div> --}}
                            </div>
                            <div class="citiesCard__bottom">
                                <h4 class="text-26 md:text-20 lh-13 text-white mb-20">London</h4>
                                <button class="button col-12 h-60 -blue-1 bg-white text-dark-1">Discover</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="citiesCard -type-1 d-block rounded-4 ">
                        <div class="citiesCard__image ratio ratio-3:4">
                            <img src="#" data-src="{{asset('img/destinations/3.webp')}}" alt="image" class="js-lazy">
                        </div>
                        <div class="citiesCard__content d-flex flex-column justify-between text-center pt-30 pb-20 px-20">
                            <div class="citiesCard__bg"></div>
                            <div class="citiesCard__top">
                                {{-- <div class="text-14 text-white">14 Hotel - 22 Cars - 18 Tours - 95 Activity</div> --}}
                            </div>
                            <div class="citiesCard__bottom">
                                <h4 class="text-26 md:text-20 lh-13 text-white mb-20">Barcelona</h4>
                                <button class="button col-12 h-60 -blue-1 bg-white text-dark-1">Discover</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="citiesCard -type-1 d-block rounded-4 ">
                        <div class="citiesCard__image ratio ratio-3:4">
                            <img src="#" data-src="{{asset('img/destinations/4.webp')}}" alt="image" class="js-lazy">
                        </div>
                        <div class="citiesCard__content d-flex flex-column justify-between text-center pt-30 pb-20 px-20">
                            <div class="citiesCard__bg"></div>
                            <div class="citiesCard__top">
                                {{-- <div class="text-14 text-white">14 Hotel - 22 Cars - 18 Tours - 95 Activity</div> --}}
                            </div>
                            <div class="citiesCard__bottom">
                                <h4 class="text-26 md:text-20 lh-13 text-white mb-20">Sydney</h4>
                                <button class="button col-12 h-60 -blue-1 bg-white text-dark-1">Discover</button>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="citiesCard -type-1 d-block rounded-4 ">
                        <div class="citiesCard__image ratio ratio-3:4">
                            <img src="#" data-src="{{asset('img/destinations/5.webp')}}" alt="image" class="js-lazy">
                        </div>
                        <div class="citiesCard__content d-flex flex-column justify-between text-center pt-30 pb-20 px-20">
                            <div class="citiesCard__bg"></div>
                            <div class="citiesCard__top">
                                {{-- <div class="text-14 text-white">14 Hotel - 22 Cars - 18 Tours - 95 Activity</div> --}}
                            </div>
                            <div class="citiesCard__bottom">
                                <h4 class="text-26 md:text-20 lh-13 text-white mb-20">Rome</h4>
                                <button class="button col-12 h-60 -blue-1 bg-white text-dark-1">Discover</button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <button class="section-slider-nav -prev flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-prev">
                <i class="icon icon-chevron-left text-12"></i>
            </button>
            <button class="section-slider-nav -next flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-next">
                <i class="icon icon-chevron-right text-12"></i>
            </button>
            <div class="slider-scrollbar bg-light-2 mt-40 sm:d-none js-scrollbar"></div>
            <div class="row pt-20 d-none md:d-block">
                <div class="col-auto">
                    <div class="d-inline-block">
                        <a href="#" class="button -md -blue-1 bg-blue-1-05 text-blue-1"> View All Destinations <div class="icon-arrow-top-right ml-15"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="layout-pt-md layout-pb-md">
    <div data-anim="slide-up delay-1" class="container">
        <div class="row y-gap-10 justify-between items-end">
            <div class="col-auto">
                <div class="sectionTitle -md">
                    <h2 class="sectionTitle__title">Popular Tour Packages</h2>
                    <p class=" sectionTitle__text mt-5 sm:mt-0">Interdum et malesuada fames ac ante ipsum</p>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="d-inline-block">
                    <a href="#" class="button -md -blue-1 bg-blue-1-05 text-blue-1"> View All <div class="icon-arrow-top-right ml-15"></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="relative overflow-hidden pt-40 sm:pt-20 js-section-slider" data-gap="30" data-scrollbar data-slider-cols="xl-4 lg-3 md-2 sm-2 base-1" data-nav-prev="js-hotels-prev" data-pagination="js-hotels-pag" data-nav-next="js-hotels-next">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#" class="hotelsCard -type-1 ">
                        <div class="hotelsCard__image">
                            <div class="cardImage ratio ratio-1:1">
                                <div class="cardImage__content">
                                    <img class="rounded-4 col-12" src="img/hotels/1.png" alt="image">
                                </div>
                                <div class="cardImage__wishlist">
                                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                                        <i class="icon-heart text-12"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="hotelsCard__content mt-10">
                            <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
                                <span>The Montcalm At Brewery London City | <span class="text-light-1">5N-6D</span></span>
                            </h4>
                            <div class="d-flex x-gap-5 items-center pt-5">
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                            </div>
                            <p class="text-light-1 lh-14 text-14 mt-5">4 Stay | Meal | Siteseeing | Private Transport | Visa</p>
                            <div class="mt-5">
                                <div class="fw-500"> 
                                    <span class="text-14 text-light-1 fw-400">Starting from </span>
                                    <span class="text-blue-1">₹50,000</span>
                                    <span class="text-14 text-light-1 fw-400">Per Person</span> 
                                </div>
                            </div>
                            <div class="d-flex items-center mt-10">
                                <a href="#" class="button -md text-white bg-warning-2">BOOK NOOW</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="hotelsCard -type-1 ">
                        <div class="hotelsCard__image">
                            <div class="cardImage ratio ratio-1:1">
                                <div class="cardImage__content">
                                    <img class="rounded-4 col-12" src="img/hotels/2.png" alt="image">
                                </div>
                                <div class="cardImage__wishlist">
                                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                                        <i class="icon-heart text-12"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="hotelsCard__content mt-10">
                            <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
                                <span>Staycity Aparthotels Deptford Bridge Station | <span class="text-light-1">5N-6D</span></span>
                            </h4>
                            <div class="d-flex x-gap-5 items-center pt-5">
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                            </div>
                            <p class="text-light-1 lh-14 text-14 mt-5">4 Stay | Meal | Siteseeing | Private Transport | Visa</p>
                            <div class="mt-5">
                                <div class="fw-500"> 
                                    <span class="text-14 text-light-1 fw-400">Starting from </span>
                                    <span class="text-blue-1">₹50,000</span>
                                    <span class="text-14 text-light-1 fw-400">Per Person</span> 
                                </div>
                            </div>
                            <div class="d-flex items-center mt-10">
                                <a href="#" class="button -md text-white bg-warning-2">BOOK NOOW</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="hotelsCard -type-1 ">
                        <div class="hotelsCard__image">
                            <div class="cardImage ratio ratio-1:1">
                                <div class="cardImage__content">
                                    <img class="rounded-4 col-12" src="img/hotels/3.png" alt="image">
                                </div>
                                <div class="cardImage__wishlist">
                                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                                        <i class="icon-heart text-12"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="hotelsCard__content mt-10">
                            <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
                                <span>The Westin New York at Times Square | <span class="text-light-1">5N-6D</span></span>
                            </h4>
                            <div class="d-flex x-gap-5 items-center pt-5">
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                            </div>
                            <p class="text-light-1 lh-14 text-14 mt-5">4 Stay | Meal | Siteseeing | Private Transport | Visa</p>
                            <div class="mt-5">
                                <div class="fw-500"> 
                                    <span class="text-14 text-light-1 fw-400">Starting from </span>
                                    <span class="text-blue-1">₹50,000</span>
                                    <span class="text-14 text-light-1 fw-400">Per Person</span> 
                                </div>
                            </div>
                            <div class="d-flex items-center mt-10">
                                <a href="#" class="button -md text-white bg-warning-2">BOOK NOOW</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="hotelsCard -type-1 ">
                        <div class="hotelsCard__image">
                            <div class="cardImage ratio ratio-1:1">
                                <div class="cardImage__content">
                                    <img class="rounded-4 col-12" src="img/hotels/4.png" alt="image">
                                </div>
                                <div class="cardImage__wishlist">
                                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                                        <i class="icon-heart text-12"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="hotelsCard__content mt-10">
                            <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
                                <span>DoubleTree by Hilton Hotel New York Times Square West | <span class="text-light-1">5N-6D</span></span>
                            </h4>
                            <div class="d-flex x-gap-5 items-center pt-5">
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                            </div>
                            <p class="text-light-1 lh-14 text-14 mt-5">4 Stay | Meal | Siteseeing | Private Transport | Visa</p>
                            <div class="mt-5">
                                <div class="fw-500"> 
                                    <span class="text-14 text-light-1 fw-400">Starting from </span>
                                    <span class="text-blue-1">₹50,000</span>
                                    <span class="text-14 text-light-1 fw-400">Per Person</span> 
                                </div>
                            </div>
                            <div class="d-flex items-center mt-10">
                                <a href="#" class="button -md text-white bg-warning-2">BOOK NOOW</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#" class="hotelsCard -type-1 ">
                        <div class="hotelsCard__image">
                            <div class="cardImage ratio ratio-1:1">
                                <div class="cardImage__content">
                                    <img class="rounded-4 col-12" src="img/hotels/1.png" alt="image">
                                </div>
                                <div class="cardImage__wishlist">
                                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                                        <i class="icon-heart text-12"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="hotelsCard__content mt-10">
                            <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
                                <span>The Montcalm At Brewery London City | <span class="text-light-1">5N-6D</span></span>
                            </h4>
                            <div class="d-flex x-gap-5 items-center pt-5">
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                                <div class="icon-star text-yellow-2 text-14"></div>
                            </div>
                            <p class="text-light-1 lh-14 text-14 mt-5">4 Stay | Meal | Siteseeing | Private Transport | Visa</p>
                            <div class="mt-5">
                                <div class="fw-500"> 
                                    <span class="text-14 text-light-1 fw-400">Starting from </span>
                                    <span class="text-blue-1">₹50,000</span>
                                    <span class="text-14 text-light-1 fw-400">Per Person</span> 
                                </div>
                            </div>
                            <div class="d-flex items-center mt-10">
                                <a href="#" class="button -md text-white bg-warning-2">BOOK NOOW</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="d-flex x-gap-15 items-center justify-center sm:justify-start pt-40 sm:pt-20">
                <div class="col-auto">
                    <button class="d-flex items-center text-24 arrow-left-hover js-hotels-prev">
                        <i class="icon icon-arrow-left"></i>
                    </button>
                </div>
                <div class="col-auto">
                    <div class="pagination -dots text-border js-hotels-pag"></div>
                </div>
                <div class="col-auto">
                    <button class="d-flex items-center text-24 arrow-right-hover js-hotels-next">
                        <i class="icon icon-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="layout-pt-md pb-50">
    <div class="container">
        <div class="row y-gap-30 justify-between items-center">
            <div class="col-lg-4">
                <img src="{{asset('img/eiffel-tower.jpg')}}" alt="image" class="rounded-4 img-border-style">
            </div>
            <div class="col-lg-8">
                <h2 class="text-30 fw-600">Why Choose Us?</h2>

                <div data-anim-wrap>
                    <div class="row y-gap-20 justify-between mt-10">
                        <div data-anim-child="slide-up delay-1" class="col-lg-6 col-sm-6">
                            <div class="featureIcon -type-1 ">
                                <div class="d-flex justify-center align-items-center">
                                    <i class="fa fa-fingerprint text-50"></i>
                                    <div class="text-left mt-10 pl-20">
                                        <h4 class="text-18 fw-500">Easy Booking</h4>
                                        <p class="text-15">We offer easy and convenient flight bookings with attractive offers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-anim-child="slide-up delay-2" class="col-lg-6 col-sm-6">
                            <div class="featureIcon -type-1 ">
                                <div class="d-flex justify-center align-items-center">
                                    <i class="fa fa-earth-asia text-50"></i>
                                    <div class="text-left mt-10 pl-20">
                                        <h4 class="text-18 fw-500">Exciting Deals</h4>
                                        <p class="text-15">Enjoy exciting deals on flights, hotels, buses, car rental and tour packages</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-anim-child="slide-up delay-3" class="col-lg-6 col-sm-6">
                            <div class="featureIcon -type-1 ">
                                <div class="d-flex justify-center align-items-center">
                                    <i class="fa fa-cutlery text-50"></i>
                                    <div class="text-left mt-10 pl-20">
                                        <h4 class="text-18 fw-500">Pocket Friendly Pricing</h4>
                                        <p class="text-15">We ensure low rates on hotel reservation, holiday packages and on flight tickets.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-anim-child="slide-up delay-3" class="col-lg-6 col-sm-6">
                            <div class="featureIcon -type-1 ">
                                <div class="d-flex justify-center align-items-center">
                                    <i class="fa fa-phone text-50"></i>
                                    <div class="text-left mt-10 pl-20">
                                        <h4 class="text-18 fw-500">24/7 Support</h4>
                                        <p class="text-15">Get assistance 24/7 on any kind of travel related query, We are happy to assist you</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="text-dark-1 text-15 mt-20 lg:mt-40 md:mt-20"> Lorem ipsum dolor sit amet. Ea magnam dolorum est totam quia aut perferendis cumque. Ea dolor similique sit illo temporibus ea pariatur recusandae et recusandae nemo sit optio libero. In placeat numquam sit eaque illo in illum culpa At praesentium amet qui expedita veniam nam error quis ut quod dolorum. Qui ipsum laboriosam ex galisum perspiciatis vel dignissimos rerum et voluptatem dolorum. Lorem ipsum dolor sit amet. Ea magnam dolorum est totam quia aut perferendis cumque. Ea dolor similique sit illo temporibus ea pariatur recusandae et recusandae nemo sit optio libero. In placeat numquam sit eaque illo in illum culpa At praesentium amet qui expedita veniam nam error quis ut quod dolorum.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section-bg layout-pt-md layout-pb-md">
    <div class="section-bg__item -mx-20 bg-light-2"></div>
    <div class="container">
        <div class="row justify-center text-center">
            <div class="col-auto">
                <div class="sectionTitle -md">
                    <h2 class="sectionTitle__title">What Travelers are Saying About Us?</h2>
                    <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer</p>
                </div>
            </div>
        </div>
        <div class="overflow-hidden pt-40 js-section-slider" data-gap="30" data-slider-cols="xl-3 lg-3 md-2 sm-1 base-1">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="testimonials -type-1 bg-white rounded-4 pt-40 pb-30 px-40">
                        <h4 class="text-16 fw-500 text-blue-1 mb-20">Hotel Equatorial Melaka</h4>
                        <p class="testimonials__text lh-18 fw-500 text-dark-1">&quot;Our family was traveling via bullet train between cities in Japan with our luggage - the location for this hotel made that so easy. Agoda price was fantastic.&quot;</p>
                        <div class="pt-20 mt-28 border-top-light">
                            <div class="row x-gap-20 y-gap-20 items-center">
                                <div class="col-auto">
                                    <img class="size-60" src="img/avatars/1.png" alt="image">
                                </div>
                                <div class="col-auto">
                                    <div class="text-15 fw-500 lh-14">Courtney Henry</div>
                                    <div class="text-14 lh-14 text-light-1 mt-5">Web Designer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonials -type-1 bg-white rounded-4 pt-40 pb-30 px-40">
                        <h4 class="text-16 fw-500 text-blue-1 mb-20">Hotel Equatorial Melaka</h4>
                        <p class="testimonials__text lh-18 fw-500 text-dark-1">&quot;Our family was traveling via bullet train between cities in Japan with our luggage - the location for this hotel made that so easy. Agoda price was fantastic.&quot;</p>
                        <div class="pt-20 mt-28 border-top-light">
                            <div class="row x-gap-20 y-gap-20 items-center">
                                <div class="col-auto">
                                    <img class="size-60" src="img/avatars/1.png" alt="image">
                                </div>
                                <div class="col-auto">
                                    <div class="text-15 fw-500 lh-14">Courtney Henry</div>
                                    <div class="text-14 lh-14 text-light-1 mt-5">Web Designer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonials -type-1 bg-white rounded-4 pt-40 pb-30 px-40">
                        <h4 class="text-16 fw-500 text-blue-1 mb-20">Hotel Equatorial Melaka</h4>
                        <p class="testimonials__text lh-18 fw-500 text-dark-1">&quot;Our family was traveling via bullet train between cities in Japan with our luggage - the location for this hotel made that so easy. Agoda price was fantastic.&quot;</p>
                        <div class="pt-20 mt-28 border-top-light">
                            <div class="row x-gap-20 y-gap-20 items-center">
                                <div class="col-auto">
                                    <img class="size-60" src="img/avatars/1.png" alt="image">
                                </div>
                                <div class="col-auto">
                                    <div class="text-15 fw-500 lh-14">Courtney Henry</div>
                                    <div class="text-14 lh-14 text-light-1 mt-5">Web Designer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonials -type-1 bg-white rounded-4 pt-40 pb-30 px-40">
                        <h4 class="text-16 fw-500 text-blue-1 mb-20">Hotel Equatorial Melaka</h4>
                        <p class="testimonials__text lh-18 fw-500 text-dark-1">&quot;Our family was traveling via bullet train between cities in Japan with our luggage - the location for this hotel made that so easy. Agoda price was fantastic.&quot;</p>
                        <div class="pt-20 mt-28 border-top-light">
                            <div class="row x-gap-20 y-gap-20 items-center">
                                <div class="col-auto">
                                    <img class="size-60" src="img/avatars/1.png" alt="image">
                                </div>
                                <div class="col-auto">
                                    <div class="text-15 fw-500 lh-14">Courtney Henry</div>
                                    <div class="text-14 lh-14 text-light-1 mt-5">Web Designer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="testimonials -type-1 bg-white rounded-4 pt-40 pb-30 px-40">
                        <h4 class="text-16 fw-500 text-blue-1 mb-20">Hotel Equatorial Melaka</h4>
                        <p class="testimonials__text lh-18 fw-500 text-dark-1">&quot;Our family was traveling via bullet train between cities in Japan with our luggage - the location for this hotel made that so easy. Agoda price was fantastic.&quot;</p>
                        <div class="pt-20 mt-28 border-top-light">
                            <div class="row x-gap-20 y-gap-20 items-center">
                                <div class="col-auto">
                                    <img class="size-60" src="img/avatars/1.png" alt="image">
                                </div>
                                <div class="col-auto">
                                    <div class="text-15 fw-500 lh-14">Courtney Henry</div>
                                    <div class="text-14 lh-14 text-light-1 mt-5">Web Designer</div>
                                </div>
                            </div>
                        </div>
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
                        <h4 class="text-26 text-white fw-600">Your Travel Journey Starts Here </h4>
                        <div class="text-white">Sign up and we'll send the best deals to you</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('scripts')

@endsection('scripts')

@endsection('content')
