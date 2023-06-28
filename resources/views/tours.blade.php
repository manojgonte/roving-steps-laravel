@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>
    .list-ticks li {
        width: 100% !important;
        text-indent: -30px;
        margin-left: 30px;
    }
</style>
@endsection('styles')

<main class="main">
    <section class="section-bg layout-pt-lg layout-pb-lg">
        <div class="section-bg__item col-12">
            <img class="d-block" src="{{asset('img/backgrounds/tour_detail_bg.webp')}}" alt="flight-booking">
        </div>

        <div class="swiper-slide">
            <div class="container">
                <div class="row justify-center">
                    <div class="col-xl-9">
                        @include('layouts/frontLayout/front_searchbar')
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row y-gap-30">

                <div class="col-xl-3 col-lg-4 lg:d-none">
                    <aside class="sidebar y-gap-40">

                        <div class="sidebar__item -no-border">
                            <h5 class="text-18 fw-500 mb-10 text-dark-1">320 Tour Options</h5>
                            {{-- <div class="single-field relative d-flex items-center py-10">
                                <input class="pl-50 border-light text-dark-1 h-50 rounded-8" type="email"
                                    placeholder="e.g. Best Western">
                                <button class="absolute d-flex items-center h-full">
                                    <i class="icon-search text-20 px-15 text-dark-1"></i>
                                </button>
                            </div> --}}
                        </div>

                        <div class="sidebar__item">
                            <h5 class="text-18 fw-500 mb-10">Domestic tours</h5>
                            <div class="sidebar-checkbox">

                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">Andman</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">Andhra Pradesh</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">Chardham</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">Goa</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">Himachal</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">Kailash Man sarover</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">Karnataka</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="sidebar__item">
                            <h5 class="text-18 fw-500 mb-10">International tours</h5>
                            <div class="sidebar-checkbox">

                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">Africa</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">America</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">Australia Newzealand</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">Bhutan</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">Dubai & middle east</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="sidebar__item">
                            <h5 class="text-18 fw-500 mb-10">Special tours</h5>
                            <div class="sidebar-checkbox">

                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">Adventure</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">Bike Tour</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">Chardham</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">Goa</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">Gujrat</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </aside>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="row y-gap-10 items-center justify-between">
                        <div class="col-auto">
                            <div class="text-25"><span class="fw-500">3,269 popular tour packages found</span> </div>
                        </div>                        
                        {{-- <div class="col-auto">
                            <div class="row x-gap-20 y-gap-20">
                                <div class="col-auto">
                                    <button
                                        class="button -blue-1 h-40 px-20 rounded-100 bg-blue-1-05 text-15 text-blue-1">
                                        <i class="icon-up-down text-14 mr-10"></i>
                                        Top picks for your search
                                    </button>
                                </div>

                                <div class="col-auto d-none lg:d-block">
                                    <button data-x-click="filterPopup"
                                        class="button -blue-1 h-40 px-20 rounded-100 bg-blue-1-05 text-15 text-blue-1">
                                        <i class="icon-up-down text-14 mr-10"></i>
                                        Filter
                                    </button>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <div class="border-top-light mt-10 mb-30"></div>

                    <div class="row y-gap-30">
                        @foreach($tours as $tour)
                        <div class="col-lg-4 col-sm-6">
                            <a  href="{{url('/tour-details/'.$tour->id.'/'.Str::slug($tour->tour_name))}}" class="hotelsCard -type-1 ">
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
                                    <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
                                        <span>{{Str::limit($tour->tour_name, 45)}} | <span
                                                class="text-light-1">{{$tour->days}}D-{{$tour->nights}}N</span></span>
                                    </h4>
                                    <div class="d-flex x-gap-5 items-center pt-5">
                                        <div class="icon-star text-yellow-2 text-14"></div>
                                        <div class="icon-star text-yellow-2 text-14"></div>
                                        <div class="icon-star text-yellow-2 text-14"></div>
                                        <div class="icon-star text-yellow-2 text-14"></div>
                                        <div class="icon-star text-yellow-2 text-14"></div>
                                    </div>
                                    <p class="text-light-1 lh-14 text-14 mt-5">{{$tour->amenities}}</p>
                                    <div class="mt-5">
                                        <div class="fw-500">
                                            <span class="text-14 text-light-1 fw-400">Starting from </span>
                                            <span class="text-blue-1">₹{{$tour->adult_price}}</span>
                                            <span class="text-14 text-light-1 fw-400">Per Person</span>
                                        </div>
                                    </div>
                                    {{-- <div class="d-flex items-center mt-10">
                                        <a href="#" class="button -md text-white bg-warning-2">BOOK NOOW</a>
                                    </div> --}}
                                    <div class="d-flex items-center mt-10">
                                        <a href="{{url('/tour-details/'.$tour->id.'/'.Str::slug($tour->tour_name))}}" class="button -md text-white bg-light-1">ENQUIRE</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>
                    
                    <div class="border-top-light mt-30 pt-30">
                        {{ $tours->links("pagination::bootstrap-4") }}
                    </div>    

                </div>
            </div>
        </div>
    </section>
</main>

@endsection('content')