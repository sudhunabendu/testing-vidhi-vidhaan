<!DOCTYPE html>
<html lang="en">

<head>
  <title>Vidhi Vidhaan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  @include('frontend.Layouts.cssLink')

</head>

<body>


   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Book Astrologer</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <form action="#" method="POST">
            @csrf
            <div class="container">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
              </div>
            </div>
             <button type="button" class="btn page_btn_dark">Submit</button>
             
         </form>
       </div>
       {{-- <div class="modal-footer">
        
         <button type="button" class="btn page_btn_dark">Submit</button>
       </div> --}}
     </div>
   </div>
 </div>


  <audio loop autoplay>
    <source src="{{URL::asset('frontend/assets/audio/puja.mp3')}}" type="audio/mpeg">
  </audio>
  {{-- @include('frontend.audio.index') --}}

  @include('frontend.Layouts.header')

  @yield('content')

  @include('frontend.Layouts.footer')

  @include('frontend.Layouts.jsLink')

</html>