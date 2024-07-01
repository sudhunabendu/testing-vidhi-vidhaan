@extends('frontend.master')

@section('content')

<div class="banner-start" style="background-image: url({{URL::asset('/frontend/assets/images/banner-back.png')}})">
    <div class="container">
        <div class="banner-caption-box">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="banner-content-box">
                        <h1>Vidhi Vidhaan</h1>
                        <h3>The Karmik Salvetion</h3>
                        <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est
                            source de distractions</p>
                        <a href="{{route('contact')}}" class="btn ">Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="banner-img-box">
                        <img src="{{URL::asset('/frontend/assets/images/Only-ICon.gif')}}" class="banner-img" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="list-unstyled banner-social">
        <li><a href=""><i class="fa-brands fa-youtube"></i></a></li>
        <li><a href=""><i class="fa-brands fa-linkedin"></i></a></li>
        <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
        <li><a href=""><i class="fa-brands fa-facebook"></i></a></li>
    </ul>
</div>

<section class="home_about_us section_spcr"
    style="background-image: url({{URL::asset('/frontend/assets/images/homeaboubg.png')}})">
    <div class="container">
        <div class="row home_about_us_inr_spcr">
            <div class="col-md-5 col-12">
                <div class="home_about_leftimgwrap">
                    <img class="home_about_leftimg_border"
                        src="{{URL::asset('/frontend/assets/images/aboutleftimageborder.png')}}">
                    <img class="home_about_leftimg" src="{{URL::asset('/frontend/assets/images/aboutleftimage.png')}}">
                </div>
            </div>
            <div class="col-md-7 col-12">
                <div class="home_about_us_info">
                    <h6 class="info_about_txtline info_about_small">
                        About Us
                    </h6>
                    <h2 class="info_about_title">Welcome to <span>Vidhi Vidhaan</span></h2>
                    <p class="info_about_dres">On sait depuis longtemps que travailler avec du texte lisible et
                        contenant du sens est source de distractions, et empêche de se concentrer sur la mise en
                        page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte.
                        Du texte.' est qu'il possède une distribution de lettres plus ou moins normale, et en tout
                        cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en
                        page.</p>
                    <a href="{{route('contact')}}" class="page_btn_dark btn">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our_service_wrap section_spcr"
    style="background-image: url({{URL::asset('/frontend/assets/images/homeservicebg.png')}});">
    <div class="container">
        <div class="page_title_wrap out_service_titlewrp">
            <h6 class="info_about_small">Our services</h6>
            <h2 class="info_about_title">Puja / Ritual / <span>Karamkand</span></h2>
        </div>
        <div class="our_service_carowsal carowsal_rotetion_wrap owl-carousel owl-theme">
            @foreach ($karmkands as $karmkand)
                <div class="item">
                    <div class="service_carowsal">
                        <div class="service_carowsal_innr">
                            <img src="{{URL::asset('images/category_images/').'/'.$karmkand->images}}">
                            <div class="service_carowsal_text">
                                <h2>{{$karmkand->name}}</h2>
                                <p>{{ \Illuminate\Support\Str::limit($karmkand->description, 200, '...')}}</p>
                                <a href="#" class="btn btn_line">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            {{-- <div class="item">
                <div class="service_carowsal">
                    <div class="service_carowsal_innr">
                        <img src="{{URL::asset('/frontend/assets/images/homeserviceimg2.png')}}">
                        <div class="service_carowsal_text">
                            <h2>Karamkand H2</h2>
                            <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens
                                est source de distractions, et empêche de se concentrer sur la mise en page
                                elle-même. L'avantage du Lorem Ipsum sur un texte générique comme.</p>
                            <a href="#" class="btn btn_line">Book Now</a>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="item">
                <div class="service_carowsal">
                    <div class="service_carowsal_innr">
                        <img src="{{URL::asset('/frontend/assets/images/homeserviceimg3.png')}}">
                        <div class="service_carowsal_text">
                            <h2>Karamkand H3</h2>
                            <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens
                                est source de distractions, et empêche de se concentrer sur la mise en page
                                elle-même. L'avantage du Lorem Ipsum sur un texte générique comme.</p>
                            <a href="#" class="btn btn_line">Book Now</a>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="item">
                <div class="service_carowsal">
                    <div class="service_carowsal_innr">
                        <img src="{{URL::asset('/frontend/assets/images/homeserviceimg1.png')}}">
                        <div class="service_carowsal_text">
                            <h2>Karamkand H1</h2>
                            <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens
                                est source de distractions, et empêche de se concentrer sur la mise en page
                                elle-même. L'avantage du Lorem Ipsum sur un texte générique comme.</p>
                            <a href="#" class="btn btn_line">Book Now</a>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="item">
                <div class="service_carowsal">
                    <div class="service_carowsal_innr">
                        <img src="{{URL::asset('/frontend/assets/images/homeserviceimg2.png')}}">
                        <div class="service_carowsal_text">
                            <h2>Karamkand H2</h2>
                            <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens
                                est source de distractions, et empêche de se concentrer sur la mise en page
                                elle-même. L'avantage du Lorem Ipsum sur un texte générique comme.</p>
                            <a href="#" class="btn btn_line">Book Now</a>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="item">
                <div class="service_carowsal">
                    <div class="service_carowsal_innr">
                        <img src="{{URL::asset('/frontend/assets/images/homeserviceimg3.png')}}">
                        <div class="service_carowsal_text">
                            <h2>Karamkand H3</h2>
                            <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens
                                est source de distractions, et empêche de se concentrer sur la mise en page
                                elle-même. L'avantage du Lorem Ipsum sur un texte générique comme.</p>
                            <a href="#" class="btn btn_line">Book Now</a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <a href="#" class="btn page_btn_dark explore_all">Explore All</a>
    </div>
</section>


<section class="book_astrologer section_spcr">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-12 book_astro_bdr">
                <div class="book_astrologer_info">
                    <h6 class="info_about_small">Our AstrolOgerS</h6>
                    <h2 class="info_about_title">Book an <span>Astrologer</span></h2>
                    <p class="info_about_dres">On sait depuis longtemps que travailler avec du texte lisible et
                        contenant du sens est source de distractions, et empêche de se concentrer sur la mise en
                        page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme Plusieurs variations
                        de Lorem Ipsum peuvent être trouvées ici ou là, mais la majeure partie d'entre elles</p>
                    <a href="{{route('astrologer')}}" class="page_btn_dark btn">
                        Explore All
                    </a>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-12">
                <div class="book_astrologer_carowsal owl-carousel owl-theme">
                    @if(count($services) > 0)
                    @foreach ($services as $service)
                    <div class="item">
                        <div class="book_astrologer_carowsal_innr">
                            <div class="astrologer_image_wrap">
                                <img class="astrologer_imageborder"
                                    src="{{URL::asset('/frontend/assets/images/aboutleftimageborder.png')}}">
                                <img class="astrologer_images"
                                    src="{{URL::asset('/images/service_images/'.$service->images)}}">
                            </div>
                            <div class="service_carowsal_text">
                                <h2>{{$service->name}}</h2>
                                <p>Master of Astrology</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="item">
                        <div class="book_astrologer_carowsal_innr">
                            <div class="astrologer_image_wrap">
                                <p>No Astrologer Available</p>
                            </div>
                        </div>
                    </div>
                    @endif


                    {{-- <div class="item">
                        <div class="book_astrologer_carowsal_innr">
                            <div class="astrologer_image_wrap">
                                <img class="astrologer_imageborder"
                                    src="{{URL::asset('/frontend/assets/images/aboutleftimageborder.png')}}">
                                <img class="astrologer_images"
                                    src="{{URL::asset('/frontend/assets/images/astrologerimage2.png')}}">
                            </div>
                            <div class="service_carowsal_text">
                                <h2>Sasthri Guru</h2>
                                <p>Master of Astrology </p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="book_astrologer_carowsal_innr">
                            <div class="astrologer_image_wrap">
                                <img class="astrologer_imageborder"
                                    src="{{URL::asset('/frontend/assets/images/aboutleftimageborder.png')}}">
                                <img class="astrologer_images"
                                    src="{{URL::asset('/frontend/assets/images/astrologerimage3.png')}}">
                            </div>
                            <div class="service_carowsal_text">
                                <h2>Mrinalini</h2>
                                <p>Master of Astrology </p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="book_astrologer_carowsal_innr">
                            <div class="astrologer_image_wrap">
                                <img class="astrologer_imageborder"
                                    src="{{URL::asset('/frontend/assets/images/aboutleftimageborder.png')}}">
                                <img class="astrologer_images"
                                    src="{{URL::asset('/frontend/assets/images/astrologerimage1.png')}}">
                            </div>
                            <div class="service_carowsal_text">
                                <h2>Devika</h2>
                                <p>Master of Astrology </p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="book_astrologer_carowsal_innr">
                            <div class="astrologer_image_wrap">
                                <img class="astrologer_imageborder"
                                    src="{{URL::asset('/frontend/assets/images/aboutleftimageborder.png')}}">
                                <img class="astrologer_images"
                                    src="{{URL::asset('/frontend/assets/images/astrologerimage2.png')}}">
                            </div>
                            <div class="service_carowsal_text">
                                <h2>Sasthri Guru</h2>
                                <p>Master of Astrology </p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="book_astrologer_carowsal_innr">
                            <div class="astrologer_image_wrap">
                                <img class="astrologer_imageborder"
                                    src="{{URL::asset('/frontend/assets/images/aboutleftimageborder.png')}}">
                                <img class="astrologer_images"
                                    src="{{URL::asset('/frontend/assets/images/astrologerimage3.png')}}">
                            </div>
                            <div class="service_carowsal_text">
                                <h2>Mrinalini</h2>
                                <p>Master of Astrology </p>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="buy_gemstone section_spcr"
    style="background-image: url({{URL::asset('/frontend/assets/images/gemstonebg.png')}});">


    <div class="container">
        <div class="buy_gemstone_titlewrap">
            <h6 class="info_about_small">Checkout Gemstone</h6>
            <h2 class="info_about_title">Buy Our <span>Gemstone</span>
            </h2>
        </div>
        @if(count($products) > 0)
        <div class="buy_gemstone_carowsal owl-carousel owl-theme">

            @foreach ($products as $product)
            <div class="item">
                <a href="{{route('gemstone.category',$product->name)}}">
                    <div class="buy_gemstone_carowsal_innr gemstone_border_top">
                        <img src="{{URL::asset('images/category_images/').'/'.$product->images}}">
                        <div class="buy_gemstone_text">
                            <h2>{{ucfirst($product->name)}}</h2>
                            {{-- <p class="text-center" style="color: #411e40">₹ {{$product->price}}</p> --}}
                            {{-- <a href="#" data-quantity="1" data-product-id="{{$product->id}}"
                                id="add_to_cart{{$product->id}}" class="add_to_cart btn btn_line gemstone_buybtn">Add To
                                Cart</a> --}}
                            {{-- <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a> --}}
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

            {{-- <div class="item">
                <div class="buy_gemstone_carowsal_innr gemstone_border_top">
                    <img src="{{URL::asset('/frontend/assets/images/gemstoneimage1.png')}}">
                    <div class="buy_gemstone_text">
                        <h2>Blue Sapphire</h2>
                        <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="item">
                <div class="buy_gemstone_carowsal_innr gemstone_border_down">
                    <img src="{{URL::asset('/frontend/assets/images/gemstoneimage4.png')}}">
                    <div class="buy_gemstone_text">
                        <h2>Yellow Sapphire</h2>
                        <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="item">
                <div class="buy_gemstone_carowsal_innr gemstone_border_top">
                    <img src="{{URL::asset('/frontend/assets/images/gemstoneimage3.png')}}">
                    <div class="buy_gemstone_text">
                        <h2>Ruby</h2>
                        <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="item">
                <div class="buy_gemstone_carowsal_innr gemstone_border_down">
                    <img src="{{URL::asset('/frontend/assets/images/gemstoneimage2.png')}}">
                    <div class="buy_gemstone_text">
                        <h2>Pearl</h2>
                        <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="item">
                <div class="buy_gemstone_carowsal_innr gemstone_border_top">
                    <img src="{{URL::asset('/frontend/assets/images/gemstoneimage1.png')}}">
                    <div class="buy_gemstone_text">
                        <h2>Mrinalini</h2>
                        <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="item">
                <div class="buy_gemstone_carowsal_innr gemstone_border_down">
                    <img src="{{URL::asset('/frontend/assets/images/gemstoneimage4.png')}}">
                    <div class="buy_gemstone_text">
                        <h2>Mrinalini</h2>
                        <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="item">
                <div class="buy_gemstone_carowsal_innr gemstone_border_top">
                    <img src="{{URL::asset('/frontend/assets/images/gemstoneimage3.png')}}">
                    <div class="buy_gemstone_text">
                        <h2>Mrinalini</h2>
                        <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="item">
                <div class="buy_gemstone_carowsal_innr gemstone_border_down">
                    <img src="{{URL::asset('/frontend/assets/images/gemstoneimage2.png')}}">
                    <div class="buy_gemstone_text">
                        <h2>Mrinalini</h2>
                        <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a>
                    </div>
                </div>
            </div> --}}

        </div>
        @else
        <div class="item">
            <p style="text-align: center;font-size:30px;font-weight:700;">No Gemstones Available</p>
        </div>
        @endif

        @if(count($products) > 0)
        <a href="{{route('products')}}" class="btn gemstone_explorebtn page_btn_dark ">Explore All</a>
        @else

        @endif
    </div>

</section>


<section class="home_blog_wrap section_spcr"
    style="background-image: url({{URL::asset('/frontend/assets/images/blogbg.png')}});">
    <div class="container">
        <div class="home_blog_title">
            <h6 class="info_about_small">Recent Stories</h6>
            <h2 class="info_about_title">Our Recent <span>Blogs</span></h2>
        </div>
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="blog_box_wrap">
                    <img src="{{URL::asset('/frontend/assets/images/homeblog1.png')}}">
                    <div class="blog_box_info">
                        <div class="downalodapp_info_inr">
                            <h2>Blog Heading 1</h2>
                            <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens
                                est source de distractions, et empêche de se concentrer.</p>
                            <a href="#" class="blog_read_more">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="blog_box_wrap">
                    <img src="{{URL::asset('/frontend/assets/images/homeblog2.png')}}">
                    <div class="blog_box_info">
                        <div class="downalodapp_info_inr">
                            <h2>Blog Heading 2</h2>
                            <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens
                                est source de distractions, et empêche de se concentrer.</p>
                            <a href="#" class="blog_read_more">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="blog_box_wrap">
                    <img src="{{URL::asset('/frontend/assets/images/homeblog3.png')}}">
                    <div class="blog_box_info">
                        <div class="downalodapp_info_inr">
                            <h2>Blog Heading 3</h2>
                            <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens
                                est source de distractions, et empêche de se concentrer.</p>
                            <a href="#" class="blog_read_more">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="testimonial-section-start">
    <div class="container">
        <img src="{{URL::asset('/frontend/assets/images/star1.png')}}" class="star1" alt="">
        <div class="home_blog_title">
            <h6 class="info_about_small">What They Says</h6>
            <h2 class="info_about_title">Our <span>Testimonials</span></h2>
        </div>
        <div class="testimonial-slider owl-carousel owl-theme">
            <div class="item">
                <div class="testimonial-main-box">
                    <div class="testimonial-img-box">
                        <img src="{{URL::asset('/frontend/assets/images/testimonial-img1.png')}}" alt="">
                    </div>
                    <div class="testimonial-maincontent-box">
                        <div class="testimonial-maincontent">
                            <img src="{{URL::asset('/frontend/assets/images/quote.png')}}" class="quote-icon" alt="">
                            <div class="testimonial_new_bx">
                                <div class="testimonial_flexbox">
                                    <img src="{{URL::asset('/frontend/assets/images/testimonial-img1.png')}}" alt="">
                                    <div>
                                        <h3>Mitchel Jones</h3>
                                        <p>Founder & CEO</p>
                                    </div>
                                </div>
                                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du
                                    sens est source de distractions, et empêche de se concentrer. Iil utilise un
                                    dictionnaire de plus de 200 mots latins, en combinaison de plusieurs structures
                                    de phrases</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-main-box">
                    <div class="testimonial-img-box">
                        <img src="{{URL::asset('/frontend/assets/images/testimonial-img2.png')}}" alt="">
                    </div>
                    <div class="testimonial-maincontent-box">
                        <div class="testimonial-maincontent">
                            <img src="{{URL::asset('/frontend/assets/images/quote.png')}}" class="quote-icon" alt="">
                            <div class="testimonial_new_bx">
                                <div class="testimonial_flexbox">
                                    <img src="{{URL::asset('/frontend/assets/images/testimonial-img2.png')}}" alt="">
                                    <div>
                                        <h3>Mitchel Jones</h3>
                                        <p>Founder & CEO</p>
                                    </div>
                                </div>
                                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du
                                    sens est source de distractions, et empêche de se concentrer. Iil utilise un
                                    dictionnaire de plus de 200 mots latins, en combinaison de plusieurs structures
                                    de phrases</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-main-box">
                    <div class="testimonial-img-box">
                        <img src="{{URL::asset('/frontend/assets/images/testimonial-img3.png')}}" alt="">
                    </div>
                    <div class="testimonial-maincontent-box">
                        <div class="testimonial-maincontent">
                            <img src="{{URL::asset('/frontend/assets/images/quote.png')}}" class="quote-icon" alt="">
                            <div class="testimonial_new_bx">
                                <div class="testimonial_flexbox">
                                    <img src="{{URL::asset('/frontend/assets/images/testimonial-img3.png')}}" alt="">
                                    <div>
                                        <h3>Mitchel Jones</h3>
                                        <p>Founder & CEO</p>
                                    </div>
                                </div>
                                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du
                                    sens est source de distractions, et empêche de se concentrer. Iil utilise un
                                    dictionnaire de plus de 200 mots latins, en combinaison de plusieurs structures
                                    de phrases</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-main-box">
                    <div class="testimonial-img-box">
                        <img src="{{URL::asset('/frontend/assets/images/testimonial-img1.png')}}" alt="">
                    </div>
                    <div class="testimonial-maincontent-box">
                        <div class="testimonial-maincontent">
                            <img src="{{URL::asset('/frontend/assets/images/quote.png')}}" class="quote-icon" alt="">
                            <div class="testimonial_new_bx">
                                <div class="testimonial_flexbox">
                                    <img src="{{URL::asset('/frontend/assets/images/testimonial-img1.png')}}" alt="">
                                    <div>
                                        <h3>Mitchel Jones</h3>
                                        <p>Founder & CEO</p>
                                    </div>
                                </div>
                                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du
                                    sens est source de distractions, et empêche de se concentrer. Iil utilise un
                                    dictionnaire de plus de 200 mots latins, en combinaison de plusieurs structures
                                    de phrases</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-main-box">
                    <div class="testimonial-img-box">
                        <img src="{{URL::asset('/frontend/assets/images/testimonial-img2.png')}}" alt="">
                    </div>
                    <div class="testimonial-maincontent-box">
                        <div class="testimonial-maincontent">
                            <img src="{{URL::asset('/frontend/assets/images/quote.png')}}" class="quote-icon" alt="">
                            <div class="testimonial_new_bx">
                                <div class="testimonial_flexbox">
                                    <img src="{{URL::asset('/frontend/assets/images/testimonial-img2.png')}}" alt="">
                                    <div>
                                        <h3>Mitchel Jones</h3>
                                        <p>Founder & CEO</p>
                                    </div>
                                </div>
                                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du
                                    sens est source de distractions, et empêche de se concentrer. Iil utilise un
                                    dictionnaire de plus de 200 mots latins, en combinaison de plusieurs structures
                                    de phrases</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-main-box">
                    <div class="testimonial-img-box">
                        <img src="{{URL::asset('/frontend/assets/images/testimonial-img3.png')}}" alt="">
                    </div>
                    <div class="testimonial-maincontent-box">
                        <div class="testimonial-maincontent">
                            <img src="{{URL::asset('/frontend/assets/images/quote.png')}}" class="quote-icon" alt="">
                            <div class="testimonial_new_bx">
                                <div class="testimonial_flexbox">
                                    <img src="{{URL::asset('/frontend/assets/images/testimonial-img3.png')}}" alt="">
                                    <div>
                                        <h3>Mitchel Jones</h3>
                                        <p>Founder & CEO</p>
                                    </div>
                                </div>
                                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du
                                    sens est source de distractions, et empêche de se concentrer. Iil utilise un
                                    dictionnaire de plus de 200 mots latins, en combinaison de plusieurs structures
                                    de phrases</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('testimonial')}}" class="btn gemstone_explorebtn page_btn_dark mt-2">Read More</a>
        <img src="{{URL::asset('/frontend/assets/images/star1.png')}}" class="star2" alt="">
    </div>
</div>

@include('frontend.common.index')

@section('homeJs')

@if(session('success'))
<script>
    //     Swal.fire({
//     title: "Success!",
//     text: "{{session('success')}}",
//     icon: "success",
//     showConfirmButton: false,
//     timer: 2500
//   });
toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
        toastr.success("{{session('success')}}", null, 
        {
            timeOut: 5000,
            fadeOut: 1000,
            onHidden: function () {
            // window.location.reload();
        }
        });
</script>


@elseif(session('error'))
<script>
    //     Swal.fire({
//     icon: "error",
//     title: "Oops...",
//     text: "{{session('error')}}",
//     showConfirmButton: false,
//     timer: 2500
// });
toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
    toastr.error("{{session('error')}}", null, 
    {
        timeOut: 5000,
        fadeOut: 1000,
        onHidden: function () {
        // window.location.reload();
    }
    });
</script>

@endif

<script>
    $(document).on('click', '.add_to_cart', function(e) {
        e.preventDefault();
        var product_id = $(this).data('product-id');
        var product_qty = $(this).data('quantity');
        var token = "{{csrf_token()}}";
        var path = "{{route('cart.store')}}";
        $.ajax({
            url : path,
            type: 'POST',
            dataType: 'JSON',
            data:{
                product_id: product_id,
                product_qty: product_qty,
                _token: token, 
            },
            beforeSend: function() {
            $('#add_to_cart' + product_id).html(
                '<i class="fa fa-spinner fa-spin"></i>');
                // '<i class="fa fa-spinner fa-spin"></i><p>Loading....</p>');
            },
            complete: function() {
                $('#add_to_cart' + product_id).html('Add To Cart');
                // $('#add_to_cart' + product_id).html('<i class="fa fa-cart-plus"></i>');
            },
            success: function(data) {
                console.log(data);
                // if(data){
                if (data['status']) {
                     var url1 = "{{route('cart')}}"
                    $('body #header-ajax').html(data['header']);
                    $('body #cart_counter').html(data['cart_count']);
                    toastr.options =
                    {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.success(data['message'], null, 
                    {
                        timeOut: 5000,
                        fadeOut: 1000,
                        onHidden: function () {
                        // window.location.reload();
                    }
                    });
                }
            },
            error: function(err) {

            console.warn(err);

            }
        })

    });
</script>



@endsection

@endsection