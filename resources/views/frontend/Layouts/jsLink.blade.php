<script src="{{URL::asset('/frontend/assets/js/jquery.min.js')}}"></script> 
<script src="{{URL::asset('/frontend/assets/js/popper.min.js')}}"></script> 
<script src="{{URL::asset('/frontend/assets/js/bootstrap.min.js')}}"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js"></script> 
{{-- <script src="{{URL::asset('/frontend/assets/js/custom.js')}}"></script>  --}}
<script src="{{URL::asset('/frontend/assets/js/wow.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{URL::asset('administrator/assets/js/jquery.alphanum.js')}}"></script>


<script>
   
	/*main menu*/
	jQuery(document).ready(function() {
        jQuery(".menu li").find("ul").parent().append("<span></span>");
       jQuery(".menuButton").click(function() {
           jQuery( ".menuButton" ).toggleClass( "arrow_change" );
		 	jQuery(".menuButton + ul").slideToggle(); 
		});
	   jQuery(".menu ul li span").click(function(){
           if(jQuery("span").parent().children("ul").is(":visible")){
               jQuery(this).parent().siblings().children("ul").slideUp();
           }
            jQuery(this).parent().children("ul").slideToggle();  
    });
    });
 
 jQuery(".myAccount span").click(function() {
           jQuery( ".myAccount span" ).toggleClass( "arrow_change" );
		 	jQuery(".myAccountDropdown").slideToggle(); 
		});




        //testimonial-slider
$('.testimonial-slider').owlCarousel({
    autoplay:true,
    autoplayTimeout:7000,
    loop: true,
    margin:0,
    nav: true,
    responsive: {
        0: {
            items: 1,
            dots:false,
        },
        600: {
            items:1,
            dots:false,
        },
        1000: {
            items:3,
            nav:true,
            dots:false,
            center:true
        }
    }
});

var baseUrl = "{{ url('/') }}";

// console.log(baseUrl);

         
// home page service js
$('.carowsal_rotetion_wrap').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
     navText: [`<img src='${baseUrl}/frontend/assets/images/carowsalleft.png'>`,`<img src='${baseUrl}/frontend/assets/images/carowsalright.png'>`],
    dots: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:3
        }
    }
})

// home book astrologer js

$('.book_astrologer_carowsal').owlCarousel({
    loop:false,
    margin:25,
    // dots:true,
     // navText: ["<img src='images/carowsalleft.png'>","<img src='images/carowsalright.png'>"],
    dots: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:3
        }
    }
})


// Gemstone  js

$('.buy_gemstone_carowsal').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
     navText: [`<img src='${baseUrl}/frontend/assets/images/carowsalleft.png'>`,`<img src='${baseUrl}/frontend/assets/images/carowsalright.png'>`],
    dots: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
})

        // counter js

        $.fn.jQuerySimpleCounter = function( options ) {
            var settings = $.extend({
                start:  0,
                end:    100,
                easing: 'swing',
                duration: 400,
                complete: ''
            }, options );
    
            var thisElement = $(this);
    
            $({count: settings.start}).animate({count: settings.end}, {
                duration: settings.duration,
                easing: settings.easing,
                step: function() {
                    var mathCount = Math.ceil(this.count);
                    thisElement.text(mathCount);
                },
                complete: settings.complete
            });
        };
    
    
    $('#number1').jQuerySimpleCounter({end: 5,duration: 3000});
    $('#number2').jQuerySimpleCounter({end: 80,duration: 3000});
    $('#number3').jQuerySimpleCounter({end: 10,duration: 2000});
    
    
    
    
        /* AUTHOR LINK */
         $('.about-me-img').hover(function(){
                $('.authorWindowWrapper').stop().fadeIn('fast').find('p').addClass('trans');
            }, function(){
                $('.authorWindowWrapper').stop().fadeOut('fast').find('p').removeClass('trans');
            });
    
    
    
    
    // about quots js
    $('.aboutpage_quotes_slider ').owlCarousel({
        center: true,
        items:2,
        loop:true,
        margin:40,
        dots: true,
        responsive:{
            600:{
                items:3
            }
        }
    });
    
    
    
    // view more karamkand slider
         
            $('.view_more_karamkand_carowsal').owlCarousel({
                loop:true,
                margin:30,
                // dots:true,
                 nav:true,
                 navText: [`<img src='${baseUrl}/frontend/assets/images/carowsalleft.png'>`,`<img src='${baseUrl}/frontend/assets/images/carowsalright.png'>`],
                dots: false,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:3
                    }
                }
            })
    
    
            // sync carowsal js
            $(document).ready(function() {
    
      var sync1 = $("#sync1");
      var sync2 = $("#sync2");
      var slidesPerPage = 4; //globaly define number of elements per page
      var syncedSecondary = true;
    
      sync1.owlCarousel({
        items : 1,
        slideSpeed : 2000,
        nav: false,
        autoplay: false,
        dots: false,
        loop: true,
        responsiveRefreshRate : 200,
    
      }).on('changed.owl.carousel', syncPosition);
    
      sync2
        .on('initialized.owl.carousel', function () {
          sync2.find(".owl-item").eq(0).addClass("current");
        })
        .owlCarousel({
    
        items : 3,
        dots: false,
        nav: true,
        nav: true,
        navText: [`<img src='${baseUrl}/frontend/assets/images/carowsalleft.png'>`,`<img src='${baseUrl}/frontend/assets/images/carowsalright.png'>`],
        smartSpeed: 200,
        slideSpeed : 500,
        slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
        responsiveRefreshRate : 100
      }).on('changed.owl.carousel', syncPosition2);
    
      function syncPosition(el) {
        //if you set loop to false, you have to restore this next line
        //var current = el.item.index;
        
        //if you disable loop you have to comment this block
        var count = el.item.count-1;
        var current = Math.round(el.item.index - (el.item.count/2) - .5);
        
        if(current < 0) {
          current = count;
        }
        if(current > count) {
          current = 0;
        }
        
        //end block
    
        sync2
          .find(".owl-item")
          .removeClass("current")
          .eq(current)
          .addClass("current");
        var onscreen = sync2.find('.owl-item.active').length - 1;
        var start = sync2.find('.owl-item.active').first().index();
        var end = sync2.find('.owl-item.active').last().index();
        
        if (current > end) {
          sync2.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
          sync2.data('owl.carousel').to(current - onscreen, 100, true);
        }
      }
      
      function syncPosition2(el) {
        if(syncedSecondary) {
          var number = el.item.index;
          sync1.data('owl.carousel').to(number, 100, true);
        }
      }
      
      sync2.on("click", ".owl-item", function(e){
        e.preventDefault();
        var number = $(this).index();
        sync1.data('owl.carousel').to(number, 300, true);
      });
    });

        // upload image 
</script>


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
@yield('provider_detailsJS')
@yield('astro_details')