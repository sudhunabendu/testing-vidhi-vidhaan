<footer class="footer-start" style="background-image: url({{URL::asset('/frontend/assets/images/footer-back.png')}})">
    <div class="container">
           <img src="{{URL::asset('/frontend/assets/images/GIF-footer-logo.gif')}}" class="footer-logo" alt="">
           <ul class="list-inline ft-nav">
              <li class="{{Request::is('/*') ? 'active' : '' }}"><a href="{{route('home')}}">Home</a></li>
              <li class="{{Request::is('about*') ? 'active' : '' }}"><a href="{{route('about')}}">About Us </a></li>
              <li class="{{Request::is('karamkand*') ? 'active' : '' }}"><a href="{{route('karamkand')}}">Karamkand</a></li>
              <li class="{{Request::is('astrologer*') ? 'active' : '' }}"><a href="{{route('astrologer')}}">Astrologer</a></li>
              <li class="{{Request::is('blog*') ? 'active' : '' }}"><a href="{{route('blog')}}">Blog</a></li>
              <li class="{{Request::is('testimonial*') ? 'active' : '' }}"><a href="{{route('testimonial')}}">Testimonials</a></li>
              <li class="{{Request::is('contact*') ? 'active' : '' }}"><a href="{{route('contact')}}">Contact Us</a></li>
              <li class="{{Request::is('provider*') ? 'active' : '' }}"><a href="{{route('provider.registration')}}">Registration for Astrologer</a></li>
            
          </ul>

          <ul class="list-unstyled footer-social">
            <li><a href=""><i class="fa-brands fa-youtube"></i></a></li>
            <li><a href=""><i class="fa-brands fa-linkedin"></i></a></li>
            <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href=""><i class="fa-brands fa-facebook"></i></a></li>
        </ul>
    </div>
    <div class="ft-copyright">
        <div class="container">
            <p>Copyright © 2024 Vidhi Vidhaan. All rights reserved.</p>
        </div>
    </div>
</footer>
