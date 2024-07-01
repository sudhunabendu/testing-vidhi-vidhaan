@extends('frontend.master')

@section('content')

<div class="banner-start inner-banner-start"
    style="background-image: url({{URL::asset('frontend/assets/images/Karamkand-banner.png')}})">
    <div class="container">
        <div class="banner-caption-box">
            <div class="banner-content-box">
                <h1>Shopping Cart</h1>

            </div>
        </div>
    </div>

</div>


<section class="cart-start">
    <div class="container">
        <div class="card">
            <div class="row" id="cart_list">

                {{-- <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col">
                                <h4><b>Shopping Cart</b></h4>
                            </div>
                            <div class="col align-self-center text-right text-muted">3 items</div>
                        </div>
                    </div>
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid"
                                    src="{{URL::asset('frontend/assets/images/karamkandimage1.png')}}"></div>
                            <div class="col">
                                <div class="row">Karamkand H2</div>
                            </div>
                            <div class="col">
                                <div class="number">
                                    <span class="minus">-</span>
                                    <input type="text" value="1" />
                                    <span class="plus">+</span>
                                </div>
                            </div>
                            <div class="col">₹2.5k <span class="close">&#10005;</span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid"
                                    src="{{URL::asset('frontend/assets/images/karamkandimage2.png')}}"></div>
                            <div class="col">
                                <div class="row">Karamkand H2</div>
                            </div>
                            <div class="col">
                                <div class="number">
                                    <span class="minus">-</span>
                                    <input type="text" value="1" />
                                    <span class="plus">+</span>
                                </div>
                            </div>
                            <div class="col">₹2.5k <span class="close">&#10005;</span></div>
                        </div>
                    </div>
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid"
                                    src="{{URL::asset('frontend/assets/images/karamkandimage3.png')}}"></div>
                            <div class="col">
                                <div class="row">Karamkand H2</div>
                            </div>
                            <div class="col">
                                <div class="number">
                                    <span class="minus">-</span>
                                    <input type="text" value="1" />
                                    <span class="plus">+</span>
                                </div>
                            </div>
                            <div class="col">₹2.5k <span class="close">&#10005;</span></div>
                        </div>
                    </div>
                    <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span>
                    </div>
                </div>
                <div class="col-md-4 summary">
                    <div>
                        <h5><b>Summary</b></h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;">ITEMS 3</div>
                        <div class="col text-right">₹7.5k</div>
                    </div>
                    <form>
                        <p>SHIPPING</p>
                        <select>
                            <option class="text-muted">Standard-Delivery- ₹0.5k</option>
                        </select>
                        <p>GIVE CODE</p>
                        <input id="code" placeholder="Enter your code">
                    </form>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right">₹8k</div>
                    </div>
                    <button class="btn page_btn_dark">CHECKOUT</button>
                </div> --}}

                @include('frontend.Layouts.cartList')

            </div>
        </div>
    </div>
</section>


@section('cartJs')

<script>
    $(document).on('click', '.cart_delete', function (e) {
        e.preventDefault();
        var cart_id = $(this).data('id');
       
        var token = "{{csrf_token()}}";

        var path = "{{route('cart.delete')}}";
        
        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                cart_id: cart_id,
                _token: token,
            },
            
            success: function (data) {
                console.log(data);
                
                if (data['status']) {
                    $('body #header-ajax').html(data['header']);
                    $('body #cart_counter').html(data['cart_count']);
                    // toastr.options =
                    // {
                    //     "closeButton" : true,
                    //     "progressBar" : true
                    // }
                    // toastr.success(data['message'], null, 
                    // {
                    //     timeOut: 5000,
                    //     fadeOut: 1000,
                    //     onHidden: function () {
                    //     window.location.reload();
                    // }
                    // });
                    location.reload();
                    // swal({
                    //     title: "Product is remove your cart!",
                    //     text: data['message'],
                    //     icon: "success",
                    //     button: "Aww yiss!",
                    // });
                }
            },
            error: function (err) {
                console.warn(err);

            }

        });

    });
</script>
    
@endsection

@endsection