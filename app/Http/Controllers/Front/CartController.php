<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Gemstone;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * The function `cartStore` adds a product to the shopping cart and returns a JSON response with
     * relevant information.
     * 
     * @param Request request The `cartStore` function is used to add a product to the shopping cart.
     * It takes a `Request` object as a parameter, which contains the data sent by the client-side
     * request.
     * 
     * @return The function `cartStore` is returning a JSON response containing the following data:
     * - `status`: A boolean indicating the success status of the operation.
     * - `product_id`: The ID of the product that was added to the cart.
     * - `total`: The subtotal of the cart after adding the product.
     * - `cart_count`: The total count of items in the shopping cart.
     * - `message`:
     */
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


   /**
    * The function `cartDelete` removes a cart item, updates the cart total and count, and returns a
    * JSON response with a success message and optionally updates the header in an AJAX request.
    * 
    * @param Request request The `cartDelete` function is a PHP function that handles the deletion of a
    * cart item. It takes a `Request` object as a parameter, which likely contains information about
    * the request being made to the server.
    * 
    * @return A JSON response is being returned from the `cartDelete` function. The response includes
    * the status of the operation, a success message, the updated total of the cart, and the count of
    * items in the cart. If the request is an AJAX request, the response also includes the rendered
    * header view.
    */
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


   /**
    * The function `cartUpdate` in PHP validates and updates the quantity of a product in the shopping
    * cart, checking if there is enough stock and handling AJAX requests for updating the cart display.
    * 
    * @param Request request The `cartUpdate` function is used to update the quantity of a product in
    * the shopping cart. Here's a breakdown of the code:
    * 
    * @return The function `cartUpdate` is returning a response array. The response array contains the
    * following keys:
    * - 'status': Indicates whether the update was successful or not (true or false).
    * - 'total': The updated subtotal of the cart after the quantity update.
    * - 'cart_count': The count of items in the shopping cart after the update.
    * - 'header': The rendered view of the frontend navbar
    */
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
