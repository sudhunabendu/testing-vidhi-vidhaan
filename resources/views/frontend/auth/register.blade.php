@extends('frontend.master')

@section('content')

@section('reg_css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
@endsection

@include('frontend.Layouts.notify')

<div class="banner-start inner-banner-start"
    style="background-image: url({{URL::asset('/frontend/assets/images/Karamkand-banner.png')}})">
    <div class="container">
        <div class="banner-caption-box">
            <div class="banner-content-box">
                <h1>Register</h1>

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
                            <h2 class="info_about_title">Sign <span>Up</span></h2>
                            {{-- <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                tempor
                                invidunt ut labore et dolore</p> --}}
                        </div>
                        <ul class="list-inline inner-login-social-box clearfix">
                            {{-- <li><a href="" class="login-social-bx"><img src="images/google.png" alt=""> Sign Up
                                    With
                                    Google</a></li> --}}
                            {{-- <li><a href="" class="login-social-bx"><img src="images/linkedin.png" alt=""> Sign Up
                                    With
                                    Linkedin</a></li> --}}
                            {{-- <li><a href="" class="login-social-bx"><img src="images/facebook.png" alt=""> Sign Up
                                    With
                                    Facebook</a></li> --}}
                            {{-- <li><a href="" class="login-social-bx"><img src="images/apple.png" alt=""> Sign Up With
                                    Apple</a></li> --}}
                        </ul>
                        <div class="login-form-box">
                            <form action="{{route('user.register')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="log-in-form">
                                            <input type="text" name="first_name"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                placeholder="Enter First Name">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            @error('first_name')
                                            <small class="text-danger" data-error='first_name'>{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="log-in-form">
                                            <input type="text" name="last_name"
                                                class="form-control @error('last_name') is-invalid @enderror"
                                                placeholder="Enter Last Name">
                                            <i class="fa fa-user" aria-hidden="true"></i>

                                            @error('last_name')
                                            <small class="text-danger" data-error='last_name'>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="log-in-form">
                                    <input type="tel" name="mobile_number" id="mobile_number"
                                        class="form-control @error('mobile_number') is-invalid @enderror">
                                    {{-- <i class="fa fa-phone" aria-hidden="true"></i> --}}

                                    @error('mobile_number')
                                    <small class="text-danger" data-error='mobile_number'>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="log-in-form">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Your Your Email">
                                    <i class="fa fa-envelope"></i>
                                    @error('email')
                                    <small class="text-danger" data-error='email'>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="log-in-form">
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Password">
                                    <i class="fa fa-lock"></i>
                                    @error('password')
                                    <small class="text-danger" data-error='password'>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="log-in-form">
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        placeholder="Confirm Password">
                                    <i class="fa fa-lock"></i>
                                    @error('password_confirmation')
                                    <small class="text-danger" data-error='password_confirmation'>{{ $message }}</small>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-secondary page_btn_dark ">Sign up</button>

                                <p class="sign-up-txt">Already have an account?<a href="{{route('login')}}"> Log In</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('registrationJs')

<script type="text/javascript">
    $(function() {
        $("[name='first_name']").on("focus", function() {
            $("[data-error='first_name']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='last_name']").on("focus", function() {
            $("[data-error='last_name']").html("");
            $(this).removeClass("is-invalid");
        });

        $("[name='email']").on("focus", function() {
            $("[data-error='email']").html("");
            $(this).removeClass("is-invalid");
        });

        // $("[name='dial_code']").on("focus", function() {
        //     $("[data-error='dial_code']").html("");
        //     $(this).removeClass("is-invalid");
        // });

        $("[name='mobile_number']").on("focus", function() {
            $(this).numeric();
            $("[data-error='mobile_number']").html("");
            $(this).removeClass("is-invalid");
        });


        $("[name='email']").on("focus", function() {
            $("[data-error='email']").html("");
            $(this).removeClass("is-invalid");
        });

        $("[name='password']").on("focus", function() {
            $("[data-error='password']").html("");
            $(this).removeClass("is-invalid");
        });
        $("[name='password_confirmation']").on("focus", function() {
            $("[data-error='password_confirmation']").html("");
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


{{-- <script>
    var instance = $("[name=phone_no]")
    instance.intlTelInput();

    $("[name=phone_no]").on("blur", function() {
    console.log($(this).val())
    console.log(instance.intlTelInput('getSelectedCountryData').dialCode) //get counrty code
    })
</script> --}}



{{-- <script>
    $(function() {
    $("#country").change(function() {
        let countryCode = $(this).find('option:selected').data('country-code');
        let value = "+" + $(this).val();
        $('#txtPhone').val(value).intlTelInput("setCountry", countryCode);
    });
  
  var code = "+977";
  $('#txtPhone').val(code).intlTelInput();
});
</script> --}}


<script>
    var phone_number = window.intlTelInput(document.querySelector("#mobile_number"), {
    separateDialCode: true,
    preferredCountries:["in"],
    hiddenInput: "full",
    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
});


</script>


@endsection


@endsection