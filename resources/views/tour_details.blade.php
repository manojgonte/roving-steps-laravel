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
                <h1 class="text-40 md:text-25 fw-600 text-white">{{ config('app.name') }}</h1>
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
                        <div class=""><i class="fa fa-home"></i> Home</div>
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
                        <div class="">{{$tour->destination?->name}}</div>
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
                <h1 class="text-30 fw-600">{{$tour->tour_name}} <span class="text-light-1">{{$tour->nights}}N-{{$tour->days}}D</span></h1>
                <div class="row x-gap-20 y-gap-20 items-center pt-10">
                    @if($tour->rating)
                    <div class="col-auto">
                        <div class="d-flex items-center">
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
                        </div>
                    </div>
                    @endif
                    
                </div>
            </div>
            <div class="col-auto">
                <div class="row x-gap-10 y-gap-10">
                    <div class="col-auto">
                        <button class="button -dark-1 py-15 px-24 h-50 rounded-4 bg-blue-1 text-white" id="openModal"> <i class="fa fa-comment-alt"></i>&nbsp; ENQUIRE </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-20 js-pin-container">
    <div class="container">
        <div class="row y-gap-30">
            <div class="col-lg-8">

                <div class="px-10 py-10 rounded-4 border-light bg-white shadow-4 my-4 mt-0">
                    <div class="text-22 fw-500 text-dark-1 mr-5"><span class="text-18">Starting From</span> ₹{{number_format($tour->adult_price)}}* <span class="text-14 text-light-1">Per Person</span></div>

                    <div class="col-md-auto col-12">
                        <span>Price Includes:</span>
                        <h6 class="fw-500">{{$tour->amenities}}</h6>
                    </div>
                </div>

                <div class="relative d-flex justify-center overflow-hidden js-section-slider" data-slider-cols="base-1" data-nav-prev="js-img-prev" data-nav-next="js-img-next">
                    <div class="swiper-wrapper">
                        @foreach($tour->itinerary->take(4) as $image)
                        <div class="swiper-slide">
                            <img src="{{asset('img/tours/tour_itinerary/'.$image->image)}}" alt="" class="rounded-4 col-12 h-full object-cover">
                        </div>
                        @endforeach
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

                @if($tour->description)
                <div class="border-top-light mt-40 mb-40"></div>
                <div class="row x-gap-40 y-gap-40">
                    <div class="col-12">
                        <h3 class="text-22 fw-500">Overview</h3>
                        <p class="text-dark-1 text-15 mt-20"> {!! nl2br($tour->description) !!}</p>
                    </div>
                </div>
                @endif

                <div class="my-4">
                    <div class="border-top-light"></div>
                </div>

                <div class="">
                    <h3 class="text-22 fw-500 slanted d-flex my-10">Itinerary</h3>
                    <div class="row y-gap-30 mt-20">
                        
                        @foreach($tour->itinerary->sortBy([['day','asc'],['created_at','asc']]) as $day)
                        <div class="border-bottom-light rounded-4 py-20 sm:px-20 sm:py-20 border-blue-1 bg-blue-2 my-2">
                            <div class="row y-gap-10">
                                <h3 class="text-18 fw-600">Day {{$day->day}}: {{$day->visit_place}}</h3>
                                <div class="col-xl-3">
                                    <img src="{{asset('img/tours/tour_itinerary/'.$day->image)}}" alt="" class="rounded-4 img-repso">
                                </div>
                                <div class="col-xl-9">
                                    <div class="rounded-4 px-10">
                                        <p class="text-dark-1 text-15"> {!! nl2br($day->description) !!}</p>
                                    </div>
                                </div>
                                <div class="y-gap-5 d-flex justify-between">
                                    <div class="d-flex justify-start align-items-center">
                                        <div class="flex-center size-50 rounded-full bg-blue-1">
                                            <i class="icon-customer text-white text-30"></i>
                                        </div>
                                        <div class="text-left mt-5 pl-20">
                                            <h4 class="text-16 fw-500">{{$day->activity}}</h4>
                                            <p class="text-15">Sigthseeings</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-start align-items-center">
                                        <div class="flex-center size-50 rounded-full bg-blue-1">
                                            <i class="icon-bed text-white text-30"></i>
                                        </div>
                                        <div class="text-left mt-5 pl-20">
                                            <h4 class="text-16 fw-500">{{$day->stay}}</h4>
                                            <p class="text-15">Stay</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-start align-items-center">
                                        <div class="flex-center size-50 rounded-full bg-blue-1">
                                            <i class="icon-food text-white text-30"></i>
                                        </div>
                                        <div class="text-left mt-5 pl-20">
                                            <h4 class="text-16 fw-500">{{$day->food}}</h4>
                                            <p class="text-15">Food</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="my-4">
                    <div class="row x-gap-10 y-gap-10">
                        <div class="col-auto">
                            <h3 class="text-22 fw-500">Important information</h3>
                        </div>
                    </div>
                    <div class="row x-gap-10 y-gap-10 justify-between pt-10">
                        @if($tour->inclusions)
                        <div class="col-lg-6 col-md-6">
                            <div class="fw-500 mb-10 border-bottom-light">Inclusions</div>
                            <div class="text-15">
                                {!! nl2br($tour->inclusions) !!}
                            </div>
                        </div>
                        @endif
                        @if($tour->exclusions)
                        <div class="col-lg-5 col-md-6">
                            <div class="fw-500 mb-10 border-bottom-light">Exclusions</div>
                            <div class="text-15">{!! nl2br($tour->exclusions) !!}</div>
                        </div>
                        @endif
                        @if($tour->note)
                        <div class="col-12">
                            <div class="fw-500 mb-10 border-bottom-light">Note</div>
                            <div class="text-15">
                                {!! nl2br($tour->note) !!}
                            </div>
                        </div>
                        @endif

                        <div class="col-12">
                            <div class="tabs -underline-2 pt-24 lg:pt-40 sm:pt-30 js-tabs">
                                <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 js-tabs-controls">
                                    <div class="col-auto">
                                        <button class="tabs__button text-light-1 fw-500 px-5 pb-5 lg:pb-0 js-tabs-button is-tab-el-active" data-tab-target=".-tab-item-1">Terms & Conditions</button>
                                    </div>
                                    <div class="col-auto">
                                        <button class="tabs__button text-light-1 fw-500 px-5 pb-5 lg:pb-0 js-tabs-button " data-tab-target=".-tab-item-2">Booking Terms</button>
                                    </div>
                                    <div class="col-auto">
                                        <button class="tabs__button text-light-1 fw-500 px-5 pb-5 lg:pb-0 js-tabs-button " data-tab-target=".-tab-item-3">Cancellation Policy</button>
                                    </div>
                                </div>
                                <div class="tabs__content pt-2 js-tabs-content">
                                    <div class="tabs__pane -tab-item-1 is-tab-el-active">
                                        <p class="text-15 text-dark-1">{!! nl2br($tour->terms) !!}</p>
                                    </div>
                                    <div class="tabs__pane -tab-item-2 ">
                                        <p class="text-15 text-dark-1">{!! nl2br($tour->booking_terms) !!}</p>
                                    </div>
                                    <div class="tabs__pane -tab-item-3 ">
                                        <p class="text-15 text-dark-1">{!! nl2br($tour->cancel_policy) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-40 mb-40">
                    <div class="border-top-light"></div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="d-flex justify-end">
                    <div class="lg:w-full d-flex flex-column items-center">
                        <div class="px-10 py-10 rounded-4 border-light bg-white shadow-4">
                            <div class="text-22 fw-500 text-dark-1 mr-5"> Similar Packages</div>

                            <div class="row y-gap-10">
                                @foreach($relatedTours as $rel)
                                <div class="col-12">
                                    <div class="border-top-light pt-30">
                                        <div class="row x-gap-20 y-gap-20">
                                            <div class="col-md-auto">
                                                <div class="cardImage ratio ratio-1:1 w-140 md:w-1/1 rounded-4">
                                                    <div class="cardImage__content">
                                                        <img class="rounded-4 col-12" src="{{asset('img/tours/'.$rel->image)}}" alt="image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="row x-gap-10 items-center">
                                                    <div class="col-auto">
                                                        <p class="text-14 lh-14 mb-5">{{$rel->nights}}N-{{$rel->days}}D</p>
                                                    </div>
                                                </div>
                                                <h3 class="text-15 lh-16 fw-500">{{$rel->tour_name}}</h3>
                                                <p class="text-14 lh-14 mt-5">{{$rel->destination?->name}}</p>
                                                <a href="{{url('/tour-details/'.$rel->id.'/'.Str::slug($rel->tour_name))}}" class="button -sm h-34 -dark-1 bg-blue-1 text-white my-2"> View Details <div class="icon-arrow-top-right ml-15"></div></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="modal" class="modal">
    <div class="modal-content p-0">
        <div class="">
            <div class="row d-flex justify-between">
                <div class="col-lg-4 bg-blue-1 justify-center items-center d-flex bg-blue-1_" style="background-image: url({{ asset('img/tours/'.$tour->image) }}); background-size: contain; background-repeat: no-repeat; background-position: center;">
                    <div class="">
                        <!-- <img src="{{asset('img/elements/need_help.png')}}" style="height: 100px;" alt=""> -->
                        <!-- <p class="text-white-50 text-center">Will help you to plan your dream holidays</p> -->
                    </div>
                </div>
                <div class="col-lg-8 py-20">
                    <div class="rounded-4 container">
                        <h4 class="text-18 my-1">Check Rate & Send Enquiry for {{$tour->tour_name}} <span class="text-light-1">{{$tour->nights}}N-{{$tour->days}}D</span></h4>
                        <form action="{{url('tour-enquiry')}}" method="POST" class="tourEnqForm">@csrf
                            <input type="hidden" name="tour_id" value="{{Request()->id}}">
                            <input type="hidden" name="user_id" @auth value="{{Auth::id()}}" @endauth>
                            <div class="row y-gap-20 x-gap-20">
                                <div class="col-12">
                                    <div class="form-input ">
                                        <input type="text" name="name" @auth value="{{Auth::User()->name}}" @endauth required>
                                        <label class="lh-1 text-16 text-light-1">Full Name *</label>
                                    </div>
                                    <div class="error-message"></div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input ">
                                        <input type="text" name="contact" @auth value="{{Auth::User()->contact}}" @endauth>
                                        <label class="lh-1 text-16 text-light-1">Contact</label>
                                    </div>
                                    <div class="error-message"></div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input ">
                                        <input type="email" name="email" @auth value="{{Auth::User()->email}}" @endauth required>
                                        <label class="lh-1 text-16 text-light-1">Email *</label>
                                    </div>
                                    <div class="error-message"></div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input ">
                                        <input type="text" name="tourist_no">
                                        <label class="lh-1 text-16 text-light-1">No. of Tourist</label>
                                    </div>
                                    <div class="error-message"></div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input ">
                                        <input type="text" name="current_city" required>
                                        <label class="lh-1 text-16 text-light-1">Current City *</label>
                                    </div>
                                    <div class="error-message"></div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input ">
                                        <input type="date" name="from_date" min="">
                                        <label class="lh-1 text-16 text-light-1">From</label>
                                    </div>
                                    <div class="error-message"></div>
                                </div>
                                <div class="col-6">
                                    <div class="form-input ">
                                        <input type="date" name="end_date" min="">
                                        <label class="lh-1 text-16 text-light-1">To</label>
                                    </div>
                                    <div class="error-message"></div>
                                </div>
                                <div class="col-12">
                                    <div class="form-input ">
                                        <textarea name="message" required rows="2"></textarea>
                                        <label class="lh-1 text-16 text-light-1">Messages *</label>
                                    </div>
                                    <div class="error-message"></div>
                                </div>
                                <div class="col-auto d-flex">
                                    <button type="submit" class="button px-24 h-50 -dark-1 bg-dark-2 text-white mx-1"> ENQUIRE</button>
                                    {{-- <button class="button bg-light-2 text-black px-24 close">&times;</button> --}}
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
<script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script>
<script src="{{asset('backend_js/jquery.validate.js')}}"></script>
<script>
    $(document).ready(function () {
        var container = $('div.error-container');
        $(".tourEnqForm").validate({
            rules:{
                name:{
                    required:true,
                },
                contact:{
                    // required:true,
                    number:true,
                    minlength:10,
                    maxlength:10,
                },
                email:{
                    required:true,
                    email:true,
                },
                message:{
                    required:true,
                    maxlength:200,
                },
                from_date:{
                    date:true,
                },
                end_date:{
                    date:true,
                },
            },
            messages:{
                name:{ 
                    required: "Please enter name",
                },
                contact:{ 
                    // required: "Please enter valid contact number",
                    minlength: "Please enter {0} digit phone number",
                    maxlength: "Please enter {0} digit phone number",
                    number: "Please enter valid phone number",
                },
                email:{ 
                    required: "Please enter email",
                    email: "Please enter valid email",
                },
                message:{ 
                    required: "Please enter message",
                    maxlength: "Please enter no more than {0} characters",
                },
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.closest('.col-12, .col-6').find('.error-message'));
            },
            submitHandler: function(form) {
                $(".button").attr("disabled", true);
                $(".button").html("<span class='fa fa-spinner fa-spin'></span> Please wait...");
                form.submit();
            }
        });
    });
</script>

<script>
    const modal = document.getElementById("modal");
    const openModalBtn = document.getElementById("openModal");
    const closeModalBtn = document.getElementsByClassName("close")[0];

    openModalBtn.addEventListener("click", function() {
        modal.style.display = "block";
    });

    // closeModalBtn.addEventListener("click", function() {
    //     modal.style.display = "none";
    // });

    window.addEventListener("click", function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
</script>
@endsection('scripts')

@endsection('content')