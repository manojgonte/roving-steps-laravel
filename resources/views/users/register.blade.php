<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@if(!empty($meta_title)){{ $meta_title }} @else {{config('app.name')}} @endif</title>
        @if(!empty($meta_description)) <meta name="description" content="{{ $meta_title }}"> 
        @else <meta name="description" content="{{config('app.name')}}"> @endif
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/logo/favicon.png')}}">

        <!-- Google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{asset('css/vendors.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
    </head>
<body>
    <div class="preloader js-preloader">
        <div class="preloader__wrap">
            <div class="preloader__icon">
                <img src="{{asset('img/logo/globe.png')}}">
            </div>
        </div>
        <div class="preloader__title">{{config('app.name')}}</div>
    </div>

    <main class="bg-triangle">
        <section class="">
            <div class="row" style="min-height: 100vh;">
                <div class="col-xl-5 col-lg-5 col-md-5 justify-content-center d-flex items-center" style="background-image: url({{asset('img/backgrounds/register.jpg')}}); background-size: cover;">
                    <a href="{{url('/')}}">
                        <img src="{{asset('img/logo/Roving-Steps-Logo-white.png')}}" width="250">
                        <p class="text-white">Explore the Huge World and Enjoy it's Beauty</p>
                    </a>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div class="container">
                        <img src="{{asset('img/elements/get_started.png')}}" width="200">
                        <div class="py-20 sm:px-20 sm:py-20 ">
                            {{-- <div class="error-container"></div> --}}
                            <form action="{{url('sign-up')}}" method="POST" id="signUp">@csrf
                                <div class="row y-gap-20">
                                    <div class="col-12">
                                        <h1 class="text-22 fw-500">Create an account</h1>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-input ">
                                            <input type="text" name="name" value="" required>
                                            <label class="lh-1 text-14 text-light-1">Name *</label>
                                        </div>
                                        <div class="error-message"></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-input ">
                                            <input type="text" name="contact" value="" required>
                                            <label class="lh-1 text-14 text-light-1">Contact *</label>
                                        </div>
                                        <div class="error-message"></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-input ">
                                            <input type="email" name="email" value="" required>
                                            <label class="lh-1 text-14 text-light-1">Email *</label>
                                        </div>
                                        <div class="error-message"></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-input ">
                                            <input type="password" name="password" id="password" value="" required>
                                            <label class="lh-1 text-14 text-light-1">Password *</label>
                                        </div>
                                        <div class="error-message"></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-input ">
                                            <input type="password" name="confirm_password" value="" required>
                                            <label class="lh-1 text-14 text-light-1">Confirm Password *</label>
                                        </div>
                                        <div class="error-message"></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex ">
                                            <div class="form-checkbox mt-5">
                                                <input type="checkbox" name="agree_check" checked>
                                                <div class="form-checkbox__mark">
                                                    <div class="form-checkbox__icon icon-check"></div>
                                                </div>
                                            </div>
                                            <div class="text-15 lh-15 text-light-1 ml-10">I agree to <a href="#" class="underline">Terms of Service</a> and <a href="#" class="underline">Privacy Policy</a>.</div>
                                        </div>
                                        <div class="error-message"></div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="button col-12 py-20 -dark-1 bg-blue-1 text-white submit"> Sign Up <div class="icon-arrow-top-right ml-15"></div>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="row y-gap-10 pt-20">
                                <div class="col-12">
                                    <p class="mt-5">Already have an account? <a href="{{url('sign-in')}}" class="text-blue-1">Sign In</a></p>
                                </div>
                                {{-- <div class="col-12">
                                    <div class="text-center">or sign in with</div>
                                    <button class="button col-12 -outline-blue-1 text-blue-1 py-15 rounded-8 mt-10">
                                        <i class="icon-apple text-15 mr-10"></i> Facebook </button>
                                    <button class="button col-12 -outline-red-1 text-red-1 py-15 rounded-8 mt-15">
                                        <i class="icon-apple text-15 mr-10"></i> Google </button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- JavaScript -->

    <script src="{{asset('js/vendors.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

    <script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend_js/jquery.validate.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#signUp').validate({
                ignore: [],
                debug: false,
                rules: {
                    name: {
                        required: true,
                        maxlength:40,
                    },
                    contact: {
                        required: true,
                        number:true,
                        maxlength:10,
                        minlength:10,
                    },
                    email: {
                        required: true,
                        email:true,
                        remote: "{{url('check-user-exist')}}"
                    },
                    password: {
                        required: true,
                        minlength: 6,
                    },
                    confirm_password: {
                        required: true,
                        minlength: 6,
                        equalTo: "#password"
                    },
                    agree_check: {
                        required: true,
                    },
                    
                },
                messages:{
                    name:{ 
                        required: "Please enter name",
                    },
                    contact:{ 
                        required: "Please enter valid contact number",
                        number: "Please enter valid phone number",
                        minlength: "Please enter {0} digit phone number",
                        maxlength: "Please enter {0} digit phone number",
                    },
                    email:{ 
                        required: "Please enter email",
                        email: "Please enter valid email",
                        remote: "Account already exist"
                    },
                    password:{ 
                        required: "Please enter password",
                        minlength: "Please enter more than {0} characters",
                    },
                    confirm_password:{ 
                        required: "Please confirm password",
                        minlength: "Please enter more than {0} characters",
                        equalTo: "Password does not match",
                    },
                    agree_check:{ 
                        required: "Please agree policies checkbox",
                    },
                },
                errorPlacement: function(error, element) {
                    error.appendTo(element.closest('.col-12, .col-6').find('.error-message'));
                },
                submitHandler: function(form) {
                    $(".submit").attr("disabled", true);
                    $(".submit").html("<span class='fa fa-spinner fa-spin'></span> Please wait...");
                    form.submit();
                }
            });
        });
    </script>

</body>
</html>