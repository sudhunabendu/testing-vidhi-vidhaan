@extends('frontend.master')

@section('content')

<div class="banner-start inner-banner-start" style="background-image: url({{URL::asset('frontend/assets/images/about-banner.png')}})">
    <div class="container">
        <div class="banner-caption-box">
            <div class="banner-content-box">
                <h1>TEmbrace the Energy</h1>
                <h3>With VIdhi Vidhan</h3>
            </div>
        </div>
    </div>

</div>



<section class="about_spcr about_page_wrap" style="background-image: url({{URL::asset('frontend/assets/images/pageabout_bg.png')}});">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-12">
                <div class="about_inr_info">
                    <h6 class="info_about_txtline info_about_small">
                        About Us
                    </h6>
                    <h2 class="info_about_title">Welcome to <span>Vidhi Vidhaan</span></h2>
                    <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                        distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du Lorem
                        Ipsum sur un texte générique comme 'Du texte. Du texte. Du texte.' est qu'il possède une
                        distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français
                        standard. De nombreuses suites logicielles de mise en page.</p>
                    <div class="customer_trust">
                        <div class="media d-flex">
                            <img class="mr-3" src="{{URL::asset('frontend/assets/images/check-circle.png')}}" alt="image">
                            <div class="media-body">
                                <h2 class="mt-0">Why Customers Trust Us</h2>
                                <p>As a growing tribe of millennials move towards seeking esoteric and spiritual</p>
                            </div>
                        </div>
                    </div>
                    <div class="page_about_btnerp">
                        <a href="{{route('contact')}}" class="btn page_btn_dark">Contact Us</a>
                        <a href="{{route('astrologer')}}" class="btn book_astro_btn ">Book Our Astrologer</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-12 order-lg-last order-ms-first order-sm-first order-first">
                <div class="page_about_rightimg">
                    <img src="{{URL::asset('frontend/assets/images/pageaboutimage.png')}}">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section_spcr counter_wrap" style="background-image: url({{URL::asset('frontend/assets/images/counterbg.png')}});">
    <div class="container">
        <div class="counter_inr_wrap">
            <div class="counter_box ">
                <h2><span class="number" id="number1">5</span>k+</h2>
                <h6>Trusted Clients</h6>
            </div>
            <div class="counter_box ">
                <h2><span class="number" id="number2">80</span>k+</h2>
                <h6>Predicted Moves</h6>
            </div>
            <div class="counter_box ">
                <h2><span class="number" id="number3">10</span>k+</h2>
                <h6>Top Rated Users</h6>
            </div>
        </div>
    </div>
</section>


