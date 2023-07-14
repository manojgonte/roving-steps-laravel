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
                        <div class="mainSearch -w-900 bg-white px-10 py-10 lg:px-20 lg:pt-5 lg:pb-20 rounded-100">
                            <form action="{{url('tours')}}" method="GET">
                            <div class="button-grid items-center" style="grid-template-columns: 1fr 250px 0px auto;">
                                {{-- <div class="searchMenu-loc px-30 lg:py-20 lg:px-0 js-form-dd js-liverSearch">
                                    <div data-x-dd-click="searchMenu-loc">
                                        <h4 class="text-15 fw-500 ls-2 lh-16">Location</h4>
                                        <div class="text-15 text-light-1 ls-2 lh-16">
                                            <select name="dest_id" class="form-select" aria-label="Destinations">
                                                <option value="">-- Select --</option>
                                                @foreach(App\Models\Destination::where('status',1)->get() as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="searchMenu-date px-30 lg:py-20 lg:px-0 js-form-dd js-calendar">
                                    <div data-x-dd-click="searchMenu-date">
                                        <h4 class="text-15 fw-500 ls-2 lh-16">Search </h4>
                                        <div class="text-15 text-light-1 ls-2 lh-16">
                                            <input autocomplete="off" type="search" name="q" placeholder="Search..." @if(Request()->q) value="{{Request()->q}}" @endif class="js-search js-dd-focus" />
                                        </div>
                                    </div>
                                </div>
                                <div class="button-item">
                                    <button type="submit" class="mainSearch__submit button -dark-1 h-60 px-35 col-12 rounded-100 bg-blue-1 text-white">
                                        <i class="icon-search text-20 mr-10"></i> Search 
                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row y-gap-30">

                <div class="col-xl-3 col-lg-4 lg:d-none">
                    <aside class="sidebar y-gap-10">

                        <div class="sidebar__item -no-border d-flex justify-content-between">
                            <h5 class="text-18 fw-500 mb-10 text-dark-1">{{$tours->total()}} Tour Options</h5>
                            {{-- <div class="single-field relative d-flex items-center py-10">
                                <input class="pl-50 border-light text-dark-1 h-50 rounded-8" type="email"
                                    placeholder="e.g. Best Western">
                                <button class="absolute d-flex items-center h-full">
                                    <i class="icon-search text-20 px-15 text-dark-1"></i>
                                </button>
                            </div> --}}
                            @if(!empty(Request()->dest_id) || !empty(Request()->special_tour_type) || !empty(Request()->q))
                            <a href="{{url('/tours')}}" class="underline text-14"><i class="fa fa-times"></i> Clear Filter</a>
                            @endif
                        </div>


                        <form action="{{url('tours/')}}" method="GET">
                        <div class="sidebar__item">
                            <h5 class="text-18 fw-500 mb-10 mt-10">Domestic tours</h5>
                            <div class="sidebar-checkbox">
                                @foreach ($destinations->filter(function($destination) {
                                    return $destination->type == 'Domestic';
                                }) as $destination)
                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="radio" name="dest_id" value="{{$destination->id}}" @if(Request()->dest_id == $destination->id) checked @endif onclick="javascript:this.form.submit();">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">{{$destination->name}}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="sidebar__item">
                            <h5 class="text-18 fw-500 mb-10 mt-10">International tours</h5>
                            <div class="sidebar-checkbox">
                                @foreach ($destinations->filter(function($destination) {
                                    return $destination->type == 'International';
                                }) as $destination)
                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="radio" name="dest_id" value="{{$destination->id}}" @if(Request()->dest_id == $destination->id) checked @endif onclick="javascript:this.form.submit();">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">{{$destination->name}}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="sidebar__item">
                            <h5 class="text-18 fw-500 mb-10 mt-10">Special tours</h5>
                            <div class="sidebar-checkbox">
                                @foreach(App\Models\SpecialTour::where('status',1)->get() as $row)
                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox" name="special_tour_type" value="{{$row->id}}" @if(Request()->special_tour_type == $row->title) checked @endif onclick="javascript:this.form.submit();">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">{{$row->title}}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>                        
                        </form>
                    </aside>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="row y-gap-10 items-center justify-between">
                        <div class="col-auto">
                            <div class="text-20"><span class="fw-500">Popular Destinations </span> </div>
                        </div>
                    </div>

                    <div class="border-top-light mt-10 mb-20"></div>

                    <div class="relative overflow-hidden pt-10 sm:pt-20 js-section-slider" data-gap="20" data-scrollbar data-slider-cols="xl-5 lg-4 md-3 sm-2 base-1" data-nav-prev="js-hotels-prev" data-pagination="js-hotels-pag" data-nav-next="js-hotels-next">
                        <div class="swiper-wrapper">
                            @foreach ($destinations->filter(function($destination) {
                                    return $destination->is_popular == '1';
                                }) as $row)
                            <div class="swiper-slide">
                                <a href="{{url('tours/?dest_id='.$row->id)}}" class="citiesCard -type-1 d-block rounded-4 ">
                                    <div class="citiesCard__image ratio ratio-3:4">
                                        <img src="#" data-src="{{asset('img/destinations/'.$row->image)}}" alt="{{$row->name}}" class="js-lazy">
                                    </div>
                                    <div class="citiesCard__content d-flex flex-column justify-between text-center pt-30 pb-20 px-20">
                                        <div class="citiesCard__bg"></div>
                                        <div class="citiesCard__top">
                                        </div>
                                        <div class="citiesCard__bottom">
                                            <h4 class="text-18 md:text-16 lh-13 text-white mb-20">{{$row->name}}</h4>
                                            <button class="button col-12 h-50 -blue-1 bg-white text-dark-1">Discover</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div class="d-flex x-gap-15 items-center justify-center sm:justify-start pt-10 sm:pt-20">
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

                    <div class="row y-gap-10 items-center justify-between">
                        <div class="col-auto">
                            <div class="text-20"><span class="fw-500">{{$tours->total()}} popular tour packages found</span> </div>
                        </div>
                    </div>

                    <div class="border-top-light mt-10 mb-30"></div>

                    <div class="row y-gap-30">
                        @foreach($tours as $tour)
                        <div class="col-lg-4 col-sm-6">
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
                                        <span>{{Str::limit($tour->tour_name, 45)}} | <span class="text-light-1">{{$tour->days}}D-{{$tour->nights}}N</span></span>
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
                                    <p class="text-light-1 lh-14 text-14 mt-5" title="{{$tour->amenities}}">{{Str::limit($tour->amenities, 40)}}</p>
                                    <div class="mt-5">
                                        <div class="fw-500">
                                            <span class="text-14 text-light-1 fw-400">Starting from </span>
                                            <span class="text-blue-1">₹{{number_format($tour->adult_price)}}</span>
                                            <span class="text-14 text-light-1 fw-400">Per Person</span>
                                        </div>
                                    </div>
                                    {{-- <div class="d-flex items-center mt-10">
                                        <a href="#" class="button -md text-white bg-warning-2">BOOK NOOW</a>
                                    </div> --}}
                                    <div class="d-flex items-center mt-10">
                                        <a href="{{url('/tour-details/'.$tour->id.'/'.Str::slug($tour->tour_name))}}" class="button p-2 text-white bg-light-1">Read More</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>

                    @if(count($tours) < 1)
                    <div class="alert mt-10 fw-500">No tour packages found!</div>
                    @endif
                    
                    <div class="border-top-light mt-30 pt-30">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-center">
                                {{ $tours->links("pagination::bootstrap-4") }}
                            </ul>
                        </nav>
                    </div>    

                </div>
            </div>
        </div>
    </section>
</main>

@endsection('content')