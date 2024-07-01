@extends('frontend.master')

@section('content')

<div class="banner-start inner-banner-start" style="background-image: url({{URL::asset('frontend/assets/images/Karamkand-banner.png')}})">
    <div class="container">
        <div class="banner-caption-box">
            <div class="banner-content-box">
                <h1>Karamkand</h1>

            </div>
        </div>
    </div>

</div>

<section class="view_karamkand_main_wrap section_spcr">
    <div class="container">
        <!-- <div class="view_karamkand_dtl"> -->
        <div class="view_karamkand_dtl">
            <div class="row">
                <div class="col-md-5 col-12">
                    <div class="karamkand_product_slider">
                        <div id="sync1" class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="{{URL::asset('frontend/assets/images/karamkandimage1.png')}}">
                            </div>
                            <div class="item">
                                <img src="{{URL::asset('frontend/assets/images/karamkandimage2.png')}}">
                            </div>
                            <div class="item">
                                <img src="{{URL::asset('frontend/assets/images/karamkandimage3.png')}}">
                            </div>
                            <div class="item">
                                <img src="{{URL::asset('frontend/assets/images/karamkandimage4.png')}}">
                            </div>
                            <div class="item">
                                <img src="{{URL::asset('frontend/assets/images/karamkandimage5.png')}}">
                            </div>
                            <div class="item">
                                <img src="{{URL::asset('frontend/assets/images/karamkandimage6.png')}}">
                            </div>

                        </div>

                        <div id="sync2" class=" kaarmakand_sync2 owl-carousel owl-theme">
                            <div class="item">
                                <img src="{{URL::asset('frontend/assets/images/karamkandimage1.png')}}">
                            </div>
                            <div class="item">
                                <img src="{{URL::asset('frontend/assets/images/karamkandimage2.png')}}">
                            </div>
                            <div class="item">
                                <img src="{{URL::asset('frontend/assets/images/karamkandimage3.png')}}">
                            </div>
                            <div class="item">
                                <img src="{{URL::asset('frontend/assets/images/karamkandimage4.png')}}">
                            </div>
                            <div class="item">
                                <img src="{{URL::asset('frontend/assets/images/karamkandimage5.png')}}">
                            </div>
                            <div class="item">
                                <img src="{{URL::asset('frontend/assets/images/karamkandimage6.png')}}">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-12">
                    <div class="karamkand_dtl_info_wrap">
                        <h3>Karamkand H2</h3>
                        <h2>₹3.5k <span>₹5k</span></h2>
                        <h6>Customer Ratings: <span>4.8</span><i class="fa fa-star" aria-hidden="true"></i></h6>
                        <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source
                            de distractions. Plusieurs versions sont apparues avec le temps, parfois par accident,
                            souvent intentionnellement. On sait depuis longtemps que travailler.</p>
                        <div class="choose_your_slot">
                            <h5>Choose Your Slot</h5>
                            <div class="slot_box_wrap">
                                <button class="slot_box slot_select_active">Sun</button>
                                <button class="slot_box">Mon</button>
                                <button class="slot_box">Tue</button>
                                <button class="slot_box">Wed</button>
                                <button class="slot_box">Thu</button>
                                <button class="slot_box">Fri</button>
                                <button class="slot_box">Sat</button>
                            </div>
                            <div class="slot_box_timezone">
                                <button class="slot_box">5AM - 10AM</button>
                                <button class="slot_box">8AM - 12AM</button>
                                <button class="slot_box slot_select_active">4PM - 8PM</button>
                            </div>
                            <div class="page_about_btnerp">
                                <a href="#" class="btn page_btn_dark">Book Now</a>
                                <a href="#" class="btn book_astro_btn ">Add to Cart</a>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="karmkand_long_dres">
                        <h2>Karamkand H2 Details</h2>
                        <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source
                            de distractions. Plusieurs versions sont apparues avec le temps, parfois par accident,
                            souvent intentionnellement.</p>
                        <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source
                            de distractions, et empêche de se concentrer sur la mise en page elle-même. L'avantage du
                            Lorem Ipsum sur un texte générique comme 'Du texte. Du texte. Du texte.' est qu'il possède
                            une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du
                            français standard.</p>
                        <p>De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem
                            Ipsum leur faux texte par défaut, et une recherche pour 'Lorem Ipsum' vous conduira vers de
                            nombreux sites qui n'en sont encore qu'à leur phase de construction.</p>
                    </div>
                </div>
            </div>

        </div>
        <!-- </div> -->
    </div>


    <div class="view_more_karamkand">
        <div class="container">
            <h2 class="view_karamkand_title">View More <span>Karamkand</span></h2>
            <div class="view_more_karamkand_carowsal owl-carousel owl-theme">
                <div class="karamkand_box">
                    <img src="{{URL::asset('frontend/assets/images/karamkandimage6.png')}}">
                    <div class="karamkand_box_main_title">
                        <h3>Karamkand H1</h3>
                        <h2>₹2.5k</h2>
                    </div>
                    <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                        distractions.</p>
                    <a href="#" class="btn btn_line_dtl">View Details</a>
                </div>
                <div class="karamkand_box">
                    <img src="{{URL::asset('frontend/assets/images/karamkandimage6.png')}}">
                    <div class="karamkand_box_main_title">
                        <h3>Karamkand H2</h3>
                        <h2>₹2.5k</h2>
                    </div>
                    <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                        distractions.</p>
                    <a href="#" class="btn btn_line_dtl">View Details</a>
                </div>
                <div class="karamkand_box">
                    <img src="{{URL::asset('frontend/assets/images/karamkandimage6.png')}}">
                    <div class="karamkand_box_main_title">
                        <h3>Karamkand H3</h3>
                        <h2>₹2.5k</h2>
                    </div>
                    <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                        distractions.</p>
                    <a href="#" class="btn btn_line_dtl">View Details</a>
                </div>
                <div class="karamkand_box">
                    <img src="{{URL::asset('frontend/assets/images/karamkandimage6.png')}}">
                    <div class="karamkand_box_main_title">
                        <h3>Karamkand H1</h3>
                        <h2>₹2.5k</h2>
                    </div>
                    <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                        distractions.</p>
                    <a href="#" class="btn btn_line_dtl">View Details</a>
                </div>
                <div class="karamkand_box">
                    <img src="{{URL::asset('frontend/assets/images/karamkandimage6.png')}}">
                    <div class="karamkand_box_main_title">
                        <h3>Karamkand H2</h3>
                        <h2>₹2.5k</h2>
                    </div>
                    <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                        distractions.</p>
                    <a href="#" class="btn btn_line_dtl">View Details</a>
                </div>
                <div class="karamkand_box">
                    <img src="{{URL::asset('frontend/assets/images/karamkandimage6.png')}}">
                    <div class="karamkand_box_main_title">
                        <h3>Karamkand H3</h3>
                        <h2>₹2.5k</h2>
                    </div>
                    <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                        distractions.</p>
                    <a href="#" class="btn btn_line_dtl">View Details</a>
                </div>
                <div class="karamkand_box">
                    <img src="{{URL::asset('frontend/assets/images/karamkandimage6.png')}}">
                    <div class="karamkand_box_main_title">
                        <h3>Karamkand H1</h3>
                        <h2>₹2.5k</h2>
                    </div>
                    <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                        distractions.</p>
                    <a href="#" class="btn btn_line_dtl">View Details</a>
                </div>

            </div>
        </div>
</section>


<section class="buy_gemstone section_spcr" style="background-image: url('images/gemstonebg.png');">
    <div class="container">
        <div class="buy_gemstone_titlewrap">
            <h6 class="info_about_small">Checkout Gemstone</h6>
            <h2 class="info_about_title">Buy Our <span>Gemstone</span>
            </h2>
        </div>
        <div class="buy_gemstone_carowsal owl-carousel owl-theme">
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
        <a href="#" class="btn gemstone_explorebtn page_btn_dark ">Explore All</a>
    </div>
</section>

@include('frontend.common.index')

@endsection