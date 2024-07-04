<header class="header_area clearfix" id="header-ajax">
  <div class="container-fluid clearfix">
    <div class="logo"> <a href="{{route('home')}}"><img class="logoone" src="{{URL::asset('frontend/assets/images/main-logo.png')}}" alt=""></a> </div>
    <div class="header_right">
      <div class="menu">
        <div class="menuButton"> <span></span> <span></span> <span></span> </div>
        <ul class="m-auto">
          <li class="{{Request::is('/*') ? 'active' : '' }}"><a href="{{route('home')}}">Home</a></li>
          <li class="{{Request::is('about*') ? 'active' : '' }}"><a href="{{route('about')}}">About Us </a></li>
          <li class="{{Request::is('products*') ? 'active' : '' }}"><a href="{{route('products')}}">Puja Samagri </a></li>
          <li class="{{Request::is('karamkand*') ? 'active' : '' }}"><a href="{{route('karamkand')}}">Karamkand</a></li>
          <li class="{{Request::is('astrologer*') ? 'active' : '' }}"><a href="{{route('astrologer')}}">Astrologers</a></li>
          <li class="{{Request::is('gemstones*') ? 'active' : '' }}"><a href="{{route('gemstones')}}">Gemstones</a></li>
          {{-- <li class="{{Request::is('blog*') ? 'active' : '' }}"><a href="{{route('blog')}}">Blog</a></li> --}}
          {{-- <li class="{{Request::is('testimonial*') ? 'active' : '' }}"><a href="{{route('testimonial')}}">Testimonials</a></li> --}}
          <li class="{{Request::is('contact*') ? 'active' : '' }}"><a href="{{route('contact')}}">Contact Us</a></li> 
        </ul>
      </div>
    </div>
    <div class="register-cart">

      @if(Session::has('user') || Session::has('provider'))
        
      <div class="register-option">
        <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            {{-- Profile --}}
            {{Session::get('user')->first_name ?? Session::get('provider')->first_name}}
          </button>
          {{-- @if(Session::has('provider'))
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{route('providerlogout')}}">Logout</a>
          </div>
          @else --}}
          @if(Auth::user()->role_id == 3)
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{route('userlogout')}}">Logout</a>
          </div>
          @else
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{route('provider.profile')}}">Profile</a>
            {{-- <a class="dropdown-item" href="{{route('provider.setting')}}">Account Setting</a> --}}
            <a class="dropdown-item" href="{{route('userlogout')}}">Logout</a>
          </div>
          @endif
        </div>
      </div>

      @else

      <div class="register-option">
        <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            My Account
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{route('registration')}}">Register</a>
            <a class="dropdown-item" href="{{route('login')}}">Login</a>
          </div>
        </div>
      </div>

      @endif

      <div class="header-cart-box">
        <a href="{{route('cart')}}"><img src="{{URL::asset('/frontend/assets/images/cart-icon.png')}}" alt=""></a>
        <p>{{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()}}</p>
      </div>
    </div>
  </div>

</header>