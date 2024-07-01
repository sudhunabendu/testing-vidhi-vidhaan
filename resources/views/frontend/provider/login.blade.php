@extends('frontend.master')

@section('content')

<div class="banner-start inner-banner-start"
    style="background-image: url({{URL::asset('/frontend/assets/images/Karamkand-banner.png')}})">
    <div class="container">
        <div class="banner-caption-box">
            <div class="banner-content-box">
                <h1>Astrologer Login</h1>

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
                            <h2 class="info_about_title">Login to <span>Your Account</span></h2>
                            {{-- <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                tempor
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
                            <form action="{{route('provider.post.login')}}" method="POST">
                                @csrf
                                <div class="log-in-form">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="Your Email">
                                    <i class="fa fa-envelope"></i>
                                    @error('email')
                                    <small class="text-danger" data-error='email'>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="log-in-form">
                                    <input type="password" class="form-control @error('email') is-invalid @enderror"
                                        name="password" placeholder="Password">
                                    <i class="fa fa-lock"></i>
                                    @error('password')
                                    <small class="text-danger" data-error='password'>{{ $message }}</small>
                                    @enderror
                                </div>
                                <a href="{{route('user-forget-password')}}" class="forgot-pass-btn">Forgot Password</a>
                                <button type="submit" class="btn btn-secondary page_btn_dark ">Login</button>
                                <p class="sign-up-txt">Don't have an Account?<a href="{{route('registration')}}"> Sign
                                        Up</a></p>
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

        $("[name='password']").on("focus", function() {
            $("[data-error='password']").html("");
            $(this).removeClass("is-invalid");
        });
      
    });
    
</script>

@if(session('success'))
<script>
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