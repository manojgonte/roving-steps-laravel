@extends('layouts/frontLayout/front_design')
@section('content')

<main class="main">
    <section class="section banner-contact">
        <div class="container">
            <div class="banner-1">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <span class="title-line line-48 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Get in Touch</span>
                        <h2 class="color-brand-1 mb-20 mt-10 wow animate__animated animate__fadeIn" data-wow-delay=".2s">We’d love to hear <br class="d-none d-lg-block">from you. </h2>
                        <div class="row">
                            <div class="col-lg-9">
                                <p class="font-md color-grey-500 wow animate__animated animate__fadeIn" data-wow-delay=".4s">Ask a question, or get in touch here. If you’re interested in working at Kirtane & Pandit Coporation, check out our <a class="ml-3" href="{{url('careers')}}"> careers page.</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="box-banner-contact">
                            <img src="{{asset('assets/imgs/page/contact/banner.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section mt-100">
	    <div class="container">
	        <div class="row d-flex justify-content-center align-items-center address">
	        	<h3 class="color-brand-1 mb-5">Get in touch</h3>
                <p class="color-grey-400 mb-15">Do you want to know more? Visit or write to us</p>
	            <div class="col-lg-3 mb-30 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
	                <div class="card-guide bg-7">
	                    <div class="card-image">
	                        <img src="{{asset('assets/imgs/template/icons/location-marker.svg')}}" alt="">
	                    </div>
	                    <div class="card-info">
	                        <h6 class="color-brand-1 mb-5">Pune Office</h6>
	                        <p class="font-sm color-grey-400 mb-5">5th Floor, Wing A, Gopal House, S.No. 127/1B/11, Plot A1, Kothrud, Pune – 411 038, India</p>
	                        <div class="box-author mb-5">
                      			<div class="author-info">
                      				<span class="font-sm-bold color-brand-1 author-name">+91 20 67295100, 25433104</span>
                      				<span class="font-xs color-grey-500 department">Phone</span>
                      			</div>
                    		</div>
                    		<div class="box-author mb-5">
                      			<div class="author-info">
                      				<a href="mailto:kpca@kirtanepandit.com"><span class="font-sm-bold color-brand-1 author-name">kpca@kirtanepandit.com</span></a>
                      				<span class="font-xs color-grey-500 department">Email</span>
                      			</div>
                    		</div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-3 mb-30 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
	                <div class="card-guide bg-5">
	                    <div class="card-image">
	                        <img src="{{asset('assets/imgs/template/icons/location-marker.svg')}}" alt="">
	                    </div>
	                    <div class="card-info">
	                        <h6 class="color-brand-1 mb-5">Mumbai Office</h6>
	                        <p class="font-sm color-grey-400 mb-5">601, 6th Floor, Earth Vintage, Senapati Bapat Marg, Dadar West, Mumbai- 400 028, India</p>
	                        <div class="box-author mb-5">
                      			<div class="author-info">
                      				<span class="font-sm-bold color-brand-1 author-name">+91-022 69328846/47/48</span>
                      				<span class="font-xs color-grey-500 department">Phone</span>
                      			</div>
                    		</div>
                    		<div class="box-author mb-5">
                      			<div class="author-info">
                      				<a href="mailto:kpcamumbai@kirtanepandit.com"><span class="font-sm-bold color-brand-1 author-name">kpcamumbai@kirtanepandit.com</span></a>
                      				<span class="font-xs color-grey-500 department">Email</span>
                      			</div>
                    		</div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-3 mb-30 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
	                <div class="card-guide bg-7">
	                    <div class="card-image">
	                        <img src="{{asset('assets/imgs/template/icons/location-marker.svg')}}" alt="">
	                    </div>
	                    <div class="card-info">
	                        <h6 class="color-brand-1 mb-5">Nashik Office</h6>
	                        <p class="font-sm color-grey-400 mb-5">Flat No. A- 102, Malpani Saffron, Near Hotel Express Inn, Pathardi Phata, Nashik -422010, India</p>
	                        <div class="box-author mb-5">
                      			<div class="author-info">
                      				<span class="font-sm-bold color-brand-1 author-name">+91-253-2386644</span>
                      				<span class="font-xs color-grey-500 department">Phone</span>
                      			</div>
                    		</div>
                    		<div class="box-author mb-5">
                      			<div class="author-info">
                      				<a href="mailto:kpca@kirtanepandit.com"><span class="font-sm-bold color-brand-1 author-name">kpca@kirtanepandit.com</span></a>
                      				<span class="font-xs color-grey-500 department">Email</span>
                      			</div>
                    		</div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-3 mb-30 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
	                <div class="card-guide bg-5">
	                    <div class="card-image">
	                        <img src="{{asset('assets/imgs/template/icons/location-marker.svg')}}" alt="">
	                    </div>
	                    <div class="card-info">
	                        <h6 class="color-brand-1 mb-5">Bengaluru Office</h6>
	                        <p class="font-sm color-grey-400 mb-5">No. 63/1, I Floor, Makam Plaza, III Main Road, 18th Cross, Malleshwaram, Bengaluru – 560 055, India</p>
	                        <div class="box-author mb-5">
                      			<div class="author-info">
                      				<span class="font-sm-bold color-brand-1 author-name">+91 99127 41089 / 94400 55917</span>
                      				<span class="font-xs color-grey-500 department">Phone</span>
                      			</div>
                    		</div>
                    		<div class="box-author mb-5">
                      			<div class="author-info">
                      				<a href="mailto:kpcabengaluru@kirtanepandit.com"><span class="font-sm-bold color-brand-1 author-name">kpcabengaluru@kirtanepandit.com</span></a>
                      				<span class="font-xs color-grey-500 department">Email</span>
                      			</div>
                    		</div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-3 mb-30 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
	                <div class="card-guide bg-7">
	                    <div class="card-image">
	                        <img src="{{asset('assets/imgs/template/icons/location-marker.svg')}}" alt="">
	                    </div>
	                    <div class="card-info">
	                        <h6 class="color-brand-1 mb-5">Hyderabad Office</h6>
	                        <p class="font-sm color-grey-400 mb-5">401 to 405, 4th Floor, Sanatana Eternal, 3-6-108/1, Liberty Road, Himayatnagar, Hyderabad – 500 029, India</p>
	                        <div class="box-author mb-5">
                      			<div class="author-info">
                      				<span class="font-sm-bold color-brand-1 author-name"> 040 40059090</span>
                      				<span class="font-xs color-grey-500 department">Phone</span>
                      			</div>
                    		</div>
                    		<div class="box-author mb-5">
                      			<div class="author-info">
                      				<a href="mailto:kpcahyderabad@kirtanepandit.com"><span class="font-sm-bold color-brand-1 author-name">kpcahyderabad@kirtanepandit.com</span></a>
                      				<span class="font-xs color-grey-500 department">Email</span>
                      			</div>
                    		</div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-3 mb-30 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
	                <div class="card-guide bg-5">
	                    <div class="card-image">
	                        <img src="{{asset('assets/imgs/template/icons/location-marker.svg')}}" alt="">
	                    </div>
	                    <div class="card-info">
	                        <h6 class="color-brand-1 mb-5">New Delhi Office</h6>
	                        <p class="font-sm color-grey-400 mb-5">Baber Lane, Bengali Market, New Delhi – 110 001, India</p>
	                        <div class="box-author mb-5">
                      			<div class="author-info">
                      				<span class="font-sm-bold color-brand-1 author-name"> 011-23350585</span>
                      				<span class="font-xs color-grey-500 department">Phone</span>
                      			</div>
                    		</div>
                    		<div class="box-author mb-5">
                      			<div class="author-info">
                      				<a href="mailto:kpcadelhi@kirtanepandit.com"><span class="font-sm-bold color-brand-1 author-name">kpcadelhi@kirtanepandit.com</span></a>
                      				<span class="font-xs color-grey-500 department">Email</span>
                      			</div>
                    		</div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-3 mb-30 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
	                <div class="card-guide bg-7">
	                    <div class="card-image">
	                        <img src="{{asset('assets/imgs/template/icons/location-marker.svg')}}" alt="">
	                    </div>
	                    <div class="card-info">
	                        <h6 class="color-brand-1 mb-5">Chennai Office</h6>
	                        <p class="font-sm color-grey-400 mb-5">No. 11, 2nd Floor Rosy Tower, 7 Nungambakkam High Road, Chennai – 600 034, India</p>
	                        <div class="box-author mb-5">
                      			<div class="author-info">
                      				<span class="font-sm-bold color-brand-1 author-name"> +91 99164 66614</span>
                      				<span class="font-xs color-grey-500 department">Phone</span>
                      			</div>
                    		</div>
                    		<div class="box-author mb-5">
                      			<div class="author-info">
                      				<a href="mailto:kpcabengaluru@kirtanepandit.com"><span class="font-sm-bold color-brand-1 author-name">kpcabengaluru@kirtanepandit.com</span></a>
                      				<span class="font-xs color-grey-500 department">Email</span>
                      			</div>
                    		</div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

    <section class="section mt-70 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h3 class="color-brand-1 mb-15">Write to us</h3>
                    <p class="font-sm color-grey-500">Do you want to know more? Please provide your details, so we can get back to you.</p>
                    <div class="mt-50">
                        <div class="wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                            <div class="card-offer card-we-do card-contact hover-up">
                                <div class="card-image">
                                    <img src="assets/imgs/page/contact/img2.png" alt="">
                                </div>
                                <div class="card-info">
                                    <h6 class="color-brand-1 mb-10">Get call from us</h6>
                                </div>
                            </div>
                        </div>
                        <div class="wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                            <div class="card-offer card-we-do card-contact hover-up">
                                <div class="card-image">
                                    <img src="assets/imgs/page/contact/img1.png" alt="">
                                </div>
                                <div class="card-info">
                                    <h6 class="color-brand-1 mb-10">Have any Enquiry or feedback</h6>
                                </div>
                            </div>
                        </div>
                        <div class="wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                            <div class="card-offer card-we-do card-contact hover-up">
                                <div class="card-image">
                                    <img src="assets/imgs/page/contact/img3.png" alt="">
                                </div>
                                <div class="card-info">
                                    <h6 class="color-brand-1 mb-10">Connect with our team</h6>
                                    {{-- <p class="font-md color-grey-500 mb-5">Let us talk about how we can help your enterprise.</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="box-form-contact wow animate__animated animate__fadeIn" data-wow-delay=".6s">
                    	<form action="" method="POST">@csrf
	                        <div class="row">
	                            <div class="col-lg-6 col-sm-6">
	                                <div class="form-group mb-25">
	                                    <input class="form-control icon-user" type="text" placeholder="Your name">
	                                </div>
	                            </div>
	                            <div class="col-lg-6 col-sm-6">
	                                <div class="form-group mb-25">
	                                    <input class="form-control icon-email" type="text" placeholder="Email">
	                                </div>
	                            </div>
	                            <div class="col-lg-6 col-sm-6">
	                                <div class="form-group mb-25">
	                                    <input class="form-control icon-phone" type="text" placeholder="Phone">
	                                </div>
	                            </div>
	                            <div class="col-lg-6 col-sm-6">
	                                <div class="form-group mb-25">
	                                    <input class="form-control icon-company" type="text" placeholder="Company">
	                                </div>
	                            </div>
	                            <div class="col-lg-12">
	                                <div class="form-group mb-25">
	                                    <input class="form-control" type="text" placeholder="Subject">
	                                </div>
	                            </div>
	                            <div class="col-lg-12">
	                                <div class="form-group mb-25">
	                                    <textarea class="form-control textarea-control" placeholder="Write something"></textarea>
	                                </div>
	                            </div>
	                            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-6 col-9">
	                                <div class="form-group">
	                                    <button class="btn btn-brand-1-full font-sm" type="submit">Send message <svg class="w-6 h-6 icon-16 ml-5" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
	                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
	                                        </svg>
	                                    </button>
	                                </div>
	                            </div>
	                        </div>
	                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection('content')