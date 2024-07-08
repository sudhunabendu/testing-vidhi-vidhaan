@extends('frontend.master')

@section('content')

@section('fil_gemstones')
<style>
    /* GEMSTONE products page */

    .wrapper {
        padding: 30px;

    }

    .wrapper .h3 {
        font-weight: 900;
    }

    .wrapper .views {
        font-size: 0.85rem;
    }

    .content {
        overflow: hidden;
        overflow-y: hidden !important;
        position: static;
    }

    .content::-webkit-scrollbar {
        display: none;
    }

    .wrapper .btn {
        color: #fff;
        font-size: 18px;
    }



    .wrapper .green-label {
        background-color: #defadb;
        color: #48b83e;
        border-radius: 5px;
        font-size: 0.8rem;
        margin: 0 3px;
    }

    .wrapper .radio,
    .wrapper .checkbox {
        padding: 6px 10px;
    }

    .wrapper .border {
        border-radius: 12px;
    }

    .wrapper .options {
        position: relative;
        padding-left: 25px;
    }

    .wrapper .radio label,
    .wrapper .checkbox label {
        display: block;
        font-size: 14px;
        cursor: pointer;
        margin: 0;
    }

    .wrapper .options input {
        opacity: 0;
    }

    .wrapper .checkmark {
        position: absolute;
        top: 0px;
        left: 0;
        height: 20px;
        width: 20px;
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        border-radius: 50%;
    }

    .wrapper .options input:checked~.checkmark:after {
        display: block;
    }

    .wrapper .options .checkmark:after {
        content: "";
        width: 9px;
        height: 9px;
        display: block;
        background: white;
        position: absolute;
        top: 52%;
        left: 51%;
        border-radius: 50%;
        transform: translate(-50%, -50%) scale(0);
        transition: 300ms ease-in-out 0s;
    }

    .wrapper .options input[type="radio"]:checked~.checkmark {
        background: #F06E20;
        transition: 300ms ease-in-out 0s;
    }

    .wrapper .options input[type="radio"]:checked~.checkmark:after {
        transform: translate(-50%, -50%) scale(1);
    }

    .wrapper .count {
        font-size: 0.8rem;
    }

    .wrapper label {
        cursor: pointer;
    }

    .wrapper .tick {
        display: block;
        position: relative;
        padding-left: 23px;
        cursor: pointer;
        font-size: 0.8rem;
        margin: 0;
    }

    .wrapper .tick input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .wrapper .check {
        position: absolute;
        top: 1px;
        left: 0;
        height: 18px;
        width: 18px;
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        border-radius: 3px;
    }

    .wrapper .tick:hover input~.check {
        background-color: #f3f3f3;
    }

    .wrapper .tick input:checked~.check {
        background-color: #61b15a;
    }

    .wrapper .check:after {
        content: "";
        position: absolute;
        display: none;
    }

    .wrapper .tick input:checked~.check:after {
        display: block;
        transform: rotate(45deg) scale(1);
    }

    .wrapper .tick .check:after {
        left: 6px;
        top: 2px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        transform: rotate(45deg) scale(2);
    }

    .wrapper #country {
        font-size: 0.8rem;
        border: none;
        border-left: 1px solid #ccc;
        padding: 0px 10px;
        outline: none;
        font-weight: 900;
    }

    .wrapper .close {
        font-size: 1.2rem;
    }

    .wrapper div.text-muted {
        font-size: 0.85rem;
    }

    .wrapper #sidebar {
        width: 25%;
        float: left;
    }

    .wrapper #sidebar h5 {
        padding-bottom: 10px;
        margin-bottom: 10px;
        border-bottom: 1px solid #ccc;
    }

    .wrapper .category {
        font-size: 0.9rem;
        cursor: pointer;
    }

    .wrapper .list-group-item {
        border: none;
        padding: 0.3rem 0.4rem 0.3rem 0rem;
    }

    .wrapper .badge-primary {
        background-color: #e9e9e9;
        color: #F06E20;
    }

    .wrapper .brand .check {
        background-color: #fff;
        top: 3px;
        border: 1px solid #666;
    }

    .wrapper .brand .tick {
        font-size: 1rem;
        padding-left: 25px;
    }

    .wrapper .rating .check {
        background-color: #fff;
        border: 1px solid #666;
        top: 2px;
    }

    .wrapper .rating .tick {
        font-size: 0.9rem;
        padding-left: 25px;
    }

    .wrapper .rating .fas.fa-star {
        color: #ffbb00;
        padding: 0px 3px;
    }

    .wrapper .brand .tick:hover input~.check,
    .wrapper .rating .tick:hover input~.check {
        background-color: #f9f9f9;
    }

    .wrapper .brand .tick input:checked~.check,
    .wrapper .rating .tick input:checked~.check {
        background-color: #F06E20;
    }

    .wrapper #products {
        width: 75%;
        padding-left: 30px;
        margin: 0;
        float: right;
    }

    .wrapper .card {
        transition: all 0.5s ease-in-out;
        cursor: pointer;
        padding: 10px;
        margin-bottom: 30px
    }

    .wrapper .card:hover {
        transform: scale(1.05);
        transition: all 0.5s ease-in-out;
        cursor: pointer;
    }

    .wrapper .card-body {
        padding: 0.5rem;
    }

    .wrapper .card-body .description {
        font-size: 0.78rem;
        padding-bottom: 8px;
    }

    .slider-box input {
        width: 100%;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        padding: 8px 15px;
    }

    .wrapper div.h6,
    h6 {
        margin: 0;
    }

    .wrapper .product .fa-star {
        font-size: 18px;
        color: #ffbb00;
    }

    .wrapper .rebate {
        font-size: 0.9rem;
    }

    .wrapper .btn.btn-primary {
        background: linear-gradient(85deg, #F8EF16, #EF5023);
        color: #fff;
        border: 1px solid #ccc;
        border-radius: 10px;
        font-weight: 700;
        padding: 7px 10px;
    }

    .wrapper .btn.btn-primary:hover {
        background-color: #48b83ee8;
    }

    .wrapper img {
        width: 100%;
        height: 132px;
        object-fit: cover;
    }

    #products .info_about_title {
        font-size: 30px;
        padding-bottom: 10px;
    }

    .wrapper .clear {
        clear: both;
    }

    .wrapper .btn.btn-success {
        visibility: hidden;
    }

    @media(max-width:1200px) {

        .wrapper .radio label,
        .wrapper .checkbox label {
            display: block;
            font-size: 11px;
            cursor: pointer;
            margin: 0;
        }
    }

    .Gemstones-price label {
        display: block;
        width: 100%;
    }

    .Gemstones-price select {
        width: 100%;
        height: 40px;
    }

    .slide_range-strt {
        padding-left: 10px
    }

    @media(min-width:768px) and (max-width:991px) {

        .wrapper .radio,
        .wrapper .checkbox {
            padding: 6px 10px;
            width: 100%;
            float: left;
            margin: 5px 5px 5px 0px;
        }

    }

    @media(min-width:576px) and (max-width:991px) {
        .wrapper #sidebar {
            width: 35%;
        }

        .wrapper #products {
            width: 65%;
        }

        .wrapper .filter,
        .wrapper #mobile-filter {
            display: none;
        }

        .wrapper .h3+.ml-auto {
            margin: 0;
        }
    }

    @media(max-width:991px) {
        .wrapper {
            padding: 30px 10px 30px;
        }

        .wrapper .h3 {
            font-size: 1.3rem;
        }

        .wrapper #sidebar {
            display: block;
            width: 100%;
            float: none;
        }

        .wrapper #products {
            width: 100%;
            float: none;
        }

        .wrapper #products {
            padding: 0;
        }

        .wrapper .clear {
            float: left;
            width: 80%;
        }

        .wrapper .btn.btn-success {
            visibility: visible;
            margin: 10px 0px;
            color: #fff;
            padding: 0.2rem 0.1rem;
            width: 20%;
        }

        .wrapper .green-label {
            width: 50%;
        }

        .wrapper .btn.text-success {
            padding: 0;
        }

        .wrapper .content,
        #mobile-filter {
            clear: both;
        }

        .content.py-md-0.py-3 {
            overflow: inherit;
        }
    }
