@extends('frontend.master')

@section('content')

<div class="banner-start inner-banner-start"
    style="background-image: url({{URL::asset('/frontend/assets/images/Karamkand-banner.png')}})">
    <div class="container">
        <div class="banner-caption-box">
            <div class="banner-content-box">
                <h1>Forget Password</h1>

            </div>
        </div>
    </div>

</div>


<section class="login-start">
    <div class="container">
        <div class="inner-login-box-start">
            <div class="row align-items-center">
                <div class="col-lg-6"> <img src="{{URL::asset('/frontend/assets/images/login-img.jpg')}}"
                        class="img-fluid login-image" alt=""> </div>
                <div class="col-lg-6">
                    <div class="inner-main-login-form-box">
                        <div class="heading-hd">
                            <h2 class="info_about_title">Forget Password to <span>Your Account</span></h2>
                            {{-- <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt ut labore et dolore</p> --}}
                        </div>
                        <ul class="list-inline inner-login-social-box clearfix">
                            {{-- <li><a href="" class="login-social-bx"><img src="images/google.png" alt=""> Sign Up
                                    With Google</a></li> --}}
                            {{-- <li><a href="" class="login-social-bx"><img src="images/linkedin.png" alt=""> Sign Up
                                    With Linkedin</a></li> --}}
                            {{-- <li><a href="" class="login-social-bx"><img src="images/facebook.png" alt=""> Sign Up
                                    With Facebook</a></li> --}}
                            {{-- <li><a href="" class="login-social-bx"><img src="images/apple.png" alt=""> Sign Up With
                                    Apple</a></li> --}}
                        </ul>
                        <div class="login-form-box">
                            <form action="{{route('user.submit.request')}}" method="POST">
                                @csrf
                                <div class="log-in-form">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your Email">
                                    <i class="fa fa-envelope"></i>
                                    @error('email')
                                    <small class="text-danger" data-error='email'>{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-secondary page_btn_dark ">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@section('loginJs')
<script type="text/javascript">
    $(function() {

        $("[name='email']").on("focus", function() {
            $("[data-error='email']").html("");
            $(this).removeClass("is-invalid");
        });
      
    });
    
</script>

@if(session('success'))
<script>
// Swal.fire({
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