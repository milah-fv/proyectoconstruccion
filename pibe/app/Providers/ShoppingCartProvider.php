<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCartProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer("*",function($view) {
          $cart_count = Cart::count();
          $cart = Cart::content();
          $total = Cart::subtotal();
          $view->with([
            'cart_count'=> $cart_count,
            'cart' => $cart,
            'total' => $total,
          ]);
        });
    }


    public function register()
    {
        //
    }
}
