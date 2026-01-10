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
            <img src="img/pages/about/1.png" alt="image">
        </div>

        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <h1 class="text-40 md:text-25 fw-600 text-white">About Us</h1>
                    <div class="text-white mt-15">Your trusted trip companion</div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-lg layout-pb-md">
        <div class="container">
            <div class="box-story box-story-1 mb-0">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="box-info-video">
                            <div class="img-border-style">
                                <img class="d-block" src="{{asset('img/about/sphinx-statue.jpeg')}}" alt="about-sphinx">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-12 align-items-bottom">
                        <div class="box-info-video mt-30 mb-30">
                            <h3 class="color-brand-1 mt-10 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Iggloo By Roving Steps</h3>
                            <p class="font-md color-grey-400 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Welcome to <b class="text-dark-4">Roving Steps Pvt. Ltd.</b>, your ultimate travel companion dedicated to making your journeys unforgettable! Founded with a passion for exploration and a love for creating meaningful experiences, we are here to inspire, guide, and support travelers from all walks of life.</p>
                            <p class="font-md color-grey-400 wow animate__animated animate__fadeIn" data-wow-delay=".0s">At Roving Steps Pvt Ltd, we believe that travel is not just about visiting places but about creating stories, embracing cultures, and discovering yourself along the way. Whether you're planning a weekend getaway, a luxury vacation, or a backpacking adventure, our platform is designed to offer personalized recommendations, expert travel tips, and hassle-free booking services.</p>
                            <p class="font-md color-grey-400 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Our team of travel enthusiasts and industry experts work tirelessly to curate destinations, activities, and accommodations that cater to every type of traveler. From hidden gems to popular hotspots, we bring you authentic experiences and insider knowledge to help you travel smarter and better.</p>
                            <p class="font-md color-grey-400 wow animate__animated animate__fadeIn" data-wow-delay=".0s"><b class="text-dark-4">Roving Steps - Iggloo</b> is your dedicated travel partner, committed to meticulously crafting and executing journeys that resonate with your unique needs and aspirations. Our expertise spans a comprehensive range of services, ensuring a seamless experience for every type of traveler. We specialize in customized travel itineraries, designing unique adventures tailored precisely to your desires. For businesses, we expertly manage corporate bookings, facilitating productive and comfortable trips. </p>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 align-items-bottom">
                        <div class="box-info-video mb-30">
                            <p class="font-md color-grey-400 wow animate__animated animate__fadeIn" data-wow-delay=".0s">We are also deeply invested in fostering global connections through college bookings and enriching student exchange programs, preparing the next generation of world citizens. Our services extend to bringing people together with thoughtfully organized community travel and exciting group departures. Furthermore, we simplify the often-complex processes of visa applications and secure ticketing, providing peace of mind from start to finish. At Iggloo, we redefine travel by curating experiences that offer deep comfort, personalized care, and effortless familiarity you truly deserve, to every corner of the globe you wish to explore. We believe that true travel enjoyment comes from feeling completely looked after, allowing you to relax and create cherished memories with your loved ones, just as you would within a space of your own choosing and comfort.</p>
                            <p class="font-md color-grey-400 wow animate__animated animate__fadeIn mt-20" data-wow-delay=".0s">Every client receives dedicated attention. We pride ourselves on our personalized approach, anticipating your needs and delivering with unwavering support. With Iggloo, you’re not just booking a trip; you’re embarking on an adventure where every step feels comforting and effortlessly managed.</p>
                            <p class="font-md color-grey-400 wow animate__animated animate__fadeIn mt-20" data-wow-delay=".0s">Join our community of explorers and let us help you turn your travel dreams into reality. Because every journey begins with a single step—let’s take it together!</p>
                            <p class="font-md color-grey-400 wow animate__animated animate__fadeIn mt-10" data-wow-delay=".0s">Your adventure starts here.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-story box-story-2 mt-20">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="box-info-video mt-30 mb-30">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="box-info-video">
                                        <div class="img-border-style">
                                            <img class="d-block" src="{{asset('img/about/image14.jpg')}}"
                                                alt="about-sphinx">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 align-items-bottom">
                                    <div class="box-info-video mt-30 mb-30">
                                        <h3 class="color-brand-1 mt-10 mb-15 wow animate__animated animate__fadeIn"
                                            data-wow-delay=".0s">Our Vision</h3>
                                        <p class="font-md color-grey-400 wow animate__animated animate__fadeIn"
                                            data-wow-delay=".0s">Roving Steps - The most trusted travel company for
                                            elite travel at affordable prices creating memories & Experiences.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="box-info-video mt-30 mb-30">
                            <div class="row align-items-center">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="box-info-video">
                                        <div class="img-border-style">
                                            <img class="d-block" src="{{asset('img/about/image15.png')}}"
                                                alt="about-image15">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 align-items-bottom">
                                    <div class="box-info-video mt-30 mb-30">
                                        <h3 class="color-brand-1 mt-10 mb-15 wow animate__animated animate__fadeIn"
                                            data-wow-delay=".0s">Our Mission</h3>
                                        <p class="font-md color-grey-400 wow animate__animated animate__fadeIn"
                                            data-wow-delay=".0s">We are keen towards providing a lavish experience to
                                            our guest when they travel to their dream destinations. Our mission is to
                                            make dreams affordable with continuous innovation in tourism world.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</main>

@endsection('content')