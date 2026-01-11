@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')

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
        <div class="row d-flex x-gap-80 y-gap-20 justify-between">
            <div class="col-lg-7">
                <div class="text-30 sm:text-24 fw-600">Keep in touch with us</div>
                <div class="rounded-4">
                    <form action="{{url('tour-enquiry')}}" method="POST" class="contactEnqForm">@csrf
                        <div class="row y-gap-20">
                            <div class="col-3">
                                <div class="form-input">
                                    <select class="form-select" name="prefix" required>
                                      <option value="Mr" selected>Mr</option>
                                      <option value="Mrs">Mrs</option>
                                      <option value="Miss">Miss</option>
                                    </select>
                                    <div class="error-message"></div>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="form-input">
                                    <input type="text" name="name" required>
                                    <label class="lh-1 text-16 text-light-1">Full Name *</label>
                                </div>
                                <div class="error-message"></div>
                            </div>
                            <div class="col-6">
                                <div class="form-input">
                                    <input type="text" name="email" required>
                                    <label class="lh-1 text-16 text-light-1">Email *</label>
                                </div>
                                <div class="error-message"></div>
                            </div>
                            <div class="col-6">
                                <div class="form-input">
                                    <input type="text" name="contact" required>
                                    <label class="lh-1 text-16 text-light-1">Contact</label>
                                </div>
                                <div class="error-message"></div>
                            </div>
                            <div class="col-12">
                                <div class="form-input">
                                    <input type="text" name="address">
                                    <label class="lh-1 text-16 text-light-1">Address</label>
                                </div>
                                <div class="error-message"></div>
                            </div>
                            <div class="col-12">
                                <div class="form-input">
                                    <textarea name="message" rows="2" required></textarea>
                                    <label class="lh-1 text-16 text-light-1">Your Messages *</label>
                                </div>
                                <div class="error-message"></div>
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
                        <div class="text-18 fw-500 mt-5"><i class="fa fa-map-marker-alt"></i> Address</div>
                        <div class="text-15 text-light-1">Sr. No. 31, 1st floor, Gosavi Building, Kundan Nagar,
                            Dhankawadi, Pune - 411043</div>
                    </div>
                    <div class="col-12">
                        <div class="text-18 fw-500 mt-5"><i class="fa fa-phone"></i> Contact</div>
                        <div class="text-15 text-light-1"><a href="tel:918600031545"> +91 8600031545</a></div>
                        <div class="text-15 text-light-1"><a href="tel:918600321645"> +91 8600321645</a></div>
                    </div>
                    <div class="col-12">
                        <div class="text-18 fw-500 mt-5"><i class="fa fa-envelope"></i> Email</div>
                        <div class="text-16 text-light-1"><a href="mailto:info@iggloo.co.in"> info@iggloo.co.in </a></div>
                    </div>
                    <div class="col-auto">
                        <div class="text-18 fw-500 mt-5">Follow us on social media</div>
                        <div class="d-flex x-gap-20 items-center mt-10">
                            <a href="https://www.facebook.com/RovingStepsPvtLtd?mibextid=LQQJ4d" target="_blank">
                                <i class="icon-facebook text-30"></i>
                            </a>
                            <a href="https://instagram.com/roving_steps?igshid=OGQ5ZDc2ODk2ZA==" target="_blank">
                                <i class="icon-instagram text-30"></i>
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
                $(".button").html("<span class='fa fa-spinner fa-spin'></span>&nbsp; Please wait...");
                form.submit();
            }
        });
    });
</script>
@endsection('scripts')

@endsection('content')