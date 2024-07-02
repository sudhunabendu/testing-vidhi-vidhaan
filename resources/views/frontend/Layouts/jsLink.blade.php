<script src="{{URL::asset('/frontend/assets/js/jquery.min.js')}}"></script> 
<script src="{{URL::asset('/frontend/assets/js/popper.min.js')}}"></script> 
<script src="{{URL::asset('/frontend/assets/js/bootstrap.min.js')}}"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js"></script> 
<script src="{{URL::asset('/frontend/assets/js/custom.js')}}"></script> 
<script src="{{URL::asset('/frontend/assets/js/wow.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{URL::asset('administrator/assets/js/jquery.alphanum.js')}}"></script>

<script>
   new WOW().init();
</script>

@yield('contact-js')
@yield('registrationJs')
@yield('loginJs')
@yield('homeJs')
@yield('cartJs')
@yield('product_Js')
@yield('shipptingJs')
@yield('aboutJs')
@yield('filters_gemstones_by_category')
@yield('gemstones_section_list')
@yield('profile_astrologer')
@yield('setting_astrologer')