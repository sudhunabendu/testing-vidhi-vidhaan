@extends('frontend.master')

@section('content')

<div class="banner-start inner-banner-start"
   style="background-image: url({{URL::asset('frontend/assets/images/astrologer-banner.png')}})">
   <div class="container">
      <div class="banner-caption-box">
         <div class="banner-content-box">
            <h1>Astrologer</h1>
         </div>
      </div>
   </div>
</div>

<section class="view_karamkand_main_wrap section_spcr">
   <div class="container">
      <!-- <div class="view_karamkand_dtl"> -->
      <div class="view_karamkand_dtl">
         <div class="row align-items-center">
            <div class="col-md-5 col-12">
               <div class="karamkand_product_slider">
                  <div id="sync1" class="owl-carousel owl-theme">
                     <div class="item">
                        <img src="{{URL::asset('images/user_images/'.$provider->userDetails->images)}}">
                     </div>
                     {{-- <div class="item">
                        <img src="{{URL::asset('images/service_images/'.$service->images)}}">
                     </div>
                     <div class="item">
                        <img src="{{URL::asset('images/service_images/'.$service->images)}}">
                     </div>
                     <div class="item">
                        <img src="{{URL::asset('images/service_images/'.$service->images)}}">
                     </div>
                     <div class="item">
                        <img src="{{URL::asset('images/service_images/'.$service->images)}}">
                     </div>
                     <div class="item">
                        <img src="{{URL::asset('images/service_images/'.$service->images)}}">
                     </div> --}}

                  </div>

                  <div id="sync2" class=" kaarmakand_sync2 owl-carousel owl-theme">
                     {{-- <div class="item">
                        <img src="{{URL::asset('images/user_images/'.$provider->userDetails->images)}}">
                     </div> --}}
                     {{-- <div class="item">
                        <img src="{{URL::asset('images/service_images/'.$service->images)}}">
                     </div>
                     <div class="item">
                        <img src="{{URL::asset('images/service_images/'.$service->images)}}">
                     </div>
                     <div class="item">
                        <img src="{{URL::asset('images/service_images/'.$service->images)}}">
                     </div>
                     <div class="item">
                        <img src="{{URL::asset('images/service_images/'.$service->images)}}">
                     </div>
                     <div class="item">
                        <img src="{{URL::asset('images/service_images/'.$service->images)}}">
                     </div> --}}

                  </div>
               </div>
            </div>
            <div class="col-md-7 col-12">
               
               <div class="karamkand_dtl_info_wrap">
                  <h3>{{ucfirst($provider->first_name). " ".ucfirst($provider->last_name)}}</h3>

                  <h2>₹ {{$provider->userDetails->price}}</h2>
                  {{-- <h2>₹3.5k <span>₹5k</span></h2> --}}
                  <ul class="list-inline karamkand_dtl_ul mb-0">
                     <li><h6>Customer Ratings: <span>4.8</span><i class="fa fa-star" aria-hidden="true"></i></h6></li>
                     <li><h6>Qualification : <span>{{ucfirst($provider->userDetails->education)}}</span></h6></li>
                     <li><h6>Experience : <span>{{$provider->userDetails->experience}} Years</span></h6></li>
                     <li><h6>Location : <span>{{ucfirst($city->name)}}</span></h6></li>
                  </ul>
                  
                  <h6>Book this astrologer at : <span>+91 7859658745</span></h6>
                  {{-- <p>Specialization in Astrology</p> --}}
                  {{-- <p>{{$provider->description}}</p> --}}
                  <div class="choose_your_slot">
                     {{-- <h5>Choose Your Slot</h5>
                     <div class="slot_box_wrap">
                        <button class="slot_box slot_select_active">Sun</button>
                        <button class="slot_box">Mon</button>
                        <button class="slot_box">Tue</button>
                        <button class="slot_box">Wed</button>
                        <button class="slot_box">Thu</button>
                        <button class="slot_box">Fri</button>
                        <button class="slot_box">Sat</button>
                     </div> --}}
                     {{-- <div class="slot_box_timezone">
                        @foreach ($timeRanges as $time)
                        <button class="slot_box">{{$time}}</button>
                        @endforeach
                     </div> --}}
                     <div class="page_about_btnerp pt-2">
                        {{-- <a href="#" class="btn page_btn_dark">Book Now</a> --}}
                        <button type="button" class="btn page_btn_dark" data-toggle="modal" data-target="#exampleModal">Book Online</button>
                     </div>
                  </div>

               </div>
            </div>
            <div class="col-md-12 col-12">
               <div class="karmkand_long_dres mt-2">
                  <h2>{{ucfirst($provider->first_name). " ".ucfirst($provider->last_name)}}</h2>
                  <p>{{$provider->userDetails->description}}</p>
                  {{-- <p>On sait depuis longtemps que travailler avec du texte
                     lisible et contenant du sens est source de
                     distractions, et empêche de se concentrer sur la mise
                     en page elle-même. L'avantage du Lorem Ipsum sur un
                     texte générique comme 'Du texte. Du texte. Du texte.'
                     est qu'il possède une distribution de lettres plus ou
                     moins normale, et en tout cas comparable avec celle
                     du français standard.</p>
                  <p>De nombreuses suites logicielles de mise en page ou
                     éditeurs de sites Web ont fait du Lorem Ipsum leur
                     faux texte par défaut, et une recherche pour
                     'Lorem Ipsum' vous conduira vers de nombreux sites
                     qui n'en sont encore qu'à leur phase de
                     construction.</p> --}}
               </div>
            </div>
         </div>

      </div>
      <!-- </div> -->
   </div>

   {{-- <div class="view_more_karamkand">
      <div class="container">
         <h2 class="view_karamkand_title">View More
            <span>Karamkand</span>
         </h2>

         <div class="view_more_karamkand_carowsal owl-carousel owl-theme">
            <div class="karamkand_box">
               <img src="images/karamkandimage6.png">
               <div class="karamkand_box_main_title">
                  <h3>Karamkand H1</h3>
                  <h2>₹2.5k</h2>
               </div>
               <p>On sait depuis longtemps que travailler avec du texte
                  lisible et contenant du sens est source de
                  distractions.</p>
               <a href="#" class="btn btn_line_dtl">View Details</a>
            </div>
            <div class="karamkand_box">
               <img src="images/karamkandimage6.png">
               <div class="karamkand_box_main_title">
                  <h3>Karamkand H2</h3>
                  <h2>₹2.5k</h2>
               </div>
               <p>On sait depuis longtemps que travailler avec du texte
                  lisible et contenant du sens est source de
                  distractions.</p>
               <a href="#" class="btn btn_line_dtl">View Details</a>
            </div>
            <div class="karamkand_box">
               <img src="images/karamkandimage6.png">
               <div class="karamkand_box_main_title">
                  <h3>Karamkand H3</h3>
                  <h2>₹2.5k</h2>
               </div>
               <p>On sait depuis longtemps que travailler avec du texte
                  lisible et contenant du sens est source de
                  distractions.</p>
               <a href="#" class="btn btn_line_dtl">View Details</a>
            </div>
            <div class="karamkand_box">
               <img src="images/karamkandimage6.png">
               <div class="karamkand_box_main_title">
                  <h3>Karamkand H1</h3>
                  <h2>₹2.5k</h2>
               </div>
               <p>On sait depuis longtemps que travailler avec du texte
                  lisible et contenant du sens est source de
                  distractions.</p>
               <a href="#" class="btn btn_line_dtl">View Details</a>
            </div>
            <div class="karamkand_box">
               <img src="images/karamkandimage6.png">
               <div class="karamkand_box_main_title">
                  <h3>Karamkand H2</h3>
                  <h2>₹2.5k</h2>
               </div>
               <p>On sait depuis longtemps que travailler avec du texte
                  lisible et contenant du sens est source de
                  distractions.</p>
               <a href="#" class="btn btn_line_dtl">View Details</a>
            </div>
            <div class="karamkand_box">
               <img src="images/karamkandimage6.png">
               <div class="karamkand_box_main_title">
                  <h3>Karamkand H3</h3>
                  <h2>₹2.5k</h2>
               </div>
               <p>On sait depuis longtemps que travailler avec du texte
                  lisible et contenant du sens est source de
                  distractions.</p>
               <a href="#" class="btn btn_line_dtl">View Details</a>
            </div>
            <div class="karamkand_box">
               <img src="images/karamkandimage6.png">
               <div class="karamkand_box_main_title">
                  <h3>Karamkand H1</h3>
                  <h2>₹2.5k</h2>
               </div>
               <p>On sait depuis longtemps que travailler avec du texte
                  lisible et contenant du sens est source de
                  distractions.</p>
               <a href="#" class="btn btn_line_dtl">View Details</a>
            </div>
         </div>

      </div>
   </div> --}}

   @include('frontend.common.index')
</section>


@endsection