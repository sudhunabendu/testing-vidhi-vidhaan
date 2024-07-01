<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Gemstone;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartStore(Request $request)
    {
        $product_qty = $request->input('product_qty');
        $product_id = $request->input('product_id');
        if (!empty($product_qty) && !empty($product_id)) {
            $product = Product::getProductByCart($product_id);
            $price = $product[0]['price'];
        }

        $cart_array = [];
        foreach (Cart::instance('shopping')->content() as $item) {
            $cart_array[] = $item->id;
        }

        $result = Cart::instance('shopping')->add($product_id, $product[0]['name'], $product_qty, $price)->associate('App\Models\Product');
        if (!empty($result)) {
            $response['status'] = true;
            $response['product_id'] = $product_id;
            $response['total'] = Cart::subtotal();
            $response['cart_count'] = Cart::instance('shopping')->count();
            $response['message'] = "Item is added to your cart";
        }
        if ($request->ajax()) {
            $header = view('frontend.Layouts.header')->render();
            $response['header'] = $header;
        }
        return json_encode($response);
    }


    public function cartDelete(Request $request)
    {
        $id = $request->input('cart_id');
        $result = Cart::instance('shopping')->remove($id);
        $response['status'] = true;
        $response['message'] = "Cart Item Remove Successfully";
        $response['total'] = Cart::subtotal();
        $response['cart_count'] = Cart::instance('shopping')->count();

        if ($request->ajax()) {
            $header = view('frontend.Layouts.header')->render();
            $response['header'] = $header;
        }
        return json_encode($response);
    }


    public function cartUpdate(Request $request)
    {
        // dd($request->all());
        // return;
        $this->validate($request, [
            'product_qty' => 'required|numeric',
        ]);
        $rowId = $request->input('rowId');
        $request_quantity = (int)$request->input('product_qty');
        $productQuantity = (int)$request->input('productQuantity');
        // var_dump((int)$productQuantity);
        // print_r([ $request_quantity,$productQuantity]);
        // die();
        if ($request_quantity > $productQuantity) {
            $message = "We qurrently do not have enough items in stock";
            $response['status'] = false;
        } else if ($request_quantity < 1) {
            $message = "You can't add less than 1 quantity";
            $response['status'] = false;
        } else {
            Cart::instance('shopping')->update($rowId, $request_quantity);
            $message = "Quantity was updated successfully";
            $response['status'] = true;
            $response['total'] = Cart::subtotal();
            $response['cart_count'] = Cart::instance('shopping')->count();
        }
        if ($request->ajax()) {
            $header = view('frontend.navbar')->render();
            $cart_list = view('frontend.Layouts._cart-lists')->render();
            $response['header'] = $header;
            $response['cart_list'] = $cart_list;
            $response['message'] = $message;
        }
        return $response;
    }


    /**
     * The function addToCartGemstone adds a gemstone product to the shopping cart and returns a JSON
     * response with relevant information.
     * 
     * @param Request request The `addToCartGemstone` function is a PHP function that adds a gemstone
     * product to the shopping cart. It takes a `Request` object as a parameter, which likely contains
     * information about the product being added to the cart, such as the product quantity and product
     * ID.
     * 
     * @return The function `addToCartGemstone` is returning a JSON response containing the following
     * data:
     * - `status`: Boolean value indicating the success status of adding the item to the cart.
     * - `product_id`: The ID of the product being added to the cart.
     * - `total`: The subtotal of the cart after adding the item.
     * - `cart_count`: The count of items in the shopping cart.
     */
    public function addToCartGemstone(Request $request)
    {
        $product_qty = $request->input('product_qty');
        $product_id = $request->input('product_id');
        if (!empty($product_qty) && !empty($product_id)) {
            $product = Gemstone::where('id', $product_id)->get();
            $price = $product[0]['price'];
        }

        $cart_array = [];
        foreach (Cart::instance('shopping')->content() as $item) {
            $cart_array[] = $item->id;
        }

        $result = Cart::instance('shopping')->add($product_id, $product[0]['name'], $product_qty, $price)->associate('App\Models\Gemstone');

        if (!empty($result)) {
            $response['status'] = true;
            $response['product_id'] = $product_id;
            $response['total'] = Cart::subtotal();
            $response['cart_count'] = Cart::instance('shopping')->count();
            $response['message'] = "Item is added to your cart";
        }
        if ($request->ajax()) {
            $header = view('frontend.Layouts.header')->render();
            $response['header'] = $header;
        }
        return json_encode($response);
    }
}
