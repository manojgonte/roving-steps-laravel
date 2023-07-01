@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>
    .bg-triangle {
        background-image: url('img/elements/app_bg.jpeg');
        background-size: cover;
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
                <h1 class="text-40 md:text-25 fw-600 text-white">Contact Us</h1>
                <div class="text-white mt-15">Your trusted trip companion</div>
            </div>
        </div>
    </div>
</section>

<section class="layout-pt-md layout-pb-lg">
    <div class="container">
        <div class="row d-flex x-gap-80 y-gap-20 justify-between">
            <div class="col-lg-7">
                <div class="text-30 sm:text-24 fw-600">Keep in touch with us</div>
                <div class="rounded-4">
                    <div class="error-container"></div>
                    <form action="{{url('contact-us')}}" method="POST" class="contactEnqForm">@csrf
                        <div class="row y-gap-20">
                            <div class="col-6">
                                <div class="form-input">
                                    <input type="text" name="name" required>
                                    <label class="lh-1 text-16 text-light-1">Full Name *</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-input">
                                    <input type="text" name="email" required>
                                    <label class="lh-1 text-16 text-light-1">Email *</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-input">
                                    <input type="text" name="contact" required>
                                    <label class="lh-1 text-16 text-light-1">Contact</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-input">
                                    <input type="text" name="address">
                                    <label class="lh-1 text-16 text-light-1">Address</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-input">
                                    <textarea name="message" rows="4" required></textarea>
                                    <label class="lh-1 text-16 text-light-1">Your Messages</label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="button px-24 h-50 -dark-1 bg-warning-2 text-white">
                                    Send a Messsage <div class="icon-arrow-top-right ml-15"></div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="text-30 sm:text-24 fw-600">Contact Us</div>
                <div class="row d-flex x-gap-80 y-gap-20">
                    <div class="col-12">
                        <div class="text-18 fw-500 mt-5">Address</div>
                        <div class="text-14 text-light-1">Sr. No. 31, 1st floor, Gosavi Building, Kundan Nagar,
                            Dhankawadi, Pune - 411043</div>
                    </div>
                    <div class="col-12">
                        <div class="text-18 fw-500 mt-5">Contact</div>
                        <div class="text-14 text-light-1">+91 8600031545</div>
                        <div class="text-14 text-light-1">+91 8600321645</div>
                    </div>
                    <div class="col-12">
                        <div class="text-18 fw-500 mt-5">Email</div>
                        <div class="text-14 text-light-1">info@rovingsteps.com</div>
                    </div>
                    <div class="col-auto">
                        <div class="text-18 fw-500 mt-5">Follow us on social media</div>
                        <div class="d-flex x-gap-20 items-center mt-10">
                            <a href="#">
                                <i class="icon-facebook text-30"></i>
                            </a>
                            <a href="#">
                                <i class="icon-twitter text-30"></i>
                            </a>
                            <a href="#">
                                <i class="icon-instagram text-30"></i>
                            </a>
                            <a href="#">
                                <i class="icon-linkedin text-30"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('scripts')
<script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script>
<script src="{{asset('backend_js/jquery.validate.js')}}"></script>
<script>
    $(document).ready(function () {
        var container = $('div.error-container');
        $(".contactEnqForm").validate({
            rules:{
                name:{
                    required:true,
                },
                contact:{
                    required:true,
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
                    maxlength:1000,
                },
            },
            messages:{
                name:{ 
                    required: "Please enter name",
                },
                contact:{ 
                    required: "Please enter valid contact number",
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
            errorLabelContainer: $("div.error-container"),
            submitHandler: function(form) {
                $(".button").attr("disabled", true);
                $(".button").html("<span class='fa fa-spinner fa-spin'></span> Please wait...");
                form.submit();
            }
        });
    });
</script>
@endsection('scripts')

@endsection('content')