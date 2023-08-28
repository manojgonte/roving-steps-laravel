<footer class="footer -type-1 bg-white">
    <div class="">
        <div class="">
            <div class="row justify-between xl:justify-start">
                <div class="col-xl-4 col-lg-4 col-sm-6 d-flex justify-content-center align-items-center">
                    <div class="">
                        <img src="{{asset('img/logo/logo_blue.png')}}" style="width:220px" alt="logo">
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-sm-6 footer-bg">
                    <div class="container">
                        <div class="row pt-30 pb-30">
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <h5 class="text-16 fw-500 mb-5 text-warning-2">Information</h5>
                                <div class="d-flex flex-column text-white">
                                    <a href="{{url('/')}}">Home</a>
                                    <a href="javascript:void">Our Services</a>
                                    <a href="{{url('about-us')}}">About Us</a>
                                    <a href="{{url('contact-us')}}">Contact Us</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12">
                                <h5 class="text-16 fw-500 mb-5 text-warning-2">Helpful Links</h5>
                                <div class="d-flex flex-column text-white">
                                    <a href="{{url('tours')}}">Tours</a>
                                    <a href="javascript:void">Support</a>
                                    <a href="javascript:void">Terms & Conditions</a>
                                    <a href="javascript:void">Privacy</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12 mt-24">
                                <h5 class="text-16 fw-500 mb-5 text-warning-2">Contact</h5>
                                <div class="d-flex flex-column text-white">
                                    <a href="tel:+918600031545">+91 8600031545  |  +91 8600321645</a>
                                    <a href="mailto:info@rovingsteps.com">info@rovingsteps.com</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12 mt-24">
                                <h5 class="text-16 fw-500 mb-5 text-warning-2">Address</h5>
                                <div class="d-flex flex-column text-white">
                                    <span>Sr No 31, 1st floor, Gosavi Building, Kundan nagar, Dhankwadi, Pune - 411043</span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12 mt-24">
                                <h5 class="text-16 fw-500 mb-5 text-warning-2">Associated with</h5>
                                <div class="d-flex row align-items-center text-white">
                                    <div class="col-auto"><img src="{{asset('img/home/TAAI.jpg')}}" width="50" title="TRAVEL AGENTS ASSOCIATION OF INDIA" /></div>
                                    <div class="col-auto"><img src="{{asset('img/home/TAFI.png')}}" width="50" title="TRAVEL AGENTS FEDERATION OF INDIA" /></div>
                                    <div class="col-auto"><img src="{{asset('img/home/TAAP.jpg')}}" width="50" title="TRAVEL AGENTS ASSOCIATION OF PUNE" /></div>
                                    <div class="col-auto"><img src="{{asset('img/home/SKAL.jpg')}}" width="50" title="SKAL" /></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-sm-12 mt-24">
                                <h5 class="text-16 fw-500 mb-5 text-warning-2">Follow Us</h5>
                                <div class="d-flex x-gap-20 items-center">
                                    <a href="https://www.facebook.com/RovingStepsPvtLtd?mibextid=LQQJ4d" target="_blank">
                                        <i class="icon-facebook text-white text-30"></i>
                                    </a>
                                    <a href="https://instagram.com/roving_steps?igshid=OGQ5ZDc2ODk2ZA==" target="_blank">
                                        <i class="icon-instagram text-white text-30"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 pt-20">
                                <div class="d-flex items-center text-white"> © {{date('Y')}} | {{config('app.name')}}. All Rights Reserved </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>