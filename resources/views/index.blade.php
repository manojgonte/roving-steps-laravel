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


<section class="masthead -type-9 relative">
    <div class="ResponsiveYTPlayer">
        <iframe class="youtube-player" id="player" type="text/html" src="https://www.youtube.com/embed/nZmO8B9rRik?mute=1&autoplay=1&loop=1&playlist=nZmO8B9rRik" muted="muted" allowfullscreen></iframe>
    </div>
    <div class="masthead-slider js-masthead-slider-9_ hero-section-content">
        <div class="swiper-wrapper">
            <div class="swiper-slide sm:pt-30">
                <!-- <div class="masthead__bg bg-dark-3">
                    <img src="{{asset('img/banner/banner1.webp')}}" alt="image">
                </div> -->
                <div class="container">
                    <div class="row justify-center">
                        <div class="col-auto">
                            <div class="text-center">
                                <p class="text-white mt-6 md:mt-10">NEW</p>
                                <h1 class="text-60 lg:text-40 md:text-30 text-white">Experiences Thrills Adventures Escapes</h1>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-30 sm:mt-5">
                            <div class="mainSearch -w-900 bg-white px-10 py-10 sm:py-0 lg:px-20 lg:pt-5 lg:pb-20 rounded-100" style="background-color: #ffffffbf !important; backdrop-filter: blur(3px);">
                                <form action="{{url('tours')}}" method="GET">
                                    <div class="button-grid items-center d-flex justify-content-between">
                                        <div class="px-30 lg:py-20 sm:py-10 lg:px-0 w-1/1">
                                            <div>
                                                <h4 class="text-15 fw-500 ls-2 lh-16">Search Destination</h4>
                                                <div class="text-15 text-light-1 ls-2 lh-16">
                                                    <input autofocus type="search" placeholder="Search your Holiday Destination..." name="q" class="js-search js-dd-focus" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button-item">
                                            <button class="mainSearch__submit button -dark-1 h-60 px-35 sm:px-15 col-12 rounded-100 bg-blue-1 text-white">
                                                <i class="icon-search text-20 mr-10"></i> Search </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="layout-pt-sm layout-pb-sm bg-light-2">
    <div class="container">
        <div class="row y-gap-30">
            <div class="col-lg-3 col-md-6">
                <div class="d-flex">
                    <img class="size-50" src="img/featureIcons/1/1.svg" alt="image">
                    <div class="ml-15">
                        <h4 class="text-14 fw-500">1000+ VACATIONS</h4>
                        <h4 class="text-13 fw-500">IDEAS IN OVER 60+ COUNTRIES</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex">
                    <img class="size-50" src="img/featureIcons/1/2.svg" alt="image">
                    <div class="ml-15">
                        <h4 class="text-14 fw-500">BEST PRICE</h4>
                        <h4 class="text-13">GUARANTEED</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex">
                    <img class="size-50" src="img/featureIcons/1/3.svg" alt="image">
                    <div class="ml-15">
                        <h4 class="text-14 fw-500">HOLIDAYS AVAILABLE</h4>
                        <h4 class="text-13">ON EASY EMI'S</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex">
                    <img class="size-50" src="img/featureIcons/1/3.svg" alt="image">
                    <div class="ml-15">
                        <h4 class="text-14 fw-500">RATED 4.7 <i class="fa fa-star"></i> ON</h4>
                        <h4 class="text-13">GOOGLE BY ACTUAL TRAVELLERS</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="layout-pt-md layout-pb-md d-none">
    <div class="container">
        <div data-anim="slide-up delay-1" class="row y-gap-20 justify-between items-end">
            <div class="col-auto">
                <div class="sectionTitle -md">
                    <h2 class="sectionTitle__title">Popular Destinations</h2>
                    <!-- <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer</p> -->
                </div>
            </div>
            <div class="col-auto md:d-none">
                {{-- <a href="#" class="button -md -blue-1 bg-blue-1-05 text-blue-1"> View All Destinations <div class="icon-arrow-top-right ml-15"></div></a> --}}
            </div>
        </div>
        <div class="relative pt-40 sm:pt-20 js-section-slider" data-gap="30" data-scrollbar data-slider-cols="base-2 xl-4 lg-3 md-2 sm-2 base-1" data-anim="slide-up delay-2">
            <div class="swiper-wrapper">
                @foreach($destinations as $row)
                <div class="swiper-slide">
                    <a href="{{url('tours/?dest_id='.$row->id)}}" class="citiesCard -type-1 d-block rounded-4 ">
                        <div class="citiesCard__image ratio ratio-3:4">
                            <img src="#" data-src="{{asset('img/destinations/'.$row->image)}}" alt="image" class="js-lazy">
                        </div>
                        <div class="citiesCard__content d-flex flex-column justify-between text-center pt-30 pb-20 px-20">
                            <div class="citiesCard__bg"></div>
                            <div class="citiesCard__top">
                                {{-- <div class="text-14 text-white">14 Hotel - 22 Cars - 18 Tours - 95 Activity</div> --}}
                            </div>
                            <div class="citiesCard__bottom">
                                <h4 class="text-26 md:text-20 lh-13 text-white mb-20">{{$row->name}}</h4>
                                <button class="button col-12 h-60 -blue-1 bg-white text-dark-1">Discover</button>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
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

