@extends('frontend.master')

@section('content')


<div class="banner-start inner-banner-start" style="background-image: url(images/Karamkand-banner.png)">
    <div class="container">
        <div class="banner-caption-box">
            <div class="banner-content-box">
                <h1>Blog Details</h1>
            </div>
        </div>
    </div>
</div>


<section class="inner-blog-section-start">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="inner-main-blog-box">
                    <div class="inner-blog-heading-hd">
                        <h3 class="info_about_title">{{$blog->title}}</h3>

                    </div>
                    <div class="inner-blog-img-box">
                        <img src="{{URL::asset('images/blog_images/'.$blog->images)}}" alt="">
                    </div>
                    <p>{{$blog->content}}</p>
                    {{-- <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                        tempor invidunt ut labore et dolore There are many variations of passages of Lorem Ipsum
                        available, but the majority have suffered alteration in some form,

                    </p>
                    <p>by injected humour, or randomised words which don't look even slightly believable. If you are
                        going to use a passage of Lorem Ipsum, you need to be sure. Lorem ipsum dolor sit amet,
                        consetetur sadipscing elitr, sed diam nonumy eirmod
                        tempor invidunt ut labore et dolore There are many variations of passages of Lorem Ipsum
                        available, but the majority have suffered alteration in some form,
                    </p>
                    <p>by injected humour, or randomised words which don't look even slightly believable. If you are
                        going to use a passage of Lorem Ipsum, you need to be sure. Lorem ipsum dolor sit amet,
                        consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore There
                        are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form, by injected humour, or randomised words which don't look even slightly
                        believable. If you are going to use a passage of Lorem Ipsum, you need to be sure. Lorem ipsum
                        dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                        tempor invidunt ut labore et dolore There are many variations of passages of Lorem Ipsum
                        available, but the majority have suffered alteration in some form, by injected humour, or
                        randomised words which don't look even slightly believable. If you are going to use a passage of
                        Lorem Ipsum, you need to be sure. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                        diam nonumy eirmod tempor invidunt ut labore et dolore There are many variations of passages of
                        Lorem Ipsum available, but the majority have suffered alteration in some form, by injected
                        humour, or randomised words which don't look even slightly believable. If you are going to use a
                        passage of Lorem Ipsum, you need to be sure.</p> --}}
                    <div class="blg-like-view-date">
                        <ul class="list-inline">
                            <li><img src="images/like.svg" alt=""> <a href="#">2.5k likes</a></li>
                            <li><img src="images/view.svg" alt=""> <a href="#">5k views</a></li>
                        </ul>
                        @php
                        $eventDate = \Carbon\Carbon::parse($blog->created_at);
                        @endphp
                        <p>{{ $eventDate->format('jS F, Y') }}</p>
                    </div>
                </div>

                <div class="single-blog-details-box">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-detail-img1">
                                <img src="{{URL::asset('images/blog_images/'.$blog->images)}}" alt="">
                            </div>
                            <div class="single-blog-detail-img2">
                                <img src="{{URL::asset('images/blog_images/'.$blog->images)}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-details-txt-box">
                                <h4>{{$blog->title}}</h4>
                                <p>{{$blog->content}}
                                </p>
                                {{-- <ul class="list-unstyled">
                                    <li><img src="images/tick.svg" alt="">
                                        <p>Mollis fermentum nulla, quis pharetra.</p>
                                    </li>
                                    <li><img src="images/tick.svg" alt="">
                                        <p>Mollis fermentum nulla, quis pharetra.</p>
                                    </li>
                                </ul> --}}
                            </div>
                            <div class="single-blog-detail-img3">
                                <img src="{{URL::asset('images/blog_images/'.$blog->images)}}" alt="">
                            </div>

                        </div>
                    </div>
                </div>

                <ul class="list-inline single-blog-tags-box">
                    <li>
                        <h4>Popular Tags:</h4>
                    </li>
                    <li><a href="#" class="btn btn-light">Dummy Heading 1</a></li>
                    <li><a href="#" class="btn btn-light">Dummy Heading 2</a></li>
                    <li><a href="#" class="btn btn-light">Dummy Heading 3</a></li>
                </ul>


                <div class="single-blog-form-box">
                    <div class="shape-small-circle2"></div>
                    <form action="" method="post">
                        <input type="text" class="form-control " placeholder="Your full name*">
                        <input type="text" class="form-control " placeholder="Your Email*">
                        <input type="text" class="form-control " placeholder="Your Phone*">
                        <textarea class="form-control " placeholder="Write Your Comment"></textarea>
                        <button type="button" class="btn btn-light">Post Comment</button>
                    </form>
                </div>
                <ul class="list-inline single-blog-tags-box">
                    <li>
                        <h4>Dum. Tags</h4>
                    </li>
                    <li><a href="#" class="btn btn-light">Dummy Heading 1</a></li>
                    <li><a href="#" class="btn btn-light">Dummy Heading 2</a></li>
                    <li><a href="#" class="btn btn-light">Dummy Heading 3</a></li>
                </ul>

            </div>
            <div class="col-lg-4">
                <div class="inner-blog-speciality-box">
                    <div class="inner-blog-heading-hd">
                        <h4>Dummy Blogs</h4>

                    </div>
                    <div class="row">
                        @foreach ($blogs as $item)
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="more-blog-box">
                                    <div class="more-blg-img-box">
                                        <img src="{{URL::asset('images/blog_images/'.$item->images)}}" alt="">
                                    </div>
                                    <h6><a href="#">{{$item->title}}</a></h6>
                                </div>
                            </div>
                        @endforeach
                       

                        {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="more-blog-box">
                                <div class="more-blg-img-box">
                                    <img src="images/homeserviceimg3.png" alt="">
                                </div>
                                <h6><a href="#">Heading 2</a></h6>
                            </div>
                        </div> --}}

                        {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="more-blog-box">
                                <div class="more-blg-img-box">
                                    <img src="images/homeserviceimg2.png" alt="">
                                </div>
                                <h6><a href="#">Heading 3</a></h6>
                            </div>
                        </div> --}}

                        {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="more-blog-box">
                                <div class="more-blg-img-box">
                                    <img src="images/homeserviceimg3.png" alt="">
                                </div>
                                <h6><a href="#">Heading 4</a></h6>
                            </div>
                        </div> --}}
                    </div>

                </div>


                <div class="blog-get-in-touch-box">
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