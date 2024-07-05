@extends('frontend.master')

@section('content')

@section('astro_details_CSS')
<style>
   .whatsapp-button {
       display: inline-flex;
       align-items: center;
       justify-content: center;
       background-color: #25D366;
       color: white;
       padding: 10px 20px;
       border-radius: 5px;
       text-decoration: none;
       font-size: 16px;
       transition: background-color 0.3s ease;
       border-radius: 25px;
   }

   .whatsapp-button:hover {
       background-color: #1EBE57;
   }

   .whatsapp-button i {
       margin-right: 10px;
   }
</style>
@endsection

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
                     <li>
                        <h6>Customer Ratings: <span>4.8</span><i class="fa fa-star" aria-hidden="true"></i></h6>
                     </li>
                     <li>
                        <h6>Qualification : <span>{{ucfirst($provider->userDetails->education)}}</span></h6>
                     </li>
                     <li>
                        <h6>Experience : <span>{{$provider->userDetails->experience}} Years</span></h6>
                     </li>
                     <li>
                        <h6>Location : <span>{{ucfirst($city->name)}}</span></h6>
                     </li>
                  </ul>

                  <h6>Book this astrologer at : <span>+91 7859658745</span></h6>
                  <a href="https://api.whatsapp.com/send?phone=8583069106" target="_blank" class="whatsapp-button"><i class="fab fa-whatsapp"></i>Book Online Astrologer<br>
                     <strong>Chat with me</strong></a>
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
                        <button type="button" class="btn page_btn_dark" data-toggle="modal"
                           data-target="#exampleModal">Book Online</button>
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

   <!-- Modal -->
   <div class="modal fade book_astrologer_modal" id="exampleModal" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Book Astrologer {{ucfirst($provider->first_name)}}</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               {{-- <div class="container"> --}}
                  <form action="{{route('service.booking')}}" method="POST" class="book_astrologer_modalfrm">
                     @csrf
                     <div class="row">
                        <input type="hidden" id="astrologer" name="astrologer" value="{{$provider->id}}">
                        <input type="hidden" id="price" name="price" value="{{$provider->userDetails->price}}">
                        <div class="col-md-6 col-12">
                           <div class="form-group">
                              <label for="date">Select Date<span style="color:red">*</span></label>
                              <input type="date" class="form-control" id="astro_date" name="date"
                                 placeholder="Enter Date">
                                 <div class="invalid-feedback">Input field is required.</div>
                           </div>
                        </div>
                        <div class="col-md-6 col-12">
                           <div class="form-group">
                              <label for="time-slot">Select Time</label>
                              <select id="time_slot" name="time_slot" class="form-control">
                                 <!-- Time slots will be dynamically generated here -->
                              </select>
                              <div class="invalid-feedback">Select field is required.</div>
                           </div>
                        </div>
                        <div class="col-md-12 col-12">
                           <button type="button" id="submit_astrologer" class="btn page_btn_dark">Submit</button>
                        </div>
                     </div>
                  </form>
                  {{--
               </div> --}}

            </div>
            {{-- <div class="modal-footer">

               <button type="button" class="btn page_btn_dark">Submit</button>
            </div> --}}
         </div>
      </div>
   </div>
   @include('frontend.common.index')
</section>

@section('astro_details')

{{-- <script>
   $(document).ready(function() {
         $('#astro_date, #time_slot').on('click', function() {
         $(this).removeClass('is-invalid');
         $(this).next('.invalid-feedback').hide();
      });
    });
</script> --}}

