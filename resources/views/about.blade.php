@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>
	.list-ticks li {
	    width: 100% !important;
	    text-indent: -30px;
	    margin-left: 30px;
	}
</style>
@endsection('styles')

<main class="main">
    <section class="section pt-90 pb-50 banner-about">
        <div class="container text-left w-75">
            <span class="btn btn-tag wow animate__animated animate__fadeInUp font-sm-bold mb-10" data-wow-delay=".0s">WHO WE ARE</span>
            <h6 class="color-brand-1 mb-15">Founded in 1956, Kirtane & Pandit offers six decades of quality assurance, value-added services, and a solution-driven system for all our clients. Our approach is highly client centric and our clean track record all these years speaks for itself.</h6>

			<h6 class="color-brand-1 mb-15">Kirtane and Pandit endeavour to provide sound financial solutions and guidance to their clients. An institution of professionally authorized chartered accountants and financial advisors who are committed to strengthening the significance and optimizing the quality of deliverables while maintaining its goal of deep ethical commitment and professional responsibility.</h6>

			<h6 class="color-brand-1 mb-15">A well-defined team of 25 full-time partners and over 700 Audit professionals comprising CA's, CPA's, CIA, BE, Lawyers, FAFD, DISA, CISA, Valuers, Tax consultants etc. Working for a sole purpose - <br/><br/> “Simplifying your Financial Solutions”</h6>
        </div>
    </section>

    <section class="section pt-100 pb-100 bg-4">
        <div class="container">
            <div class="box-story box-story-1 mb-0">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="box-info-video">
                            <div class="img-reveal">
                                <img class="d-block" src="assets/imgs/page/homepage2/img-marketing.png" alt="iori">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="box-info-video mt-30 mb-30">
                            <span class="btn btn-tag wow animate__animated animate__fadeIn" data-wow-delay=".0s">OUR STORY</span>
                            <h3 class="color-brand-1 mt-10 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Empowering Enterprises to Succeed in a Challenging World</h3>
                            <p class="font-md color-grey-400 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Led by over 700+ employees across the globe, Kirtane & Pandit provides qualified services in the areas of Assurance, Audits, Tax Advisory, Accounting, Forensic Audits, Risk Management Systems, and more. Kirtane & Pandit continuously endeavours to identify and develop new areas of services to assist enterprises to succeed in today’s challenging environment.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-story box-story-2 mt-20">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="box-info-video mt-30 mb-30">
                            <h3 class="color-brand-1 mt-10 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Endorsed by Regulatory & Accounting Bodies for Excellence</h3>
                            <ul class="list-ticks">
			                    <li>
			                      <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
			                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
			                      </svg>Regulatory & Accounting bodies endorsement
			                    </li>
			                    <li>
			                      <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
			                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
			                      </svg>A PCAOB registered firm
			                    </li>
			                    <li>
			                      <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
			                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
			                      </svg>Valid ICAI Peer Review Board Certificate
			                    </li>
			                    <li>
			                      <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
			                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
			                      </svg>KP features in the ‘A’ Category firm list published by RBI.
			                    </li>
			                    <li>
			                      <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
			                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
			                      </svg>Empanelled with IBA as Forensic Auditors for conducting Forensic Audit
			                    </li>
			                    <li>
			                      <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
			                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
			                      </svg>Empanelled with IBA as Agency for Specialized Monitoring (ASM)
			                    </li>
			                    <li>
			                      <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
			                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
			                      </svg>Empanelled with Official Liquidators, High Court, Mumbai
			                    </li>
			                    <li>
			                      <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
			                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
			                      </svg>Empanelled with Government of Maharashtra, Home Dept. as Forensic Auditor
			                    </li>
			                    <li>
			                      <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
			                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
			                      </svg>ESG and sustainability advisory and reporting- Representation on Sustainability Reporting Standards Board of the ICAI
			                    </li>
			                  </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="box-info-video">
                            <div class="img-reveal">
	                            <img class="d-block" src="assets/imgs/page/homepage2/img-marketing.png" alt="iori">
	                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section mt-90 pb-50 bg-core-value">
        <div class="container">
            <div class="row box-list-core-value mt-0">
                <div class="col-lg-4 mb-70">
                    <div class="box-core-value">
                        <div class="shape-left shape-1"></div>
                        <h3 class="color-brand-1 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s">Core Values</h3>
                        <p class="font-md color-grey-400 wow animate__animated animate__fadeIn" data-wow-delay=".0s">We break down barriers so teams can focus on what matters – working together to create products their customers love.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ul class="list-core-value">
                        <li class="wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                            <span class="ticked"></span>
                            <h5 class="color-brand-1 mb-5">Honesty and Integrity</h5>
                            <div class="box-border-dashed">
                                <p class="font-md color-grey-500 mb-20">Our company exists to help merchants sell more. We make every decision and measure every outcome based on how well it serves our customers.</p>
                            </div>
                        </li>
                        <li class="wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                            <span class="ticked"></span>
                            <h5 class="color-brand-1 mb-5">Professional Transparency</h5>
                            <div class="box-border-dashed">
                                <p class="font-md color-grey-500 mb-20">We’re honest, transparent and committed to doing what’s best for our customers and our company. We openly collaborate in pursuit of the truth.</p>
                            </div>
                        </li>
                        <li class="wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                            <span class="ticked"></span>
                            <h5 class="color-brand-1 mb-5">Excellence, Efficiency and Economy</h5>
                            <div class="box-border-dashed">
                                <p class="font-md color-grey-500 mb-20">Our company exists to help merchants sell more. We make every decision and measure every outcome based on how well it serves our customers.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <ul class="list-core-value">
                        <li class="wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                            <span class="ticked"></span>
                            <h5 class="color-brand-1 mb-5">Ethics and Confidentiality</h5>
                            <div class="box-border-dashed">
                                <p class="font-md color-grey-500 mb-20">Being the world's leading commerce platform requires unrivaled vision, innovation and execution. We never settle.</p>
                            </div>
                        </li>
                        <li class="wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                            <span class="ticked"></span>
                            <h5 class="color-brand-1 mb-5">Realibility and Competency</h5>
                            <div class="box-border-dashed">
                                <p class="font-md color-grey-500 mb-20">Integrity is the foundation for everything we do. We are admired and respected for our commitment to honesty, trust, and transparency.</p>
                            </div>
                        </li>
                        <li class="wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                            <span class="ticked"></span>
                            <h5 class="color-brand-1 mb-5">Objectivity and Best Practices</h5>
                            <div class="box-border-dashed">
                                <p class="font-md color-grey-500 mb-20">We’ve created a positive and inclusive culture that fosters open, honest, and meaningful relationships.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section mt-20 pt-50 pb-90">
	    <div class="container">
	        <div class="bg-brand-1 box-cover-video">
	            <div class="row align-items-center py-5">
	                <div class="col-xl-6 col-lg-6">
	                    <div class="box-info-video border-end">
	                        <span class="btn btn-tag wow animate__animated animate__fadeInUp" data-wow-delay=".0s">OUR VISION</span>
	                        <h5 class="color-brand-2 mt-10 mb-15 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Providing value to our clients with a deep sense of ethical commitment and quality deliverables.</h5>
	                    </div>
	                </div>
	                <div class="col-xl-6 col-lg-6">
	                    <div class="box-info-video">
	                        <span class="btn btn-tag wow animate__animated animate__fadeInUp" data-wow-delay=".0s">OUR MISSION</span>
	                        <h5 class="color-brand-2 mt-10 mb-15 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">To define leadership through valuable client services, ethical exercises and professional knowledge in the defined geographical regions in years of commitment and accountability.</h5>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

</main>

@endsection('content')