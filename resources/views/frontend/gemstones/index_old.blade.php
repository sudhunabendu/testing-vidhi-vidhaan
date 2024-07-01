@extends('frontend.master')

@section('content')

@section('filterCss')

@endsection

<div class="banner-start inner-banner-start"
    style="background-image: url({{URL::asset('/frontend/assets/images/Karamkand-banner.png')}})">
    <div class="container">
        <div class="banner-caption-box">
            <div class="banner-content-box">
                <h1>Our Gemstone</h1>

            </div>
        </div>
    </div>
</div>
{{-- <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
    <option value="">Open this select menu</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select> --}}

<section class="karamkand_wrap">
    <div class="container">
        <img class="star_right" src="{{URL::asset('/frontend/assets/images/star.png')}}">
        <img class="star_starlefttop" src="{{URL::asset('/frontend/assets/images/star.png')}}">
        <img class="star_starleftdown" src="{{URL::asset('/frontend/assets/images/star.png')}}">
       
        <div class="karamkand_box_main_wrap">
            @if(count($products) > 0)
            @foreach ($products as $product)
            <div class="karamkand_box mt-0">
                <img src="{{URL::asset('images/product_images/'.$product->images)}}">
                <div class="karamkand_box_main_title">
                    <h3>{{$product->name}}</h3>
                    <h4>₹ {{$product->price}}</h4>
                </div>
                <p>Weight {{$product->weight}}</p>
                <p>{{ \Illuminate\Support\Str::limit($product->description, 80, '...')}}</p>
                <a href="#" data-quantity="1" data-product-id="{{$product->id}}" id="add_to_cart{{$product->id}}"
                    class="add_to_cart btn btn_line_dtl">Add To Cart</a>
            </div>
            @endforeach
            @else
            <div class="">
                <p style="text-align: center;font-size:30px;font-weight:700;">No Gemstones Available</p>
            </div>
            @endif
        </div>

        {{-- <div class="d-felx justify-content-center">
            {!! $products->links('pagination::bootstrap-5') !!}
        </div> --}}
    </div>
</section>


@endsection