@php 
    $types = [
        [
            'type_id'=>15,
            'title'=>'Best Tour Packages'
        ],[
            'type_id'=>11,
            'title'=>'Trending Indian Holidays'
        ],[
            'type_id'=>12,
            'title'=>'Tailored Theme Escapes'
        ],[
            'type_id'=>13,
            'title'=>'Trending International Holidays'
        ],[
            'type_id'=>14,
            'title'=>'Trending International Package'
        ],
    ]; 
@endphp
@foreach($types as $tourType)
@php 
    $tours = App\Models\Tour::select('id','tour_name','image','type','description','amenities','adult_price','days','nights','dest_id','rating')
            ->orderBy('id','DESC')
            ->where('special_tour_type', 'LIKE', '%"'.$tourType['type_id'].'"%')
            ->where(['status'=>1,'is_popular'=>1,'custom_tour'=>0])
            ->take(10)
            ->get();
@endphp

<section class="layout-pt-sm layout-pb-sm">
    <div data-anim="slide-up delay-1" class="container">
        <div class="row y-gap-10 justify-between items-end">
            <div class="col-auto">
                <div class="sectionTitle -md">
                    <h2 class="sectionTitle__title">{{ $tourType['title'] }}</h2>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="d-inline-block">
                    <a href="{{url('tours/')}}" class="button -md -blue-1 bg-blue-1-05 text-blue-1"> View All <div class="icon-arrow-top-right ml-15"></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="relative overflow-hidden pt-40 sm:pt-20 js-section-slider" data-gap="30" data-scrollbar data-slider-cols="xl-5 lg-4 md-3 sm-2 base-1" data-nav-prev="js-hotels-prev" data-pagination="js-hotels-pag" data-nav-next="js-hotels-next">
            <div class="swiper-wrapper">
                @foreach($tours as $tour)
                <div class="swiper-slide">
                    <a href="{{url('/tour-details/'.$tour->id.'/'.Str::slug($tour->tour_name))}}" class="hotelsCard -type-1 ">
                        <div class="hotelsCard__image">
                            <div class="cardImage ratio ratio-1:1">
                                <div class="cardImage__content">
                                    <img class="rounded-4 col-12" src="{{asset('img/tours/'.$tour->image)}}" alt="{{$tour->tour_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="hotelsCard__content mt-10">
                            <h4 class="hotelsCard__title text-dark-1 text-17 lh-16 fw-500">
                                <span>{{$tour->tour_name}} | <span class="text-light-1">{{$tour->nights}}N-{{$tour->days}}D</span></span>
                            </h4>
                            @php
                                $fullStars = floor($tour->rating);
                                $hasHalfStar = ($tour->rating - $fullStars) >= 0.5;
                            @endphp
                            <div class="d-flex x-gap-5 items-center pt-5">
                                @for ($i = 1; $i <= $fullStars; $i++)
                                <div class="fa fa-star text-yellow-2 text-14"></div>
                                @endfor

                                @if ($hasHalfStar)
                                <div class="fa fa-star-half-alt text-yellow-2 text-14"></div>
                                @endif
                            </div>
                            <p class="text-light-1 lh-14 text-14 mt-5">{{Str::limit($tour->amenities, 30)}}</p>
                            <div class="mt-5">
                                <div class="fw-500"> 
                                    <span class="text-14 text-light-1 fw-400">Starting from </span>
                                    <span class="text-blue-1">₹{{number_format($tour->adult_price)}}</span>
                                    <span class="text-14 text-light-1 fw-400">/Person</span> 
                                </div>
                            </div>
                            <div class="d-flex items-center mt-10">
                                <a href="{{url('/tour-details/'.$tour->id.'/'.Str::slug($tour->tour_name))}}" class="button p-2 text-white bg-light-1">Read More</a>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
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
@endforeach

