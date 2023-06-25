@extends('layouts/frontLayout/front_design')
@section('content')

<main class="main">
    <section class="section banner-service bg-grey-60 position-relative">
        <div class="box-banner-abs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-xl-7 col-lg-12">
                        <div class="box-banner-service">
                            <h3 class="color-brand-1 mb-20 wow animate__animated animate__fadeInUp" data-wow-delay=".0s">All the important reports and publications you need to know.</h3>
                            <div class="row">
                                <div class="col-lg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                                    <p class="font-lg color-grey-500">Keep up-to-date with all our latest company news and business content. The latest news, tips and advice to help you run your business with less fuss</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-0">
            <div class="col-xxl-6 col-xl-6 col-lg-6"></div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 pr-0">
                <div class="d-none d-xxl-block pl-70">
                    <div class="img-reveal">
                        <img class="w-100 d-block" src="assets/imgs/page/blog/banner.png" alt="iori">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section mt-80">
        <div class="container">
            <div class="box-list-blogs">
                {{-- <div class="mt-20 mb-30">
                    <h3 class="color-brand-1 title-line-right">Promotions</h3>
                </div> --}}
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-30 item-article customer-stories">
                        <div class="card-blog-grid card-blog-grid-3 hover-up">
                            <div class="card-image">
                                <a href="blog-detail.html">
                                    <img src="assets/imgs/page/blog/img3.png" alt="iori">
                                </a>
                            </div>
                            <div class="card-info">
                                <a href="{{url('blog-detail/')}}">
                                    <h6 class="color-brand-1">10 Content Proofreading Tips to Catch More Avoidable Goofs</h6>
                                </a>
                                <div class="mb-10 mt-10">
                                    <span class="font-xs color-grey-500">November 17, 2022</span>
                                    <span class="font-xs color-grey-500 icon-read">2 min read</span>
                                </div>
                                <p class="font-sm color-grey-500 mt-10">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit laborum — semper quis lectus nulla. Interactively transform magnetic growth strategies whereas prospective &quot;outside the box&quot; thinking.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-30 item-article product-news">
                        <div class="card-blog-grid card-blog-grid-3 hover-up">
                            <div class="card-image">
                                <a href="blog-detail.html">
                                    <img src="assets/imgs/page/blog/img4.png" alt="iori">
                                </a>
                            </div>
                            <div class="card-info">
                                <a href="{{url('blog-detail/')}}">
                                    <h6 class="color-brand-1">Everything a Beginner Blogger Needs to Know for 2023</h6>
                                </a>
                                <div class="mb-10 mt-10">
                                    <span class="font-xs color-grey-500">November 17, 2022</span>
                                    <span class="font-xs color-grey-500 icon-read">2 min read</span>
                                </div>
                                <p class="font-sm color-grey-500 mt-10">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit laborum — semper quis lectus nulla. Interactively transform magnetic growth strategies whereas prospective &quot;outside the box&quot; thinking.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-30 item-article company">
                        <div class="card-blog-grid card-blog-grid-3 hover-up">
                            <div class="card-image">
                                <a href="blog-detail.html">
                                    <img src="assets/imgs/page/blog/img5.png" alt="iori">
                                </a>
                            </div>
                            <div class="card-info">
                                <a href="{{url('blog-detail/')}}">
                                    <h6 class="color-brand-1">Bad Email Marketing and Nickelback Don’t Have Much in Common</h6>
                                </a>
                                <div class="mb-10 mt-10">
                                    <span class="font-xs color-grey-500">November 17, 2022</span>
                                    <span class="font-xs color-grey-500 icon-read">2 min read</span>
                                </div>
                                <p class="font-sm color-grey-500 mt-10">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit laborum — semper quis lectus nulla. Interactively transform magnetic growth strategies whereas prospective &quot;outside the box&quot; thinking.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-30 item-article featured">
                        <div class="card-blog-grid card-blog-grid-3 hover-up">
                            <div class="card-image">
                                <a href="blog-detail.html">
                                    <img src="assets/imgs/page/blog2/img2.png" alt="iori">
                                </a>
                            </div>
                            <div class="card-info">
                                <a href="{{url('blog-detail/')}}">
                                    <h6 class="color-brand-1">7 Copywriting Strategies the Great Copywriters Wish You Knew</h6>
                                </a>
                                <div class="mb-10 mt-10">
                                    <span class="font-xs color-grey-500">November 17, 2022</span>
                                    <span class="font-xs color-grey-500 icon-read">2 min read</span>
                                </div>
                                <p class="font-sm color-grey-500 mt-10">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit laborum — semper quis lectus nulla. Interactively transform magnetic growth strategies whereas prospective &quot;outside the box&quot; thinking.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-30 item-article featured">
                        <div class="card-blog-grid card-blog-grid-3 hover-up">
                            <div class="card-image">
                                <a href="blog-detail.html">
                                    <img src="assets/imgs/page/blog/img6.png" alt="iori">
                                </a>
                            </div>
                            <div class="card-info">
                                <a href="{{url('blog-detail/')}}">
                                    <h6 class="color-brand-1">What Is the Main Action a Writer Takes When Proofreading?</h6>
                                </a>
                                <div class="mb-10 mt-10">
                                    <span class="font-xs color-grey-500">November 17, 2022</span>
                                    <span class="font-xs color-grey-500 icon-read">2 min read</span>
                                </div>
                                <p class="font-sm color-grey-500 mt-10">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit laborum — semper quis lectus nulla. Interactively transform magnetic growth strategies whereas prospective &quot;outside the box&quot; thinking.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-30 item-article other">
                        <div class="card-blog-grid card-blog-grid-3 hover-up">
                            <div class="card-image">
                                <a href="blog-detail.html">
                                    <img src="assets/imgs/page/blog/img9.png" alt="iori">
                                </a>
                            </div>
                            <div class="card-info">
                                <a href="{{url('blog-detail/')}}">
                                    <h6 class="color-brand-1">The Betty Crocker Secret to an Email Marketing Strategy People Enjoy</h6>
                                </a>
                                <div class="mb-10 mt-10">
                                    <span class="font-xs color-grey-500">November 17, 2022</span>
                                    <span class="font-xs color-grey-500 icon-read">2 min read</span>
                                </div>
                                <p class="font-sm color-grey-500 mt-10">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit laborum — semper quis lectus nulla. Interactively transform magnetic growth strategies whereas prospective &quot;outside the box&quot; thinking.</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="mt-0 mb-30 text-center">
                    <a class="btn btn-white-circle font-sm-bold border-brand text-none" href="#">View more in this category</a>
                </div> --}}
            </div>
        </div>
    </section>
</main>

@endsection('content')