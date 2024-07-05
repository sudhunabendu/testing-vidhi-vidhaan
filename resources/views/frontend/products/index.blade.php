@extends('frontend.master')

@section('content')

<div class="banner-start inner-banner-start"
    style="background-image: url({{URL::asset('/frontend/assets/images/Karamkand-banner.png')}})">
    <div class="container">
        <div class="banner-caption-box">
            <div class="banner-content-box">
                <h1>Our Puja Samagri</h1>

            </div>
        </div>
    </div>

</div>


<section class="karamkand_wrap">
    <div class="container">
        <img class="star_right" src="{{URL::asset('/frontend/assets/images/star.png')}}">
        <img class="star_starlefttop" src="{{URL::asset('/frontend/assets/images/star.png')}}">
        <img class="star_starleftdown" src="{{URL::asset('/frontend/assets/images/star.png')}}">

        <div class="row">
            @if(count($products)>0)
            @foreach ($products as $product)
            <div class="col-lg-4">

            <div class="karamkand_box ">
                <img src="{{URL::asset('images/product_images/'.$product->images)}}">
                <div class="karamkand_box_main_title">
                    <h3>{{$product->name}}</h3>
                    <h4>₹ {{$product->price}}</h4>
                </div>
                <p>{{ \Illuminate\Support\Str::limit($product->description, 80, '...')}}</p>
                <a href="#" data-quantity="1" data-product-id="{{$product->id}}" id="add_to_cart{{$product->id}}" class="add_to_cart btn btn_line_dtl">Add To Cart</a>
            </div>
            </div>
            @endforeach 
            @endif

            
            {{-- <div class="karamkand_box ">
                <img src="{{URL::asset('/frontend/assets/images/karamkandimage2.png')}}">
                <div class="karamkand_box_main_title">
                    <h3>Karamkand H1</h3>
                    <h2>₹2.5k</h2>
                </div>
                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                    distractions. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent
                    intentionnellement.</p>
                <a href="#" class="btn btn_line_dtl">View Details</a>
            </div>
            <div class="karamkand_box ">
                <img src="{{URL::asset('/frontend/assets/images/karamkandimage2.png')}}">
                <div class="karamkand_box_main_title">
                    <h3>Karamkand H1</h3>
                    <h2>₹2.5k</h2>
                </div>
                <p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de
                    distractions. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent
                    intentionnellement.</p>
                <a href="#" class="btn btn_line_dtl">View Details</a>
            </div> --}}
        </div>

        <div class="d-felx justify-content-center">
            {!! $products->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</section>


@section('product_Js')
<script>
    $(document).on('click', '.add_to_cart', function(e) {
        e.preventDefault();
        var product_id = $(this).data('product-id');
        var product_qty = $(this).data('quantity');
        var token = "{{csrf_token()}}";
        var path = "{{route('cart.store')}}";
        $.ajax({
            url : path,
            type: 'POST',
            dataType: 'JSON',
            data:{
                product_id: product_id,
                product_qty: product_qty,
                _token: token, 
            },
            beforeSend: function() {
            $('#add_to_cart' + product_id).html(
                '<i class="fa fa-spinner fa-spin"></i>'
                // '<i class="fa fa-spinner fa-spin"></i><p style="font-size: 14px;"">Loading....</p>'
            );
            },
            complete: function() {
                $('#add_to_cart' + product_id).html('Add To Cart');
                // $('#add_to_cart' + product_id).html('<i class="fa fa-cart-plus"></i>');
            },
            success: function(data) {
                console.log(data);
                if (data['status']) {
                    $('body #header-ajax').html(data['header']);
                    $('body #cart_counter').html(data['cart_count']);
                    toastr.options =
                    {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.success(data['message'], null, 
                    {
                        timeOut: 5000,
                        fadeOut: 1000,
                        onHidden: function () {
                        // window.location.reload();
                    }
                    });
                }
            },
            error: function(err) {

            console.warn(err);

            }
        })

    });
</script>
@endsection

@endsection