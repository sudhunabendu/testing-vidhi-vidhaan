<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SyncCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // Load user's cart from the database
            $userId = Auth::id();
            $cartItems = DB::table('carts')->where('user_id', $userId)->get();

            foreach ($cartItems as $item) {
                Cart::add($item->id, $item->name, $item->qty, $item->price);
            }

        }
        return $next($request);
    }


    public function terminate($request, $response)
    {
        if (Auth::check()) {
            // Save user's cart to the database
            $userId = Auth::id();
            DB::table('carts')->where('user_id', $userId)->delete();

            foreach (Cart::content() as $item) {
                DB::table('carts')->insert([
                    'user_id' => $userId,
                    'id' => $item->id,
                    'name' => $item->name,
                    'qty' => $item->qty,
                    'price' => $item->price,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
