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
            <img class="d-block" src="{{asset('img/backgrounds/flight_booking_bg.jpg')}}" alt="flight-booking">
        </div>

        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <h1 class="text-40 md:text-25 fw-600 text-white text_shadow_property">Flight Booking</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-lg layout-pb-md">
        <div class="container d-flex items-center justify-center">
            <span class="text-blue-1 fw-600 text-40">Coming Soon</span>
        </div>
    </section>
</main>

@endsection('content')