<script>
   $(document).ready(function(){
      $('#astro_date, #time_slot').on('click', function() {
         $(this).removeClass('is-invalid');
         $(this).next('.invalid-feedback').hide();
      });
      $('#submit_astrologer').click(function(e){
         e.preventDefault();
         var astrologer = $('#astrologer').val();
         var price = $('#price').val();
         var astro_date = $('#astro_date').val();
         var time_slot = $('#time_slot').val();
         var path = "{{route('service.booking')}}";
         var token = "{{ csrf_token() }}";
         var isValid = true;

         if(astro_date === '') {
            $('#astro_date').addClass('is-invalid');
            $('#astro_date').next('.invalid-feedback').show();
            isValid = false;
         }

         if(time_slot === '') {
            $('#time_slot').addClass('is-invalid');
            $('#time_slot').next('.invalid-feedback').show();
            isValid = false;
         }
         if (!isValid) {
            return false;
         }
         
         // console.log(astrologer,astro_date,time_slot);
         $.ajax({
            url: path,
            type: 'POST',
            dataType: 'json',
            data: {
                astrologer: astrologer,
                astro_date: astro_date,
                time_slot: time_slot,
                price: price,
                _token: token,
            },
            success: function(response){
               if(response.res_code == 201){
                  toastr.options = {
                     "closeButton": true,
                     "progressBar": true
                  }
                  toastr.error(response['response'], null, {
                     timeOut: 5000,
                     fadeOut: 1000,
                     onHidden: function() {
                        var loginUrl = "{{route('login')}}";
                        window.location.href = loginUrl;
                     }
                  });
               } else {
                  console.log(response);
                  toastr.options = {
                     "closeButton": true,
                     "progressBar": true
                  }
                  toastr.success(response['response'], null, {
                     timeOut: 5000,
                     fadeOut: 1000,
                     onHidden: function() {
                        location.reload();
                        // var loginUrl = "{{route('login')}}";
                        // window.location.href = loginUrl;
                     }
                  });
               }
               
               // if(response.success == true){
                 
               //    console.log(response);
               //    // location.reload();
               // }else{
               //    // alert(response.message);
               // }
            },
            error: function(xhr, status, error){
               console.log(xhr.responseText);
            }
         })
      });
   });
</script>

<script>
   document.addEventListener('DOMContentLoaded', function() {
       // Get today's date
       const today = new Date();
       
       // Increment the date by one day
       const tomorrow = new Date(today);
       tomorrow.setDate(today.getDate() + 1);
 
       // Format the date to YYYY-MM-DD
       const yyyy = tomorrow.getFullYear();
       const mm = String(tomorrow.getMonth() + 1).padStart(2, '0');
       const dd = String(tomorrow.getDate()).padStart(2, '0');
       const minDate = `${yyyy}-${mm}-${dd}`;
 
       // Set the min attribute to the input field
       document.getElementById('astro_date').setAttribute('min', minDate);
   });
</script>


<script>
   document.addEventListener('DOMContentLoaded', function() {
       const select = document.getElementById('time_slot');
 
       // Generate time slots from 08:00 to 17:00 at 30-minute intervals
       for (let hour = 11; hour <= 17; hour++) {
           for (let minute = 0; minute < 60; minute += 30) {
               const timeSlot = new Date(0, 0, 0, hour, minute).toLocaleTimeString([], {
                   hour: '2-digit',
                   minute: '2-digit'
               });
               const option = document.createElement('option');
               option.value = timeSlot;
               option.textContent = timeSlot;
               select.appendChild(option);
           }
       }
   });
</script>

{{-- <script>
   document.addEventListener('DOMContentLoaded', function() {
       // Get today's date and time
       const today = new Date();
       
       // Increment the date by one day to disable today and past dates
       const tomorrow = new Date(today);
       tomorrow.setDate(today.getDate() + 1);

       // Format the date and time to YYYY-MM-DDTHH:MM (datetime-local format)
       const yyyy = tomorrow.getFullYear();
       const mm = String(tomorrow.getMonth() + 1).padStart(2, '0');
       const dd = String(tomorrow.getDate()).padStart(2, '0');
       const hh = String(tomorrow.getHours()).padStart(2, '0');
       const min = String(tomorrow.getMinutes()).padStart(2, '0');
       const formattedDateTime = `${yyyy}-${mm}-${dd}T${hh}:${min}`;

       // Set the min attribute to the input field
       document.getElementById('time_slot').setAttribute('min', formattedDateTime);
   });
</script> --}}


@endsection

@endsection