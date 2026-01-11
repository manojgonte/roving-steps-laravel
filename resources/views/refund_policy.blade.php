@extends('layouts/frontLayout/front_design')
@section('content')

<main class="main">
    <section class="section-bg layout-pt-lg layout-pb-lg">
        <div class="section-bg__item col-12">
            <img src="img/pages/about/1.png" alt="image">
        </div>

        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <h1 class="text-40 md:text-25 fw-600 text-white">Refund Policy</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
        <div class="container">
        	<div class="row">
	          	<div class="col-md-3 col-xl-3 col-xl-3 col-12">
	              <div class="px-30 py-30 rounded-4 border-light">
	                <div class="tabs__controls row y-gap-10 js-tabs-controls">
	                  	<div class="col-12">
	                    	<a href="{{ url('terms-of-use') }}" class="tabs__button js-tabs-button">Terms of Use</a>
	                  	</div>
	                  	<div class="col-12">
	                   		<a href="{{ url('refund-policy') }}" class="tabs__button js-tabs-button fw-600">Refund Policy</a>
	                  	</div>
	                  	<div class="col-12">
	                    	<a href="{{ url('privacy-policy') }}" class="tabs__button js-tabs-button">Privacy Policy</a>
	                  	</div>
	                </div>
	              </div>
	            </div>
	          	<div class="col-md-9 col-xl-9 col-xl-9 col-12">
		            <div class="text-20 fw-500 mb-10">Refund Policy</div> <hr>
		            <p>At <b>Roving Steps Pvt. Ltd.</b>, we aim to provide a seamless travel booking experience. However, we understand that plans can change, and refunds may be necessary. This Refund Policy outlines the terms and conditions for refunds on bookings made through our platform.</p>
		            <ul class="y-gap-15 py-20">
		              	<li>1. General Refund Policy 
		              		<p>Refund eligibility is subject to the terms and conditions of the respective service providers (e.g., airlines, hotels, tour operators).</p>
							<p>Refund requests must be submitted through our customer support team at lalit@rovingsteps.com.</p>
							<p>Processing times for refunds may vary depending on the service provider and payment method.</p>
		              	</li>
		              	<li>2. Cancellations by Customers
		              		<p>Customers must review the cancellation and refund policies of the specific service provider before making a booking.</p>
		              		<p>Some bookings may be non-refundable or subject to cancellation fees.</p>
		              		<p>Refund amounts will be calculated based on the provider's cancellation terms.</p>
		              	</li>
		              	<li>3. Cancellations by Service Providers 
		              		<p>If a booking is canceled by the service provider (e.g., flight cancellation, hotel closure), customers are entitled to a refund or alternative arrangements as per the provider's policy.</p>
		              		<p>Roving Steps Pvt Ltd will assist in facilitating the refund process.</p>
		              	</li>
		              	<li>4. Refund Processing Time 
		              		<p>Refunds may take 7-14 business days to reflect in your original payment method.</p>
		              		<p>Delays in refund processing may occur due to bank or payment gateway policies.</p>
		              	</li>
		              	<li>5. Non-Refundable Scenarios 
		              		<p>No-shows or failure to meet check-in requirements.</p>
		              		<p>Partially used services (e.g., partially completed tours, hotel stays).</p>
		              		<p>Any non-refundable bookings explicitly mentioned at the time of purchase.</p>
		              	</li>
		              	<li>6. Refund Method 
		              		<p>Refunds will be processed using the original payment method.</p>
		              		<p>In cases where refunds cannot be processed to the original payment method, alternative arrangements will be discussed with the customer.</p>
		              	</li>
		              	<li>7. Contact Us 
		              		<p>For any refund-related inquiries, please contact our support team at lalit@rovingsteps.com</p>
		              	</li>
		              	<li>By using our website and services, you agree to the terms outlined in this Refund Policy.</li>
		            </ul>
	          	</div>
	        </div>
        </div>
    </section>
</main>

@endsection('content')