</style>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
@endsection

<div class="banner-start inner-banner-start"
    style="background-image: url({{ URL::asset('/frontend/assets/images/Karamkand-banner.png') }})">
    <div class="container">
        <div class="banner-caption-box">
            <div class="banner-content-box">
                <h1>Gemstones</h1>
            </div>
        </div>
    </div>
</div>


<div class="wrapper">
    <div class="container">
        <div class="d-md-flex align-items-md-center">
            <div class="info_about_title">GEMSTONES</div>
        </div>

        <div class="content">
            <section id="sidebar">

                {{-- <div class="d-lg-flex align-items-lg-center pt-2">
                    <div class="form-inline d-flex align-items-center my-2 mr-lg-2 radio bg-light border"> <label
                            class="options">Most Popular <input type="radio" name="radio"> <span
                                class="checkmark"></span> </label>
                        <label class="options">Cheapest <input type="radio" name="radio" checked> <span
                                class="checkmark"></span>
                        </label>
                    </div>

                </div> --}}

                <div class="py-3">
                    <h5 class="font-weight-bold">Category</h5>
                    <form class="brand">
                        @foreach ($category as $cate)
                        <div class="form-inline d-flex align-items-center py-1"> <label class="tick">{{ $cate->name }}
                                <input type="checkbox" name="category" id="category" value="{{ $cate->id }}">
                                <span class="check"></span> </label> </div>
                        @endforeach

                    </form>


                    <div class="py-3">
                        <h5 class="font-weight-bold">Price Range:</h5>
                        <form class="rating">
                            <div class="row Gemstones-price">
                                <div class="col-12">
                                    <div class="slider-box">
                                        {{-- <h5 class="font-weight-bold">Price Range:</h5> --}}
                                        <input type="text" id="priceRange" readonly>
                                        <div class="slide_range-strt">
                                            <div id="slider-range" class="slider"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="py-3">
                        <h5 class="font-weight-bold">Carat Range:</h5>
                        <form class="rating">
                            <div class="row Gemstones-price">
                                <div class="col-12">
                                    <div class="slider-box">
                                        {{-- <h5 class="font-weight-bold">Price Range:</h5> --}}
                                        <input type="text" id="weight_amount" readonly>
                                        <div class="slide_range-strt">
                                            <div id="weight-slider-range"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="py-4">
                        <button class="page_btn_dark btn" id="filter-button">Filter</button>
                    </div>
                </div>

                {{-- <div class="py-3">
                    <h5 class="font-weight-bold">Rating</h5>
                    <form class="rating">
                        <div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="fas fa-star"></span>
                                <span class="fas fa-star"></span> <span class="fas fa-star"></span> <input
                                    type="checkbox"> <span class="check"></span> </label> </div>
                        <div class="form-inline d-flex align-items-center py-2"> <label class="tick"> <span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="fas fa-star"></span>
                                <span class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span>
                                <input type="checkbox"> <span class="check"></span> </label> </div>
                        <div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="fas fa-star"></span>
                                <span class="far fa-star px-1 text-muted"></span> <span
                                    class="far fa-star px-1 text-muted"></span>
                                <input type="checkbox"> <span class="check"></span> </label> </div>
                        <div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="far fa-star px-1 text-muted"></span> <span
                                    class="far fa-star px-1 text-muted"></span> <span
                                    class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span
                                    class="check"></span>
                            </label> </div>
                        <div class="form-inline d-flex align-items-center py-2"> <label class="tick"> <span
                                    class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span>
                                <span class="far fa-star px-1 text-muted"></span> <span
                                    class="far fa-star px-1 text-muted"></span> <span
                                    class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span
                                    class="check"></span>
                            </label> </div>
                    </form>
                </div> --}}

                {{-- <div class="py-3">
                    <h5 class="font-weight-bold">Price</h5>
                    <form class="brand">
                        <div class="row Gemstones-price">
                            <div class="col-6">
                                <label>Min</label>
                                <select>

                                    <option>₹ 10</option>
                                    <option>₹ 100</option>
                                    <option>₹ 140</option>
                                    <option>₹ 180</option>
                                    <option>₹ 210</option>
                                    <option>₹ 250</option>

                                </select>
                            </div>
                            <div class="col-6">
                                <label>Max</label>
                                <select>

                                    <option>₹ 10</option>
                                    <option>₹ 100</option>
                                    <option>₹ 140</option>
                                    <option>₹ 180</option>
                                    <option>₹ 210</option>
                                    <option>₹ 250</option>

                                </select>
                            </div>
                        </div>
                    </form>
                </div> --}}

            </section> <!-- Products Section -->
            <section id="products">
                <div class="row" id="get_gemstones">

                    @include('frontend.gemstones.list_gemstones')

                </div>

            </section>
        </div>
    </div>
