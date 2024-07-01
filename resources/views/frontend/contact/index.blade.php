@extends('frontend.master')

@section('content')

@include('frontend.Layouts.notify')

<div class="banner-start inner-banner-start" style="background-image: url({{URL::asset('frontend/assets/images/Karamkand-banner.png')}})">
    <div class="container">
        <div class="banner-caption-box">
            <div class="banner-content-box">
                <h1>Contact Us</h1>
            </div>
        </div>
    </div>

</div>

<section class="login-start pb-0">
    <div class="container">
        <div class="inn-main-contact-box">
            <h2 class="info_about_title">Send Us <span>a Message</span></h2>
            <form action="{{route('contact-us')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <label>Your Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Your Full Name">
                        @error('name')
                        <small class="text-danger" data-error='name'>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <label>Your Email</label>
                        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Enter Email Address">
                        @error('email')
                        <small class="text-danger" data-error='email'>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <label>Your Contact</label>
                        <input type="text" name="mobile_number" class="form-control  @error('mobile_number') is-invalid @enderror" placeholder="Enter Your Mobile Number">
                        @error('mobile_number')
                        <small class="text-danger" data-error='mobile_number'>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-lg-12">
                        <label>Message </label>
                        <textarea name="message" class="form-control @error('message') is-invalid @enderror " rows="4" placeholder=""></textarea>
                        @error('message')
                        <small class="text-danger" data-error='message'>{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn page_btn_dark">Send Message</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    
</section>


<div class="contact-us-start">
    <div class="container">
        <div class="home_blog_title">
            <h6 class="info_about_small">Contact Us</h6>
            <h2 class="info_about_title">Let’s Get <span>Connected</span></h2>
        </div>
        <div class="contact-us-box">
            <div class="contact-us-bx-main">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3606.7512156996195!2d82.98548457538557!3d25.31256137763692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398e2dfeaa3834db%3A0x30874e4dc46a5864!2sd64%2C%20127E%2C%20Chhittupura%2C%20Sigra%2C%20Varanasi%2C%20Uttar%20Pradesh%20221010!5e0!3m2!1sen!2sin!4v1715941749777!5m2!1sen!2sin"
                            width="100%" height="415" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-lg-7 pl-lg-5">
                        <div class="home-contact-information-box">
                            <h4>Address</h4>
                            <p>d64, 127E, Chhittupura, Sigra, Varanasi, Uttar Pradesh 221010, India</p>
                        </div>
                        <div class="home-contact-information-box">
                            <h4>Email</h4>
                            <p>vidhividhaan44@gmail.com</p>
                            <p>Info@vidhividaan.com</p>
                        </div>
                        <div class="home-contact-information-box">
                            <h4>Phone Number</h4>
                            <p>+91 8976543456</p>
                            <p>+91 8965780097</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('contact-js')
<script type="text/javascript">
    $(function() {
        $("[name='name']").on("focus", function() {
            $("[data-error='name']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='email']").on("focus", function() {
            $("[data-error='email']").html("");
            $(this).removeClass("is-invalid");
        });
        
        $("[name='mobile_number']").on("focus", function() {
            $(this).numeric();
            $("[data-error='mobile_number']").html("");
            $(this).removeClass("is-invalid");
        });

        $("[name='message']").on("focus", function() {
            $("[data-error='message']").html("");
            $(this).removeClass("is-invalid");
        });
      
    });
</script>


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
@endsection

@endsection