<section class="aboutpage_quotes section_spcr">
    <div class="container">
        <div class="aboutpage_quotesl_info">
            <h6 class="info_about_small">astrologer talk</h6>
            <h2 class="info_about_title">Quotes From Our Astrologer</h2>
        </div>
        <div class="aboutpage_quotes_outer">
            <div class="aboutpage_quotes_slider owl-carousel owl-theme">
                @foreach ($providers as $item)
                <div class="item">
                    <div class="astrologer_quots_innr_dtl">
                        <div class="astroloder_quotes">
                            <p>{{\Illuminate\Support\Str::limit($item->userDetails->description, 250, '...')}}</p>
                            <img src="{{URL::asset('/images/user_images/'.$item->userDetails->images)}}">
                            <h4>{{$item->first_name. " ".$item->last_name}}</h4>
                            <h6>{{$item->first_name. " ".$item->last_name}} (Master of Astrology)</h6>
                            <img class="arrow_up_quote" src="{{URL::asset('/images/user_images/'.$item->userDetails->images)}}">
                        </div>
                        <div class="astroloder_img">
                            <img src="{{URL::asset('/images/user_images/'.$item->userDetails->images)}}">
                        </div>
                        <div class="persn_dtl">
                            <h2>{{$item->first_name. " ".$item->last_name}}</h2>
                            <h6>Master of Astrology </h6>
                        </div>
                    </div>
                </div>
                @endforeach
                

                {{-- <div class="item">
                    <div class="astrologer_quots_innr_dtl">
                        <div class="astroloder_quotes">
                            <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est
                                source de distractions, et empêche de se concentrer sur la mise en page elle-même.
                                L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte.</p>
                            <img src="{{URL::asset('frontend/assets/images/quotesimage2.png')}}">
                            <h4>Divika</h4>
                            <h6>Divika (Master of Astrology)</h6>
                            <!-- <span class="astrologer_border_dn"></span> -->
                            <img class="arrow_up_quote" src="{{URL::asset('frontend/assets/images/arrowup.png')}}">
                        </div>
                        <div class="astroloder_img">
                            <img src="{{URL::asset('frontend/assets/images/quotesimage2.png')}}">
                        </div>
                        <div class="persn_dtl">
                            <h2>Divika</h2>
                            <h6>Master of Astrology </h6>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="item">
                    <div class="astrologer_quots_innr_dtl">
                        <div class="astroloder_quotes">
                            <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est
                                source de distractions, et empêche de se concentrer sur la mise en page elle-même.
                                L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte.</p>
                            <img src="{{URL::asset('frontend/assets/images/quotesimage3.png')}}">
                            <h4>Mrinalini</h4>
                            <h6>Mrinalini (Master of Astrology)</h6>
                            <img class="arrow_up_quote" src="{{URL::asset('frontend/assets/images/arrowup.png')}}">
                        </div>
                        <div class="astroloder_img">
                            <img src="{{URL::asset('frontend/assets/images/quotesimage3.png')}}">
                        </div>
                        <div class="persn_dtl">
                            <h2>Mrinalini</h2>
                            <h6>Master of Astrology </h6>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="item">
                    <div class="astrologer_quots_innr_dtl">
                        <div class="astroloder_quotes">
                            <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est
                                source de distractions, et empêche de se concentrer sur la mise en page elle-même.
                                L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte.</p>
                            <img src="{{URL::asset('frontend/assets/images/quotesimage1.png')}}">
                            <h4>Sastri Guru</h4>
                            <h6>Sastri Guru (Master of Astrology)</h6>
                            <img class="arrow_up_quote" src="{{URL::asset('frontend/assets/images/arrowup.png')}}">
                        </div>
                        <div class="astroloder_img">
                            <img src="{{URL::asset('frontend/assets/images/quotesimage1.png')}}">
                        </div>
                        <div class="persn_dtl">
                            <h2>Sasthri Guru</h2>
                            <h6>Master of Astrology </h6>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="item">
                    <div class="astrologer_quots_innr_dtl">
                        <div class="astroloder_quotes">
                            <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est
                                source de distractions, et empêche de se concentrer sur la mise en page elle-même.
                                L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte.</p>
                            <img src="{{URL::asset('frontend/assets/images/quotesimage2.png')}}">
                            <h4>Divika</h4>
                            <h6>Divika (Master of Astrology)</h6>
                            <!-- <span class="astrologer_border_dn"></span> -->
                            <img class="arrow_up_quote" src="{{URL::asset('frontend/assets/images/arrowup.png')}}">
                        </div>
                        <div class="astroloder_img">
                            <img src="{{URL::asset('frontend/assets/images/quotesimage2.png')}}">
                        </div>
                        <div class="persn_dtl">
                            <h2>Divika</h2>
                            <h6>Master of Astrology </h6>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="item">
                    <div class="astrologer_quots_innr_dtl">
                        <div class="astroloder_quotes">
                            <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est
                                source de distractions, et empêche de se concentrer sur la mise en page elle-même.
                                L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte.</p>
                            <img src="{{URL::asset('frontend/assets/images/quotesimage3.png')}}">
                            <h4>Mrinalini</h4>
                            <h6>Mrinalini (Master of Astrology)</h6>
                            <img class="arrow_up_quote" src="{{URL::asset('frontend/assets/images/arrowup.png')}}">
                        </div>
                        <div class="astroloder_img">
                            <img src="{{URL::asset('frontend/assets/images/quotesimage3.png')}}">
                        </div>
                        <div class="persn_dtl">
                            <h2>Mrinalini</h2>
                            <h6>Master of Astrology </h6>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
</section>

<section class="buy_gemstone section_spcr" style="background-image: url({{URL::asset('frontend/assets/images/gemstonebg.png')}});">
    <div class="container">
        <div class="buy_gemstone_titlewrap">
            <h6 class="info_about_small">Checkout Gemstone</h6>
            <h2 class="info_about_title">Buy Our <span>Gemstone</span>
            </h2>
        </div>

        @if(count($gemstones) > 0)
        <div class="buy_gemstone_carowsal owl-carousel owl-theme">

            @foreach ($gemstones as $gemstone)
               
                    <div class="item">
                        <div class="buy_gemstone_carowsal_innr gemstone_border_top">
                            <img src="{{URL::asset('images/product_images/').'/'.$gemstone->images}}">
                            <div class="buy_gemstone_text">
                                <h2>{{ucfirst($gemstone->name)}}</h2>
                                <p class="text-center" style="color: #411e40">₹ {{$gemstone->price}}</p>
                                <a href="#" data-quantity="1" data-product-id="{{$gemstone->id}}"
                                    id="add_to_cart{{$gemstone->id}}" class="add_to_cart btn btn_line gemstone_buybtn">Add To
                                    Cart</a>
                                {{-- <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a> --}}
                            </div>
                        </div>
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
            <p style="text-align: center;font-size:30px;font-weight:700;">No Product Available</p>
        </div>
        @endif

        @if(count($products) > 0)
        <a href="{{route('products')}}" class="btn gemstone_explorebtn page_btn_dark ">Explore All</a>
        @else

        @endif

        {{-- <div class="buy_gemstone_carowsal owl-carousel owl-theme">
            <div class="item">
                <div class="buy_gemstone_carowsal_innr gemstone_border_top">
                    <img src="{{URL::asset('frontend/assets/images/gemstoneimage1.png')}}">
                    <div class="buy_gemstone_text">
                        <h2>Blue Sapphire</h2>
                        <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="buy_gemstone_carowsal_innr gemstone_border_down">
                    <img src="{{URL::asset('frontend/assets/images/gemstoneimage4.png')}}">
                    <div class="buy_gemstone_text">
                        <h2>Yellow Sapphire</h2>
                        <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="buy_gemstone_carowsal_innr gemstone_border_top">
                    <img src="{{URL::asset('frontend/assets/images/gemstoneimage3.png')}}">
                    <div class="buy_gemstone_text">
                        <h2>Ruby</h2>
                        <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="buy_gemstone_carowsal_innr gemstone_border_down">
                    <img src="{{URL::asset('frontend/assets/images/gemstoneimage2.png')}}">
                    <div class="buy_gemstone_text">
                        <h2>Pearl</h2>
                        <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="buy_gemstone_carowsal_innr gemstone_border_top">
                    <img src="{{URL::asset('frontend/assets/images/gemstoneimage1.png')}}">
                    <div class="buy_gemstone_text">
                        <h2>Mrinalini</h2>
                        <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="buy_gemstone_carowsal_innr gemstone_border_down">
                    <img src="{{URL::asset('frontend/assets/images/gemstoneimage4.png')}}">
                    <div class="buy_gemstone_text">
                        <h2>Mrinalini</h2>
                        <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="buy_gemstone_carowsal_innr gemstone_border_top">
                    <img src="{{URL::asset('frontend/assets/images/gemstoneimage3.png')}}">
                    <div class="buy_gemstone_text">
                        <h2>Mrinalini</h2>
                        <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="buy_gemstone_carowsal_innr gemstone_border_down">
                    <img src="{{URL::asset('frontend/assets/images/gemstoneimage2.png')}}">
                    <div class="buy_gemstone_text">
                        <h2>Mrinalini</h2>
                        <a href="#" class="btn btn_line gemstone_buybtn">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="btn gemstone_explorebtn page_btn_dark ">Explore All</a> --}}
    </div>
</section>


<div class="testimonial-section-start inner-about-testimonial">
    <div class="container">
        <img src="{{URL::asset('frontend/assets/images/star1.png')}}" class="star1" alt="">
        <div class="home_blog_title">
            <h6 class="info_about_small">What They Says</h6>
            <h2 class="info_about_title">Our <span>Testimonials</span></h2>
        </div>
        <div class="testimonial-slider owl-carousel owl-theme">
            <div class="item">
                <div class="testimonial-main-box">
                    <div class="testimonial-img-box">
                        <img src="{{URL::asset('frontend/assets/images/testimonial-img1.png')}}" alt="">
                    </div>
                    <div class="testimonial-maincontent-box">
                        <div class="testimonial-maincontent">
                            <img src="{{URL::asset('frontend/assets/images/quote.png')}}" class="quote-icon" alt="">
                            <div class="testimonial_new_bx">
                                <div class="testimonial_flexbox">
                                    <img src="{{URL::asset('frontend/assets/images/testimonial-img1.png')}}" alt="">
                                    <div>
                                        <h3>Mitchel Jones</h3>
                                        <p>Founder & CEO</p>
                                    </div>
                                </div>
                                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens
                                    est source de distractions, et empêche de se concentrer. Iil utilise un dictionnaire
                                    de plus de 200 mots latins, en combinaison de plusieurs structures de phrases</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-main-box">
                    <div class="testimonial-img-box">
                        <img src="{{URL::asset('frontend/assets/images/testimonial-img2.png')}}" alt="">
                    </div>
                    <div class="testimonial-maincontent-box">
                        <div class="testimonial-maincontent">
                            <img src="{{URL::asset('frontend/assets/images/quote.png')}}" class="quote-icon" alt="">
                            <div class="testimonial_new_bx">
                                <div class="testimonial_flexbox">
                                    <img src="{{URL::asset('frontend/assets/images/testimonial-img2.png')}}" alt="">
                                    <div>
                                        <h3>Mitchel Jones</h3>
                                        <p>Founder & CEO</p>
                                    </div>
                                </div>
                                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens
                                    est source de distractions, et empêche de se concentrer. Iil utilise un dictionnaire
                                    de plus de 200 mots latins, en combinaison de plusieurs structures de phrases</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-main-box">
                    <div class="testimonial-img-box">
                        <img src="{{URL::asset('frontend/assets/images/testimonial-img3.png')}}" alt="">
                    </div>
                    <div class="testimonial-maincontent-box">
                        <div class="testimonial-maincontent">
                            <img src="{{URL::asset('frontend/assets/images/quote.png')}}" class="quote-icon" alt="">
                            <div class="testimonial_new_bx">
                                <div class="testimonial_flexbox">
                                    <img src="{{URL::asset('frontend/assets/images/testimonial-img3.png')}}" alt="">
                                    <div>
                                        <h3>Mitchel Jones</h3>
                                        <p>Founder & CEO</p>
                                    </div>
                                </div>
                                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens
                                    est source de distractions, et empêche de se concentrer. Iil utilise un dictionnaire
                                    de plus de 200 mots latins, en combinaison de plusieurs structures de phrases</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-main-box">
                    <div class="testimonial-img-box">
                        <img src="{{URL::asset('frontend/assets/images/testimonial-img1.png')}}" alt="">
                    </div>
                    <div class="testimonial-maincontent-box">
                        <div class="testimonial-maincontent">
                            <img src="{{URL::asset('frontend/assets/images/quote.png')}}" class="quote-icon" alt="">
                            <div class="testimonial_new_bx">
                                <div class="testimonial_flexbox">
                                    <img src="{{URL::asset('frontend/assets/images/testimonial-img1.png')}}" alt="">
                                    <div>
                                        <h3>Mitchel Jones</h3>
                                        <p>Founder & CEO</p>
                                    </div>
                                </div>
                                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens
                                    est source de distractions, et empêche de se concentrer. Iil utilise un dictionnaire
                                    de plus de 200 mots latins, en combinaison de plusieurs structures de phrases</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-main-box">
                    <div class="testimonial-img-box">
                        <img src="{{URL::asset('frontend/assets/images/testimonial-img2.png')}}" alt="">
                    </div>
                    <div class="testimonial-maincontent-box">
                        <div class="testimonial-maincontent">
                            <img src="{{URL::asset('frontend/assets/images/quote.png')}}" class="quote-icon" alt="">
                            <div class="testimonial_new_bx">
                                <div class="testimonial_flexbox">
                                    <img src="{{URL::asset('frontend/assets/images/testimonial-img2.png')}}" alt="">
                                    <div>
                                        <h3>Mitchel Jones</h3>
                                        <p>Founder & CEO</p>
                                    </div>
                                </div>
                                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens
                                    est source de distractions, et empêche de se concentrer. Iil utilise un dictionnaire
                                    de plus de 200 mots latins, en combinaison de plusieurs structures de phrases</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testimonial-main-box">
                    <div class="testimonial-img-box">
                        <img src="{{URL::asset('frontend/assets/images/testimonial-img3.png')}}" alt="">
                    </div>
                    <div class="testimonial-maincontent-box">
                        <div class="testimonial-maincontent">
                            <img src="{{URL::asset('frontend/assets/images/quote.png')}}" class="quote-icon" alt="">
                            <div class="testimonial_new_bx">
                                <div class="testimonial_flexbox">
                                    <img src="{{URL::asset('frontend/assets/images/testimonial-img3.png')}}" alt="">
                                    <div>
                                        <h3>Mitchel Jones</h3>
                                        <p>Founder & CEO</p>
                                    </div>
                                </div>
                                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens
                                    est source de distractions, et empêche de se concentrer. Iil utilise un dictionnaire
                                    de plus de 200 mots latins, en combinaison de plusieurs structures de phrases</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('testimonial')}}" class="btn gemstone_explorebtn page_btn_dark mt-2">Read More</a>
        <img src="{{URL::asset('frontend/assets/images/star1.png')}}" class="star2" alt="">
    </div>


</div>

@include('frontend.common.index')


@section('aboutJs')
<script>
    $(document).on('click', '.add_to_cart', function(e) {
        e.preventDefault();
        var product_id = $(this).data('product-id');
        var product_qty = $(this).data('quantity');
        var token = "{{csrf_token()}}";
        var path = "{{route('cart.store.gemstone')}}";
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