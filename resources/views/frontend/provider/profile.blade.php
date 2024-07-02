@extends('frontend.master')

@section('content')

<div class="banner-start inner-banner-start"
  style="background-image: url({{URL::asset('frontend/assets/images/Karamkand-banner.png')}})">
  <div class="container">
    <div class="banner-caption-box">
      <div class="banner-content-box">
        <h1>Profile</h1>

      </div>
    </div>
  </div>
</div>


<section class="login-start edit-pro-start">

  <div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->

    <div class="row">
      <div class="col-xl-4">
        <!-- Profile picture card-->
        <div class="card mb-4 mb-xl-0">
          <div class="card-header">Profile Picture</div>
          <div class="card-body text-center">
            <div class="upload_image_wrap">
              <form action="{{route('provider.profile.photo',$provider->userDetails->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="avatar-upload">
                  <div class="avatar-edit">
                    <input type='file' class="form-control @error('images') is-invalid @enderror" name="images" id="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"></label>
                  </div>
                  <div class="avatar-preview">
                    @if($provider->userDetails->images == null)
                    <div id="imagePreview"
                      style="background-image: url({{URL::asset('frontend/assets/images/uploadimage.png')}});">
                    </div>
                    @else
                    <div id="imagePreview"
                      style="background-image: url({{URL::asset('images/user_images/'.$provider->userDetails->images)}});">
                    </div>
                    @endif
                  </div>
                  @error('images')
                  <small class="text-danger" data-error='images'>{{ $message }}</small>
                  @enderror
                </div>
              <div class="py-4">
                <button type="submit" class="btn page_btn_dark">Update</button>
              </div>
            </form>

            </div>

            <!-- Profile picture image-->
            <!-- <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    
                      <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                     
                      <button class="btn page_btn_dark" type="button">Upload new image</button> -->
          </div>
        </div>
      </div>

      {{-- <div class="col-xl-8">
        <div class="card mb-4">
          <div class="card-header">Account Details</div>
          <div class="card-body">
            <form>
              <div class="row gx-3 mb-3">
                
                <div class="col-md-6">
                  <label class="small mb-1" for="inputFirstName">First
                    name</label>
                  <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name"
                    value="{{$provider->first_name}}">
                </div>
                
                <div class="col-md-6">
                  <label class="small mb-1" for="inputLastName">Last
                    name</label>
                  <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name"
                    value="{{$provider->last_name}}">
                </div>
              </div>
             
              <div class="row gx-3 mb-3">
               
                <div class="col-md-6">
                  <label class="small mb-1" for="inputOrgName">Organization
                    name</label>
                  <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name"
                    value="Start Bootstrap">
                </div>
                
                <div class="col-md-6">
                  <label class="small mb-1" for="inputLocation">Location</label>
                  <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location"
                    value="San Francisco, CA">
                </div>
              </div>
              
              <div class="mb-3">
                <label class="small mb-1" for="inputEmailAddress">Email
                  address</label>
                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address"
                  value="{{$provider->email}}" readonly>
              </div>
             
              <div class="row gx-3 mb-3">
                
                <div class="col-md-6">
                  <label class="small mb-1" for="inputPhone">Phone
                    number</label>
                  <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number"
                    value="{{$provider->mobile_number}}">
                </div>
                
              </div>
              
              <button class="btn page_btn_dark" type="button">Save
                changes</button>
            </form>
          </div>
        </div>
      </div> --}}
      @yield('provider_content')

    </div>
  </div>
</section>


@section('profile_astrologer')
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload").change(function() {
    readURL(this);
  });

</script>

{{-- <script type="text/javascript">
  $(function() {
      $("[name='images']").on("focus", function() {
          $("[data-error='images']").html("");
          $(this).removeClass("is-invalid");
      });
  }); --}}
  
</script>


@endsection

@endsection