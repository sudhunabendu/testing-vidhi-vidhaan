<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::asset('administrator/assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet"
        href="{{URL::asset('administrator/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{URL::asset('administrator/assets/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('administrator/assets/css/style.css')}}">
</head>

<body class="hold-transition login-page">

    <div class="ttt-toast">
        @include('Administrator.Layouts.notify')
    </div>

    <div class="p-1"><img
        src="{{URL::asset('frontend/assets/images/main-logo.png')}}"
        {{-- width="100px" height="100px" --}} class="img-fluid login-logo"
        alt="branding logo"></div>
    
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Admin</b>Login</a>
            
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{route('postLogin')}}" method="POST">
                    @csrf
                    <div class="form-group mb-3">

                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Your Email" autocomplete="off">

                        @error('email')
                        <small class="text-danger" data-error='email'>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">

                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password"
                            autocomplete="off">

                        @error('password')
                        <small class="text-danger" data-error='password'>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        {{-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div> --}}
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                {{-- <p class="mb-1">
                    <a href="{{route('forget-password')}}">forgot password</a>
                </p> --}}
                {{-- <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> --}}
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{URL::asset('administrator/assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{URL::asset('administrator/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{URL::asset('administrator/assets/dist/js/adminlte.min.js')}}"></script>
    <script src="{{URL::asset('administrator/assets/js/jquery.alphanum.js')}}"></script>

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

    <script>
        setTimeout(function() {
  
      $('#alert').slideUp();
  
    }, 4000);
    </script>


    <script>
        setTimeout(function() {
      $('.toast').fadeOut();
    }, 4000);
    </script>
</body>

</html>