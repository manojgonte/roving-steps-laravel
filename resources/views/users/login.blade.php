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
	            		<img src="{{asset('img/elements/welcome_back.png')}}" width="200">
		                <div class="py-50 sm:px-20 sm:py-20 ">
	                    	<div class="col-12 mb-10">
                                <h1 class="text-22 fw-500">Sign in to your account</h1>
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
		                	<form action="{{url('sign-in')}}" method="POST">@csrf
			                    <div class="row y-gap-20">
			                        <div class="col-12">
			                            <div class="form-input ">
			                                <input type="text" name="email" required>
			                                <label class="lh-1 text-14 text-light-1">Email *</label>
			                            </div>
			                        </div>
			                        <div class="col-12">
			                            <div class="form-input ">
			                                <input type="password" name="password" required>
			                                <label class="lh-1 text-14 text-light-1">Password *</label>
			                            </div>
			                        </div>
			                        <div class="col-12">
			                            <a href="#" class="text-14 fw-500 text-blue-1 underline">Forgot your password?</a>
			                        </div>
			                        <div class="col-12">
			                            <button type="submit" class="button col-12 py-20 -dark-1 bg-blue-1 text-white"> Sign In <div class="icon-arrow-top-right ml-15"></div>
			                            </button>
			                        </div>
			                    </div>
			                </form>
		                    <div class="row y-gap-10 pt-20">
                                <div class="col-12">
                                    <p class="mt-5">Don't have an account yet? <a href="{{url('sign-up')}}" class="text-blue-1">Sign Up</a></p>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>

    <script src="{{asset('js/vendors.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

</body>
</html>