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
    <section class="section-bg layout-pt-lg layout-pb-lg">
        <div class="section-bg__item col-12">
            <img class="d-block" src="{{asset('img/gallery/image10.jpg')}}" alt="flight-booking">
        </div>

        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <h1 class="text-40 md:text-25 fw-600 text-white text_shadow_property">Gallery</h1>
                </div>
            </div>
        </div>
    </section>

    <section data-anim-wrap class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="tabs__content pt-30 js-tabs-content">

                <div class="tabs__pane -tab-item-1 is-tab-el-active">
                    <div class="row y-gap-30">
                        <div class="col-lg-4 col-sm-6">
                            <a href="#" class="blogCard -type-1 d-block ">
                                <div class="blogCard__image">
                                    <div class="ratio ratio-4:3 rounded-8">
                                        <img class="img-ratio js-lazy" src="#" data-src="img/gallery/image1.jpg"
                                            alt="image">
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <a href="#" class="blogCard -type-1 d-block ">
                                <div class="blogCard__image">
                                    <div class="ratio ratio-4:3 rounded-8">
                                        <img class="img-ratio js-lazy" src="#" data-src="img/gallery/image2.jpg"
                                            alt="image">
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <a href="#" class="blogCard -type-1 d-block ">
                                <div class="blogCard__image">
                                    <div class="ratio ratio-4:3 rounded-8">
                                        <img class="img-ratio js-lazy" src="#" data-src="img/gallery/image3.jpg"
                                            alt="image">
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <a href="#" class="blogCard -type-1 d-block ">
                                <div class="blogCard__image">
                                    <div class="ratio ratio-4:3 rounded-8">
                                        <img class="img-ratio js-lazy" src="#" data-src="img/gallery/image4.jpg"
                                            alt="image">
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <a href="#" class="blogCard -type-1 d-block ">
                                <div class="blogCard__image">
                                    <div class="ratio ratio-4:3 rounded-8">
                                        <img class="img-ratio js-lazy" src="#" data-src="img/gallery/image5.jpg"
                                            alt="image">
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <a href="#" class="blogCard -type-1 d-block ">
                                <div class="blogCard__image">
                                    <div class="ratio ratio-4:3 rounded-8">
                                        <img class="img-ratio js-lazy" src="#" data-src="img/gallery/image6.jpg"
                                            alt="image">
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <a href="#" class="blogCard -type-1 d-block ">
                                <div class="blogCard__image">
                                    <div class="ratio ratio-4:3 rounded-8">
                                        <img class="img-ratio js-lazy" src="#" data-src="img/gallery/image7.jpg"
                                            alt="image">
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <a href="#" class="blogCard -type-1 d-block ">
                                <div class="blogCard__image">
                                    <div class="ratio ratio-4:3 rounded-8">
                                        <img class="img-ratio js-lazy" src="#" data-src="img/gallery/image8.jpg"
                                            alt="image">
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <a href="#" class="blogCard -type-1 d-block ">
                                <div class="blogCard__image">
                                    <div class="ratio ratio-4:3 rounded-8">
                                        <img class="img-ratio js-lazy" src="#" data-src="img/gallery/image9.jpg"
                                            alt="image">
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                    {{-- <div class="border-top-light mt-30 pt-30">
                        <div class="row x-gap-10 y-gap-20 justify-between md:justify-center">
                            <div class="col-auto md:order-1">
                                <button class="button -blue-1 size-40 rounded-full border-light">
                                    <i class="icon-chevron-left text-12"></i>
                                </button>
                            </div>

                            <div class="col-md-auto md:order-3">
                                <div class="row x-gap-20 y-gap-20 items-center md:d-none">

                                    <div class="col-auto">

                                        <div class="size-40 flex-center rounded-full">1</div>

                                    </div>

                                    <div class="col-auto">

                                        <div class="size-40 flex-center rounded-full bg-dark-1 text-white">2</div>

                                    </div>

                                    <div class="col-auto">

                                        <div class="size-40 flex-center rounded-full">3</div>

                                    </div>

                                    <div class="col-auto">

                                        <div class="size-40 flex-center rounded-full bg-light-2">4</div>

                                    </div>

                                    <div class="col-auto">

                                        <div class="size-40 flex-center rounded-full">5</div>

                                    </div>

                                    <div class="col-auto">

                                        <div class="size-40 flex-center rounded-full">...</div>

                                    </div>

                                    <div class="col-auto">

                                        <div class="size-40 flex-center rounded-full">20</div>

                                    </div>

                                </div>

                                <div class="row x-gap-10 y-gap-20 justify-center items-center d-none md:d-flex">

                                    <div class="col-auto">

                                        <div class="size-40 flex-center rounded-full">1</div>

                                    </div>

                                    <div class="col-auto">

                                        <div class="size-40 flex-center rounded-full bg-dark-1 text-white">2</div>

                                    </div>

                                    <div class="col-auto">

                                        <div class="size-40 flex-center rounded-full">3</div>

                                    </div>

                                </div>

                                <div class="text-center mt-30 md:mt-10">
                                    <div class="text-14 text-light-1">1 – 20 of 300+ properties found</div>
                                </div>
                            </div>

                            <div class="col-auto md:order-2">
                                <button class="button -blue-1 size-40 rounded-full border-light">
                                    <i class="icon-chevron-right text-12"></i>
                                </button>
                            </div>
                        </div>
                    </div> --}}
                </div>

            </div>
        </div>
    </section>
</main>

@endsection('content')