<section class="layout-pt-md layout-pb-md">
    <div data-anim="slide-up delay-1" class="container">
        <div class="row y-gap-10 justify-between items-end">
            <div class="col-auto">
                <div class="sectionTitle -md">
                    <h2 class="sectionTitle__title">Popular Tour Packages</h2>
                </div>
            </div>
            <div class="col-sm-auto">
                <div class="d-inline-block">
                    <a href="{{url('tours/')}}" class="button -md -blue-1 bg-blue-1-05 text-blue-1"> View All <div class="icon-arrow-top-right ml-15"></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="relative overflow-hidden pt-40 sm:pt-20 js-section-slider" data-gap="30" data-scrollbar data-slider-cols="xl-4 lg-3 md-2 sm-2 base-1" data-nav-prev="js-hotels-prev" data-pagination="js-hotels-pag" data-nav-next="js-hotels-next">
            <div class="swiper-wrapper">
                @foreach($popularTours as $tour)
                <div class="swiper-slide">
                    <a href="{{url('/tour-details/'.$tour->id.'/'.Str::slug($tour->tour_name))}}" class="hotelsCard -type-1 ">
                        <div class="hotelsCard__image">
                            <div class="cardImage ratio ratio-1:1">
                                <div class="cardImage__content">
                                    <img class="rounded-4 col-12" src="{{asset('img/tours/'.$tour->image)}}" alt="{{$tour->tour_name}}">
                                </div>
                                {{-- <div class="cardImage__wishlist">
                                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                                        <i class="icon-heart text-12"></i>
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                        <div class="hotelsCard__content mt-10">
                            <h4 class="hotelsCard__title text-dark-1 text-17 lh-16 fw-500">
                                <span>{{$tour->tour_name}} | <span class="text-light-1">{{$tour->nights}}N-{{$tour->days}}D</span></span>
                            </h4>
                            @php
                                $fullStars = floor($tour->rating);
                                $hasHalfStar = ($tour->rating - $fullStars) >= 0.5;
                            @endphp
                            <div class="d-flex x-gap-5 items-center pt-5">
                                @for ($i = 1; $i <= $fullStars; $i++)
                                <div class="fa fa-star text-yellow-2 text-14"></div>
                                @endfor

                                @if ($hasHalfStar)
                                <div class="fa fa-star-half-alt text-yellow-2 text-14"></div>
                                @endif
                            </div>
                            <p class="text-light-1 lh-14 text-14 mt-5">{{Str::limit($tour->amenities, 30)}}</p>
                            <div class="mt-5">
                                <div class="fw-500"> 
                                    <span class="text-14 text-light-1 fw-400">Starting from </span>
                                    <span class="text-blue-1">₹{{number_format($tour->adult_price)}}</span>
                                    <span class="text-14 text-light-1 fw-400">/Person</span> 
                                </div>
                            </div>
                            <div class="d-flex items-center mt-10">
                                <a href="{{url('/tour-details/'.$tour->id.'/'.Str::slug($tour->tour_name))}}" class="button p-2 text-white bg-light-1">Read More</a>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
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

<!-- about -->
<section class="layout-pt-lg layout-pb-lg bg-blue-2">
    <div data-anim-wrap class="container">
        <div class="row y-gap-40 justify-between">
            <div data-anim-child="slide-up delay-1" class="col-xl-5 col-lg-5">
                <h2 class="text-30">What Travelers are Saying <br> About Us? </h2>
                <div class="row y-gap-30 pt-60 lg:pt-40">
                    <div class="col-sm-5 col-6">
                        <div class="text-30 lh-15 fw-600">4.7</div>
                        <div class="text-light-1 lh-15">Our Google Ratings</div>
                        <div class="d-flex x-gap-5 items-center pt-10">
                            <div class="icon-star text-blue-1 text-10"></div>
                            <div class="icon-star text-blue-1 text-10"></div>
                            <div class="icon-star text-blue-1 text-10"></div>
                            <div class="icon-star text-blue-1 text-10"></div>
                            <div class="fa fa-star-half text-blue-1 text-10"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div data-anim-child="slide-up delay-2" class="col-lg-7">
                <div class="overflow-hidden js-testimonials-slider-3" data-scrollbar>
                    <div class="swiper-wrapper">
                        @foreach($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="row items-center x-gap-30 y-gap-20">
                                <div class="col-auto">
                                    <div class="avatar avatar-md bg-info">{{mb_substr(ucfirst($testimonial->user_name) , 0, 1)}}</div>
                                </div>
                                <div class="col-auto">
                                    <h5 class="text-16 fw-500">{{$testimonial->user_name}}</h5>
                                    <div class="text-15 text-light-1 lh-15 invisible d-none">UX / UI Designer</div>
                                </div>
                            </div>
                            <p class="text-18 fw-500 text-dark-1 mt-30 sm:mt-20">{{$testimonial->testimonial}}</p>
                        </div>
                        @endforeach
                    </div>
                    <div class="d-flex items-center mt-60 sm:mt-20 js-testimonials-slider-pag">
                        <div class="text-dark-1 fw-500 js-current">01</div>
                        <div class="slider-scrollbar bg-border ml-20 mr-20 w-max-300 js-scrollbar"></div>
                        <div class="text-dark-1 fw-500 js-all">{{ count($testimonials) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- blogs -->
<section class="layout-pt-md layout-pb-md">
    <div data-anim-wrap class="container">
        <div data-anim-child="slide-up delay-1" class="row justify-center text-center">
            <div class="col-auto">
                <div class="sectionTitle -md">
                    <h2 class="sectionTitle__title">Get inspiration for your next trip</h2>
                </div>
            </div>
        </div>
        <div class="row y-gap-30 pt-20">
            @foreach($blogs as $blog)
            <div data-anim-child="slide-left delay-1" class="col-lg-4 col-sm-6">
                <a href="{{ url('/blog/'.$blog->id.'/'.Str::slug($blog->title)) }}" class="blogCard -type-1 d-block">
                    <div class="blogCard__image">
                        <div class="ratio ratio-4:3 rounded-4 rounded-8">
                            <img class="img-ratio js-lazy" src="#" data-src="{{ asset('img/blogs/'.$blog->thumbnail) }}" alt="image">
                        </div>
                    </div>
                    <div class="mt-20">
                        <h4 class="text-dark-1 text-18 fw-500">{{ $blog->title }}</h4>
                        <div class="text-light-1 text-15 lh-14 mt-5">{{ date('M d, Y', strtotime($blog->created_at)) }}</div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- newsletter -->
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
            <div class="col-auto">
                <div class="single-field -w-410 d-flex x-gap-10 y-gap-20">
                    <div>
                        <input class="bg-white h-60" type="text" placeholder="Your Email">
                    </div>
                    <div>
                        <button class="button -md h-60 bg-white text-black">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@section('scripts')

@endsection('scripts')

@endsection('content')
