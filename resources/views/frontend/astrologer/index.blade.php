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

<div class="inner-testimonial-start">
   <div class="container">
      <div class="home_blog_title">
         <h6 class="info_about_small">Our AstrolOgerS</h6>
         <h2 class="info_about_title"><span>Book an</span> Astrologer</h2>
      </div>
      <div class="row">

         @foreach ($services as $service)
         <div class="col-lg-4 col-md-6">
            <div class="flip-card" tabIndex="0">
               <div class="flip-card-inner">
                  <div class="flip-card-front">
                     <div class="inner-page-astroimg">
                        <img src="{{URL::asset('images/service_images/'.$service->images)}}" alt="">
                     </div>
                     <div class="astro-inn-name-bx">
                        <div>
                           <h4>{{$service->name}}</h4>
                           <p>Master of Astrology </p>
                        </div>
                        <button class="btn inn-book-astro-btn"><img
                              src="{{URL::asset('frontend/assets/images/up-arrow.png')}}" alt=""></button>
                     </div>
                  </div>
                  <div class="flip-card-back">
                     <img src="{{URL::asset('frontend/assets/images/astrologerimg1.png')}}"
                        class="flip-card-back-new-img" alt="">
                     <div class="flip-card-astro">
                        <img src="{{URL::asset('images/service_images/'.$service->images)}}" class="flipastro-img"
                           alt="">
                        <div class="flip-card-astroname">
                           <h4>{{$service->name}}</h4>
                           <p>Master of Astrology </p>
                        </div>
                        <p class="flipastro-txt">{{ \Illuminate\Support\Str::limit($service->description, 150, '...')}}</p>
                        {{-- <div class="flip-astro-datetime">
                           <i class="fa-regular fa-calendar"></i>
                           <div>
                              <h5>Friday - Saturday</h5>
                              <p>(10.30am-11.30am)</p>
                           </div>
                        </div> --}}
                        <ul class="list-inline flip-astro-btn">
                           <li><a href="{{route('astrologer.details',$service->slug)}}" class="btn">Consult me</a></li>
                           {{-- <li><a href="" class="btn">Add to Cart</a></li> --}}
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endforeach

        

         {{-- <div class="col-lg-4 col-md-6">
            <div class="flip-card" tabIndex="0">
               <div class="flip-card-inner">
                  <div class="flip-card-front">
                     <div class="inner-page-astroimg">
                        <img src="{{URL::asset('frontend/assets/images/astrologerimg2.png')}}" alt="">
                     </div>
                     <div class="astro-inn-name-bx">
                        <div>
                           <h4>Sasthri Guru</h4>
                           <p>Master of Astrology </p>
                        </div>
                        <button class="btn inn-book-astro-btn"><img
                              src="{{URL::asset('frontend/assets/images/up-arrow.png')}}" alt=""></button>
                     </div>
                  </div>
                  <div class="flip-card-back">
                     <img src="{{URL::asset('frontend/assets/images/astrologerimg2.png')}}"
                        class="flip-card-back-new-img" alt="">
                     <div class="flip-card-astro">
                        <img src="{{URL::asset('frontend/assets/images/astrologerimg2.png')}}" class="flipastro-img"
                           alt="">
                        <div class="flip-card-astroname">
                           <h4>Sasthri Guru</h4>
                           <p>Master of Astrology </p>
                        </div>
                        <p class="flipastro-txt">On sait depuis longtemps que travailler avecdu texte lisible et
                           contenant. Plusieurs variations de Lorem Ipsum peuvent être.</p>
                        <div class="flip-astro-datetime">
                           <i class="fa-regular fa-calendar"></i>
                           <div>
                              <h5>Friday - Saturday</h5>
                              <p>(10.30am-11.30am)</p>
                           </div>
                        </div>
                        <ul class="list-inline flip-astro-btn">
                           <li><a href="" class="btn">Consult me</a></li>
                           <li><a href="" class="btn">Add to Cart</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div> --}}

         {{-- <div class="col-lg-4 col-md-6">
            <div class="flip-card" tabIndex="0">
               <div class="flip-card-inner">
                  <div class="flip-card-front">
                     <div class="inner-page-astroimg">
                        <img src="{{URL::asset('frontend/assets/images/astrologerimg3.png')}}" alt="">
                     </div>
                     <div class="astro-inn-name-bx">
                        <div>
                           <h4>Mrinalini</h4>
                           <p>Master of Astrology </p>
                        </div>
                        <button class="btn inn-book-astro-btn"><img
                              src="{{URL::asset('frontend/assets/images/up-arrow.png')}}" alt=""></button>
                     </div>
                  </div>
                  <div class="flip-card-back">
                     <img src="{{URL::asset('frontend/assets/images/astrologerimg3.png')}}"
                        class="flip-card-back-new-img" alt="">
                     <div class="flip-card-astro">
                        <img src="{{URL::asset('frontend/assets/images/astrologerimg3.png')}}" class="flipastro-img"
                           alt="">
                        <div class="flip-card-astroname">
                           <h4>Mrinalini</h4>
                           <p>Master of Astrology </p>
                        </div>
                        <p class="flipastro-txt">On sait depuis longtemps que travailler avecdu texte lisible et
                           contenant. Plusieurs variations de Lorem Ipsum peuvent être.</p>
                        <div class="flip-astro-datetime">
                           <i class="fa-regular fa-calendar"></i>
                           <div>
                              <h5>Friday - Saturday</h5>
                              <p>(10.30am-11.30am)</p>
                           </div>
                        </div>
                        <ul class="list-inline flip-astro-btn">
                           <li><a href="" class="btn">Consult me</a></li>
                           <li><a href="" class="btn">Add to Cart</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div> --}}

         {{-- <div class="col-lg-4 col-md-6">
            <div class="flip-card" tabIndex="0">
               <div class="flip-card-inner">
                  <div class="flip-card-front">
                     <div class="inner-page-astroimg">
                        <img src="{{URL::asset('frontend/assets/images/astrologerimg4.png')}}" alt="">
                     </div>
                     <div class="astro-inn-name-bx">
                        <div>
                           <h4>Ritika Jain</h4>
                           <p>Master of Astrology </p>
                        </div>
                        <button class="btn inn-book-astro-btn"><img
                              src="{{URL::asset('frontend/assets/images/up-arrow.png')}}" alt=""></button>
                     </div>
                  </div>
                  <div class="flip-card-back">
                     <img src="{{URL::asset('frontend/assets/images/astrologerimg4.png')}}"
                        class="flip-card-back-new-img" alt="">
                     <div class="flip-card-astro">
                        <img src="{{URL::asset('frontend/assets/images/astrologerimg4.png')}}" class="flipastro-img"
                           alt="">
                        <div class="flip-card-astroname">
                           <h4>Ritika Jain</h4>
                           <p>Master of Astrology </p>
                        </div>
                        <p class="flipastro-txt">On sait depuis longtemps que travailler avecdu texte lisible et
                           contenant. Plusieurs variations de Lorem Ipsum peuvent être.</p>
                        <div class="flip-astro-datetime">
                           <i class="fa-regular fa-calendar"></i>
                           <div>
                              <h5>Friday - Saturday</h5>
                              <p>(10.30am-11.30am)</p>
                           </div>
                        </div>
                        <ul class="list-inline flip-astro-btn">
                           <li><a href="" class="btn">Consult me</a></li>
                           <li><a href="" class="btn">Add to Cart</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div> --}}

         {{-- <div class="col-lg-4 col-md-6">
            <div class="flip-card" tabIndex="0">
               <div class="flip-card-inner">
                  <div class="flip-card-front">
                     <div class="inner-page-astroimg">
                        <img src="{{URL::asset('frontend/assets/images/astrologerimg5.png')}}" alt="">
                     </div>
                     <div class="astro-inn-name-bx">
                        <div>
                           <h4>Mrinal dev</h4>
                           <p>Master of Astrology </p>
                        </div>
                        <button class="btn inn-book-astro-btn"><img
                              src="{{URL::asset('frontend/assets/images/up-arrow.png')}}" alt=""></button>
                     </div>
                  </div>
                  <div class="flip-card-back">
                     <img src="{{URL::asset('frontend/assets/images/astrologerimg5.png')}}"
                        class="flip-card-back-new-img" alt="">
                     <div class="flip-card-astro">
                        <img src="{{URL::asset('frontend/assets/images/astrologerimg5.png')}}" class="flipastro-img"
                           alt="">
                        <div class="flip-card-astroname">
                           <h4>Mrinal dev</h4>
                           <p>Master of Astrology </p>
                        </div>
                        <p class="flipastro-txt">On sait depuis longtemps que travailler avecdu texte lisible et
                           contenant. Plusieurs variations de Lorem Ipsum peuvent être.</p>
                        <div class="flip-astro-datetime">
                           <i class="fa-regular fa-calendar"></i>
                           <div>
                              <h5>Friday - Saturday</h5>
                              <p>(10.30am-11.30am)</p>
                           </div>
                        </div>
                        <ul class="list-inline flip-astro-btn">
                           <li><a href="" class="btn">Consult me</a></li>
                           <li><a href="" class="btn">Add to Cart</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div> --}}

         {{-- <div class="col-lg-4 col-md-6">
            <div class="flip-card" tabIndex="0">
               <div class="flip-card-inner">
                  <div class="flip-card-front">
                     <div class="inner-page-astroimg">
                        <img src="{{URL::asset('frontend/assets/images/astrologerimg6.png')}}" alt="">
                     </div>
                     <div class="astro-inn-name-bx">
                        <div>
                           <h4>Rohini </h4>
                           <p>Master of Astrology </p>
                        </div>
                        <button class="btn inn-book-astro-btn"><img
                              src="{{URL::asset('frontend/assets/images/up-arrow.png')}}" alt=""></button>
                     </div>
                  </div>
                  <div class="flip-card-back">
                     <img src="{{URL::asset('frontend/assets/images/astrologerimg6.png')}}"
                        class="flip-card-back-new-img" alt="">
                     <div class="flip-card-astro">
                        <img src="{{URL::asset('frontend/assets/images/astrologerimg6.png')}}" class="flipastro-img"
                           alt="">
                        <div class="flip-card-astroname">
                           <h4>Rohini </h4>
                           <p>Master of Astrology </p>
                        </div>
                        <p class="flipastro-txt">On sait depuis longtemps que travailler avecdu texte lisible et
                           contenant. Plusieurs variations de Lorem Ipsum peuvent être.</p>
                        <div class="flip-astro-datetime">
                           <i class="fa-regular fa-calendar"></i>
                           <div>
                              <h5>Friday - Saturday</h5>
                              <p>(10.30am-11.30am)</p>
                           </div>
                        </div>
                        <ul class="list-inline flip-astro-btn">
                           <li><a href="" class="btn">Consult me</a></li>
                           <li><a href="" class="btn">Add to Cart</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div> --}}

         {{-- <div class="col-lg-4 col-md-6">
            <div class="flip-card" tabIndex="0">
               <div class="flip-card-inner">
                  <div class="flip-card-front">
                     <div class="inner-page-astroimg">
                        <img src="{{URL::asset('frontend/assets/images/astrologerimg7.png')}}" alt="">
                     </div>
                     <div class="astro-inn-name-bx">
                        <div>
                           <h4>Ritika Jain</h4>
                           <p>Master of Astrology </p>
                        </div>
                        <button class="btn inn-book-astro-btn"><img
                              src="{{URL::asset('frontend/assets/images/up-arrow.png')}}" alt=""></button>
                     </div>
                  </div>
                  <div class="flip-card-back">
                     <img src="{{URL::asset('frontend/assets/images/astrologerimg7.png')}}"
                        class="flip-card-back-new-img" alt="">
                     <div class="flip-card-astro">
                        <img src="{{URL::asset('frontend/assets/images/astrologerimg7.png')}}" class="flipastro-img"
                           alt="">
                        <div class="flip-card-astroname">
                           <h4>Ritika Jain</h4>
                           <p>Master of Astrology </p>
                        </div>
                        <p class="flipastro-txt">On sait depuis longtemps que travailler avecdu texte lisible et
                           contenant. Plusieurs variations de Lorem Ipsum peuvent être.</p>
                        <div class="flip-astro-datetime">
                           <i class="fa-regular fa-calendar"></i>
                           <div>
                              <h5>Friday - Saturday</h5>
                              <p>(10.30am-11.30am)</p>
                           </div>
                        </div>
                        <ul class="list-inline flip-astro-btn">
                           <li><a href="" class="btn">Consult me</a></li>
                           <li><a href="" class="btn">Add to Cart</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div> --}}

         {{-- <div class="col-lg-4 col-md-6">
            <div class="flip-card" tabIndex="0">
               <div class="flip-card-inner">
                  <div class="flip-card-front">
                     <div class="inner-page-astroimg">
                        <img src="{{URL::asset('frontend/assets/images/astrologerimg8.png')}}" alt="">
                     </div>
                     <div class="astro-inn-name-bx">
                        <div>
                           <h4>Mrinal dev</h4>
                           <p>Master of Astrology </p>
                        </div>
                        <button class="btn inn-book-astro-btn"><img
                              src="{{URL::asset('frontend/assets/images/up-arrow.png')}}" alt=""></button>
                     </div>
                  </div>
                  <div class="flip-card-back">
                     <img src="{{URL::asset('frontend/assets/images/astrologerimg8.png')}}"
                        class="flip-card-back-new-img" alt="">
                     <div class="flip-card-astro">
                        <img src="{{URL::asset('frontend/assets/images/astrologerimg8.png')}}" class="flipastro-img"
                           alt="">
                        <div class="flip-card-astroname">
                           <h4>Mrinal dev</h4>
                           <p>Master of Astrology </p>
                        </div>
                        <p class="flipastro-txt">On sait depuis longtemps que travailler avecdu texte lisible et
                           contenant. Plusieurs variations de Lorem Ipsum peuvent être.</p>
                        <div class="flip-astro-datetime">
                           <i class="fa-regular fa-calendar"></i>
                           <div>
                              <h5>Friday - Saturday</h5>
                              <p>(10.30am-11.30am)</p>
                           </div>
                        </div>
                        <ul class="list-inline flip-astro-btn">
                           <li><a href="" class="btn">Consult me</a></li>
                           <li><a href="" class="btn">Add to Cart</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div> --}}

         {{-- <div class="col-lg-4 col-md-6">
            <div class="flip-card" tabIndex="0">
               <div class="flip-card-inner">
                  <div class="flip-card-front">
                     <div class="inner-page-astroimg">
                        <img src="{{URL::asset('frontend/assets/images/astrologerimg9.png')}}" alt="">
                     </div>
                     <div class="astro-inn-name-bx">
                        <div>
                           <h4>Rohini </h4>
                           <p>Master of Astrology </p>
                        </div>
                        <button class="btn inn-book-astro-btn"><img
                              src="{{URL::asset('frontend/assets/images/up-arrow.png')}}" alt=""></button>
                     </div>
                  </div>
                  <div class="flip-card-back">
                     <img src="{{URL::asset('frontend/assets/images/astrologerimg9.png')}}"
                        class="flip-card-back-new-img" alt="">
                     <div class="flip-card-astro">
                        <img src="{{URL::asset('frontend/assets/images/astrologerimg9.png')}}" class="flipastro-img"
                           alt="">
                        <div class="flip-card-astroname">
                           <h4>Rohini </h4>
                           <p>Master of Astrology </p>
                        </div>
                        <p class="flipastro-txt">On sait depuis longtemps que travailler avecdu texte lisible et
                           contenant. Plusieurs variations de Lorem Ipsum peuvent être.</p>
                        <div class="flip-astro-datetime">
                           <i class="fa-regular fa-calendar"></i>
                           <div>
                              <h5>Friday - Saturday</h5>
                              <p>(10.30am-11.30am)</p>
                           </div>
                        </div>
                        <ul class="list-inline flip-astro-btn">
                           <li><a href="" class="btn">Consult me</a></li>
                           <li><a href="" class="btn">Add to Cart</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div> --}}
      </div>
   </div>
</div>

@include('frontend.common.index')

@endsection