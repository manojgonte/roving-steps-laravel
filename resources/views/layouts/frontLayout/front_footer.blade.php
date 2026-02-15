<!-- newsletter -->
<section class="layout-pt-md layout-pb-md bg-dark-2">
    <div class="container">
        <div class="row y-gap-30 justify-between items-center">
            <div class="col-auto">
                <div class="row y-gap-20  flex-wrap items-center">
                    <div class="col-auto">
                        <div class="icon-newsletter text-60 sm:text-40 text-white"></div>
                    </div>
                    <div class="col-auto">
                        <h4 class="text-26 text-white fw-600">Your Travel Journey Starts Here</h4>
                        <div class="text-white">Subscibe and we'll send the best deals to you</div>
                    </div>
                </div>
            </div>
            <div class="col-auto">
                <form id="subscribe" method="POST">
                    <div class="single-field -w-410 d-flex x-gap-10 y-gap-20">
                        <div>
                            <input class="bg-white h-60" type="email" name="email" placeholder="Your Email" required>
                        </div>
                        <div>
                            <button class="button -md h-60 bg-white text-black" type="submit">Subscribe</button>
                        </div>
                    </div>
                    <small class="text-white d-none">You are already subscibed to newsletter</small>
                    <div id="sub-alert" class="text-white d-none" role="alert"></div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer class="footer -type-3 text-white bg-dark-1">
    <div class="container">
        <div class="py-60 pb-60">
            <div class="bg-white border-light justify-between rounded-4 row text-dark-3 xl:justify-start y-gap-40 px-30 py-30">
                <div class="col-xl-2 col-lg-2 col-sm-6">
                    <h5 class="text-16 fw-500 mb-30">COMPANY</h5>
                    <div class="d-flex y-gap-10 flex-column">
                        <a href="{{ url('about-us') }}">About Us</a>
                        <a href="{{ url('blogs') }}">Blogs</a>
                        <a href="{{ url('gallery') }}">Gallery</a>
                        <a href="{{ url('contact-us') }}">Contact Us</a>
                        <a href="{{ url('terms-of-use') }}">Terms Of Use</a>
                        <a href="{{ url('refund-policy') }}">Refund Policy</a>
                        <a href="{{ url('privacy-policy') }}">Privacy Policy</a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6 border-left-light">
                    <h5 class="text-16 fw-500 mb-30">TOURS BY CATEGORY</h5>
                    <div class="d-flex y-gap-10 flex-column">
                        <a href="#">Romantic</a>
                        <a href="#">Festivals and Events</a>
                        <a href="#">Weekend</a>
                        <a href="#">Heritage</a>
                        <a href="#">Hill Station</a>
                        <a href="#">Religious</a>
                        <a href="#">Cruise</a>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-6 border-left-light">
                    <h5 class="text-16 fw-500 mb-30">PACKAGES</h5>
                    <div class="d-flex y-gap-10 flex-column">
                        <a href="{{ url('tours?type=Domestic') }}">Domestic Packages</a>
                        <a href="{{ url('tours?type=International') }}">International Packages</a>
                    </div>
                    <h5 class="text-16 fw-500 py-30">ASSOCIATED WITH</h5>
                    <div class="d-grid y-gap-10 flex-column" style="grid-template-columns: repeat(2, 1fr);">
                        <img src="{{asset('img/home/TAAI.jpg')}}" width="50" title="TRAVEL AGENTS ASSOCIATION OF INDIA">
                        <img src="{{asset('img/home/TAFI.png')}}" width="90" title="TRAVEL AGENTS FEDERATION OF INDIA">
                        <img src="{{asset('img/home/TAAP.jpg')}}" width="50" title="TRAVEL AGENTS ASSOCIATION OF PUNE">
                        <img src="{{asset('img/home/SKAL.jpg')}}" width="50" title="SKAL">
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-6 border-left-light">
                    <h5 class="text-16 fw-500 mb-30">CONNECT WITH US</h5>
                    <div class="mt-30">
                        <div class="text-14"><i class="fa fa-map-signs"></i> OFFICE ADDRESS</div>
                        <h6 class="text-15 fw-500 mt-5">Sr. No. 31, 1st floor, Gosavi Building, Kundan Nagar, Dhankawadi, Pune - 411043</h6>
                    </div>
                    <div class="mt-15">
                        <div class="text-14"><i class="fa fa-phone"></i> CALL US AT</div>
                        <div><a href="tel:+918600321645" class="text-15 fw-600 mt-5">+91 8600321645</a></div>
                        <div><a href="tel:+918600031545" class="text-15 fw-600 mt-5">+91 8600031545</a></div>
                    </div>
                    <div class="mt-15">
                        <div class="text-14"><i class="fa fa-envelope"></i> MAIL US AT</div>
                        <a href="#" class="text-15 fw-600 mt-5">info@iggloo.co.in</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-logo mb-15">
            <a href="{{url('/')}}" class="logo-link">
                <div class="iggloo-logo white-logo desktop-logo">
                    <img src="{{ asset('img/logo/logo_trans.png') }}" alt="logo" title="" border="0">
                </div>
            </a>
        </div>

        <div class="d-flex justify-content-center x-gap-20 mb-15">
            <a href="https://www.facebook.com/RovingStepsPvtLtd?mibextid=LQQJ4d">
                <i class="icon-facebook text-20"></i>
            </a>
            <a href="https://www.instagram.com/iggloo.co.in?igsh=MWN0b3hidHgwMml1Yg==">
                <i class="icon-instagram text-20"></i>
            </a>
        </div>

        
        <div class="py-20 border-top-white-15">
            <div class="row justify-center items-center y-gap-10">
                <div class="col-auto">
                    <div class="row x-gap-30 y-gap-10">
                        <div class="col-auto">
                            <div class="d-flex items-center"> © {{ date('Y') }} Iggloo. All rights reserved. </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>