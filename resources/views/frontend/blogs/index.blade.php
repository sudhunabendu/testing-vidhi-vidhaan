@extends('frontend.master')

@section('content')
    <div class="banner-start inner-banner-start"
        style="background-image: url({{ URL::asset('frontend/assets/images/Karamkand-banner.png') }})">
        <div class="container">
            <div class="banner-caption-box">
                <div class="banner-content-box">
                    <h1>Blog</h1>
                </div>
            </div>
        </div>
    </div>


    <section class="inner-blog-section-start">


        <div class="container">
            <div class="row">
                @if (count($blogs) > 0)
                    <div class="col-lg-8">
                        @foreach ($blogs as $item)
                        @php
                        $eventDate = \Carbon\Carbon::parse($item->created_at);
                        @endphp
                            <div class="inner-main-blog-box">
                                <div class="inner-blog-heading-hd">
                                    <a href="blog-details.html">
                                        <h3 class="info_about_title">{{$item->title}}</h3>
                                    </a>

                                </div>
                                <div class="inner-blog-img-box">
                                    <img src="{{ URL::asset('images/blog_images/'.$item->images) }}" alt="">
                                </div>
                                <p>{{$item->content}}</p>
                                <div class="blg-like-view-date">
                                    <ul class="list-inline">
                                        <li><img src="{{ URL::asset('frontend/assets/images/like.svg') }}" alt="">
                                            <a href="#">2.5k likes</a>
                                        </li>
                                        <li><img src="{{ URL::asset('frontend/assets/images/view.svg') }}" alt="">
                                            <a href="#">5k views</a>
                                        </li>
                                    </ul>
                                  
                                    <p>{{ $eventDate->format('jS F, Y') }}</p>
                                </div>
                            </div>
                        @endforeach
                        <div class="d-felx justify-content-center">
                            {{ $blogs->links('pagination::bootstrap-5') }}
                        </div>

                        {{-- <div class="inner-main-blog-box">
                        <div class="inner-blog-heading-hd">
                            <a href="blog-details.html">
                                <h3 class="info_about_title">Blog <span>Heading 2</span></h3>
                            </a>

                        </div>
                        <div class="inner-blog-img-box">
                            <img src="{{ URL::asset('frontend/assets/images/homeblog2.png') }}" alt="">
                        </div>
                        <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                            tempor invidunt ut labore et dolore There are many variations of passages of Lorem Ipsum
                            available, but the majority have suffered alteration in some form,
                        </p>
                        <p>by injected humour, or randomised words which don't look even slightly believable. If you are
                            going to use a passage of Lorem Ipsum, you need to be sure.</p>
                        <div class="blg-like-view-date">
                            <ul class="list-inline">
                                <li><img src="{{ URL::asset('frontend/assets/images/like.svg') }}" alt=""> <a
                                        href="#">2.5k likes</a></li>
                                <li><img src="{{ URL::asset('frontend/assets/images/view.svg') }}" alt=""> <a
                                        href="#">5k views</a></li>
                            </ul>
                            <p>17th July, 2021</p>
                        </div>
                    </div>

                    <div class="inner-main-blog-box">
                        <div class="inner-blog-heading-hd">
                            <a href="blog-details.html">
                                <h3 class="info_about_title">Blog <span>Heading 3</span></h3>
                            </a>

                        </div>
                        <div class="inner-blog-img-box">
                            <img src="{{ URL::asset('frontend/assets/images/homeblog3.png') }}" alt="">
                        </div>
                        <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                            tempor invidunt ut labore et dolore There are many variations of passages of Lorem Ipsum
                            available, but the majority have suffered alteration in some form,
                        </p>
                        <p>by injected humour, or randomised words which don't look even slightly believable. If you are
                            going to use a passage of Lorem Ipsum, you need to be sure.</p>
                        <div class="blg-like-view-date">
                            <ul class="list-inline">
                                <li><img src="{{ URL::asset('frontend/assets/images/like.svg') }}" alt=""> <a
                                        href="#">2.5k likes</a></li>
                                <li><img src="{{ URL::asset('frontend/assets/images/view.svg') }}" alt=""> <a
                                        href="#">5k views</a></li>
                            </ul>
                            <p>17th July, 2021</p>
                        </div>
                    </div> --}}

                        {{-- <div id="pagination">
                        <a href="#" class="">Previous</a>
                        <a href="#" class=" active">1</a>
                        <a href="#" class="">2</a>
                        <a href="#" class="">3</a>
                        <a href="#" class="">4</a>
                        <a href="#" class="">5</a>
                        <a href="#" class="">6</a>
                        <a href="#" class="">7</a>
                        <a href="#" class="">NEXT</a>
                    </div> --}}
                    </div>
                @else
                    <div class="col-lg-8">
                        <div class="inner-main-blog-box">
                            <div class="inner-blog-heading-hd">
                                <p class="text-center">Blogs not available</p>
                            </div>
                        </div>
                    </div>
                @endif


                <div class="col-lg-4">

                    <div class="blog-search mt-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search your Keyword">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="blog-get-in-touch-box pl-0">
                        <h4>Get in touch with us</h4>
                        <ul class="list-unstyled footer-social text-left mt-4">
                            <li><a href=""><i class="fa-brands fa-youtube"></i></a></li>
                            <li><a href=""><i class="fa-brands fa-linkedin"></i></a></li>
                            <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href=""><i class="fa-brands fa-facebook"></i></a></li>
                        </ul>
                    </div>
                    <div class="blog-subscribe-form-box">
                        <form action="" method="post">
                            <input type="text" class="form-control " placeholder="Your full name">
                            <input type="text" class="form-control " placeholder="Your Email Id">
                            <button type="button" class="btn btn-primary page_btn_dark">Subscribe</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
