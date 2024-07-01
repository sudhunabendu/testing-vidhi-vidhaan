<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    {{-- <title>Admin | Dashboard</title> --}}
  

   @include('Administrator.Layouts.cssLink')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{URL::asset('administrator/assets/kOnzy.gif')}}"
            {{-- <img class="animation__shake" src="{{URL::asset('administrator/assets/dist/img/AdminLTELogo.png')}}" --}}
                alt="AdminLTELogo" height="100" width="100">
        </div>

        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <div class="cssload-speeding-wheel animation__shake "></div>
        </div> --}}

        <!-- Navbar -->
        @include('Administrator.Layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        
        @include('Administrator.Layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
           
            @yield('content')
            
        </div>
        <!-- /.content-wrapper -->
        @include('Administrator.Layouts.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('Administrator.Layouts.jsLink')
    
</body>

</html>