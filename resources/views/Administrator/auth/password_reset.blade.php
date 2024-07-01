<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forget | Password </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::asset('administrator/assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{URL::asset('administrator/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::asset('administrator/assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
  @include('Administrator.Layouts.notify')
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Forget</b> Password </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Enter your email address & we will send you a link to reset your password!</p>

      <form action="{{route('admin.submit.request')}}" method="post">
        @csrf
        <div class="from-group mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" autocomplete="off">
          
          @error('email')
          <small class="text-danger" data-error='email'>{{ $message }}</small>
          @enderror

        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-block">Password Reset Link</button>
          </div>
       
      </form>
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
<script src="{{URL::asset('administrator/assets/jquery.alphanum.js')}}"></script>

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