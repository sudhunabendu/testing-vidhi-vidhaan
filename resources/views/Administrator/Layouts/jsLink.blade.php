    <!-- jQuery -->
    <script src="{{URL::asset('administrator/assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{URL::asset('administrator/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{URL::asset('administrator/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{URL::asset('administrator/assets/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{URL::asset('administrator/assets/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    {{-- <script src="{{URL::asset('administrator/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script> --}}
    {{-- <script src="{{URL::asset('administrator/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script> --}}
    <!-- jQuery Knob Chart -->
    <script src="{{URL::asset('administrator/assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{URL::asset('administrator/assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{URL::asset('administrator/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script
        src="{{URL::asset('administrator/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}">
    </script>
    <!-- Summernote -->
    <script src="{{URL::asset('administrator/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{URL::asset('administrator/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}">
    </script>
    <!-- AdminLTE App -->
    <script src="{{URL::asset('administrator/assets/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{URL::asset('administrator/assets/dist/js/demo.js')}}"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="{{URL::asset('administrator/assets/dist/js/pages/dashboard.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{URL::asset('administrator/assets/js/jquery.alphanum.js')}}"></script>
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
    @yield('productJS')
    @yield('productAddJs')
    @yield('editProduct')
    @yield('servicesJs')
    @yield('contactJS')
    @yield('usersJS')
    @yield('categoryJS')
    @yield('addcategoryJS')
    @yield('gemstoneJS')
    @yield('karmkandJs')
    @yield('bookingJS')
    @yield('editGemstoneJs')
    @yield('testimonialJS')
    @yield('testimonialsAddJs')