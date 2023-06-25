@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>
	.sticky {
	  	position: sticky;
	  	top: 0;
	}

	.scrollable {
	  	overflow-y: scroll;
	  	max-height:70vh;
	}

	.scrollable::-webkit-scrollbar {
	  width: 0.5em;
	  background-color: #F5F5F5;
	}

	.scrollable::-webkit-scrollbar-thumb {
	  background-color: #000000;
	}

	/* Hide the scroll bar for Firefox */
	.scrollable {
	  scrollbar-width: thin;
	  scrollbar-color: #000000 #F5F5F5;
	}

	.scrollable::-webkit-scrollbar-track {
	  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.1);
	  background-color: #F5F5F5;
	}

	.scrollable::-webkit-scrollbar {
	  width: 6px;
	  background-color: #F5F5F5;
	}

	.scrollable::-webkit-scrollbar-thumb {
	  background-color: #013556;
	}
</style>
@endsection('styles')

<main class="main">
	<section class="section pt-0 pb-50 bg-core-value bg-grey-60">
	    <div class="container">
	        <div class="row box-list-core-value mt-70">
	            <div class="col-lg-4 mb-70 sticky">
	                <div class="box-core-value">
	                    <div class="shape-left shape-1"></div>
	                    <h3 class="color-brand-1 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Industry Spread</h3>
	                    <p class="font-md color-grey-400 wow animate__animated animate__fadeIn" data-wow-delay=".2s">We break down barriers so teams can focus on what matters – working together to create products their customers love.</p>
	                </div>
	            </div>
	            <div class="col-lg-8 scrollable">
	        		<div class="row pt-20">
	                    <div class="col-md-4">
	                        <div class="card-offer card-we-do hover-up align-items-center">
			                	<div class="card-image mb-0">
			                		<img src="assets/imgs/template/icons/we-do3.png" alt="">
			                	</div>
		                		<div class="card-info">
		                  			<h6 class="font-md-bold"><a class="color-brand-1">Auto Ancillary</a></h6>
	                			</div>
	              			</div>
	                    </div>
	                    <div class="col-md-4">
	                        <div class="card-offer card-we-do hover-up align-items-center">
			                	<div class="card-image mb-0">
			                		<img src="assets/imgs/template/icons/we-do3.png" alt="">
			                	</div>
		                		<div class="card-info">
		                  			<h6 class="font-md-bold"><a class="color-brand-1">Auto OEM</a></h6>
	                			</div>
	              			</div>
	                    </div>
	                    <div class="col-md-4">
	                        <div class="card-offer card-we-do hover-up align-items-center">
			                	<div class="card-image mb-0">
			                		<img src="assets/imgs/template/icons/we-do3.png" alt="">
			                	</div>
		                		<div class="card-info">
		                  			<h6 class="font-md-bold"><a class="color-brand-1">Transport And Logistics</a></h6>
	                			</div>
	              			</div>
	                    </div>
	                    <div class="col-md-4">
	                        <div class="card-offer card-we-do hover-up align-items-center">
			                	<div class="card-image mb-0">
			                		<img src="assets/imgs/template/icons/we-do3.png" alt="">
			                	</div>
		                		<div class="card-info">
		                  			<h6 class="font-md-bold"><a class="color-brand-1">Pumps</a></h6>
	                			</div>
	              			</div>
	                    </div>
	                    <div class="col-md-4">
	                        <div class="card-offer card-we-do hover-up align-items-center">
			                	<div class="card-image mb-0">
			                		<img src="assets/imgs/template/icons/we-do3.png" alt="">
			                	</div>
		                		<div class="card-info">
		                  			<h6 class="font-md-bold"><a class="color-brand-1">Welding Equipments & Accessories</a></h6>
	                			</div>
	              			</div>
	                    </div>
	                    <div class="col-md-4">
	                        <div class="card-offer card-we-do hover-up align-items-center">
			                	<div class="card-image mb-0">
			                		<img src="assets/imgs/template/icons/we-do3.png" alt="">
			                	</div>
		                		<div class="card-info">
		                  			<h6 class="font-md-bold"><a class="color-brand-1">Information Technology</a></h6>
	                			</div>
	              			</div>
	                    </div>

	                    <div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Construction</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Trading</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Biotech</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Agri Trading</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Surgical Equipments</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Paints & Chemicals</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Real Estate Developer</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Mould & Moulding Parts</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Lift Accessories</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Intermediary Stock & Funds</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Heat Treatment</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Consulting</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Poultry</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Insurance</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Fintech</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Healthcare</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Government Autonomous Bodies</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Educational Institutions</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Windmill Manufacturer</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">CRO – Contract Research Organisation</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Plastic Master-Batch Manufacturing</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Farmers Producer</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Manpower Supply</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Chemicals</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Sugar</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Agri Trading</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Auto Ancillary</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Auto OEM</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Banking</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Biotech</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Chemicals</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Co-Op Society</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Construction</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Contract Research Organisation (CRO)</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Dairy</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Educational Institutions</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Elevators & Conveyors</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Engineering</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Family Trust</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Farmer Producer Company (FPC)</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Fintech</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">FMCG</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Food</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Goverment Autonomous Bodies</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Healthcare</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Heat Treatments</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Hospitality</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Infrastructure</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Insurance</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Intermediary Stock & Funds</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">IT & Ites</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Manpower Supply</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Mining</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Mould & Moulding Parts</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">NGO</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Paints & Chemical</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Pharma</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Poultry</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Pumps</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Ready To Cook</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Real Estate Developer</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Sugar</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Surgical Equipments</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Switchgear</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Telecom</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Trading</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Telecom</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Welding Equipments & Accessories</a></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						    <div class="card-offer card-we-do hover-up align-items-center">
						    	<div class="card-image mb-0">
						    		<img src="assets/imgs/template/icons/we-do3.png" alt="">
						    	</div>
								<div class="card-info">
						  			<h6 class="font-md-bold"><a class="color-brand-1">Windmill Manufactures</a></h6>
								</div>
							</div>
						</div>

	            	</div>
	            </div>
	        </div>
	    </div>
	</section>
</main>

@endsection('content')