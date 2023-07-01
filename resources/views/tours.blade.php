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
                            <div class="button-grid items-center">
                                <div class="searchMenu-loc px-30 lg:py-20 lg:px-0 js-form-dd js-liverSearch">
                                    <div data-x-dd-click="searchMenu-loc">
                                        <h4 class="text-15 fw-500 ls-2 lh-16">Location</h4>
                                        <div class="text-15 text-light-1 ls-2 lh-16">
                                            <select name="dest_id" class="form-select" aria-label="Destinations" required>
                                                <option value="">-- Select --</option>
                                                @foreach(App\Models\Destination::where('status',1)->get() as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="searchMenu-date px-30 lg:py-20 lg:px-0 js-form-dd js-calendar">
                                    <div data-x-dd-click="searchMenu-date">
                                        <h4 class="text-15 fw-500 ls-2 lh-16">Search </h4>
                                        <div class="text-15 text-light-1 ls-2 lh-16">
                                            <input autocomplete="off" type="search" name="keyword" placeholder="Search Keyword" class="js-search js-dd-focus" />
                                        </div>
                                    </div>
                                </div>
                                <div class="button-item">
                                    <button class="mainSearch__submit button -dark-1 h-60 px-35 col-12 rounded-100 bg-blue-1 text-white">
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
                            <a href="{{url('/tours')}}" class="underline"><i class="fa fa-times"></i> Clear Filters</a>
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

                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox" name="special_tour_type" value="Adventure Tour" @if(Request()->special_tour_type == "Adventure Tour") checked @endif onclick="javascript:this.form.submit();">
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 ml-10">Adventure Tour</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row y-gap-10 items-center justify-between">
                                    <div class="col-auto">
                                        <div class="d-flex items-center">
                                            <div class="form-checkbox">
                                                <input type="checkbox" name="special_tour_type" value="Bike Tour" @if(Request()->special_tour_type == "Bike Tour") checked @endif onclick="javascript:this.form.submit();">
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
                                                <input type="checkbox" name="special_tour_type" value="Chardham" @if(Request()->special_tour_type == "Chardham") checked @endif onclick="javascript:this.form.submit();">
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
                                                <input type="checkbox" name="special_tour_type" value="Goa" @if(Request()->special_tour_type == "Goa") checked @endif onclick="javascript:this.form.submit();">
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
                                                <input type="checkbox" name="special_tour_type" value="Gujrat" @if(Request()->special_tour_type == "Gujrat") checked @endif onclick="javascript:this.form.submit();">
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
                        
                        </form>
                    </aside>
                </div>

                <div class="col-xl-9 col-lg-8">
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
                                    <h4 class="hotelsCard__title text-dark-1 text-18 lh-16 fw-500">
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
                                    <p class="text-light-1 lh-14 text-14 mt-5">{{Str::limit($tour->amenities, 40)}}</p>
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
                        {{ $tours->links("pagination::bootstrap-4") }}
                    </div>    

                </div>
            </div>
        </div>
    </section>
</main>

@endsection('content')