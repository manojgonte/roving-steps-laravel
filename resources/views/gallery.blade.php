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
                        @if(count($photos) >1)
                        @foreach($photos as $photo)
                        <div class="col-lg-3 col-sm-6">
                            <a href="#" class="blogCard -type-1 d-block ">
                                <div class="blogCard__image">
                                    <div class="ratio ratio-4:3 rounded-8">
                                        <img class="img-ratio js-lazy" src="#" data-src="{{asset('img/gallery/'.$photo->image)}}"
                                            alt="image">
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        @else
                        <div>No photos available</div>
                        @endif
                    </div>

                    <div class="mt-2 d-flex justify-content-center">
                        {{ $photos->links("pagination::bootstrap-4") }}
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

@endsection('content')