</div>


@section('gemstones_section_list')
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script>
    function limitString(string, limit) {
            if (string.length > limit) {
                return string.substring(0, limit) + '...';
            }
            return string;
        }
</script>

<script>
    $(document).ready(function() {
            $("#slider-range").slider({
                step: 500,
                range: true,
                min: 0,
                max: 200000,
                values: [0, 200000],
                slide: function(event, ui) {
                    $("#priceRange").val(ui.values[0] + "₹ - " + ui.values[1] + "₹");
                }
            });
            $("#priceRange").val($("#slider-range").slider("values", 0) +
                "₹ - " + $("#slider-range").slider(
                    "values", 1) + "₹");


            $("#weight-slider-range").slider({
                step: 0.1,
                range: true,
                min: 0.0,
                max: 36.0,
                values: [0, 36.0],
                slide: function(event, ui) {
                    $("#weight_amount").val(ui.values[0] + " - " + ui.values[1]);
                }
            });

            $("#weight_amount").val($("#weight-slider-range").slider("values", 0) +
                "- " + $("#weight-slider-range").slider("values", 1));

            $('#filter-button').click(function(event) {
                event.preventDefault();
                var checkedCheckboxes = $('input[type="checkbox"]:checked');
                var category_ids = [];
                checkedCheckboxes.each(function() {
                    category_ids.push($(this).val());
                });

                var price_min = $("#slider-range").slider("values", 0);
                var price_max = $("#slider-range").slider("values", 1);
                var weight_min = $("#weight-slider-range").slider("values", 0);
                var weight_max = $("#weight-slider-range").slider("values", 1);
                var path = "{{ route('filter.gems') }}";
                // Show the loader
                // $('.loader').show();

                const APP_URL = {!! json_encode(url('/')) !!};
                
                $.ajax({
                    url: path,
                    // url: url,
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        category_id: category_ids,
                        price_min: price_min,
                        price_max: price_max,
                        weight_min: weight_min,
                        weight_max: weight_max,
                    },
                    success: function(response) {
                        console.log(response);
                        // return
                        if (response.products.length > 0) {
                            $('#get_gemstones').empty();
                            $.each(response.products, function(index, product) {
                                let limitedDescription = limitString(product
                                    .description,
                                    150);
                                $('#get_gemstones').append(
                                    '<div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1"> <div class="card"> <img class="card-img-top" src="'+APP_URL+'/images/product_images/' +
                                    product.images +
                                    '"> <div class="card-body"> <h6 class="font-weight-bold pt-1">' +
                                    product.name +
                                    '</h6> <div class="text-muted description">' +
                                    limitedDescription +
                                    '</div> <div class="d-flex align-items-center product"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star"></span> </div> <div class="d-flex align-items-center justify-content-between pt-3"> <div class="d-flex flex-column"><div class="info_about_title">Carat : ' +
                                    product.weight +
                                    '</div><div class="info_about_title">&#8377; ' +
                                    product.price +
                                    ' </div> </div> </div> <div class="d-flex flex-row"> <a href="#" id="add_to_cart' +
                                    product.id +
                                    '" data-quantity="1" data-product-id="' +
                                    product.id +
                                    '" class="add_to_cart btn btn-primary mr-2">Add To Cart</a></div> </div> </div> </div>'
                                );

                            });
                        } else {
                            $('#get_gemstones').html(
                                '<div class="col-12"><h4 class="info_about_title">No gemstone found</h4></div>'
                            );
                        }
                        // Hide the loader
                        // $('.loader').hide();

                    },
                    error: function() {
                        $('#loading').hide();
                        $('#product-list').html(
                            '<p>An error occurred while loading gemstone.</p>');
                    }
                })
            })
        });
</script>


<script>
    $(document).on('click', '.add_to_cart', function(e) {
            e.preventDefault();
            var product_id = $(this).data('product-id');
            var product_qty = $(this).data('quantity');
            var token = "{{ csrf_token() }}";
            var path = "{{ route('cart.store.gemstone') }}";
            $.ajax({
                url: path,
                type: 'POST',
                dataType: 'JSON',
                data: {
                    product_id: product_id,
                    product_qty: product_qty,
                    _token: token,
                },
                beforeSend: function() {
                    $('#add_to_cart' + product_id).html(
                        '<i class="fa fa-spinner fa-spin"></i>'
                    );
                },
                complete: function() {
                    $('#add_to_cart' + product_id).html('Add To Cart');
                },
                success: function(data) {
                    console.log(data);
                    if (data['status']) {
                        $('body #header-ajax').html(data['header']);
                        $('body #cart_counter').html(data['cart_count']);
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true
                        }
                        toastr.success(data['message'], null, {
                            timeOut: 5000,
                            fadeOut: 1000,
                            onHidden: function() {}
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