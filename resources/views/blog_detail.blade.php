@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>
    p span, p {
        font-family: "Jost", sans-serif !important;
        font-size: 16px;
    }
</style>
@endsection('styles')

<main class="main">
    
    <section data-anim="slide-up" class="layout-pt-lg">
        <div class="container">
            <div class="row y-gap-40 justify-center text-center">
                <div class="col-12 col-md-12 col-xl-10">
                    <div class="text-15 fw-500 text-blue-1 mb-8">IGGLOO</div>
                    <h1 class="text-30 fw-600">{{ $blog->title }}</h1>
                    <div class="d-flex justify-center mt-1">
                        <div class="text-15 text-light-1">Uploaded On: <span class="text-dark-1">{{ date('M d, Y', strtotime($blog->created_at)) }}</span></div>
                        <div class="size-3 bg-light-1 rounded-full mx-3 mt-2"></div>
                        <span class="fw-bold">
                            <a class="btn" href="{{url('like-blog/'.$blog->id)}}">
                                @if($liked = App\Models\BlogLike::where(['blog_id'=>$blog->id,'user_ip'=>Request()->ip()])->first())
                                <h6 class="border-blue-1 px-2 rounded-4"><img class="mb-1 text-16" src="{{asset('img/icons/heart-red.svg')}}" width="16" /> <span>Liked @if(count($blog->likes)>0) ({{count($blog->likes)}})@endif</span></h6>
                                @else
                                <h6 class="border-blue-1 px-2 rounded-4"><img class="mb-1 text-16" src="{{asset('img/icons/heart.svg')}}"  width="16" /> <span>Like @if(count($blog->likes)>0) ({{count($blog->likes)}})@endif</span></h6>
                                @endif
                            </a>
                        </span>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-xl-10">
                    <img src="{{ asset('img/blogs/'.$blog->thumbnail) }}" alt="image" class="col-12 rounded-8">
                </div>
            </div>
        </div>
    </section>

    <section data-anim="slide-up" class="layout-pt-md layout-pb-md">
        <div class="container">
            <div class="row y-gap-30 justify-center">
                <div class="col-xl-10 col-lg-10 col-12">
                    <p>{!! nl2br($blog->blog_content) !!}</p>
                </div>
            </div>
        </div>
    </section>

  </main>

@endsection('content')