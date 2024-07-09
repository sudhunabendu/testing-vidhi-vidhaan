@foreach ($gemstones as $item)
<div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
    <div class="card"> <img class="card-img-top" src="{{ URL::asset('images/product_images/' . $item->images) }}">
        <div class="card-body">
            <h6 class="font-weight-bold pt-1">{{ $item->name }}</h6>
            <div class="text-muted description">
                {{ \Illuminate\Support\Str::limit($item->description, 110, '...') }}</div>
            <div class="d-flex align-items-center product"> <span class="fas fa-star"></span>
                <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span>
                <span class="far fa-star"></span>
            </div>
            <div class="d-flex align-items-center justify-content-between pt-3">
                <div class="d-flex flex-column">
                    {{-- {{$gemstone->name}} --}}
                    <p>Carat : {{ $item->weight }} </p>
                    <div class="info_about_title">&#8377; {{ number_format($item->price, 2) }}
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row">
                <a href="#" data-quantity="1" data-product-id="{{ $item->id }}" id="add_to_cart{{ $item->id }}"
                    class="add_to_cart btn btn-primary mr-2">Add to Cart</a>
                {{-- <button class="btn btn-primary">Buy now</button> --}}
            </div>
        </div>
    </div>
</div>
@endforeach

<div>
    
</div>

{{-- <section class="pagination">
    <div class="container">
        <div class="row">
            <div class="col-12">
                {{ $gemstones->links('pagination::bootstrap-4') }}
            </div>
        </div>

        <hr>
    </div>
</section> --}}
