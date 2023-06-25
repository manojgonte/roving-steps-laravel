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
                    <div class="col-xl-6 col-lg-6 col-md-6 align-items-bottom">
                        <div class="box-info-video mt-30 mb-30">
                            <h3 class="color-brand-1 mt-10 mb-15 wow animate__animated animate__fadeIn"
                                data-wow-delay=".0s">Roving Steps...</h3>
                            <p class="font-md color-grey-400 wow animate__animated animate__fadeIn"
                                data-wow-delay=".0s">We formed with a strong passion of exploring different
                                destinations. This is not just a company but a family which we are looking forward to
                                create. We are here to Use our expert knowledge and a personalized touch to make sure
                                reality exceeds your expectations. We get immense pleasure to see our guest satisfied
                                and smiling because of our services.</p>
                            <p class="font-md color-grey-400 wow animate__animated animate__fadeIn"
                                data-wow-delay=".0s">We all experience moments which leave us stunned and which gives us
                                Goosebumps and so much more that we cannot express when we travel to places we always
                                wished or… Roving Steps takes the responsibility for fulfilling your desired dreams of
                                Traveling!!</p>
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