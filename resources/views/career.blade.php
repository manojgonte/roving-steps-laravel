@extends('layouts/frontLayout/front_design')
@section('content')

<main class="main">
    <section class="section mt-90">
        <div class="container">
            <div class="text-center">
                <h6 class="color-grey-500 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Take a look at our current openings</h6>
                <h2 class="color-brand-1 wow animate__animated animate__fadeIn" data-wow-delay=".2s">We’re Always Searching For <br class="d-none d-lg-block">Amazing People to Join Our Team. </h2>
                <div class="mt-40 mb-50 text-center wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                    <a class="btn btn-brand-1 hover-up" href="#JobOpenings">Job Openings 
                        <svg class="w-6 h-6 icon-16 ml-5 color-brand-2" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="box-video mt-70">
                <img src="assets/imgs/page/career/img-video.png" alt="iori">
                <div class="image-1 shape-1">
                    <img src="assets/imgs/page/career/certify.png" alt="iori">
                </div>
            </div>
        </div>
    </section>
    <section class="section mt-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center w-75">
                    <h3 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Why You Should Consider Applying</h3>
                    <p class="font-md color-gray-300 wow animate__animated animate__fadeIn" data-wow-delay=".2s">At Kirtane & Pandit, we truly care for our employees and make sure that they experience the best of culture, and help them in their professional development. Join our team, We look forward to meeting extraordinary people with an incredible passion & hunger to learn new.</p>
                </div>
            </div>
            <div class="row mt-65">
                <div class="col-lg-3 col-md-6 col-sm-6 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                    <div class="card-small card-small-2">
                        <div class="card-image">
                            <a href="#">
                                <div class="box-image">
                                    <img src="assets/imgs/page/homepage1/free.svg" alt="iori">
                                </div>
                            </a>
                        </div>
                        <div class="card-info">
                            <a href="#">
                                <h6 class="color-brand-1 mb-10">Open Door Policy</h6>
                            </a>
                            <p class="font-xs color-grey-500">We come together wherever we are – across time zones, regions, offices and screens. You will receive support from your teammates anytime and anywhere.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                    <div class="card-small card-small-2">
                        <div class="card-image">
                            <a href="#">
                                <div class="box-image">
                                    <img src="assets/imgs/page/homepage1/cross.png" alt="iori">
                                </div>
                            </a>
                        </div>
                        <div class="card-info">
                            <a href="#">
                                <h6 class="color-brand-1 mb-10">Great Work Environment</h6>
                            </a>
                            <p class="font-xs color-grey-500">Our teams reflect the rich diversity of our world, with equitable access to opportunity for everyone. No matter where you come from</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                    <div class="card-small card-small-2">
                        <div class="card-image">
                            <a href="#">
                                <div class="box-image">
                                    <img src="assets/imgs/page/homepage2/identity.png" alt="iori">
                                </div>
                            </a>
                        </div>
                        <div class="card-info">
                            <a href="#">
                                <h6 class="color-brand-1 mb-10">Organizational Culture</h6>
                            </a>
                            <p class="font-xs color-grey-500">We believe in your freedom to work when and how you work best, to help us all thrive. Only freedom and independent work can bring out the best in you.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 wow animate__animated animate__fadeIn" data-wow-delay=".3s">
                    <div class="card-small card-small-2">
                        <div class="card-image">
                            <a href="#">
                                <div class="box-image">
                                    <img src="assets/imgs/page/career/persuasion.png" alt="iori">
                                </div>
                            </a>
                        </div>
                        <div class="card-info">
                            <a href="#">
                                <h6 class="color-brand-1 mb-10">Stability of Workforce</h6>
                            </a>
                            <p class="font-xs color-grey-500">Knowing that there is real value to be gained from helping people to simplify whatever it is that they do and bring.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section mt-100" id="JobOpenings">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="color-brand-1 mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Career Opportunities</h2>
                    <p class="font-lg color-gray-500 wow animate__animated animate__fadeIn" data-wow-delay=".2s">Explore our open roles for working totally remotely, from the <br class="d-none d-lg-block">office or somewhere in between. </p>
                </div>
            </div>
            <div class="row mt-50">
                <div class="col-lg-6 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                    <div class="card-offer card-we-do hover-up bg-brand-1 bg-explore">                        
                        <div class="card-info">
                            <h4 class="mb-10">
                                <a class="color-brand-2" href="{{asset('job-detail/')}}">Finance Manager</a>
                            </h4>
                            <span class="font-xs color-grey-200">Job Description:</span>
                            <p class="font-md color-brand-2 mb-5 w-75">Seamless importing and round-tripping of Microsoft Project plans, Excel files &amp; CSV files.</p>
                            <span class="font-xs color-grey-200">Location:</span>
                            <span class="d-block font-md color-brand-2">Baner, Pune</span>
                            <div class="box-button-offer">
                                <a class="btn btn-default font-sm-bold pl-0 color-brand-2" href="{{asset('job-detail/')}}">More Job Details 
                                    <svg class="w-6 h-6 icon-16 ml-5 color-brand-2" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                    <div class="card-offer card-we-do hover-up bg-brand-1 bg-explore">                        
                        <div class="card-info">
                            <h4 class="mb-10">
                                <a class="color-brand-2" href="{{asset('job-detail/')}}">Banking Operations</a>
                            </h4>
                            <span class="font-xs color-grey-200">Job Description:</span>
                            <p class="font-md color-brand-2 mb-5 w-75">Seamless importing and round-tripping of Microsoft Project plans, Excel files &amp; CSV files.</p>
                            <span class="font-xs color-grey-200">Location:</span>
                            <span class="d-block font-md color-brand-2">Baner, Pune</span>
                            <div class="box-button-offer">
                                <a class="btn btn-default font-sm-bold pl-0 color-brand-2" href="{{asset('job-detail/')}}">More Job Details 
                                    <svg class="w-6 h-6 icon-16 ml-5 color-brand-2" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                    <div class="card-offer card-we-do hover-up bg-brand-1 bg-explore">                        
                        <div class="card-info">
                            <h4 class="mb-10">
                                <a class="color-brand-2" href="{{asset('job-detail/')}}">Team Lead Accounts Payable</a>
                            </h4>
                            <span class="font-xs color-grey-200">Job Description:</span>
                            <p class="font-md color-brand-2 mb-5 w-75">Seamless importing and round-tripping of Microsoft Project plans, Excel files &amp; CSV files.</p>
                            <span class="font-xs color-grey-200">Location:</span>
                            <span class="d-block font-md color-brand-2">Baner, Pune</span>
                            <div class="box-button-offer">
                                <a class="btn btn-default font-sm-bold pl-0 color-brand-2" href="{{asset('job-detail/')}}">More Job Details 
                                    <svg class="w-6 h-6 icon-16 ml-5 color-brand-2" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                    <div class="card-offer card-we-do hover-up bg-brand-1 bg-explore">                        
                        <div class="card-info">
                            <h4 class="mb-10">
                                <a class="color-brand-2" href="{{asset('job-detail/')}}">Accounts Payable</a>
                            </h4>
                            <span class="font-xs color-grey-200">Job Description:</span>
                            <p class="font-md color-brand-2 mb-5 w-75">Seamless importing and round-tripping of Microsoft Project plans, Excel files &amp; CSV files.</p>
                            <span class="font-xs color-grey-200">Location:</span>
                            <span class="d-block font-md color-brand-2">Baner, Pune</span>
                            <div class="box-button-offer">
                                <a class="btn btn-default font-sm-bold pl-0 color-brand-2" href="{{asset('job-detail/')}}">More Job Details 
                                    <svg class="w-6 h-6 icon-16 ml-5 color-brand-2" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection('content')