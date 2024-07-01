@extends('frontend.master')

@section('content')

<div class="banner-start inner-banner-start"
  style="background-image: url({{URL::asset('frontend/assets/images/Karamkand-banner.png')}})">
  <div class="container">
    <div class="banner-caption-box">
      <div class="banner-content-box">
        <h1>Checkout</h1>

      </div>
    </div>
  </div>

</div>


<section class="checkoutpagestart">
  <div class="container">
    <div class="row">
      <div class="col-75">
        <div class="containerr">
          <form action="/action_page.php">
            <div class="row">
              @php
              $full_name = $user->first_name. ' ' . $user->last_name;
              @endphp
              <div class="col-50">
                <h3>Billing Address</h3>
                <hr>
                <label for="fname">Full Name</label>
                <input type="text" id="fname" name="firstname" class="@error('first_name') is-invalid @enderror"
                  value="{{$full_name ?? ''}}" placeholder="John M. Doe">
                @error('first_name')
                <small class="text-danger" data-error='first_name'>{{ $message }}</small>
                @enderror
                <label for="email">Email</label>
                <input type="text" value="{{$user->email}}" id="email" name="email" placeholder="john@example.com">
                <label for="adr">Address</label>
                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                <label for="city">City</label>
                <input type="text" id="city" name="city" placeholder="New York">

                <div class="row">
                  <div class="col-50">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" placeholder="NY">
                  </div>
                  <div class="col-50">
                    <label for="zip">Zip</label>
                    <input type="text" id="zip" name="zip" placeholder="10001">
                  </div>
                </div>
              </div>

              {{-- <div class="col-50">
                <h3>Payment</h3>
                <hr>
                <label for="fname">Accepted Cards</label>
                <div class="icon-container">
                  <i class="fa-brands fa-cc-visa" style="color:navy;"></i>
                  <i class="fa-brands fa-cc-mastercard" style="color:red;"></i>
                  <i class="fa-brands fa-cc-discover" style="color:orange;"></i>

                </div>
                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                <label for="expmonth">Exp Month</label>
                <input type="text" id="expmonth" name="expmonth" placeholder="September">
                <div class="row">
                  <div class="col-50">
                    <label for="expyear">Exp Year</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                  </div>
                  <div class="col-50">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="352">
                  </div>
                </div>
              </div> --}}

            </div>
            <label>
              <input type="checkbox" id="checkout-same-address" checked="checked" name="sameadr"> Shipping address same
              as billing
            </label>
            <input type="submit" value="Continue to checkout" class="btn">
          </form>
        </div>
      </div>
      <div class="col-25">
        <div class="containerr">
          <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i>
              <b>{{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()}}</b></span></h4>
          <hr>
          @if(count(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content())>0)
          @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
          <p>{{$item->name}}<span class="price">₹ {{$item->price}}</span></p>
          @endforeach
          @else

          <p>Your cart is empty</p>
          @endif
          {{--
          <hr> --}}
          {{-- <p>Product 1 <span class="price">₹2.5k</span></p>
          <p>Product 1 <span class="price">₹2.5k</span></p>
          <p>Product 1 <span class="price">₹2.5k</span></p> --}}
          <hr>
          <p>Total <span class="price" style="color:black"><b>₹
                {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</b></span></p>
        </div>
      </div>
    </div>
  </div>
</section>


@section('shipptingJs')
<script>
  $('#checkout-same-address').on('change', function (e) {
      // alert();
      e.preventDefault()
      if (this.checked) {
          $('#sfirst_name').val($('#first_name').val());
          $('#slast_name').val($('#last_name').val());
          $('#semail').val($('#email').val());
          $('#scountry').val($('#country').val());
          $('#saddress').val($('#address').val());
          $('#sstate').val($('#state').val());
          $('#scity').val($('#city').val());
          $('#spostcode').val($('#postcode').val());
          $('#sphone').val($('#phone').val());
      } else {
          $('#sfirst_name').val('');
          $('#slast_name').val('');
          $('#semail').val('');
          $('#scountry').val('');
          $('#saddress').val('');
          $('#sstate').val('');
          $('#scity').val('');
          $('#spostcode').val('');
          $('#sphone').val('');
      }
  })
</script>

@endsection

@endsection