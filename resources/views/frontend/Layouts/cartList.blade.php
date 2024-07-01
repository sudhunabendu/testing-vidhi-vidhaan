

    <div class="col-md-8 cart">
        <div class="title">
            <div class="row">
                <div class="col">
                    <h4><b>Shopping Cart</b></h4>
                </div>
                <div class="col align-self-center text-right text-muted">{{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()}} items</div>
            </div>
        </div>
        @if(count(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content())>0)
        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
        
        <div class="row border-top border-bottom">
            <div class="row main align-items-center">
                
                <div class="col-2"><img class="img-fluid"
                        src="{{URL::asset('images/product_images/'.$item->model->images)}}"></div>
                <div class="col">
                    <div class="row">{{$item->name}}</div>
                </div>
                {{-- <div class="col">
                    <div class="number">
                        <span class="minus">-</span>
                        <input type="number" data-id="{{$item->rowId}}" id="qty-input-{{$item->rowId}}" value="{{$item->qty}}" min="1" step="1" data-decimals="0" required/>
                        <span class="plus">+</span>
                    </div>
                </div> --}}
                <div class="col">{{number_format($item->price,2)}}<span class="close cart_delete" data-id="{{$item->rowId}}">&#10005;</span></div>
            </div>
        </div>

        @endforeach

        @else

        <p>Your cart is empty!</p>

        @endif


        {{-- <div class="row border-top border-bottom">
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
        </div> --}}
        <div class="back-to-shop">
            <a href="{{route('home')}}">&leftarrow;</a><span class="text-muted">Back to shop</span>
        </div>
    </div>


    <div class="col-md-4 summary">
        <div>
            <h5><b>Summary</b></h5>
        </div>
        <hr>
        <div class="row">
            <div class="col" style="padding-left:0;">ITEMS {{\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count()}}</div>
            <div class="col text-right">₹ {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</div>
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
            {{-- <div class="col text-right">₹ {{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</div> --}}
            <div class="col text-right">₹ {{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</div>
        </div>
        <a href="{{route('checkout')}}" style="font-size: 34px;" class="btn page_btn_dark">CHECKOUT</a>
        {{-- <button class="btn page_btn_dark">CHECKOUT</button> --}}
    </div>