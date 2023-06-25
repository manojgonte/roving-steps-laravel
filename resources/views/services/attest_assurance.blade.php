@extends('layouts/frontLayout/front_design')
@section('content')

<main class="main">
    <section class="section banner-contact bg-services bg-10">
        <div class="container">
            <div class="banner-1 position-relative">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="breadcrumbs">
                            <ul>
                                <li>
                                    <a href="{{url('/')}}">
                                        <svg class="w-6 h-6 icon-16" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                        </svg>
                                        Home 
                                    </a>
                                </li>
                                <li>
                                    <a>Services</a>
                                </li>
                                <li>
                                    <a>Audit & Assurance</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="color-brand-1 mb-20 mt-10 wow animate__animated animate__fadeIn" data-wow-delay=".2s">Attest & Assurance</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section pt-40 content-term">
        <div class="container">
            <div class="content-main mt-50">
                <div class="row mt-70 mb-30">
                    <div class="col-lg-1 col-md-1"></div>
                    <div class="col-lg-3 col-md-3">
                        <h5 class="color-brand-1 mb-15 border-bottom color-brand-1 mb-15 pb-10 pt-0">Audit & Assurance</h5>
                        <ul class="list-terms list-style-none">
                            <li class="active">
                                <a href="#limitation">Attest & Assurance</a>
                            </li>
                            <li>
                                <a href="#licensing">IND - AS, I GAAP, IFRS Advisory</a>
                            </li>
                            <li>
                                <a href="#product">PInternal Audit & Risk Management Services</a>
                            </li>
                            <li>
                                <a href="#delivery">IFC Advisory </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <p class="font-md color-grey-500 mb-30">In an ever-evolving audit and assurance function, we have been constantly ensuring high quality, independent financial statement audits for our clients. We also strive to unlock valuable insights and solutions based on an in-depth understanding of an organization’s business and industry, regulatory framework applicable to the organisation and innovative audit methodologies and procedures. Our team includes experienced and professional chartered accountants and other professionals. Our team members carry formal certifications in relevant service areas. Our engagement team comprises an optimum mix of senior resources and subject matter experts.</p>

                        <h6 class="color-brand-1 font-md-bold">Spectrum of our Audit & Assurance Services include:</h6>
                        <ul class="list-number">
                            <li>
                                <a>Attest Services – Statutory Audits</a>
                            </li>
                            <li>
                                <a>Attest Services – Audits under the Income Tax Act, 1961</a>
                            </li>
                            <li>
                                <a>Annual Reviews of statements of US GAAP / IFRS adjustments</a>
                            </li>
                            <li>
                                <a>Advisory and Implementation Support for transition to Ind AS, IFRS, US GAAP </a>
                            </li>
                            <li>
                                <a>Due Diligence & Valuation Services</a>
                            </li>
                        </ul>


                        <h6 class="color-brand-1 font-md-bold mt-30">We endeavour to achieve high standards of audit by:</h6>
                        <ul class="list-number">
                            <li>
                                <a>Carefully studying and planning the audit assignment to surpass client expectations</a>
                            </li>
                            <li>
                                <a>Effectively Managing an engagement</a>
                            </li>
                            <li>
                                <a>Continuous and effective communication with client </a>
                            </li>
                            <li>
                                <a>Adopting solution-oriented approach during audit</a>
                            </li>
                            <li>
                                <a>Advising client on mitigation of compliance and operational risks</a>
                            </li>
                            <li>
                                <a>Deploying Kirtane & Pandit – Value Analytics which is our in-house designed CAAT </a>
                            </li>
                            <li>
                                <a>Providing value adding services to clients</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection('content')