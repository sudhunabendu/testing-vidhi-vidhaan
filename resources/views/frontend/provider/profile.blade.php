@extends('frontend.master')

@section('content')

<div class="banner-start inner-banner-start" style="background-image: url({{URL::asset('frontend/assets/images/Karamkand-banner.png')}})">
    <div class="container">
     <div class="banner-caption-box">
      <div class="banner-content-box">
       <h1>Edit Profile</h1>
         
        </div>
      </div>
    </div>
</div>


<section class="login-start">

    <div class="container-xl px-4 mt-4">
      <!-- Account page navigation-->

      <div class="row">
        <div class="col-xl-4">
          <!-- Profile picture card-->
          <div class="card mb-4 mb-xl-0">
            <div class="card-header">Profile Picture</div>
            <div class="card-body text-center">
              <div class="upload_image_wrap">

                <div class="avatar-upload">
                  <div class="avatar-edit">
                    <input type='file' id="imageUpload"
                      accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"></label>
                  </div>
                  <div class="avatar-preview">
                    <div id="imagePreview"
                      style="background-image: url(images/uploadimage.png);">
                    </div>
                  </div>
                </div>
              </div>

              <!-- Profile picture image-->
              <!-- <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    
                      <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                     
                      <button class="btn page_btn_dark" type="button">Upload new image</button> -->
            </div>
          </div>
        </div>
        <div class="col-xl-8">
          <!-- Account details card-->
          <div class="card mb-4">
            <div class="card-header">Account Details</div>
            <div class="card-body">
              <form>
                <!-- Form Group (username)-->
                <div class="mb-3">
                  <label class="small mb-1" for="inputUsername">Username (how
                    your name will appear to other users on the site)</label>
                  <input class="form-control" id="inputUsername" type="text"
                    placeholder="Enter your username" value="username">
                </div>
                <!-- Form Row-->
                <div class="row gx-3 mb-3">
                  <!-- Form Group (first name)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputFirstName">First
                      name</label>
                    <input class="form-control" id="inputFirstName"
                      type="text" placeholder="Enter your first name"
                      value="Valerie">
                  </div>
                  <!-- Form Group (last name)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputLastName">Last
                      name</label>
                    <input class="form-control" id="inputLastName" type="text"
                      placeholder="Enter your last name" value="Luna">
                  </div>
                </div>
                <!-- Form Row        -->
                <div class="row gx-3 mb-3">
                  <!-- Form Group (organization name)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputOrgName">Organization
                      name</label>
                    <input class="form-control" id="inputOrgName" type="text"
                      placeholder="Enter your organization name"
                      value="Start Bootstrap">
                  </div>
                  <!-- Form Group (location)-->
                  <div class="col-md-6">
                    <label class="small mb-1"
                      for="inputLocation">Location</label>
                    <input class="form-control" id="inputLocation" type="text"
                      placeholder="Enter your location"
                      value="San Francisco, CA">
                  </div>
                </div>
                <!-- Form Group (email address)-->
                <div class="mb-3">
                  <label class="small mb-1" for="inputEmailAddress">Email
                    address</label>
                  <input class="form-control" id="inputEmailAddress"
                    type="email" placeholder="Enter your email address"
                    value="name@example.com">
                </div>
                <!-- Form Row-->
                <div class="row gx-3 mb-3">
                  <!-- Form Group (phone number)-->
                  <div class="col-md-6">
                    <label class="small mb-1" for="inputPhone">Phone
                      number</label>
                    <input class="form-control" id="inputPhone" type="tel"
                      placeholder="Enter your phone number"
                      value="555-123-4567">
                  </div>
                  <!-- Form Group (birthday)-->
                  <div class="col-md-6">
                    <label class="small mb-1"
                      for="inputBirthday">Birthday</label>
                    <input class="form-control" id="inputBirthday" type="text"
                      name="birthday" placeholder="Enter your birthday"
                      value="06/10/1988">
                  </div>
                </div>
                <!-- Save changes button-->
                <button class="btn page_btn_dark" type="button">Save
                  changes</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection