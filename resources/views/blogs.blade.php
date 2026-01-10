@extends('layouts/frontLayout/front_design')
@section('content')

<main class="main">
    <section class="section-bg layout-pt-lg layout-pb-lg">
        <div class="section-bg__item col-12">
            <img class="d-block" src="{{asset('img/gallery/image10.jpg')}}" alt="flight-booking">
        </div>

        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <h1 class="text-40 md:text-25 fw-600 text-white text_shadow_property">Blogs</h1>
                </div>
            </div>
        </div>
    </section>

    <section data-anim-wrap class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row y-gap-30 pt-20">
                @foreach($blogs as $blog)
                <div data-anim-child="slide-left delay-1" class="col-lg-4 col-sm-6">
                    <a href="{{ url('/blog/'.$blog->id.'/'.Str::slug($blog->title)) }}" class="blogCard -type-1 d-block">
                        <div class="blogCard__image">
                            <div class="ratio ratio-4:3 rounded-4 rounded-8">
                                <img class="img-ratio js-lazy" src="#" data-src="{{ asset('img/blogs/'.$blog->thumbnail) }}" alt="blog-image">
                            </div>
                        </div>
                        <div class="mt-20">
                            <h4 class="text-dark-1 text-18 fw-500">{{ $blog->title }}</h4>
                            <div class="text-light-1 text-15 lh-14 mt-5">{{ date('M d, Y', strtotime($blog->created_at)) }}</div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="mt-2 d-flex justify-content-center">
                {{ $blogs->links("pagination::bootstrap-4") }}
            </div>
        </div>
    </section>
</main>

@endsection('content')