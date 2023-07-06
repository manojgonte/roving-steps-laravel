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
	            <div class="col-xl-5 col-lg-5 col-md-6 itemc-center d-flex">
	            	<div class="container">
	            		<img src="{{asset('img/elements/get_started.png')}}" width="200">
		                <div class="py-50 sm:px-20 sm:py-20 ">
	                    	<div class="col-12 mb-10">
                                <h1 class="text-22 fw-500">Forgot Password?</h1>
                            </div>
		                	@if(Session::has('flash_message_error'))
				            <div class="bg-red-2 text-white p-1 mb-15 px-15">
				                <span>{!! session('flash_message_error') !!}</span>
				            </div>
				            @endif
				            @if(Session::has('flash_message_success'))
				            <div class="bg-green-2 text-white p-1 mb-15 px-15">
				                <span>{!! session('flash_message_success') !!}</span>
				            </div>
				            @endif
		                	<form action="{{url('forgot-password')}}" method="POST" id="signIn">@csrf
			                    <div class="row y-gap-20">
			                        <div class="col-12">
			                            <div class="form-input ">
			                                <input type="text" name="email" required>
			                                <label class="lh-1 text-14 text-light-1">Email *</label>
			                            </div>
                                        <div class="error-message"></div>
			                        </div>
			                        <div class="col-12">
			                            <button type="submit" class="button col-12 py-20 -dark-1 bg-blue-1 text-white submit"> Submit <div class="icon-arrow-right ml-15"></div>
			                            </button>
			                        </div>
			                    </div>
			                </form>
		                    <div class="row y-gap-10 pt-20">
                                <div class="col-12">
                                    <p class="mt-5"><i class="fa fa-arrow-left"></i> Go to <a href="{{url('sign-up')}}" class="text-blue-1">Sign In</a> Page</p>
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
            $('#signIn').validate({
                ignore: [],
                debug: false,
                rules: {
                    email: {
                        required: true,
                        email:true,
                    },
                },
                messages:{
                    email:{ 
                        required: "Please enter email",
                        email: "Please enter valid email",
                    },
                },
                errorPlacement: function(error, element) {
                    error.appendTo(element.closest('.col-12, .col-6').find('.error-message'));
                },
                submitHandler: function(form) {
                    $(".submit").attr("disabled", true);
                    $(".submit").html("<span class='fa fa-spinner fa-spin'></span>&nbsp; Please wait...");
                    form.submit();
                }
            });
        });
    </script>
</body>
</html>